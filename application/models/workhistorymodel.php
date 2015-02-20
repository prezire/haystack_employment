<?php	class WorkHistoryModel extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		public final function index()
		{
			$this->db->select('w.*');
			$this->db->from('work_histories w');
			return $this->db->get();
		}
		public final function create()
		{
			$i = $this->input;
			$this->db->insert
			(
				'work_histories', 
				getPostValuePair()
			);
			return $this->read($this->db->insert_id());
		}
		public final function read($id)
		{
	      return $this->db->get_where
	      (
	        'work_histories', 
	        array('id' => $id)
	      );
		}
		public final function update()
		{
			$i = $this->input;
			$resumeId = $i->post('resume_id');
			//Remove all items to refresh the list.
			$this->db->where('resume_id', $resumeId);
			$this->db->delete('work_histories');
			$tmpPos = $i->post('position');
			for($a = 0; $a < count($tmpPos); $a++)
			{

				$pos = $tmpPos;
				$companies = $i->post('company');
				$froms = $i->post('from');
				$tos = $i->post('to');
				$locs = $i->post('location');
				$summaries = $i->post('summary');
				$l = array
				(
					'resume_id' => $resumeId, 
					'position' => $pos[$a],
					'company' => $companies[$a],
					'from' => $froms[$a],
					'to' => $tos[$a],
					'location' => $locs[$a],
					'summary' => $summaries[$a]
				);
				$this->db->insert('work_histories', $l);
			}
		}
		public final function delete($id)
	    {
	      $this->db->where('work_history.id', $id);
				return $this->db->delete();
	    }
	}