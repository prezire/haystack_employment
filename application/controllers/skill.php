<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Skill extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
    validateLoginSession
    (
      array('create', 'read', 'update', 'delete')
    );
    $this->load->model('skillmodel');
	}
  public final function index()
  {
    $o = $this->skillmodel->index()->result();
    showView('skills/index', array('skills' => $o));
  }
  public final function create()
  {
    if($this->input->post())
    {
      if($this->form_validation->run())
      {
        $o = $this->skillmodel->create()->row();
        if($o->id)
        {
          redirect(site_url('skill/read/' . $o->id));
        }
        else
        {
          show_error('Error creating skill.');
        }
      }
      else
      {
        showView('skills/create');
      }
    }
    else
    {
      showView('skills/create');
    }
  }
	public final function read($id)
	{
		showView('skills/read', array('skill' => $this->skillmodel->read($id)->row()));
	}
	public final function update()
  {
    if($this->input->post())
    {
      //Validation not needed.
      $this->skillmodel->update();
      showJsonView(array('success' => true));
    }
  }
	public final function delete($id)
  {
    showJsonView(array('skill' => $this->skill_model->delete($id)->row()));
  }
}