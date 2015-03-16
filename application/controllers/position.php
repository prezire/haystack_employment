<?php 
  if(!defined('BASEPATH')) exit('No direct script access allowed');
  class Position extends CI_Controller 
  {
    public function __construct()
  	{
  		parent::__construct();
      validateLoginSession(array('create', 'update', 'delete', 'readMyPosts'));
      $this->load->model('positionmodel');
      $this->load->helper('pagination_helper');
  	}
    public final function index($page = 0)
    {
      $i = $this->positionmodel->readBrowsablePositionsCount();
      $p = getPaginationDetails($i);
      $o = $this->positionmodel->index($p['perPage'], $page)->result();
      $a = array('positions' => $o, 'pagination' => $p['links']);
      showView('positions/index', $a);
    }
    public final function archives($page = 0)
    {
      $i = $this->positionmodel->readAllArchivesCount();
      $p = getPaginationDetails($i);
      $o = $this->positionmodel->archives($p['perPage'], $page)->result();
      $a = array('positions' => $o, 'pagination' => $p['links']);
      showView('positions/archives', $a);
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
      $dateFrom = $p->date_from;
      $dateTo = $p->date_to;
      $now = mdate('%Y-%m-%d');
      $bWithinDate = $now >= $dateFrom && $now <= $dateTo;
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
    private final function getPaginationDetails($limit)
    {
      $this->load->library('pagination');
      $methodName = $this->router->fetch_method();
      $perPage = 12;
      $c = array
      (
        'base_url' => site_url('position/' . $methodName) . '/',
        'per_page' => $perPage,
        'total_rows' => $limit
      );
      $this->pagination->initialize($c);
      $links = $this->pagination->create_links();
      $a = array('perPage' => $perPage,'links' => $links);
      return $a;
    }
    public final function readMyPosts($page = 0)
    {
      $i = $this->positionmodel->readAllPositionsCount();
      $p = getPaginationDetails($i);
      $positions = $this->positionmodel->readMyPosts($p['perPage'], $page);
      $a = array
      (
        'positions' => $positions, 
        'pagination' => $p['links']
      );
      showView('positions/employer_post_listing', $a);
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
    public final function clonePosition($id = null)
    {
      $o = $this->positionmodel->read($id)->row();
      $a = array('position' => $o);
      if($this->input->post())
      {
        if($this->form_validation->run('position/create'))
        {
          $o = $this->positionmodel->create()->row();
          redirect(site_url('position/update/' . $o->position_id));
        }
        else
        {
          showView('positions/clone', $a);
        }
      }
      else
      {
        showView('positions/clone', $a);
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