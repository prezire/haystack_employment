<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Position extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
    $this->load->model('positionmodel');
	}
  public final function index()
  {
    $o = $this->positionmodel->index()->result();
    showView('positions/index', array('positions' => $o));
  }
  public final function create()
  {
    if($this->input->post())
    {
      if($this->form_validation->run())
      {
        $o = $this->positionmodel->create()->row();
        if($o->id)
        {
          redirect(site_url('position/read/' . $o->id));
        }
        else
        {
          show_error('Error creating position.');
        }
      }
      else
      {
        showView('positions/create');
      }
    }
    else
    {
      showView('positions/create');
    }
  }
	public final function read($id)
	{
		showView('positions/read', array('position' => $this->positionmodel->read($id)->row()));
	}
	public final function update($id = null)
  {
    $o = $this->positionmodel->read($id)->row();
    $a = array('position' => $o);
    if($this->input->post())
    {
      if($this->form_validation->run())
      {
        $b = $this->positionmodel->update()->row();
        if($b)
        {
          redirect(site_url('position/read/' . $o->id));
        }
        else
        {
          show_error('Error updating position.');
        }
      }
      else
      {
        showView('positions/update', $a);
      }
    }
    else
    {
      showView('positions/update', $a);
    }
  }
	public final function delete($id)
  {
    showJsonView(array('position' => $this->position_model->delete($id)->row()));
  }
}