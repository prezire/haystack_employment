<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Member extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
    validateLoginSession();
    $this->load->model('membermodel');
	}
  public final function index()
  {
    $o = $this->membermodel->index()->result();
    showView('members/index', array('members' => $o));
  }
  public final function create()
  {
    if($this->input->post())
    {
      if($this->form_validation->run())
      {
        $o = $this->membermodel->create()->row();
        if($o->id)
        {
          redirect(site_url('member/read/' . $o->id));
        }
        else
        {
          show_error('Error creating member.');
        }
      }
      else
      {
        showView('members/create');
      }
    }
    else
    {
      showView('members/create');
    }
  }
	public final function read($id)
	{
		showView('members/read', array('member' => $this->membermodel->read($id)->row()));
	}
	public final function update($id = null)
  {
    $o = $this->membermodel->read($id)->row();
    $a = array('member' => $o);
    if($this->input->post())
    {
      if($this->form_validation->run())
      {
        $b = $this->membermodel->update()->row();
        if($b)
        {
          redirect(site_url('member/read/' . $o->id));
        }
        else
        {
          show_error('Error updating member.');
        }
      }
      else
      {
        showView('members/update', $a);
      }
    }
    else
    {
      showView('members/update', $a);
    }
  }
	public final function delete($id)
  {
    showJsonView(array('member' => $this->member_model->delete($id)->row()));
  }
}