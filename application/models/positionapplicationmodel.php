<?php
class PositionApplicationModel extends CI_Model
{
	public function __construct() {
		parent::__construct();
	}
	public final function index() {
		$uId = getLoggedUser()->id;
		$this->db->select
		(
			'*, ' . 
			'pa.id position_application_id, ' . 
			'a.id applicant_id, ' .
			'p.id position_id, ' .
			'p.name position_name, ' .
			'u.id user_id, ' .
			'o.name employer_name, ' .
			'at.name application_status_name'
		);
		$this->db->from( 'position_applications pa' );
		$this->db->join( 'applicants a', 'pa.applicant_id = a.id' );
		$this->db->join( 'positions p', 'pa.position_id = p.id' );
		$this->db->join( 'employers e', 'p.employer_id = e.id' );
		$this->db->join( 'employer_companies ec', 'ec.employer_id = e.id' );
		$this->db->join( 'organizations o', 'ec.organization_id = o.id' );
		$this->db->join( 'application_status at', 'pa.application_status_id = at.id' );
		$this->db->join( 'users u', 'a.user_id = u.id' );
		$this->db->where( 'u.id', $uId );
		return $this->db->get();
	}
	public final function create( $positionId ) {
		$i = $this->input;
		$this->load->model( 'applicantmodel' );
		$uId = getLoggedUser()->id;
		$applId = $this->applicantmodel->readByUserId( $uId )->row()->id;
		$a = array
		(
			'position_id' => $positionId,
			'applicant_id' => $applId,
			'application_status_id' => 7 //ID of Pooling.
		);
		$this->db->insert( 'position_applications', $a );
		return $this->read( $this->db->insert_id() );
	}
	public final function read( $id ) {
		return $this->db->get_where( 'position_applications', array( 'id' => $id ) );
	}
	public final function update() {
		$i = $this->input;
		$id = $i->post( 'id' );
		$this->db->where( 'id', $id );
		$this->db->update
		(
			'internship_applications',
			getPostValuePair()
		);
	}
	public final function delete( $id ) {
		$this->db->where( 'id', $id );
		return $this->db->delete( 'position_applications' );
	}
	public final function withdraw( $id ) {
		$a = array('name' => 'Withdrawn');
		$i = $this->db->get_where('application_status', $a)->row()->id;
		$this->db->where( 'id', $id );
		$a = array('application_status_id' => $i);
		$this->db->update( 'position_applications', $a );
	}
}
