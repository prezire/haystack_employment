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
  public final function archives()
  {
    $o = $this->positionmodel->archives()->result();
    showView('positions/archives', array('positions' => $o));
  }
  public final function create()
  {
    if($this->input->post())
    {
      if($this->form_validation->run())
      {
        $o = $this->positionmodel->create();
        if($o->num_rows() > 0)
        {
          $o = $o->row();
          redirect(site_url('position/update/' . $o->position_id));
        }
        else
        {
          show_error('Error creating position.');
        }
      }
      else
      {
        $this->form_validation->set_error_delimiters('<div data-alert class="alert-box alert">', '</div>');
        showView('positions/create');
      }
    }
    else
    {
      showView('positions/create');
    }
  }
  private final function hasExpired($position)
  {
    $this->load->helper('date');
    $p = $position;
    $dateTo = $p->date_to;
    $now = mdate('%Y-%m-%d');
    $bWithinDate = $now < $dateTo;
    $bEnabled = $p->enabled;
    $bArchived = $p->archived > 0;
    $bHasVacant = $p->vacancy_count > 0;
    $b = !$bEnabled || $bArchived || !$bWithinDate || !$bHasVacant;
    return $b;
  }
	public final function read($id)
	{
    $p = $this->positionmodel->read($id)->row();
    if($this->hasExpired($p))
    {
      redirect(site_url('position/expired/' . $p->employer_id));
    }
    else
    {
  		showView('positions/read', array('position' => $p));
    }
	}
  public final function readByIndustry($industry)
  {
    $industry = urldecode($industry);
    $industry = str_replace('haystackescapedslash', '/', $industry);
    $positions = $this->positionmodel->readByIndustry($industry)->result();
    $a = array('positions' => $positions);
    showView('positions/industry_listing', $a);
  }
  public final function readMyPosts()
  {
    $positions = $this->positionmodel->readMyPosts();
    showView('positions/employer_post_listing', array('positions' => $positions));
  }
  public final function readByEmployerId($employerId)
  {
    $i = $this->positionmodel->readByEmployerId($employerId)->result();
    showView('positions/index', array('positions' => $i));
  }
	public final function update($id = null)
  {
    $o = $this->positionmodel->read($id)->row();
    $a = array('position' => $o);
    if($this->input->post())
    {
      if($this->form_validation->run())
      {
        $this->positionmodel->update();
        redirect(site_url('position/update/' . $this->input->post('id')));
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
    $this->positionmodel->delete($id);
    redirect(site_url('position'));
  }
  public final function archive($id, $state = true)
  {
    $this->positionmodel->archive($id, $state);
    redirect(site_url('position/archives'));
  }
  public final function expired($employerId)
  {

    showView('positions/expired', array('employerId' => $employerId));
  }
}