<?php	class AdditionalInformationModel extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		public final function index()
		{
			$this->db->select('a.*');
			$this->db->from('additional_informations a');
			return $this->db->get();
		}
		public final function create()
		{
			$i = $this->input;
			$this->db->insert
			(
				'additional_informations', 
				getPostValuePair()
			);
			return $this->read($this->db->insert_id());
		}
		public final function read($id)
		{
      return $this->db->get_where
      (
        'additional_informations', 
        array('id' => $id)
      );
		}
		public final function update()
		{
			$i = $this->input;
			$id = $i->post('resume_id');
			$this->db->where('resume_id', $id);
			$this->db->update
		      (
		        'additional_informations', 
		        getPostValuePair(array('resume_id'))
		      );
		}
		public final function delete($id)
    {
      $this->db->where('additional_information.id', $id);
			return $this->db->delete();
    }
	}