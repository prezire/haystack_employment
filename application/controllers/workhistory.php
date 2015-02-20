<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class WorkHistory extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
    validateLoginSession
    (
      array('create', 'read', 'update', 'delete')
    );
    $this->load->model('workhistorymodel');
	}
  public final function index()
  {
    $o = $this->workhistorymodel->index()->result();
    showView('work_histories/index', array('workHistories' => $o));
  }
  public final function create()
  {
    if($this->input->post())
    {
      if($this->form_validation->run())
      {
        $o = $this->workhistorymodel->create()->row();
        if($o->id)
        {
          redirect(site_url('work_history/read/' . $o->id));
        }
        else
        {
          show_error('Error creating work_history.');
        }
      }
      else
      {
        showView('work_histories/create');
      }
    }
    else
    {
      showView('work_histories/create');
    }
  }
	public final function read($id)
	{
		showView('work_histories/read', array('workHistory' => $this->workhistorymodel->read($id)->row()));
	}
	public final function update()
  {
    if($this->input->post())
    {
      if($this->form_validation->run('workhistory/update'))
      {
        $this->workhistorymodel->update();
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
    showJsonView(array('workHistory' => $this->workHistory_model->delete($id)->row()));
  }
}