<?php	class EducationModel extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		public final function index()
		{
			$this->db->select('e.*');
			$this->db->from('educations e');
			return $this->db->get();
		}
		public final function create()
		{
			$i = $this->input;
			$this->db->insert
			(
				'educations', 
				getPostValuePair()
			);
			return $this->read($this->db->insert_id());
		}
		public final function read($id)
		{
      return $this->db->get_where
      (
        'educations', 
        array('id' => $id)
      );
		}
		public final function update()
		{
			$i = $this->input;
			$resumeId = $i->post('resume_id');
			//Remove all items to refresh the list.
			$this->db->where('resume_id', $resumeId);
			$this->db->delete('educations');
			$tmpDeg = $i->post('degree');
			for($a = 0; $a < count($tmpDeg); $a++)
			{

				$degrees = $tmpDeg;
				$studies = $i->post('field_of_study');
				$schools = $i->post('school');
				$countries = $i->post('country');
				$cities = $i->post('city');
				$froms = $i->post('from');
				$tos = $i->post('to');
				$l = array
				(
					'resume_id' => $resumeId, 
					'degree' => $degrees[$a],
					'field_of_study' => $studies[$a],
					'school' => $schools[$a],
					'country' => $countries[$a],
					'city' => $cities[$a],
					'from' => $froms[$a],
					'to' => $tos[$a]
				);
				$this->db->insert('educations', $l);
			}
		}
		public final function delete($id)
    {
      $this->db->where('education.id', $id);
			return $this->db->delete();
    }
	}