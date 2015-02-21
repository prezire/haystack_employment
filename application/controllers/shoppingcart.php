<?php 
  if(!defined('BASEPATH')) 
    exit('No direct script access allowed');
  //TODO: Rename ShoppingCart names to Transactions.
  class ShoppingCart extends CI_Controller 
  {
  	public function __construct()
  	{
  		parent::__construct();
      validateLoginSession();
      $this->load->model('shoppingcartmodel');
  	}
    public final function index()
    {
      //List all purchases.
      $a = array('items' => $this->shoppingcartmodel->index());
      showView('shopping_carts/index', $a);
    }
    public final function checkout()
    {
      $this->load->model('companymodel');
      $u = getLoggedUser();
      $c = $this->companymodel->readByUserId($u->id)->row();
      $a = array
      (
        'user' => array
        (
          'id' => $u->id, 
          'fullName' => $u->fullName
        ),
        'company' => array
        (
          'name' => $c->name,
          'address' => $c->address,
          'city' => $c->city,
          'state' => $c->state,
          'country' => $c->country
        ),
        'items' => $this->shoppingcartmodel->index()
      );
      showView('shopping_carts/checkout', $a);
    }
    public final function directBankTransfer($transferId)
    {
      if($this->input->post())
      {
        $id = $this->shoppingcartmodel->createDirectBankTransfer()->row()->id;
        redirect
        (
          site_url
          (
            'shoppingcart/directBankTransfer/' . $id
          )
        );
      }
      else
      {
        $summary = array
        (
          'summary' => 
          $this->shoppingcartmodel->readDirectBankTransfer()->row()
        );
        showView
        (
          'shopping_carts/direct_bank_transfer_summary'
        );
      }
    }
    public final function payPal()
    {
      //
    }
    //Perform CRUD using AJAX.
    private final function checkRequestType()
    {
      if(!this->input->post()) 
      {
        showJsonView
        (
          array
          (
            'status' => 'error', 
            'message' => 'Invalid request type.'
          )
        );
        exit;
      }
    }
    public final function create()
    {
      $this->checkRequestType();
      $a = $this->shoppingcartmodel->readParams();
      $rowId = $this->shoppingcartmodel->create
      (
        $a['id'], 
        $a['quantity'], 
        $a['price'], 
        $a['name'], 
        $a['options']
      );
      showJsonView(array('row_id' => $rowId));
    }
    public final function read($rowId)
    {
      $item = $this->shoppingcartmodel->read($rowId);
      showJsonView(array('item' => $data));
    }
    public final function update($rowId)
    {
      $this->checkRequestType();
      $a = $this->shoppingcartmodel->readParams();
      $this->shoppingcartmodel->update
      (
        $a['id'], 
        $a['quantity'], 
        $a['price'], 
        $a['name'], 
        $a['options']
      );
      showJsonView(array('status' => 'success', 'row_id' => $rowId));
    }
    public final function delete($destroyAll, $rowId)
    {
      $this->shoppingcartmodel->delete($destroyAll, $rowId);
    }