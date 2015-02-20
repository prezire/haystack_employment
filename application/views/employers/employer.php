<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Employer extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
    $this->load->model('employermodel');
	}
  public final function index()
  {
    $o = $this->employermodel->index()->result();
    showView('employers/index', array('employers' => $o));
  }
  public final function create()
  {
    if($this->input->post())
    {
      if($this->form_validation->run())
      {
        $o = $this->employermodel->create()->row();
        if($o->id)
        {
          redirect(site_url('employer/read/' . $o->id));
        }
        else
        {
          show_error('Error creating employer.');
        }
      }
      else
      {
        showView('employers/create');
      }
    }
    else
    {
      showView('employers/create');
    }
  }
	public final function read($id)
	{
		showView('employers/read', array('employer' => $this->employermodel->read($id)->row()));
	}
	public final function update($id = null)
  {
    $o = $this->employermodel->read($id)->row();
    $a = array('employer' => $o);
    if($this->input->post())
    {
      if($this->form_validation->run())
      {
        $b = $this->employermodel->update()->row();
        if($b)
        {
          redirect(site_url('employer/read/' . $o->id));
        }
        else
        {
          show_error('Error updating employer.');
        }
      }
      else
      {
        showView('employers/update', $a);
      }
    }
    else
    {
      showView('employers/update', $a);
    }
  }
	public final function delete($id)
  {
    showJsonView(array('employer' => $this->employer_model->delete($id)->row()));
  }
}