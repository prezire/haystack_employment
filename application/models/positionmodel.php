<?php
class PositionModel extends CI_Model
{
	public function __construct() {
		parent::__construct();
	}
	public final function index() {
		$this->db->select('*');
		$this->db->from('positions');
		$this->db->where('date_to >= now()');
		$this->db->where('enabled > 0');
		$this->db->where('vacancy_count > 0');
		$this->db->where('archived < 1');
		return $this->db->get();
	}
	public final function archives()
	{
		$a = array('archived > ' => 0);
		return $this->db->get_where('positions', $a);
	}
	public final function readMyPosts()
	{
		$this->load->model('employermodel');
		$uId = getLoggedUser()->id;
		$emplId = $this->employermodel->readByUserid($uId)->row()->id;
		$positions = $this->db->get_where('positions', array('employer_id' => $emplId))->result();
		$aPositions = array();
		foreach($positions as $p)
		{
			$this->db->select('*, ast.name status_name, a.id applicant_id');
			$this->db->from('position_applications pa');
			$this->db->join('applicants a', 'pa.applicant_id = a.id');
			$this->db->join('positions p', 'pa.position_id = p.id');
			$this->db->join('users u', 'a.user_id = u.id');
			$this->db->join('application_status ast', 'pa.application_status_id = ast.id');
			//
			$this->db->where('position_id', $p->id);
			$appls = $this->db->get()->result();
			$tmp = array('position' => $p, 'applicants' => $appls);
			array_push($aPositions, $tmp);
		}
		return $aPositions;
	}
	public final function readByEmployerId($employerId)
	{
		return $this->db->get_where('positions', array('employer_id' => $employerId));
	}
	public final function create() {
		$i = $this->input;
		$a = getPostValuePair();
		$this->load->model( 'employermodel' );
		$a['employer_id'] = $this->employermodel->readByUserId
		(
			getLoggedUser()->id
		)->row()->id;
		$this->db->insert( 'positions', $a );
		return $this->read( $this->db->insert_id() );
	}
	public final function read( $id ) {
		//Include employer details.
		$this->db->select
		(
			'*, p.id position_id, ' . 
			'e.id employer_id, ' . 
			'p.name position_name, ' . 
			'p.description position_description, ' .
			'o.name company_name, ' . 
			'o.address company_address, ' . 
			'o.city company_city, ' . 
			'o.state company_state, ' . 
			'o.country company_country, ' . 
			'o.zip_code company_zip_code, ' .
			'o.email company_email, ' . 
			'o.mobile company_mobile, ' . 
			'o.landline company_landline, ' . 
			'o.website company_website'
		);
		$this->db->from('positions p');
		$this->db->join('employers e', 'p.employer_id = e.id');
		$this->db->join('users u', 'u.id = e.user_id');
		$this->db->join('employer_companies ec', 'e.id = ec.employer_id');
		$this->db->join('organizations o', 'ec.organization_id = o.id');
		$this->db->where('p.id', $id);
		$o = $this->db->get();
		if($o->num_rows() > 0)
		{
			//Analytics.
			//TODO: Include loc address using IP.
			$a = array
			(
				'ip_address' => $this->input->ip_address(),
				'position_id' => $o->row()->position_id
			);
			$this->db->insert('position_impressions', $a);
		}
		return $o;
	}
	public final function readByIndustry( $industry ) {
		return $this->db->get_where
		(
			'positions',
			array( 'industry' => $industry )
		);
	}
	public final function readGroupedSummary() {
		$this->db->select( "industry, count(id) as count" );
		$this->db->from( 'positions' );
		$this->db->where( "date_to > NOW()" );
		$this->db->group_by( 'industry' );
		return $this->db->get();
	}
	public final function update() {
		$i = $this->input;
		$id = $i->post( 'id' );
		$this->db->where( 'id', $id );
		$this->db->update( 'positions', getPostValuePair() );
	}
	public final function delete( $id ) {
		$this->db->where( 'id', $id );
		return $this->db->delete( 'positions' );
	}
	public final function archive( $id, $state ) {
		$this->db->where( 'id', $id );
		return $this->db->update( 'positions', array('archived' => $state) );
	}
}
