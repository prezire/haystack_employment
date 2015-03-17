<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Employer extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
    validateLoginSession
    (
      array('update', 'delete')
    );
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
      if($this->form_validation->run('employer/create'))
      {
        $o = $this->employermodel->create()->row();
        if($o->id)
        {
          $conf = $this->config->item('email');
          $a = array
          (
            'full_name' => $o->full_name,
            'site_url' => site_url(),
            'activation_url' => site_url('auth/enable/1/' . $o->enable_token)
          );
          //
          sendEmailer
          (
            'Simplifie Haystack - Verify Account',
            $conf['admin'],
            /*'haystackuser@localhost' */$o->email,
            $this->parser->parse
            (
              'commons/emailers/auth/account_activation', 
              $a, 
              true
            )
          );
          redirect(site_url('auth/registerSuccess'));
        }
        else
        {
          showView
          (
            'employers/create', 
            array
            (
              'status' => 'failed', 
              'message' => 'Error creating member.'
            )
          );       
        }
      } 
      else 
      {
        $this->form_validation->set_error_delimiters('<div data-alert class="alert-box alert">', '</div>');
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
      if($this->form_validation->run('employer/update'))
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