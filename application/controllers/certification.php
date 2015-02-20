<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Certification extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
    validateLoginSession
    (
      array('create', 'read', 'update', 'delete')
    );
    $this->load->model('certificationmodel');
	}
  public final function index()
  {
    $o = $this->certificationmodel->index()->result();
    showView('certifications/index', array('certifications' => $o));
  }
  public final function create()
  {
    if($this->input->post())
    {
      if($this->form_validation->run())
      {
        $o = $this->certificationmodel->create()->row();
        if($o->id)
        {
          redirect(site_url('certification/read/' . $o->id));
        }
        else
        {
          show_error('Error creating certification.');
        }
      }
      else
      {
        showView('certifications/create');
      }
    }
    else
    {
      showView('certifications/create');
    }
  }
	public final function read($id)
	{
		showView('certifications/read', array('certification' => $this->certificationmodel->read($id)->row()));
	}
	public final function update()
  {
    if($this->input->post())
    {
      //Validation not needed.
      $this->certificationmodel->update();
      showJsonView(array('success' => true));
    }
  }
	public final function delete($id)
  {
    showJsonView(array('certification' => $this->certification_model->delete($id)->row()));
  }
}