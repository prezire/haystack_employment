<?php
	class SchoolModel extends CI_Model
	{
		public function __construct() {
			parent::__construct();
		}
		public final function index() {
			//
		}
		public final function create() {
			$i = $this->input;
			//
		}
		public final function readByFacultyId( $facultyId ) {
			$this->db->select
			(
				'*, u.id user_id, ' . 
				'o.name school_name, ' . 
				'o.description school_description,' . 
				'o.logo_filename school_logo_filename, ' . 
				'o.email school_email, ' .  
				'o.website school_website, ' .
				'o.landline school_landline, ' . 
				'o.mobile school_mobile, ' . 
				'o.fax school_fax, ' . 
				'o.address school_address, ' . 
				'o.city school_city, ' . 
				'o.state school_state, ' . 
				'o.zip_code school_zip_code, ' . 
				'o.country school_country'
			);
			$this->db->from('organizations o');
			$this->db->join('employer_school ec', 'ec.organization_id = o.id');
			$this->db->join('employers e', 'e.id = ec.employer_id');
			$this->db->join('users u', 'u.id = e.user_id');
			$this->db->where('e.id', $employerId);
			return $this->db->get();
		}
		public final function read( $id ) {
			return $this->db->get_where
			(
				'school',
				array( 'id' => $id )
			);
		}
		public final function updateFromFacultyProfile()
		{
			$i = $this->input;
			$id = $i->post( 'id' );
			//upload('logo_filename');
			$a = getPostValuePair(array('id', 'user_id'));
			$this->db->update('organizations', $a);
		}
		public final function update() {
			$i = $this->input;
			$id = $i->post( 'id' );
			$this->db->where( 'id', $id );
			$this->db->update
			(
				'school',
				getPostValuePair()
			);
		}
		public final function delete( $id ) {
			$this->db->where( 'id', $id );
			return $this->db->delete('school');
		}
	}