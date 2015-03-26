<?php 
  //php index.php generate crud ad id:int script:varchar script_type:varchar description:text width:int height:int image:file date_from:datetime date_to:datetime enabled:boolean owner_full_name:varchar owner_email:varchar owner_landline:varchar owner_mobile:varchar company_name:varchar company_address:varchar company_city:varchar company_country:varchar company_zip_code:varchar company_landline:varchar company_mobile:varchar payable_amount:float paid_amount:float paid_by:varchar created_on:datetime last_updated:datetime paid_on:datetime
  
  if(!defined('BASEPATH')) 
    exit('No direct script access allowed');
  class Ad extends CI_Controller 
  {
  	public function __construct()
  	{
  		parent::__construct();
      $this->load->model('admodel');
  	}
    public final function index()
    {
      $o = $this->admodel->index()->result();
      showView('ads/index', array('ads' => $o));
    }
    public final function create()
    {
      if($this->input->post())
      {
        if($this->form_validation->run('ad/create'))
        {
          $o = $this->admodel->create()->row();
          if($o->id)
          {
            redirect(site_url('ad/update/' . $o->id));
          }
          else
          {
            show_error('Error creating ad.');
          }
        }
        else
        {
          showView('ads/create');
        }
      }
      else
      {
        showView('ads/create');
      }
    }
  	public final function read($id)
  	{
  		showView('ads/read', array('ad' => $this->admodel->read($id)->row()));
  	}
  	public final function update($id = null)
    {
      $o = $this->admodel->read($id)->row();
      $a = array('ad' => $o);
      if($this->input->post())
      {
        if($this->form_validation->run('ad/update'))
        {
          $this->admodel->update();
          redirect(site_url('ad/update/' . $this->input->post('id')));
        }
        else
        {
          showView('ads/update', $a);
        }
      }
      else
      {
        showView('ads/update', $a);
      }
    }
  	public final function delete($id, $format = 'html')
    {
      switch($format)
      {
        case 'html':
          $this->ad_model->delete($id);
          redirect(site_url('ad'));
        break;
        case 'json':
          showJsonView(array('ad' => $this->admodel->delete($id)->row()));
        break;
      }
    }
  }