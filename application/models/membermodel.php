<?php	
	class MemberModel extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		public final function index()
		{
			$u = getLoggedUser();
			$orgId = $u->organization_id;
			$this->db->select
			(
				'u.*, m.id member_id, o.id organization_id, o.name'
			);
			$this->db->from('members m');
			$this->db->join('users u', 'm.user_id = u.id');
			$this->db->join('organizations o', 'm.organization_id = o.id');
			$this->db->where('u.organization_id', $orgId);
			$this->db->where('u.id <>', $u->id);
			return $this->db->get();
		}
		public final function create()
		{
			$i = $this->input;
			$this->db->insert
			(
				'members', 
				getPostValuePair()
			);
			return $this->read($this->db->insert_id());
		}
		public final function read($id)
		{
      return $this->db->get_where
      (
        'members', 
        array('id' => $id)
      );
		}
		public final function update()
		{
			$i = $this->input;
			$id = $i->post('id');
			$this->db->where('id', $id);
			$this->db->update
      (
        'members', 
        getPostValuePair()
      );
		}
		public final function delete($id)
    {
      $this->db->where('member.id', $id);
			return $this->db->delete();
    }
	}