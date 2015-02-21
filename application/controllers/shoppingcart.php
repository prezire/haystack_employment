<?php 
  if(!defined('BASEPATH')) 
    exit('No direct script access allowed');
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