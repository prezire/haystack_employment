<?php 
  if(!defined('BASEPATH')) exit('No direct script access allowed');
  require_once APPPATH . 'controllers/Member.php';
  class CompanyMember extends Member 
  {
  	public function __construct()
  	{
  		parent::__construct();
      validateLoginSession();
      $this->load->model('companymembermodel');
  	}
    public function index()
    {
      $o = $this->companymembermodel->index()->result();
      showView('members/employers/index', array('members' => $o));
    }
  }