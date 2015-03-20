<?php
  if(!defined('BASEPATH')) exit('No direct script access allowed');
  class Auth extends CI_Controller
  {
    public function __construct()
    {
      parent::__construct();
      //validateLoginSession(array('enable'));
      $this->load->helper('job_helper');
    }
    public final function enable($state = 1, $enableToken)
    {
      $this->load->model('usermodel');
      $i = $this->usermodel->enable($state, $enableToken);
      $b = $i > 0;
      if($b)
      {
        showView('auth/activation_success');
      }
      else
      {
        show_error('Invalid activation URL. You may already have enabled your account. Click <a href="' . site_url('auth/forgotPassword') . '">here</a> to trigger the forgot password emailer.');
      }
    }
    public final function register($userType = 'applicant')
    {
      showView('auth/register');
    }
    public final function registerSuccess(){showView('auth/register_success');}
    //
    public final function updatePassword($passwordResetToken = null)
    {
      $i = $this->input;
      $this->load->model('usermodel');
      if($i->post())
      {
        if($this->form_validation->run('auth/updatePassword'))
        {
          $this->usermodel->updatePassword();
          showView
          (
            'auth/update_password', 
            array
            (
              'status' => 'success', 
              'id' => $i->post('id')
            )
          ); 
        }
        else
        {
          showView('auth/update_password', array('id' => $i->post('id')));
        }
      }
      else
      {
        $uId = $this->usermodel->readByPasswordResetToken($passwordResetToken)->row()->id;
        if(!$uId) redirect(site_url('auth/login'));
        showView('auth/update_password', array('id' => $uId));
      }
    }
    public final function forgotPassword(){
      $i = $this->input;
      if($i->post())
      {
        if($this->form_validation->run('auth/forgotPassword'))
        {
          $this->load->model('usermodel');
          $b = $this->usermodel->forgotPassword();
          if($b)
          {
            $user = $this->usermodel->readByEmail($i->post('email'))->row();
            $this->config->load('custom_configs');
            $c = $this->config->item('email');
            $a = array
            (
              'email' => 'haystackuser@localhost' /*$user->email*/,
              'full_name' => $user->full_name,
              'url' => site_url('auth/updatePassword/' . $user->password_reset_token)
            );
            sendEmailer
            (
              'Simplifie Haystack - Forgot Password', 
              $c['admin'],
              /*'haystackuser@localhost' */$user->email,  
              $this->parser->parse
              (
                'auth/emailers/forgot_password',
                $a,
                true
              )
            );
            showView
            (
              'auth/forgot_password', 
              array
              (
                'status' => 'success', 
                'message' => 'A forgot password emailer was sent to ' . 
                $i->post('email') . '.'
              )
            ); 
          }
          else
          {
            showView
            (
              'auth/forgot_password', 
              array
              (
                'error' => 'No record of such email. Please try again.'
              )
            ); 
          }
        }
        else
        {
          showView('auth/forgot_password');
        }
      }
      else
      {
        showView('auth/forgot_password');
      }
    }
    public final function fbLogin($email, $fullName)
    {
      $this->authmodel->fbLogin($email, $fullName);
      redirect(site_url());
    }
    public final function login()
    {
      $aErr = array
      (
        'status' => 'failed', 
        'message' => 'User not found. Check your credentials or email activation and try again.'
      );
      if($this->input->post())
      {
        if($this->form_validation->run('auth/login'))
        {
          $this->load->model('authmodel');
          $u = $this->authmodel->login();
          if($u->num_rows() > 0)
          {
            $u = $u->row();
            $this->session->set_userdata('user', $u);
            redirect(site_url());
          }
          else
          {
            showView('auth/login', $aErr);
          }
        }
        else
        {
          showView('auth/login', $aErr);
        }
      }
      else
      {
        showView('auth/login');
      }
    }
    public final function logout()
    {
      $this->session->set_userdata('user', null);
      $this->session->sess_destroy();
      redirect(site_url('auth/login'));
    }
  }