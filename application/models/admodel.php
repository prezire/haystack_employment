<?php	
	class AdModel extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		public final function index()
		{
			$this->db->select('a.*');
			$this->db->from('ads a');
			return $this->db->get();
		}
		public final function create()
		{
			$i = $this->input;
			$this->db->insert
			(
				'ads', 
				getPostValuePair()
			);
			return $this->read($this->db->insert_id());
		}
		public final function read($id)
		{
	      return $this->db->get_where
	      (
	        'ads', 
	        array('id' => $id)
	      );
		}
		public final function uploadImage($adId)
	    {
	      //TODO: Query and remove prev image file.
	      $image = upload('image');
	      if(isset($image))
	      {
	        $a = array('image' => $image['file_name']);
	        $this->db->where('id', $id);
	        $this->db->update('ads', $a);
	      }
	    }
		public final function update()
		{
			$i = $this->input;
			$id = $i->post('id');
			$this->db->where('id', $id);
			$this->db->update
			(
				'ads', 
				getPostValuePair()
			);
		}
		public final function delete($id)
	    {
	    	$this->db->where('id', $id);
			return $this->db->delete('ads');
	    }
	}