<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Company extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
    $this->load->model('companymodel');
	}
  public final function index()
  {
    $o = $this->companymodel->index()->result();
    showView('companies/index', array('companies' => $o));
  }
  public final function create()
  {
    if($this->input->post())
    {
      if($this->form_validation->run())
      {
        $o = $this->companymodel->create()->row();
        if($o->id)
        {
          redirect(site_url('company/read/' . $o->id));
        }
        else
        {
          show_error('Error creating company.');
        }
      }
      else
      {
        showView('companies/create');
      }
    }
    else
    {
      showView('companies/create');
    }
  }
	public final function read($id)
	{
		showView('companies/read', array('company' => $this->companymodel->read($id)->row()));
	}
	public final function update($id = null)
  {
    $o = $this->companymodel->read($id)->row();
    $a = array('company' => $o);
    if($this->input->post())
    {
      if($this->form_validation->run())
      {
        $b = $this->companymodel->update()->row();
        if($b)
        {
          redirect(site_url('company/read/' . $o->id));
        }
        else
        {
          show_error('Error updating company.');
        }
      }
      else
      {
        showView('companies/update', $a);
      }
    }
    else
    {
      showView('companies/update', $a);
    }
  }
	public final function delete($id)
  {
    showJsonView(array('company' => $this->company_model->delete($id)->row()));
  }
}