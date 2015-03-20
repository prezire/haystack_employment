<?php 
  if(!defined('BASEPATH')) 
    exit('No direct script access allowed');
  class Search extends CI_Controller 
  {
    public function __construct()
    {
      parent::__construct();
      $this->load->model('searchmodel');
    }
    private final function getSearchableTables()
    {
      //TODO: Set your desired searchable tables here...
      //Basic searchable tables.
      $tables = array
      (
        array
        (
          'name' => 'positions',
          'fields' => array('name', 'industry', 'category'),
          'orders' => array('name', 'ASC'),
          'href' => site_url('position/read'),
          'titles' => array('name'), 
          'descriptions' => array('name', 'industry', 'category')
        ),
        array
        (
          'name' => 'applicants',
          'fields' => array('current_position_title'),
          'orders' => array('current_position_title', 'ASC'),
          'linked_to' => array
          (
            array
            (
              'user',
              'user_id', 
              'users', 
              array('full_name')
            )
          ),
          'href' => site_url('applicant/read'),
          'titles' => array('current_position_title'), 
          'descriptions' => array()
        )
      );
      return $tables;
    }
    public final function result()
    {
      if($this->input->post())
      {
        if($this->form_validation->run('search'))
        {
          $ctr = 0;
          $results = array();
          $tables = $this->getSearchableTables();
          foreach($tables as $t)
          {
            $r = $this->searchmodel->search($t);
            $ctr += count($r);
            array_push($results, $r);
          }
          $a = array
          (
            'total' => $ctr,
            'results' => $results,
            'keywords' => $this->input->post('keywords')
          );
          showView('searches/results', $a);
        }
        else
        {
          $a = array
          (
            'results' => array(),
            'status' => 'error', 
            'messsage' => 'Empty.',
            'keywords' => $this->input->post('keywords')
          );
          showView('searches/results', $a);
        }
      } 
    }
  	public final function index(){showView('searches/index');}
}