<?php 
  if(!defined('BASEPATH')) exit('No direct script access allowed');
  require_once APPPATH . 'controllers/Member.php';
  class FacultyMember extends Member 
  {
  	public function __construct()
  	{
  		parent::__construct();
      validateLoginSession();
      $this->load->model('facultymembermodel');
  	}
    public final function index()
    {
      $o = $this->facultymembermodel->index()->result();
      showView('members/faculties/index', array('members' => $o));
    }
  }