<?php 
	class FacultyModel extends CI_Model
	{
		public function __construct() {
			parent::__construct();
		}
		public final function index() {
			return $this->db->get('faculties');
		}
		public final function create() {
			$i = $this->input;
			$a = getPostValuePair
			(
				array
				(
					'school_name',
					'school_address',
					'school_city',
					'school_country'
				)
			);
			$this->load->model( 'rolemodel' );
			$a['role_id'] = $this->rolemodel->readByName( 'Faculty' )->row()->id;
			$a['enable_token'] = generateToken( $a['role_id'] );
			$this->db->insert( 'users', $a );
			$uId = $this->db->insert_id();
			$this->db->insert( 'faculties', array( 'user_id' => $uId ) );
			$emplId = $this->db->insert_id();
			$this->load->model( 'usermodel' );
			//Org.
			$aOrg = array
			(
				'name' => $i->post( 'school_name' ),
				'address' => $i->post( 'school_address' ),
				'city' => $i->post( 'school_city' ),
				'country' => $i->post( 'school_country' ),
				'organization_type' => 'School'
			);
			$this->db->insert( 'organizations', $aOrg );
			$orgId = $this->db->insert_id();
			//School faculties.
			$aFacultySch = array( 'faculty_id' => $emplId, 'organization_id' => $orgId );
			$this->db->insert( 'faculty_schools', $aFacultySch );
			return $this->usermodel->read( $uId );
		}
		public final function read( $id ) {
			return $this->db->get_where
			(
				'faculties',
				array( 'id' => $id )
			);
		}
		public final function readByUserId( $userId ) {
			return $this->db->get_where( 'faculties', array( 'user_id' => $userId ) );
		}
		public final function update() {
			$i = $this->input;
			$id = $i->post( 'id' );
			$this->db->where( 'id', $id );
			$this->db->update
			(
				'faculties',
				getPostValuePair()
			);
		}
		public final function delete( $id ) {
			$this->db->where( 'id', $id );
			return $this->db->delete('faculties');
		}
	}