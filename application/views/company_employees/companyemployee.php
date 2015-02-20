<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class CompanyEmployee extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
    $this->load->model('companyemployeemodel');
	}
  public final function index()
  {
    $o = $this->companyemployeemodel->index()->result();
    showView('company_employees/index', array('companyEmployees' => $o));
  }
  public final function create()
  {
    if($this->input->post())
    {
      if($this->form_validation->run())
      {
        $o = $this->companyemployeemodel->create()->row();
        if($o->id)
        {
          redirect(site_url('company_employee/read/' . $o->id));
        }
        else
        {
          show_error('Error creating company_employee.');
        }
      }
      else
      {
        showView('company_employees/create');
      }
    }
    else
    {
      showView('company_employees/create');
    }
  }
	public final function read($id)
	{
		showView('company_employees/read', array('companyEmployee' => $this->companyemployeemodel->read($id)->row()));
	}
	public final function update($id = null)
  {
    $o = $this->companyemployeemodel->read($id)->row();
    $a = array('companyEmployee' => $o);
    if($this->input->post())
    {
      if($this->form_validation->run())
      {
        $b = $this->companyemployeemodel->update()->row();
        if($b)
        {
          redirect(site_url('company_employee/read/' . $o->id));
        }
        else
        {
          show_error('Error updating company_employee.');
        }
      }
      else
      {
        showView('company_employees/update', $a);
      }
    }
    else
    {
      showView('company_employees/update', $a);
    }
  }
	public final function delete($id)
  {
    showJsonView(array('companyEmployee' => $this->companyEmployee_model->delete($id)->row()));
  }
}