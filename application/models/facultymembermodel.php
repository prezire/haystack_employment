<?php
	require_once APPPATH . 'models/membermodel.php';
	class FacultyMemberModel extends MemberModel
	{
		public function __construct() {
			parent::__construct();
		}
		public final function index()
		{
			$uId = getLoggedUser()->id;
			$this->load->model('facultymodel');
			$facId = $this->facultymodel->readByUserId($uId)->row()->id;
			//
			$this->load->model('organizationmodel');
			$orgId = $this->organizationmodel->readByFacultyId($facId)->row()->organization_id;
			$this->db->select
			(
				'u.*, u.id user_id, m.id member_id, o.id organization_id, o.name'
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
			$this->load->model( 'facultymodel' );
			$this->load->model( 'companymodel' );
			$facId = $this->facultymodel->readByUserId( $u->id )->row()->id;
			$orgId = $this->organizationmodel->readByFacultyId( $facId )->row()->organization_id;
			$this->db->insert( 'faculties', array( 'user_id' => $memberId ) );
			$facId = $this->db->insert_id();
			$a = array( 'organization_id' => $orgId, 'faculty_id' => $facId );
			$this->db->insert( 'faculty_schools', $a );
			return $orgId;
		}
	}
