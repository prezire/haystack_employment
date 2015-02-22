<?php 
  if(!defined('BASEPATH')) 
    exit('No direct script access allowed');
  class Transaction extends CI_Controller 
  {
  	public function __construct()
  	{
  		parent::__construct();
      //
      if($this->input->post())
      {
        validateLoginSession();
      }
      else
      {
        $c = $this->input->controller_name;
        if
        (
          $c != 'chequePayment' || 
          $c != 'directBankTransfer' || 
          $c != 'payPal'
        )
        {
          validateLoginSession();   
        }
      }
      //
      $this->load->model('transactionmodel');
  	}
    public final function index()
    {
      $a = array
      (
        'items' => $this->transactionmodel->index()
      );
      showView('transactions/index', $a);
    }
    public final function checkout()
    {
      $a = $this->transactionmodel->readUserDetails();
      $a['items'] = $this->transactionmodel->index();
      showView
      (
        'transactions/checkout', 
        $a
      );
    }
    public final function chequePayment($orderId)
    {
      if($this->input->post())
      {
        $id = $this->transactionmodel->createChequePayment()->row()->id;
        redirect
        (
          site_url
          (
            'shoppingcart/chequePayment/' . $id
          )
        );
      }
      else
      {
        $summary = array
        (
          'summary' => 
          $this->transactionmodel->readCheckPayment($orderId)->row()
        );
        showView
        (
          'transactions/check_payment_summary'
        ); 
      } 
    }
    private final function directBankTransfer($orderId)
    {
      if($this->input->post())
      {
        $id = $this->transactionmodel->createDirectBankTransfer()->row()->id;
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
          $this->transactionmodel->readDirectBankTransfer()->row()
        );
        showView
        (
          'transactions/direct_bank_transfer_summary'
        );
      }
    }
    public final function payPal()
    {
      $a = array
      (
        'items' => $this->transactionmodel->index(),
        'payPal' => array
        (
          'business' => 'admin@simplifie.net',
          'currency' => 'USD',
          'curSymbol' => 'USD',
          'location' => 'Philippines',
          'returnUrl' => 'http://mysite/myreturnpage',
          'returnTxt' => 'Return to Cart',
          'cancelUrl' => 'http://mysite/mycancelpage',
        )
      );
      showView('transactions/paypals/checkout', $a);
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
      $a = $this->transactionmodel->readParams();
      $rowId = $this->transactionmodel->create
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
      $item = $this->transactionmodel->read($rowId);
      showJsonView(array('item' => $data));
    }
    public final function update($rowId)
    {
      $this->checkRequestType();
      $a = $this->transactionmodel->readParams();
      $this->transactionmodel->update
      (
        $a['id'], 
        $a['quantity'], 
        $a['price'], 
        $a['name'], 
        $a['options']
      );
      showJsonView
      (
        array
        (
          'status' => 'success', 
          'row_id' => $rowId
        )
      );
    }
    public final function delete($destroyAll, $rowId)
    {
      $this->transactionmodel->delete($destroyAll, $rowId);
    }