<?php
class OrganizationModel extends CI_Model
{
	public function __construct() {
		parent::__construct();
	}
	public final function index() {
		$this->db->select( 'c.*' );
		$this->db->from( 'organizations c' );
		return $this->db->get();
	}
	public final function create() {
		$i = $this->input;
		$this->db->insert
		(
			'organizations',
			getPostValuePair()
		);
		return $this->read( $this->db->insert_id() );
	}
	public final function read( $id ) {
		return $this->db->get_where
		(
			'organizations',
			array( 'id' => $id )
		);
	}
	public final function readByEmployerId( $employerId ) {
		$this->db->select('*');
		$this->db->from('employer_companies ec');
		$this->db->join('organizations o', 'ec.organization_id = o.id');
		$this->db->join('employers e', 'ec.employer_id = e.id');
		$this->db->join('users u', 'e.user_id = u.id');
		$this->db->where('e.id', $employerId);
		return $this->db->get();
	}
	public final function readByFacultyId( $facultyId ) {
		$this->db->select('*');
		$this->db->from('faculty_schools fc');
		$this->db->join('organizations o', 'fc.organization_id = o.id');
		$this->db->join('faculties f', 'fc.faculty_id = f.id');
		$this->db->join('users u', 'f.user_id = u.id');
		$this->db->where('f.id', $facultyId);
		$o = $this->db->get();
		return $o;
	}
	public final function update() {
		$i = $this->input;
		$id = $i->post( 'id' );
		$this->db->where( 'id', $id );
		$this->db->update
		(
			'organizations',
			getPostValuePair()
		);
	}
	public final function delete( $id ) {
		$this->db->where( 'company.id', $id );
		return $this->db->delete();
	}
}
