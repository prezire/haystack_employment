<?php
class MemberModel extends CI_Model
{
	public function __construct() {
		parent::__construct();
	}
	public final function index() {
		$u = getLoggedUser();
		$orgId = $u->organization_id;
		$this->db->select
		(
			'u.*, m.id member_id, o.id organization_id, o.name'
		);
		$this->db->from( 'members m' );
		$this->db->join( 'users u', 'm.user_id = u.id' );
		$this->db->join( 'organizations o', 'm.organization_id = o.id' );
		$this->db->where( 'u.organization_id', $orgId );
		$this->db->where( 'u.id <>', $u->id );
		$this->db->order_by( 'm.date_time_created', 'DESC' );
		return $this->db->get();
	}
	public final function create() {
		$i = $this->input;
		$this->load->model('rolemodel');
		$this->load->model('organizationmodel');
		//The user who creates the new users.
		$u = getLoggedUser();
		$role = $this->rolemodel->read($u->role_id)->row()->name;
		//$roleId = $role->id;
		$roleName = $role->name;
		//
		$member = $this->db->insert('users', getPostValuePair());
		$memberId = $this->db->insert_id();
		$orgId = 0;
		switch($roleName)
		{
			case 'Employer':
				$this->load->model('employermodel');
				$emplId = $this->employermodel->readByUserId($u->id)->row()->id;
				$orgId = $this->organizationmodel->readByEmployerId($emplId)->row()->id;
				//
				//Insert new employer.
				$this->db->insert('employers', array('user_id' => $memberId));
				$emplId = $this->db->insert_id();
				$a = array('organization_id' => $orgId, 'employer_id' => $emplId);
				$this->db->insert('employer_companies', $a);
			break;
			case 'Faculty':
				$this->load->model('facultymodel');
				//
				$facId = $this->facultymodel->readByUserId($u->id)->row()->id;
				$orgId = $this->organizationmodel->readByFacultyId($facId)->row()->id;
				//
				//Insert new faculty.
				$this->db->insert('faculties', array('user_id' => $memberId));
				$facId = $this->db->insert_id();
				$a = array('organization_id' => $orgId, 'faculty_id' => $facId);
				$this->db->insert('faculty_schools', $a);
			break;
		}
		$a = array('user_id' => $memberId, 'organization_id' => $orgId);
		$this->db->insert( 'members', $a );
		return $this->read( $this->db->insert_id() );
	}
	public final function read( $id ) {
		return $this->db->get_where
		(
			'members',
			array( 'id' => $id )
		);
	}
	public final function update() {
		$i = $this->input;
		$id = $i->post( 'id' );
		$this->db->where( 'id', $id );
		$this->db->update
		(
			'members',
			getPostValuePair()
		);
	}
	public final function delete( $id ) {
		$this->db->where( 'member.id', $id );
		return $this->db->delete();
	}
}
