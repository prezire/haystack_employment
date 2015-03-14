<?php 
  if(!defined('BASEPATH')) exit('No direct script access allowed');
  class PooledApplicant extends CI_Controller 
  {
  	public function __construct()
  	{
  		parent::__construct();
      validateLoginSession
      (
        array('index', 'create', 'read', 'update', 'delete')
      );
      $this->load->model('pooledapplicantmodel');
  	}
    public final function index()
    {
      $o = $this->pooledapplicantmodel->index()->result();
      showView('pooled_applicants/index', array('pooledApplicants' => $o));
    }
    public final function create()
    {
      if($this->input->post())
      {
        $o = $this->pooledapplicantmodel->create();
        if($o->num_rows() > 0)
        {
          showJsonView(array('status' => 'success'));
        }
        else
        {
          showJsonView
          (
            array
            (
              'status' => 'failed', 
              'message' => 'Error creating pooled applicant.'
            )
          );
        }
      }
      else
      {
        showView('pooled_applicants/create');
      }
    }
  	public final function read($id)
  	{
  		showView('pooled_applicants/read', array('pooledApplicant' => $this->pooledapplicantmodel->read($id)->row()));
  	}
  	public final function update($positionId, $applicantId)
    {
      if($this->input->post())
      {
        $b = $this->pooledapplicantmodel->update($positionId, $applicantId);
        if($b)
        {
          showJsonView(array('status' => 'success'));
        }
        else
        {
          showJsonView
          (
            array
            (
              'status' => 'failed', 
              'message' => 'Error updating pooled applicant.'
            )
          );
        }
      }
      else
      {
        redirect(site_url('position/readMyPosts'));
      }
    }
  	public final function delete($id)
    {
      $this->pooledApplicant_model->delete($id)->row();
      showJsonView(array('success' => true, 'id' => $id));
    }
  }