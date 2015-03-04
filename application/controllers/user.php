<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
    validateLoginSession
    (
      array('update', 'delete')
    );
    $this->load->model('usermodel');
	}
  public final function index()
  {
    $o = $this->usermodel->index()->result();
    showView('users/index', array('users' => $o));
  }
  public final function create()
  {
    if($this->input->post())
    {
      if($this->form_validation->run())
      {
        $o = $this->usermodel->create()->row();
        if($o->id)
        {
          redirect(site_url('user/read/' . $o->id));
        }
        else
        {
          show_error('Error creating user.');
        }
      }
      else
      {
        showView('users/create');
      }
    }
    else
    {
      showView('users/create');
    }
  }
	public final function read($id)
	{
		showView('users/read', array('user' => $this->usermodel->read($id)->row()));
	}
	public final function update($id = null)
  {
    $o = $this->usermodel->read($id)->row();
    $id = getLoggedUser()->id;
    switch(getRoleName())
    {
      case 'Employer':
        $this->load->model('employermodel');
        $id = $this->employermodel->readByUserId($id)->row()->id;
      break;
      case 'Applicant':
        $this->load->model('applicantmodel');
        $id = $this->applicantmodel->readByUserId($id)->row()->id;
      break;
    }
    //
    $a = array
    (
      'user' => $o,
      'id' => $id
    );
    if($this->input->post())
    {
      //if($this->form_validation->run('user/update')){
        $o = $this->usermodel->update()->row();
        if($o->id > 0)
        {
          $this->session->set_flashdata('update', 'success');
          redirect(site_url('user/update/' . $o->id));
        }
        else
        {
          show_error('Error updating user.');
        }
      /*}
      else
      {
        showView('users/update', $a);
      }*/
    }
    else
    {
      showView('users/update', $a);
    }
  }
	public final function delete($id)
  {
    showJsonView(array('user' => $this->user_model->delete($id)->row()));
  }
}