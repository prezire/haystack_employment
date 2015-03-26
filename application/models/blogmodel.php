<?php 
	class BlogModel extends CI_Model
	{
		public function __construct() {
			parent::__construct();
		}
		public final function index() {
			$this->db->select( 'b.*' );
			$this->db->from( 'blogs b' );
			$this->db->order_by('weight', 'ASC');
			$this->db->order_by('date_time_created', 'ASC');
			return $this->db->get();
		}
		public final function create() {
			$a = getPostValuePair();
			$a['date_time_created'] = getDateTime();
			$this->db->insert( 'blogs', $a );
			return $this->read( $this->db->insert_id() );
		}
		public final function read( $id ) {
			return $this->db->get_where
			(
				'blogs',
				array( 'id' => $id )
			);
		}
		public final function readBySlug( $slug ) {
			return $this->db->get_where
			(
				'blogs',
				array( 'slug' => $slug )
			);
		}
		public final function update() {
			$i = $this->input;
			$id = $i->post( 'id' );
			$this->db->where( 'id', $id );
			$this->db->update
			(
				'blogs',
				getPostValuePair()
			);
			return $this->read( $i->post( 'id' ) );
		}
		public final function delete( $id ) {
			$this->db->where( 'id', $id );
			return $this->db->delete( 'blogs' );
		}
	}