<?php 
  if(!defined('BASEPATH')) exit('No direct script access allowed');
  class Member extends CI_Controller 
  {
  	public function __construct()
  	{
  		parent::__construct();
      validateLoginSession();
      $this->load->model('membermodel');
  	}
    protected function index(){/*Do nothing.*/}
    public final function create()
    {
      $i = $this->input;
      if($i->post())
      {
        if($this->form_validation->run('member/create'))
        {
          $o = $this->membermodel->create();
          if($o->num_rows() > 0)
          {
            $o = $o->row();
            //No need to verify thru email.
            $r = getRoleName();
            if($r == 'Employer')
            {
              redirect(site_url('companymember'));
            }
            else
            {
              redirect(site_url('facultymember'));
            }
          }
          else
          {
            showView
            (
              'members/create', 
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
          showView('members/create');
        }
      }
      else
      {
        showView('members/create');
      }
    }
  	/*public final function read($id)
  	{
  		showView('members/read', array('member' => $this->membermodel->read($id)->row()));
  	}*/
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
      $this->membermodel->delete($id);
      $r = getRoleName();
      if($r == 'Employer')
      {
        redirect(site_url('companymember'));
      }
      else
      {
        redirect(site_url('facultymember'));
      }
    }
    public final function setEnabled($id, $state)
    {
      $this->membermodel->setEnabled($id, $state);
    }
  }