<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Link extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
    validateLoginSession
    (
      array('create', 'read', 'update', 'delete')
    );
    $this->load->model('linkmodel');
	}
  public final function index()
  {
    $o = $this->linkmodel->index()->result();
    showView('links/index', array('links' => $o));
  }
  public final function create()
  {
    if($this->input->post())
    {
      if($this->form_validation->run())
      {
        $o = $this->linkmodel->create()->row();
        if($o->id)
        {
          redirect(site_url('link/read/' . $o->id));
        }
        else
        {
          show_error('Error creating link.');
        }
      }
      else
      {
        showView('links/create');
      }
    }
    else
    {
      showView('links/create');
    }
  }
	public final function read($id)
	{
		showView('links/read', array('link' => $this->linkmodel->read($id)->row()));
	}
	public final function update($id = null)
  {
    $o = $this->linkmodel->read($id)->row();
    $a = array('link' => $o);
    if($this->input->post())
    {
      if($this->form_validation->run())
      {
        $b = $this->linkmodel->update()->row();
        if($b)
        {
          redirect(site_url('link/read/' . $o->id));
        }
        else
        {
          show_error('Error updating link.');
        }
      }
      else
      {
        showView('links/update', $a);
      }
    }
    else
    {
      showView('links/update', $a);
    }
  }
	public final function delete($id)
  {
    showJsonView(array('link' => $this->link_model->delete($id)->row()));
  }
}