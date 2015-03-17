<?php 
  if(!defined('BASEPATH')) exit('No direct script access allowed');
  class PositionApplication extends CI_Controller 
  {
  	public function __construct()
  	{
  		parent::__construct();
      validateLoginSession();
      $this->load->model('positionapplicationmodel');
  	}
    public final function index()
    {
      $o = $this->positionapplicationmodel->index()->result();
      showView('position_applications/index', array('positionApplications' => $o));
    }
    public final function create($positionId)
    {
      $o = $this->positionapplicationmodel->create($positionId);
      if($o->row()->id > 0)
      {
        //showJsonView(array('status' => 'success'));
        redirect(site_url('position/read/' . $positionId));
      }
      else
      {
        //showJsonView(array('status' => 'failed'));
        showView('positions/read/', array('position' => $this->read($positionId)->row()));
      }
    }
  	public final function read($id)
  	{
  		showView('internship_applications/read', array('internshipApplication' => $this->internshipapplicationmodel->read($id)->row()));
  	}
  	public final function update($id = null)
    {
      $o = $this->internshipapplicationmodel->read($id)->row();
      $a = array('internshipApplication' => $o);
      if($this->input->post())
      {
        if($this->form_validation->run())
        {
          $b = $this->internshipapplicationmodel->update()->row();
          if($b)
          {
            redirect(site_url('internship_application/read/' . $o->id));
          }
          else
          {
            show_error('Error updating internship_application.');
          }
        }
        else
        {
          showView('internship_applications/update', $a);
        }
      }
      else
      {
        showView('internship_applications/update', $a);
      }
    }
    public final function updateStatusAndNotes($positionId, $applicantId)
    {
      if($this->input->post())
      {
        $this->positionapplicationmodel->updateStatusAndNotes($positionId, $applicantId);
      }
      else
      {
        show_error('Request type is not allowed.');
      }
    }
  	public final function delete($id)
    {
      $this->positionapplicationmodel->delete($id);
      redirect(site_url('positionapplication'));
    }
    public final function withdraw($id)
    {
      $this->positionapplicationmodel->withdraw($id);
      redirect(site_url('positionapplication'));
    }
  }