<?php	class CertificationModel extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		public final function index()
		{
			$this->db->select('c.*');
			$this->db->from('certifications c');
			return $this->db->get();
		}
		public final function create()
		{
			$i = $this->input;
			$this->db->insert
			(
				'certifications', 
				getPostValuePair()
			);
			return $this->read($this->db->insert_id());
		}
		public final function read($id)
		{
      return $this->db->get_where
      (
        'certifications', 
        array('id' => $id)
      );
		}
		public final function update()
		{
			$i = $this->input;
			$resumeId = $i->post('resume_id');
			//Remove all items to refresh the list.
			$this->db->where('resume_id', $resumeId);
			$this->db->delete('certifications');
			//
			$names = $i->post('name');
			foreach($names as $n){
				$a = array
				(
					'resume_id' => $resumeId,
					'name' => $n
				);
				$this->db->insert('certifications', $a);
			}
		}
		public final function delete($id)
	    {
	      $this->db->where('certification.id', $id);
				return $this->db->delete();
	    }
	}