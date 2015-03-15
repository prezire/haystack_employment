<?php	
  class AnalyticsModel extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		public final function index()
		{
			//
		}
		public final function email()
		{
			//CRON?
		}
		public final function createEmailer()
		{
			$a = getPostValuePair(array('user_id'));
			$this->db->insert('analytics_report_emailers', $a);
			return $this->readEmailer($this->db->insert_id());
		}
		public final function readEmailer($id)
		{
			$this->db->where('id', $id);
			return $this->db->get_where('analytics_report_emailers');
		}
		//Get all reports from a specific organization_id using role_name.
		public final function readEmailersByRoleName($userId, $roleName)
		{
			$orgId = null;
			switch($roleName)
			{
				case 'Employer':
					$this->load->model('employermodel');
					$emplId = $this->employermodel->readByUserId($userId)->row()->id;
					$this->db->where('employer_id', $emplId);
					$orgId = $this->db->get('employer_companies')->row()->organization_id;
				break;
				case 'Faculty':
					$this->load->model('facultymodel');
					$facId = $this->facultymodel->readByUserId($userId)->row()->id;
					$this->db->where('faculty_id', $facId);
					$orgId = $this->db->get('faculty_schools')->row()->organization_id;
				break;
			}
			$this->db->where('organization_id', $orgId);
			return $this->db->get('analytics_report_emailers');
		}
		public final function deleteEmailer($id)
		{
			$this->db->where('id', $id);
			$this->db->delete('analytics_report_emailers');
		}
		/*
			@param  $options  Array of the following items:
			 - frequency String  Daily (Default), Weekly, Monthly.
			 - geographic String  Country. Optional
			 - industry  String. Required. Default is null.
			 - from Date. Required. Default is today - 1.
			 - to Date. Required. Default is today.
		*/
		public final function generate($options)
		{
			$o = $options;

		}
	}