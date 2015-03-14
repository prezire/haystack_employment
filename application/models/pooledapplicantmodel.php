<?php	
	class PooledApplicantModel extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		public final function index()
		{
			$this->db->select('*, p.id pool_id, a.id applicant_id, p.notes pooled_applicant_notes');
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
		public final function update($positionId, $applicantId)
		{
			$i = $this->input;
			$a = getPostValuePair();
			//Check if existing.
			$o = $this->db->get_where('pooled_applicants', $a);
			if($o->num_rows() > 0)
			{
				$this->db->where('position_id', $positionId);
				$this->db->where('applicant_id', $applicantId);
				$this->db->update('pooled_applicants', $a);
			}
			else
			{
				//Else, create new.
				$a['position_id'] = $positionId;
				$a['applicant_id'] = $applicantId;
				$this->db->insert('pooled_applicants', $a);
			}
			return $this->db->affected_rows() > 0;
		}
		public final function delete($id)
	    {
	      	$this->db->where('pooled_applicant.id', $id);
			return $this->db->delete();
	    }
	}