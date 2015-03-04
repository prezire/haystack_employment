<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Resume extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
    validateLoginSession
    (
      array
      (
        'index',
        'create', 
        'updateBySession', 
        'update', 
        'delete'
      )
    );
    $this->load->model('resumemodel');
    $this->load->helper('job_helper');
	}
  public final function index()
  {
    $o = $this->resumemodel->index()->result();
    $a = array('resumes' => $o);
    showView('resumes/index', $a);
  }
  //@param  $recipients   Comma-separated string.
  public final function forward($recipients)
  {
    $u = getLoggedUser();
    $this->load->model('resumemodel');
    $rId = $this->resumemodel->readByUserId($u->id)->row()->id;
    $a = array
    (
      'complete_name' => $u->complete_name,
      'resume_url' => site_url('resume/read/'. $rId)
    );
    sendEmailer
    (
      'Simplifie Haystack Resume',
      $u->email,
      $recipients,
      $this->parser->parse
      (
        'resumes/emailer', $a, true
      )
    );
  }
  public final function create()
  {
    if($this->input->post())
    {
      if($this->form_validation->run())
      {
        $o = $this->resumemodel->create()->row();
        if($o->id)
        {
          redirect(site_url('resume/read/' . $o->id));
        }
        else
        {
          show_error('Error creating resume.');
        }
      }
      else
      {
        showView('resumes/create');
      }
    }
    else
    {
      showView('resumes/create');
    }
  }
	public final function read($id)
	{
    $a = $this->resumemodel->readDetails($id);
		showView('resumes/read', $a);
	}
  public final function readByUserId($userId)
  {
    $this->load->model('applicantmodel');
    $applId = $this->applicantmodel->readByUserId($userId)->row()->id;
    $rId = $this->db->get_where
    (
      'resumes', 
      array('applicant_id' => $applId)
    )->row()->id;
    redirect(site_url('resume/read/' . $rId));
  }
	public final function update($id = null)
  {
    if($this->input->post())
    {
        $this->resumemodel->update();
        showJsonView(array('success' => true));
    }
    else
    {
      $uId = getLoggedUser()->id;
      $this->load->model('applicantmodel');
      $applId = $this->applicantmodel->readByUserId($uId)->row()->id;
      $a = $this->resumemodel->readByIdAndApplicantId($id, $applId);
      showView('resumes/update', $a);
    }
  }
	public final function delete($id)
  {
    showJsonView(array('resume' => $this->resume_model->delete($id)->row()));
  }
}