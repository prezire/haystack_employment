<?php
class MemberModel extends CI_Model
{
	public function __construct() {
		parent::__construct();
	}
	public function index() {
		//Do nothing.
	}
	public function create() {
		$i = $this->input;
		$this->load->model('rolemodel');
		$this->load->model('organizationmodel');
		//The user who creates the new users.
		$u = getLoggedUser();
		$role = $this->rolemodel->read($u->role_id)->row();
		$roleName = $role->name;
		//
		$a = getPostValuePair();
		$a['enabled'] = true;
		$a['role_id'] = $u->role_id;
		$member = $this->db->insert('users', $a);
		$uId = $this->db->insert_id();
		//
		$orgId = 0;
		switch($roleName)
		{
			case 'Employer':
				$this->load->model('companymembermodel');
				$orgId = $this->companymembermodel->create($uId);
			break;
			case 'Faculty':
				$this->load->model('facultymembermodel');
				$orgId = $this->facultymembermodel->create($uId);
			break;
		}
		$a = array
		(
			'user_id' => $uId, 
			'organization_id' => $orgId
		);
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
		$this->db->where( 'id', $id );
		return $this->db->delete('members');
	}
}
