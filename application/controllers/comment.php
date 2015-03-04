<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Comment extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
    validateLoginSession
    (
      array
      (
        'create',
        'createForProfile',
        'update', 
        'updateApproved',
        'delete'
      )
    );
    $this->load->model('commentmodel');
	}
  public final function index()
  {
    $r = getRoleName();
    $uId = getLoggedUser()->id;
    switch($r)
    {
      case 'Applicant':
        $o = $this->commentmodel->readByUserId($uId)->result();
      break;
      case 'Employer':
      case 'Subscriber':
        $o = $this->commentmodel->readByUserId($uId, 'from')->result();
      break;
    }
    showView('comments/index', array('comments' => $o));
  }
  public final function create()
  {
    if($this->input->post())
    {
      if($this->form_validation->run('comment/create'))
      {
        $o = $this->commentmodel->create()->row();
        if($o->id)
        {
          redirect(site_url('comment/read/' . $o->id));
        }
        else
        {
          show_error('Error creating comment.');
        }
      }
      else
      {
        showView('comments/create');
      }
    }
    else
    {
      showView('comments/create');
    }
  }
  public final function createForProfile()
  {
    if($this->input->post())
    {
      if($this->form_validation->run('comment/create'))
      {
        $o = $this->commentmodel->createForProfile();
        if($o->num_rows() > 0)
        {
          showJsonView
          (
            array
            (
              'success' => true,
              'view' => $this->load->view
              (
                'commons/partials/comments/listing', 
                array('comment' => $o->row()), 
                true
              )
            )
          );
        }
        else
        {
          show_error('Error creating comment.');
        }
      }
      else
      {
        //redirect(site_url('applicant/readByUserId/' . $uId . '#comments'));
        //showJsonView();
      }
    }
  }
	public final function read($id)
	{
		showView('comments/read', array('comment' => $this->commentmodel->read($id)->row()));
	}
  public final function updateApproved($id, $approved)
  {
    $this->commentmodel->updateApproved($id, $approved);
    showJsonView(array('status' => 'success'));
  }
	public final function update($id = null)
  {
    $o = $this->commentmodel->read($id)->row();
    $a = array('comment' => $o);
    if($this->input->post())
    {
      if($this->form_validation->run())
      {
        $b = $this->commentmodel->update()->row();
        if($b)
        {
          redirect(site_url('comment/read/' . $o->id));
        }
        else
        {
          show_error('Error updating comment.');
        }
      }
      else
      {
        showView('comments/update', $a);
      }
    }
    else
    {
      showView('comments/update', $a);
    }
  }
	public final function delete($id)
  {
    showJsonView(array('comment' => $this->comment_model->delete($id)->row()));
  }
}