<?php
if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );
class Blog extends CI_Controller
{
  public function __construct() {
    parent::__construct();
    $this->load->model( 'blogmodel' );
  }
  public final function index() {
    $o = $this->blogmodel->index()->result();
    showView( 'blogs/index', array( 'blogs' => $o ) );
  }
  public final function create() {
    if ( $this->input->post() ) {
      //if($this->form_validation->run('blog/create')){
      $o = $this->blogmodel->create()->row();
      if ( $o->id ) {
        redirect( site_url( 'blog/update/' . $o->id ) );
      }
      else {
        show_error( 'Error creating blog.' );
      }
      /*}
          else
          {
            showView('blogs/create');
          }*/
    }
    else {
      showView( 'blogs/create' );
    }
  }
  public final function read( $id ) {
    showView( 'blogs/read', array( 'blog' => $this->blogmodel->read( $id )->row() ) );
  }
  public final function readBySlug( $slug ) {
    showView( 'blogs/read', array( 'blog' => $this->blogmodel->readBySlug( $slug )->row() ) );
  }
  public final function update( $id = null ) {
    $o = $this->blogmodel->read( $id )->row();
    $a = array( 'blog' => $o );
    if ( $this->input->post() ) {
      //if($this->form_validation->run('blog/update')){
      $b = $this->blogmodel->update()->row();
      if ( $b ) {
        $this->session->set_flashdata( 'update', 'success' );
        redirect( site_url( 'blog/update/' . $b->id ) );
      }
      else {
        $a = array('status' => 'failed', 'message' => 'Error updating blog.');
        showView( 'blogs/update', $a );
      }
      /*}
          else
          {
            showView('blogs/update', $a);
          }*/
    }
    else {
      showView( 'blogs/update', $a );
    }
  }
  public final function delete( $id ) {
    $this->blogmodel->delete( $id );
    redirect(site_url('blog'));
  }
}
