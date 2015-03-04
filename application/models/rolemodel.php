<?php 
	class RoleModel extends CI_Model
	{
		public function __construct() {
			parent::__construct();
		}
		public final function index() {
			$this->db->select( 'r.*' );
			$this->db->from( 'roles r' );
			return $this->db->get();
		}
		public final function create() {
			$i = $this->input;
			if ( $i->post() ) {
				$this->db->insert
				(
					'roles',
					getPostValuePair()
				);
				return $this->read( $this->db->insert_id() );
			}
		}
		public final function read( $id ) {
			return $this->db->get_where
			(
				'roles',
				array( 'id' => $id )
			);
		}
		public final function readByName( $name ) {
			return $this->db->get_where
			(
				'roles',
				array( 'name' => $name )
			);
		}
		public final function update() {
			$i = $this->input;
			$id = $i->post( 'id' );
			$this->db->where( 'id', $id );
			$this->db->update
			(
				'roles',
				getPostValuePair()
			);
		}
		public final function delete( $id ) {
			$this->db->where( 'role.id', $id );
			return $this->db->delete();
		}
	}