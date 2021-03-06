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
  public final function forward()
  {
    $i = $this->input;
    if($i->post())
    {
      $this->load->model('resumemodel');
      $conf = $this->config->item('email');
      $u = getLoggedUser();
      $rId = $this->resumemodel->read($i->post('id'))->row()->id;
      $a = array
      (
        'complete_name' => $u->full_name,
        'resume_url' => site_url('resume/read/'. $rId)
      );
      sendEmailer
      (
        'Simplifie Haystack Resume',
        'haystackadmin@localhost' /*$conf['admin']*/,
        $i->post('recipients'),
        $this->parser->parse
        (
          'resumes/emailer', $a, true
        )
      );
    }
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
  public final function setPublic($id, $state)
  {
    $b = $this->resumemodel->setPublic($id, $state);
    if($b)
    {
      showJsonView(array('success' => true));
    }
    else
    {
      showJsonView(array('success' => false));
    }
  }
  public final function request($userId = null)
  {
    if($this->input->post())
    {
      $uId = $this->input->post('user_id');
      if($this->form_validation->run('resume/request'))
      {
        $this->resumemodel->request();
        redirect(site_url('resume/readByUserId/' . $uId));
      }
      else
      {
        $this->form_validation->set_error_delimiters('<div data-alert class="alert-box alert">', '</div>');
        $this->readByUserId($uId);
      }
    }
    else
    {
      $this->load->model('applicantmodel');
      $applId = $this->applicantmodel->readByUserId($userId)->row()->id;
      $a = array('userId' => $userId, 'applicantId' => $applId);
      showView('resumes/request', $a);
    }
  }
	public final function read($id)
	{
    $a = $this->resumemodel->readDetails($id);
    $uId = $a['resume']->user_id;
    $accessType = $a['resume']->access_type;
    $bViewable = true;
    if(isLoggedIn())
    {
      $r = getRoleName();
      if($r == 'Applicant')
      {
        //Check if owner during Preview purposes.
        if(getLoggedUser()->id != $uId)
        {
          $bViewable = false;
        }
      }
      else
      {
        $bViewable = false;
      }
    }
    else
    {
      $bViewable = false;
    }
    if(!$bViewable) 
      redirect(site_url('resume/readByUserId/' . $uId));
    showView('resumes/read', $a);
	}
  //Used when someone is viewing an Applicant's Profile and
  //requests to view his Public Resume.
  public final function readByUserId($userId)
  {
    $r = $this->resumemodel->readByUserId($userId);
    //print_r($r);exit;
    $r['userId'] = $userId;
    $this->load->model('applicantmodel');
    $applId = $this->applicantmodel->readByUserId($userId)->row()->id;
    $r['applicantId'] = $applId;
    //Check if there's a public resume.
    //print_r($r);exit;
    if(count($r))
    {
      showView('resumes/read', $r);
    }
    else
    {
      redirect(site_url('resume/request/' . $userId));
    }
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
  public final function downloadFile($applicantId)
  {
    $this->load->helper('export_helper');
    exportResume($applicantId);
  }
}