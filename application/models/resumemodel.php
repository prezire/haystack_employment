<?php	class ResumeModel extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		public final function index()
		{
      $this->load->model('applicantmodel');
      $aId = $this->applicantmodel->readByUserId(getLoggedUser()->id)->row()->id;
			$this->db->select('r.*');
			$this->db->from('resumes r');
      $this->db->where('applicant_id', $aId);
			return $this->db->get();
		}
		public final function create()
		{
			$i = $this->input;
			$this->db->insert('resumes', getPostValuePair());
			$rId = $this->read($this->db->insert_id())->row()->id;
      //Create Additional Information.
      $this->db->insert('additional_informations', array('resume_id' => $rId));
      return $rId;
		}
    public final function createFromProfile($applicantId)
    {
      //Init create 3 resumes. 
      for($j = 0; $j < 3; $j++)
      {
        $a = array
        (
          'applicant_id' => $applicantId,
          'name' => 'My Resume ' . ($j + 1)
        );
        $this->db->insert('resumes', $a);
        $rId = $this->read($this->db->insert_id())->row()->id;
        //Create Additional Information.
        $this->db->insert('additional_informations', array('resume_id' => $rId));
      }
    }
    public final function readByUserId($userId)
    {
      $this->load->model('applicantmodel');
      $applId = $this->applicantmodel->readByUserId($userId)->row()->id;
      return $this->db->get_where('resumes', array('applicant_id' => $applId));
    }
    public final function readByIdAndApplicantId($id, $applicantId)
    {
      $r = $this->db->get_where
      (
        'resumes', 
        array
        (
          'id' => $id,
          'applicant_id' => $applicantId
        )
      )->row();
      return $this->readDetails($r->id);
    }
    public final function read($id)
    {
      return $this->db->get_where('resumes', array('id' => $id));
    }
		public final function readDetails($id)
		{
      $this->db->select('*, u.id user_id, r.id resume_id');
			$this->db->from('resumes r');
      $this->db->join('applicants a', 'a.id = r.applicant_id');
      $this->db->join('users u', 'u.id = a.user_id');
      $this->db->where('r.id', $id);
      $resume = $this->db->get()->row();
      //
      $this->db->order_by('date_from', 'ASC');
      $works = $this->db->get_where('work_histories', array('resume_id' => $id))->result();
      $this->db->order_by('date_from', 'ASC');
      $eds = $this->db->get_where('educations', array('resume_id' => $id))->result();
      //
      $skills = $this->db->get_where('skills', array('resume_id' => $id))->result();
      $certs = $this->db->get_where('certifications', array('resume_id' => $id))->result();
      $infos = $this->db->get_where('additional_informations', array('resume_id' => $id))->row();
      $a = array
      (
        'resume' => $resume,
        'workHistories' => $works,
        'educations' => $eds,
        'skills' => $skills,
        'certifications' => $certs,
        'additionalInformations' => $infos->information
      );
      return $a;
		}
		public final function update()
		{
      $i = $this->input;
      $a = getPostValuePair(array('current_position_title', 'expected_salary'));
			$id = $i->post('id');
			$this->db->where('id', $id);
			$this->db->update('resumes', $a);
      //
      $applId = $this->read($id)->row()->applicant_id;
      //Update applicant.
      $this->db->where('id', $applId);
      $a = array
      (
        'current_position_title' => $i->post('current_position_title'),
        'expected_salary' => $i->post('expected_salary')
      );
      $this->db->update('applicants', $a);
		}
		public final function delete($id)
    {
      $this->db->where('resume.id', $id);
			return $this->db->delete();
    }
	}