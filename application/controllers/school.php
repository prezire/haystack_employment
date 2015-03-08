<?php 
  if(!defined('BASEPATH')) exit('No direct script access allowed');
  class School extends CI_Controller 
  {
  	public function __construct()
  	{
  		parent::__construct();
      $this->load->model('schoolmodel');
  	}
    public final function index()
    {
      $o = $this->schoolmodel->index()->result();
      showView('schools/index', array('schools' => $o));
    }
    public final function create()
    {
      if($this->input->post())
      {
        if($this->form_validation->run('school/create'))
        {
          $o = $this->schoolmodel->create()->row();
          if($o->id)
          {
            redirect(site_url('school/read/' . $o->id));
          }
          else
          {
            show_error('Error creating school.');
          }
        }
        else
        {
          showView('schools/create');
        }
      }
      else
      {
        showView('schools/create');
      }
    }
  	public final function read($id)
  	{
  		showView('schools/read', array('school' => $this->schoolmodel->read($id)->row()));
  	}
  	public final function update($id = null)
    {
      $o = $this->schoolmodel->read($id)->row();
      $a = array('school' => $o);
      if($this->input->post())
      {
        if($this->form_validation->run())
        {
          $b = $this->schoolmodel->update()->row();
          if($b)
          {
            redirect(site_url('school/read/' . $o->id));
          }
          else
          {
            show_error('Error updating school.');
          }
        }
        else
        {
          showView('schools/update', $a);
        }
      }
      else
      {
        showView('schools/update', $a);
      }
    }
    public final function updateFromEmployerProfile($userId = null)
    {
      $this->load->model('employermodel');
      if($this->input->post())
      {
        $userId = $this->input->post('user_id');
        if($this->form_validation->run('school/update'))
        {
          $this->schoolmodel->updateFromEmployerProfile();
          redirect(site_url('school/updateFromEmployerProfile/' . $userId));
        }
        else
        {
          $emplId = $this->employermodel->readByUserId($userId)->row()->id;
          $o = $this->schoolmodel->readByEmployerId($emplId)->row();
          $a = array('school' => $o);
          $this->form_validation->set_error_delimiters('<div data-alert class="alert-box alert">', '</div>');
          showView('schools/update_from_employer_profile', $a);
        }
      }
      else
      {
        $emplId = $this->employermodel->readByUserId($userId)->row()->id;
        $o = $this->schoolmodel->readByEmployerId($emplId)->row();
        $a = array('school' => $o);
        showView('schools/update_from_employer_profile', $a);
      }
    }
  	public final function delete($id)
    {
      showJsonView(array('school' => $this->school_model->delete($id)->row()));
    }
  }