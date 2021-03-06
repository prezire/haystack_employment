<?php
	class PositionModel extends CI_Model
	{
		public function __construct() {
			parent::__construct();
		}
		public final function index( $limit = null, $page = 0 ) {
			$this->db->select( '*' );
			$this->db->from( 'positions' );
			$this->db->where( 'CURDATE() >= date_from' );
			$this->db->where( 'CURDATE() <= date_to' );
			$this->db->where( 'enabled > 0' );
			$this->db->where( 'vacancy_count > 0' );
			$this->db->where( 'archived < 1' );
			if ( $limit )
				$this->db->limit( $limit, $page );
			$o = $this->db->get();
			return $o;
		}
		public final function applicantHasApplied($id, $applicantId)
		{
			$i = $this->db->from('position_applications')
							->where('position_id', $id)
							->where('applicant_id', $applicantId)
							->count_all_results();
			return $i > 0;
		}
		public final function readBrowsablePositionsCount() {
			$this->db->where( 'CURDATE() >= date_from' );
			$this->db->where( 'CURDATE() <= date_to' );
			$this->db->where( 'enabled > 0' );
			$this->db->where( 'vacancy_count > 0' );
			$this->db->where( 'archived < 1' );
			$this->db->from( 'positions' );
			return $this->db->count_all_results();
		}
		public final function archives( $limit = null, $page = 0 ) {
			$a = array( 'archived > ' => 0 );
			if ( $limit )
				$this->db->limit( $limit, $page );
			return $this->db->get_where( 'positions', $a );
		}
		public final function readAllPositionsCount() {
			$this->db->where( 'archived <', 1 );
			$this->db->from( 'positions' );
			return $this->db->count_all_results();
		}
		public final function readAllArchivesCount() {
			$this->db->where( 'archived >', 0 );
			$this->db->from( 'positions' );
			return $this->db->count_all_results();
		}
		public final function readMyPosts( $limit = null, $page = 0 ) {
			$this->load->model( 'employermodel' );
			$uId = getLoggedUser()->id;
			$emplId = $this->employermodel->readByUserid( $uId )->row()->id;
			//$a = array( 'employer_id' => $emplId, 'archived <' => 1 );
			if ( $limit )
			{
				$this->db->limit( $limit, $page );
			}
			$this->db->where('employer_id', $emplId);
			$this->db->where('archived <', 1);
			$this->db->order_by('name', 'ASC');
			$positions = $this->db->get( 'positions' )->result();
			$aPositions = array();
			foreach ( $positions as $p ) {
				$this->db->select( '*, ast.name status_name, a.id applicant_id, pa.notes position_application_notes' )
				->from( 'position_applications pa' )
				->join( 'applicants a', 'pa.applicant_id = a.id' )
				->join( 'positions p', 'pa.position_id = p.id' )
				->join( 'users u', 'a.user_id = u.id' )
				->join( 'application_status ast', 'pa.application_status_id = ast.id' )
				->where( 'pa.position_id', $p->id );
				//TODO: Remove Pooled Applicants flow.
				$appls = $this->db->get()->result();
				$tmp = array( 'position' => $p, 'applicants' => $appls );
				array_push( $aPositions, $tmp );
			}
			return $aPositions;
		}
		public final function readByEmployerId( $employerId ) {
			return $this->db->get_where( 'positions', array( 'employer_id' => $employerId ) );
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
			$o = $this->read( $this->db->insert_id() );
			return $o;
		}
		public final function read( $id ) {
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
				'o.website company_website, ' . 
				'COUNT(pa.id) total_applications'
			);
			$this->db->from( 'positions p' );
			$this->db->join( 'employers e', 'p.employer_id = e.id' );
			$this->db->join( 'users u', 'u.id = e.user_id' );
			$this->db->join( 'employer_companies ec', 'e.id = ec.employer_id' );
			$this->db->join( 'organizations o', 'ec.organization_id = o.id' );
			$this->db->join('position_applications pa', 'p.id = pa.position_id', 'left');
			$this->db->where( 'p.id', $id );
			$o = $this->db->get();
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
			return $this->db->update( 'positions', array( 'archived' => $state ) );
		}
		//
		//Exclude biased reporting.
		function isRecordable()
		{
			$r = getRoleName();
			$bIsAdmin = $r == 'Administrator' || $r == 'Employer';
			return !$bIsAdmin;
		}
		public final function createImpression( $id ) {
			//TODO: Include loc address using IP.
			if($this->isRecordable())
			{
				$a = array
				(
					'position_id' => $id,
					'ip_address' => $this->input->ip_address()
				);
				if ( isLoggedIn() ) {
					$a['user_id'] = getLoggedUser()->id;
				}
				$this->db->insert( 'position_impressions', $a );
			}
		}
		public final function createClick( $id ) {
			if($this->isRecordable())
			{
				$a = array
				(
					'position_id' => $id,
					'date_time_clicked' => getDateTime(),
					'ip_address' => $this->input->ip_address()
				);
				if ( isLoggedIn() ) {
					$a['user_id'] = getLoggedUser()->id;
				}
				$this->db->insert( 'position_clicks', $a );
			}
		}
		public final function createDwell( $id, $seconds ) {
			if($this->isRecordable())
			{
				$a = array
				(
					'position_id' => $id,
					'date_time_created' => getDateTime(),
					'ip_address' => $this->input->ip_address(),
					'seconds' => $seconds
				);
				if ( isLoggedIn() ) {
					$a['user_id'] = getLoggedUser()->id;
				}
				$this->db->insert( 'position_dwells', $a );
			}
		}
	}