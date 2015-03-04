<?php 
  if(!defined('BASEPATH')) exit('No direct script access allowed');
  class Organization extends CI_Controller 
  {
  	public function __construct()
  	{
  		parent::__construct();
      $this->load->model('organizationmodel');
  	}
    public final function index()
    {
      $o = $this->organizationmodel->index()->result();
      showView('organizations/index', array('organizations' => $o));
    }
    public final function create()
    {
      if($this->input->post())
      {
        if($this->form_validation->run('organization/create'))
        {
          $o = $this->organizationmodel->create()->row();
          if($o->id)
          {
            redirect(site_url('company/read/' . $o->id));
          }
          else
          {
            show_error('Error creating company.');
          }
        }
        else
        {
          showView('organizations/create');
        }
      }
      else
      {
        showView('organizations/create');
      }
    }
  	public final function read($id)
  	{
  		showView('organizations/read', array('company' => $this->organizationmodel->read($id)->row()));
  	}
  	public final function update($id = null)
    {
      $o = $this->organizationmodel->read($id)->row();
      $a = array('company' => $o);
      if($this->input->post())
      {
        if($this->form_validation->run())
        {
          $b = $this->organizationmodel->update()->row();
          if($b)
          {
            redirect(site_url('company/read/' . $o->id));
          }
          else
          {
            show_error('Error updating company.');
          }
        }
        else
        {
          showView('organizations/update', $a);
        }
      }
      else
      {
        showView('organizations/update', $a);
      }
    }
  	public final function delete($id)
    {
      showJsonView(array('company' => $this->company_model->delete($id)->row()));
    }
  }