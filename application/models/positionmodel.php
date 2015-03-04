<?php
class PositionModel extends CI_Model
{
	public function __construct() {
		parent::__construct();
	}
	public final function index() {
		$this->db->select( 'p.*' );
		$this->db->from( 'positions p' );
		return $this->db->get();
	}
	public final function create() {
		$i = $this->input;
		$a = getPostValuePair();
		$this->load->model( 'employermodel' );
		$a['employer_id'] = $this->employermodel->readByUserId
		(
			getLoggedUser()->id
		)->row()->id;
		$this->db->insert( 'positions', $a );
		return $this->read( $this->db->insert_id() );
	}
	public final function read( $id ) {
		return $this->db->get_where
		(
			'positions',
			array( 'id' => $id )
		);
	}
	public final function readByIndustry( $industry ) {
		return $this->db->get_where
		(
			'positions',
			array( 'industry' => $industry )
		);
	}
	public final function readGroupedSummary() {
		$this->db->select( "industry, count(id) as count" );
		$this->db->from( 'positions' );
		$this->db->where( "date_to > NOW()" );
		$this->db->group_by( 'industry' );
		return $this->db->get();
	}
	public final function update() {
		$i = $this->input;
		$id = $i->post( 'id' );
		$this->db->where( 'id', $id );
		$this->db->update( 'positions', getPostValuePair() );
	}
	public final function delete( $id ) {
		$this->db->where( 'id', $id );
		return $this->db->delete( 'positions' );
	}
}
