<?php 
	class EmployerModel extends CI_Model
	{
		public function __construct() {
			parent::__construct();
		}
		public final function index() {
			$this->db->select( 'e.*' );
			$this->db->from( 'employers e' );
			return $this->db->get();
		}
		public final function create() {
			$i = $this->input;
			$a = getPostValuePair
			(
				array
				(
					'company_name',
					'company_address',
					'company_city',
					'company_country'
				)
			);
			$this->load->model( 'rolemodel' );
			$a['role_id'] = $this->rolemodel->readByName( 'Employer' )->row()->id;
			$a['enable_token'] = generateToken( $a['role_id'] );
			$this->db->insert( 'users', $a );
			$uId = $this->db->insert_id();
			$this->db->insert( 'employers', array( 'user_id' => $uId ) );
			$emplId = $this->db->insert_id();
			$this->load->model( 'usermodel' );
			//Org.
			$aOrg = array
			(
				'name' => $i->post( 'company_name' ),
				'address' => $i->post( 'company_address' ),
				'city' => $i->post( 'company_city' ),
				'country' => $i->post( 'company_country' ),
				'organization_type' => 'Company'
			);
			$this->db->insert( 'organizations', $aOrg );
			$orgId = $this->db->insert_id();
			//Company Employers.
			$aCompEmpls = array( 'employer_id' => $emplId, 'organization_id' => $orgId );
			$this->db->insert( 'employer_companies', $aCompEmpls );
			return $this->usermodel->read( $uId );
		}
		public final function read( $id ) {
			return $this->db->get_where
			(
				'employers',
				array( 'id' => $id )
			);
		}
		public final function readByUserId( $userId ) {
			return $this->db->get_where( 'employers', array( 'user_id' => $userId ) );
		}
		public final function update() {
			$i = $this->input;
			$id = $i->post( 'id' );
			$this->db->where( 'id', $id );
			$this->db->update
			(
				'employers',
				getPostValuePair()
			);
		}
		public final function delete( $id ) {
			$this->db->where( 'employer.id', $id );
			return $this->db->delete();
		}
	}