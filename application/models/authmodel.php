<?php  
  class AuthModel extends CI_Model
  {
    public function __construct()
    {
      parent::__construct();
    }
    public final function login()
    {
      $this->load->model('usermodel');
      return $this->usermodel->login();
    }
    public final function fbLogin()
    {
      //TODO: Read from DB. If exists, create session.
      //Else, create new user.
      /*
        will receive the following info: your public profile, 
        friend list, email address, birthday, work history, 
        education history, current city, website and 
        personal description.
      */ 
    }
  }