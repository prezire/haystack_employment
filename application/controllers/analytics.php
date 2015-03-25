<?php
if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );
class Analytics extends CI_Controller
{
  public function __construct() {
    parent::__construct();
    validateLoginSession();
    $this->load->model( 'analyticsmodel' );
    $this->load->helper('analytics_helper');
  }
  public final function index() {
    $a = array();
    //
    $uId = getLoggedUser()->id;
    $this->load->model( 'organizationmodel' );
    $r = getRoleName();
    $a['savedReports'] = $this->analyticsmodel->readSavedReportsByRoleName( $uId, $r )->result();
    switch ( $r ) {
    case 'Employer':
      $this->load->model( 'positionmodel' );
      $this->load->model( 'employermodel' );
      $emplId = $this->employermodel->readByUserId( $uId )->row()->id;
      $orgId = $this->organizationmodel->readByEmployerId( $emplId )->row()->organization_id;
      $a['organizationId'] = $orgId;
      //
      $a['view'] = 'employer';
      $pos = $this->positionmodel->index()->result();
      $aPos = array();
      //Use ID instead of name to
      //avoid name collissions.
      foreach ( $pos as $p ) {
        $aPos[$p->id . ''] = $p->name;
      }
      $a['positions'] = $aPos;
      break;
    case 'Faculty':
      $this->load->model( 'resumemodel' );
      $this->load->model( 'facultymodel' );
      $facId = $this->facultymodel->readByUserId( $uId )->row()->id;
      $orgId = $this->organizationmodel->readByFacultyId( $facId )->row()->organization_id;
      $a['organizationId'] = $orgId;
      $a['view'] = 'faculty';
      break;
    }
    showView( 'analytics/index', $a );
  }
  private final function export( $data, $filename = 'Haystack Report' ) {
    $this->load->helper( 'export_helepr' );
  }
  //TODO: Make to GET request in order to generate saved reports.
  public final function generate() {
    $i = $this->input;
    if ( $i->post() ) {
      $this->load->model( 'applicantmodel' );
      $this->load->model( 'employermodel' );
      $this->load->model( 'applicantmodel' );
      $this->load->model( 'facultymodel' );
      //TODO Change $user_id to $organization_id from the view hidden field.
      $uId = $i->post( 'user_id' );
      $reportType = $i->post('report_type');
      $targetAudience = $i->post( 'target_audience' );
      $from = $i->post( 'from' );
      $to = $i->post( 'to' );
      $metric = $i->post('metric');
      //Check what type of user. Useful for saved reports wherein
      //no user is needed for the login session.
      $bIsEmpl = $this->employermodel->readByUserId( $uId )->num_rows() > 0;
      $bIsFaculty = $this->facultymodel->readByUserId( $uId )->num_rows() > 0;
      //
      $bGeographic = $targetAudience == 'Geographic';
      //
      $data = array();
      if ( $bIsEmpl ) {
        switch($reportType)
        {
          case 'Delivery':
            $data = $this->analyticsmodel->readDelivery($metric, $bGeographic);
          break;
          case 'Unique':
            $data = $this->analyticsmodel->readUnique($metric, $bGeographic);
          break;
          case 'Engagement':
            $data = $this->analyticsmodel->readEngagement($metric, $bGeographic);
          break;
          case 'Frequency Performance':
            $data = $this->analyticsmodel->readFrequencyPerformance($metric, $bGeographic);
          break;
        }
      }
      else if ( $bIsFaculty ) {
          //TODO: Get all courses under this org.
          switch ( $series ) {
          case 'Effectiveness By All Courses':
            $graphType = 'Column';
            $this->analyticsmodel->readAllCourseEffectivity();
            //TODO: Loop.
            //TODO: Displ both Hired and Not Hired data.
            //TODO: Choose color for each loop.
            break;
          case 'Effectiveness By Specific Course':
            $graphType = 'Stack';
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
        'data' => $data
      );
      showJsonView( $a );
    }
    else {
      showJsonView( array( 'status' => 'failed' ) );
    }
  }
  private final function getIsValidEmailer() {
    return true;
  }
  public final function createEmailer() {
    if ( $this->input->post() ) {
      if ( $this->form_validation->run( 'analytics/emailer' ) ) {
        $s = $this->analyticsmodel->createEmailer()->row();
        $this->load->library('parser');
        $a = array
        (
          'id' => $s->id,
          'title' => $s->title,
          'sendToEmails' => $s->send_to_emails,
          'frequency' => $s->frequency,
          'dateFrom' => $s->date_from,
          'dateTo' => $s->date_to,
          'reportType' => $s->report_type,
          'metric' => $s->metric,
          'targetAudience' => $s->target_audience,
          'recipients' => $s->recipients
        );
        $view = $this->parser->parse
        (
          'commons/partials/analytics/saved_report', 
          $a, 
          true
        );
        showJsonView
        (
          array
          (
            'status' => 'success',
            'view' => $view
          )
        );
      }
      else {
        showJsonView
        (
          array
          (
            'status' => 'failed',
            'error' => validation_errors()
          )
        );
      }
    }
    else {
      showJsonView( array( 'status' => 'failed' ) );
    }
  }
  public final function deleteEmailer( $id ) {
    $this->analyticsmodel->deleteEmailer( $id );
  }
  //Cron Job.
  public final function sendEmailers()
  {
    if($this->input->is_cli_request())
    {
      $reports = $this->analyticsmodel->readSendableReports()->result();
      //Send request to JS, export PNG, 
      //get file and send to email as attachment.
      $this->load->library('parser');
      $conf = $this->config->item('email');
      foreach ($reports as $r) 
      {
        $img = APPATH . 'public/uploads/' . $r->file_path;
        $a = array
        (
          'title' => $r->title,
          'reportType' => $r->report_type,
          'reportDates' => toHumanReadableDate($r->date_from) . 
                          ' - ' . 
                          toHumanReadableDate($r->date_to),
          'metric' => $r->metric,
          'targetAudience' => $r->target_audience
        );
        sendEmailer
        (
          'Simplifie Haystack Saved Report' . $r->title,
          $conf['admin'],
          $r->recipients,
          $this->parser->parse('commons/emailers/analytics', $a, true),
          null,
          null,
          array($img)
        );
      }
    }
  }

  //

  public final function readMetrices($reportType)
  {
    $a = getAnalyticsFieldMetrices(getRoleName(), $reportType);
    showJsonView(array('metrices' => $a));
  }
  //curl http://localhost/haystack_employment/index.php/analytics/readDelivery/7/impressions/2015-03-08%2016:56:00/2015-03-12%2016:24:34
  /*public final function readDelivery(
    $employerId,
    $metric,
    $dateFrom,
    $dateTo
  ) {
    $i = $this->analyticsmodel->readDelivery
    (
      $employerId,
      $metric,
      $dateFrom,
      $dateTo
    );
    showJsonView( array( $metric => $i ) );
  }*/
}