<?php 
  if(!defined('BASEPATH')) exit('No direct script access allowed');
  class Analytics extends CI_Controller 
  {
  	public function __construct()
  	{
  		parent::__construct();
      validateLoginSession();
      $this->load->model('analyticsmodel');
  	}
    public final function index()
    {
      $r = getRoleName();
      $a = array();
      $a['emailers'] = $this->analyticsmodel->readEmailers();
      switch($r)
      {
        case 'Employer':
          $this->load->model('positionmodel');
          $a['view'] = 'employer';
          $pos = $this->positionmodel->index()->result();
          $aPos = array();
          //Use ID instead of name to 
          //avoid name collissions.
          foreach($pos as $p)
          {
            $aPos[$p->id . ''] = $p->name;
          }
          $a['positions'] = $aPos;
        break;
        case 'Faculty':
          $a['view'] = 'faculty';
          $this->load->model('resumemodel');
          //
        break;
      }
      showView('analytics/index', $a);
    }
    private final function export($data, $filename = 'Haystack Report')
    {
      $this->load->helper('export_helepr');
    }
    public final function generate()
    {
      $i = $this->input;
      if($i->post())
      {
        $this->load->model('employermodel');
        $this->load->model('applicantmodel');
        $this->load->model('facultymodel');
        $this->load->model('analyticsmodel');
        //
        $uId = $i->post('user_id');
        $filter = $i->post('filter');
        $from = $i->post('from'); 
        $to = $i->post('to');
        $bUnique = $i->post('is_unique') == 'on';
        //Check what type of user.
        $bIsEmpl = $this->employermodel->readByUserId($uId)->num_rows() > 0;
        $bIsFaculty = $this->facultymodel->readByUserId($uId)->num_rows() > 0;
        //
        $chartType = '';
        $data = array();
        if($bIsEmpl)
        {
          $chartType = 'Line';
          //TODO: Incl Effectiveness.
          switch($filter)
          {
            case 'Views':
              $this->analyticsmodel->readInternshipImpressions();
            break;
            case 'Geographic':
              $this->analyticsmodel->readInternshipImpressions(true);
            break;
          }
        } 
        else if($bIsFaculty)
        {
          //TODO: Get all courses under this org.
          switch($filter)
          {
            case 'Effectiveness By All Courses':
              $chartType = 'Column';
              $this->analyticsmodel->readAllCourseEffectivity();
              //TODO: Loop.
              //TODO: Displ both Hired and Not Hired data.
              //TODO: Choose color for each loop.
            break;
            case 'Effectiveness By Specific Course':
              $chartType = 'Stack';
              $this->analyticsmodel->readSpecificCourseEffectivity();
              //TODO: Loop.
              //TODO: Displ both Hired and Not Hired data.
              //TODO: Choose color for each loop.
            break;
          }
        }
        $a = array
        (
          'status' => 'success',
          'chartType' => $chartType,
          'data' => $data
        );
        showJsonView($a);
      }
      else
      {
        showJsonView(array('status' => 'failed'));
      } 
    }
    private final function getIsValidEmailer()
    {
      return true;
    }
    public final function createEmailer()
    {
      if($this->input->post())
      {
        //TODO: Create CRON Job.
        if($this->getIsValidEmailer())
        {
          $a = array();
          showJsonView
          (
            array
            (
              'status' => 'success', 
              'data' => $a
            )
          );
        }
        else
        {
          $err = '';
          showJsonView
          (
            array
            (
              'status' => 'failed', 
              'error' => $err
            )
          );   
        }
      }
      else
      {
        showJsonView(array('status' => 'failed'));
      }
    }
    public final function deleteEmailer($id)
    {
      
    }
  }