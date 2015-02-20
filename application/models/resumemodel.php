<?php	class ResumeModel extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		public final function index()
		{
			$this->db->select('r.*');
			$this->db->from('resumes r');
      //
			return $this->db->get();
		}
		public final function create()
		{
			$i = $this->input;
			$this->db->insert
			(
				'resumes', 
				getPostValuePair()
			);
			return $this->read($this->db->insert_id());
		}
    public final function createFromProfile()
    {
      $a = array();
      $i = $this->input;
      $fName = $i->post('full_name');
      $this->db->create('resumes', array('full_name' => $fName));
      return $this->read($this->db->result_id());
    }
    public final function readByUserId($userId)
    {
      $this->load->model('applicantmodel');
      $applId = $this->applicantmodel->readByUserId($userId)->row()->id;
      return $this->db->get_where('resumes', array('applicant_id' => $applId));
    }
    public final function readByApplicantId($applicantId)
    {
      $r = $this->db->get_where
      (
        'resumes', 
        array
        (
          'applicant_id' => 
          $applicantId
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
      $this->db->order_by('from', 'ASC');
      $works = $this->db->get_where('work_histories', array('resume_id' => $id))->result();
      $this->db->order_by('from', 'ASC');
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
        'additionalInformations' => $infos
      );
      return $a;
		}
		public final function update()
		{
      $i = $this->input;
			$id = $i->post('id');
			$this->db->where('id', $id);
			$this->db->update
      (
        'resumes', 
        getPostValuePair()
      );
		}
		public final function delete($id)
    {
      $this->db->where('resume.id', $id);
			return $this->db->delete();
    }
	}