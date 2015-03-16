<?php	
	class BillingModel extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}
		public final function index()
		{
			$this->db->select('*')
			->from('billings b')
			->join('users u', 'b.paid_by_user_id = u.id')
			->join('positions p', 'b.position_id = p.id', 'right');
			return $this->db->get();
		}
		public final function readBrowsableBillingsCount($paid = true)
		{
			$this->db->select('*')
			->from('billings b')
			->join('users u', 'b.paid_by_user_id = u.id');
			if($paid)
			{
				$this->db->join('positions p', 'b.position_id = p.id');
			}
			else
			{
				$this->db->join('positions p', 'b.position_id = p.id', 'right');
			}
			return $this->db->count_all_results();
		}
		public final function paid()
		{
			$this->db->select('*')
			->from('billings b')
			->join('positions p', 'b.position_id = p.id')
			->join('users u', 'b.paid_by_user_id = u.id');
			if($limit) $this->db->limit($limit, $page);
			return $this->db->get();
		}
	}