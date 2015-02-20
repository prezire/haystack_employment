<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class AdditionalInformation extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
    $this->load->model('additionalinformationmodel');
	}
  public final function index()
  {
    $o = $this->additionalinformationmodel->index()->result();
    showView('additional_informations/index', array('additionalInformations' => $o));
  }
  public final function create()
  {
    if($this->input->post())
    {
      if($this->form_validation->run())
      {
        $o = $this->additionalinformationmodel->create()->row();
        if($o->id)
        {
          redirect(site_url('additional_information/read/' . $o->id));
        }
        else
        {
          show_error('Error creating additional_information.');
        }
      }
      else
      {
        showView('additional_informations/create');
      }
    }
    else
    {
      showView('additional_informations/create');
    }
  }
	public final function read($id)
	{
		showView('additional_informations/read', array('additionalInformation' => $this->additionalinformationmodel->read($id)->row()));
	}
	public final function update()
  {
    $o = $this->additionalinformationmodel->read($id)->row();
    $a = array('additionalInformation' => $o);
    if($this->input->post())
    {
      if($this->form_validation->run('additionalinformation/update'))
      {
        $this->additionalinformationmodel->update();
        showJsonView(array('success' => true));
      }
      else
      {
        showJsonView(array('success' => false, 'message' => validation_errors()));
      }
    }
  }
	public final function delete($id)
  {
    showJsonView(array('additionalInformation' => $this->additionalInformation_model->delete($id)->row()));
  }
}