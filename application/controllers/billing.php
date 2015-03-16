<?php 
  if(!defined('BASEPATH')) exit('No direct script access allowed');
  class Billing extends CI_Controller 
  {
  	public function __construct()
  	{
  		parent::__construct();
      validateLoginSession();
      $this->load->model('billingmodel');
      $this->load->helper('pagination_helper');
    }
    /*
      No pagination. Billings shouldn't 
      leave the page unless checked out.
      Unpaid.
    */
    public final function index()
    {
      $b = $this->billingmodel->index()->result();
      $a = array('paidBillings' => $b);
      $s = null;
      $r = getRoleName();
      switch($r)
      {
        case 'Employer':
          $s = 'billings/employer';
        break;
        case 'Faculty':
          $s = 'billings/faculty';
        break;
      }
      showView($s, $a);
    }
    public final function paid($page = 0)
    {
      $r = getRoleName();
      $a = array();
      switch($r)
      {
        case 'Employer':
          showView('billings/employer', $a);
        break;
        case 'Faculty':
          showView('billings/faculty', $a);
        break;
      }
    }
  }