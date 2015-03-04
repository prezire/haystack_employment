<?php	
	class PooledApplicantModel extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		public final function index()
		{
			$this->db->select('*, p.id pool_id, a.id applicant_id');
			$this->db->from('pooled_applicants p');
			$this->db->join('applicants a', 'p.applicant_id = a.id');
			$this->db->join('users u', 'a.user_id = u.id');
			$this->db->join('employers e', 'p.employer_id = e.id');
			return $this->db->get();
		}
		public final function create()
		{
			$i = $this->input;
			$this->db->insert
			(
				'pooled_applicants', 
				getPostValuePair()
			);
			return $this->read($this->db->insert_id());
		}
		public final function readDetails($id)
		{
			$this->db->select('*');
			$this->db->from('pooled_applicants p');
			$this->db->join('applicants a', 'p.applicant_id = a.id');
			$this->db->join('users u', 'a.user_id = u.id');
			$this->db->join('employers e', 'p.employer_id = e.id');
			$this->db->where('p.id', $id);
			return $this->db->get();
		}
		public final function read($id)
		{
	      return $this->db->get_where
	      (
	        'pooled_applicants', 
	        array('id' => $id)
	      );
		}
		public final function readByApplicantId($applicantId)
		{
	      return $this->db->get_where
	      (
	        'pooled_applicants', 
	        array('applicant_id' => $applicantId)
	      );
		}
		public final function update()
		{
			$i = $this->input;
			$id = $i->post('id');
			$this->db->where('id', $id);
			$this->db->update
			(
				'pooled_applicants', 
				getPostValuePair(array('id'))
			);
			return $this->read($id);
		}
		public final function delete($id)
	    {
	      	$this->db->where('pooled_applicant.id', $id);
			return $this->db->delete();
	    }
	}