<?php
	require_once APPPATH . 'models/membermodel.php';
	class CompanyMemberModel extends MemberModel
	{
		public function __construct() {
			parent::__construct();
		}
		public final function index()
		{
			$uId = getLoggedUser()->id;
			$this->load->model('employermodel');
			$empId = $this->employermodel->readByUserId($uId)->row()->id;
			//
			$this->load->model('organizationmodel');
			$orgId = $this->organizationmodel->readByEmployerId($empId)->row()->organization_id;
			$this->db->select
			(
				'u.*, u.id user_id, m.id member_id, o.id organization_id, o.name, u.enabled user_enabled'
			);
			$this->db->from( 'members m' );
			$this->db->join( 'users u', 'm.user_id = u.id' );
			$this->db->join( 'organizations o', 'm.organization_id = o.id' );
			$this->db->where( 'o.id', $orgId );
			$this->db->order_by( 'm.date_time_created', 'DESC' );
			return $this->db->get();
		}
		public final function create( $memberId ) {
			$u = getLoggedUser();
			$this->load->model( 'employermodel' );
			$this->load->model( 'companymodel' );
			$emplId = $this->employermodel->readByUserId( $u->id )->row()->id;
			$orgId = $this->companymodel->readByEmployerId( $emplId )->row()->organization_id;
			$this->db->insert( 'employers', array( 'user_id' => $memberId ) );
			$emplId = $this->db->insert_id();
			$a = array( 'organization_id' => $orgId, 'employer_id' => $emplId );
			$this->db->insert( 'employer_companies', $a );
			return $orgId;
		}
	}