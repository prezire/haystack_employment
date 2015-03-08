<?php 
  if(!defined('BASEPATH')) exit('No direct script access allowed');
  class Faculty extends CI_Controller 
  {
  	public function __construct()
  	{
  		parent::__construct();
      validateLoginSession(array('index', 'read', 'update', 'delete'));
      $this->load->model('facultymodel');
  	}
    public final function index()
    {
      $o = $this->facultymodel->index()->result();
      showView('faculties/index', array('faculties' => $o));
    }
    public final function create()
    {
      if($this->input->post())
      {
        if($this->form_validation->run('faculty/create'))
        {
          $o = $this->facultymodel->create()->row();
          if($o->id)
          {
            $conf = $this->config->item('email');
            $a = array
            (
              'full_name' => $o->full_name,
              'site_url' => site_url(),
              'activation_url' => site_url('auth/enable/1/' . $o->enable_token)
            );
            //
            sendEmailer
            (
              'Simplifie Haystack - Verify Account',
              $conf['admin'],
              /*'haystackuser@localhost' */$o->email,
              $this->parser->parse
              (
                'commons/emailers/auth/account_activation', 
                $a, 
                true
              )
            );
            redirect(site_url('auth/registerSuccess'));
          }
          else
          {
            showView('faculties/create', array('error' => 'Error creating faculty account'));        
          }
        } 
        else 
        {
          $this->form_validation->set_error_delimiters('<div data-alert class="alert-box alert">', '</div>');
          showView('faculties/create');
        }
      }
      else
      {
        showView('faculties/create');
      }
    }
  	public final function read($id)
  	{
  		showView('faculties/read', array('faculty' => $this->facultymodel->read($id)->row()));
  	}
  	public final function update($id = null)
    {
      $o = $this->facultymodel->read($id)->row();
      $a = array('faculty' => $o);
      if($this->input->post())
      {
        if($this->form_validation->run('faculty/update'))
        {
          $b = $this->facultymodel->update()->row();
          if($b)
          {
            redirect(site_url('faculty/read/' . $o->id));
          }
          else
          {
            show_error('Error updating faculty.');
          }
        }
        else
        {
          showView('faculties/update', $a);
        }
      }
      else
      {
        showView('faculties/update', $a);
      }
    }
  	public final function delete($id)
    {
      showJsonView(array('faculty' => $this->faculty_model->delete($id)->row()));
    }
  }