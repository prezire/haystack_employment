<?php
  if ( !defined( 'BASEPATH' ) )
    exit( 'No direct script access allowed' );
  class Main extends CI_Controller
  {
    public function __construct() {parent::__construct();}
    public final function index() {
      $this->load->model( 'applicantmodel' );
      $this->load->model( 'internshipmodel' );
      $appls = $this->applicantmodel->index()->result();
      $applsSummary = $this->applicantmodel->readGroupedSummary()->result();
      $internsSummary = $this->internshipmodel->readGroupedSummary()->result();
      $groupedSummary = array
      (
        'applicants' => $applsSummary,
        'internships' => $internsSummary
      );
      $a = array
      (
        'applicants' => $appls,
        'groupedSummary' => $groupedSummary
      );
      showView( 'home', $a );
    }
    public final function about() {showView( 'about' );}
    public final function contact() {
      if ( $this->input->post() ) {
        if ( $this->form_validation->run( 'contact' ) ) {
          $i = $this->input;
          $this->config->load( 'custom_configs' );
          $c = $this->config->item( 'email' );
          //
          $msg = $this->parser->parse
          (
            'auth/emailers/contact_us',
            array
            (
              'topic' => $i->post( 'topic' ),
              'email' => $i->post( 'email' ),
              'full_name' => $i->post( 'full_name' ),
              'message' => nl2br( $i->post( 'message' ) )
            ),
            true
          );
          sendEmailer
          (
            'Simplifie Haystack - Contact Us',
            $c['admin'], //Send to self.
            $c['admin'],
            $msg
          );
          //
          $this->session->set_flashdata( 'status', 'Your message was sent. We\'ll get back to you shortly.' );
          redirect( site_url( 'main/about' ) );
        }
        else {
          showView( 'about' );
        }
      }
    }
    public final function toc() {showView( 'toc' );}
    public final function eula() {showView( 'eula' );}
    public final function faq() {showView( 'faq' );}
    //curl -r 'keywords=information' http://localhost/haystack/index.php/main/search
    public final function search() {
      if ( $this->input->post() ) {
        $this->load->model( 'mainmodel' );
        $o = $this->mainmodel->search()->result();
        $a = array( 'results' => $o );
        showView( 'search_results', $a );
      }
      else {
        echo 'hello';
      }
    }
  }
