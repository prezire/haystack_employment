<?php
class CompanyModel extends CI_Model
{
	public function __construct() {
		parent::__construct();
	}
	public final function index() {
		//
	}
	public final function create() {
		$i = $this->input;
		//
	}
	public final function readByEmployerId( $employerId ) {
		$this->db->select
		(
			'*, u.id user_id, ' .
			'o.id organization_id, ' .
			'o.name company_name, ' .
			'o.description company_description,' .
			'o.logo_filename company_logo_filename, ' .
			'o.email company_email, ' .
			'o.website company_website, ' .
			'o.landline company_landline, ' .
			'o.mobile company_mobile, ' .
			'o.fax company_fax, ' .
			'o.address company_address, ' .
			'o.city company_city, ' .
			'o.state company_state, ' .
			'o.zip_code company_zip_code, ' .
			'o.country company_country'
		);
		$this->db->from( 'organizations o' );
		$this->db->join( 'employer_companies ec', 'ec.organization_id = o.id' );
		$this->db->join( 'employers e', 'e.id = ec.employer_id' );
		$this->db->join( 'users u', 'u.id = e.user_id' );
		$this->db->where( 'e.id', $employerId );
		return $this->db->get();
	}
	public final function readByFacultyId( $facultyId ) {
		$this->db->select
		(
			'*, u.id user_id, ' .
			'o.id organization_id, ' .
			'o.name company_name, ' .
			'o.description company_description,' .
			'o.logo_filename company_logo_filename, ' .
			'o.email company_email, ' .
			'o.website company_website, ' .
			'o.landline company_landline, ' .
			'o.mobile company_mobile, ' .
			'o.fax company_fax, ' .
			'o.address company_address, ' .
			'o.city company_city, ' .
			'o.state company_state, ' .
			'o.zip_code company_zip_code, ' .
			'o.country company_country'
		);
		$this->db->from( 'organizations o' );
		$this->db->join( 'employer_companies ec', 'ec.organization_id = o.id' );
		$this->db->join( 'faculties f', 'f.id = ec.employer_id' );
		$this->db->join( 'users u', 'u.id = f.user_id' );
		$this->db->where( 'f.id', $facultyId );
		return $this->db->get();
	}
	public final function read( $id ) {
		return $this->db->get_where
		(
			'companies',
			array( 'id' => $id )
		);
	}
	public final function updateFromEmployerProfile() {
		$i = $this->input;
		$id = $i->post( 'id' );
		$a = getPostValuePair( array( 'id', 'user_id' ) );
		$logo = upload('logo_filename');
		if(isset($logo))
		{
			$a['logo_filename'] = $logo['file_name'];
			$a['logo_original_filename'] = $logo['orig_name'];
		}
		$this->db->where('id', $id);
		$this->db->update( 'organizations', $a );
	}
	public final function update() {
		$i = $this->input;
		$id = $i->post( 'id' );
		$this->db->where( 'id', $id );
		$this->db->update
		(
			'companies',
			getPostValuePair()
		);
	}
	public final function delete( $id ) {
		$this->db->where( 'id', $id );
		return $this->db->delete( 'companies' );
	}
}
