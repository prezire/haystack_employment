<?php
	class AnalyticsModel extends CI_Model
	{
		public function __construct() {
			parent::__construct();
		}
		public final function index() {
			//
		}
		public final function email() {
			//CRON?
		}
		public final function createEmailer() {
			$a = getPostValuePair( array( 'user_id' ) );
			$this->db->insert( 'analytics_report_emailers', $a );
			return $this->readEmailer( $this->db->insert_id() );
		}
		public final function readEmailer( $id ) {
			$this->db->where( 'id', $id );
			return $this->db->get_where( 'analytics_report_emailers' );
		}
		//Get all reports from a specific organization_id using role_name.
		public final function readEmailersByRoleName( $userId, $roleName ) {
			$orgId = null;
			switch ( $roleName ) {
			case 'Employer':
				$this->load->model( 'employermodel' );
				$emplId = $this->employermodel->readByUserId( $userId )->row()->id;
				$this->db->where( 'employer_id', $emplId );
				$orgId = $this->db->get( 'employer_companies' )->row()->organization_id;
				break;
			case 'Faculty':
				$this->load->model( 'facultymodel' );
				$facId = $this->facultymodel->readByUserId( $userId )->row()->id;
				$this->db->where( 'faculty_id', $facId );
				$orgId = $this->db->get( 'faculty_schools' )->row()->organization_id;
				break;
			}
			$this->db->where( 'organization_id', $orgId );
			return $this->db->get( 'analytics_report_emailers' );
		}
		public final function deleteEmailer( $id ) {
			$this->db->where( 'id', $id );
			$this->db->delete( 'analytics_report_emailers' );
		}
		/*
				@param  $options  Array of the following items:
				 - frequency String  Daily (Default), Weekly, Monthly.
				 - geographic String  Country. Optional
				 - industry  String. Required. Default is null.
				 - from Date. Required. Default is today - 1.
				 - to Date. Required. Default is today.
			*/
		public final function generate( $options ) {$o = $options;}
		//
		private final function getDataProviderAndParams($queryResult)
		{
			$maximum = 0;
			foreach ($queryResult as $o) {
				$i = $o->value;
				if($i > $maximum) $maximum = $i;
			}
			$a = array
			(
				'provider' => $queryResult,
				'parameters' => array('maximum' => $maximum)
			);
			return $a;
		}
		private final function readPositionsClicks($isGeographic)
		{
			$i = $this->input;
			$f = $i->post('date_from');
			$t = $i->post('date_to');
			//Don't go down to Time level for Delivery.
			$r = $this->db->select('DATE(pc.date_time_clicked) date, COUNT(pc.id) value')
					->from('position_clicks pc')
					->join('positions p', 'pc.position_id = p.id')
					//TODO: Change employer comparison to organization.
					->join('employers e', 'p.employer_id = e.id')
					->join('users u', 'e.user_id = u.id')
					->where('DATE(pc.date_time_clicked) >=', $f)
					->or_where('DATE(pc.date_time_clicked) <=', $t)
					->group_by('DATE(pc.date_time_clicked)')
					->order_by('DATE(pc.date_time_clicked)', 'ASC')
					->get()->result();
			$a = $this->getDataProviderAndParams($r);
			/*
				//For Unique Clicks...
				//Format for Area Stack graph.
				$a = array();
				foreach ($r as $o) {
					$tmp = array
					(
						'date' => $o->date,
						$o->name => $o->value
					);
					array_push($a, $tmp);
				}
			*/
			return $a;
		}
		private final function readPositionsImpressions()
		{
			$i = $this->input;
			$f = $i->post('date_from');
			$t = $i->post('date_to');
			$r = $this->db->select('DATE(pi.date_time_viewed) date, COUNT(pi.id) value')
					->from('position_impressions pi')
					->join('positions p', 'pi.position_id = p.id')
					->join('employers e', 'p.employer_id = e.id')
					->join('users u', 'e.user_id = u.id')
					->where('DATE(pi.date_time_viewed) >=', $f)
					->or_where('DATE(pi.date_time_viewed) <=', $t)
					->group_by('DATE(pi.date_time_viewed)')
					->order_by('DATE(pi.date_time_viewed)', 'ASC')
					->get()->result();
			$a = $this->getDataProviderAndParams($r);
			return $a;
		}
		private final function readPositionsCtrs()
		{
			/*
				
				SELECT (((SELECT sum(id) FROM position_clicks WHERE position_id = p.id) / (SELECT SUM(id) FROM position_impressions WHERE position_id = p.id)) * 100) average, p.id, p.name
				FROM position_clicks pc
				INNER JOIN position_impressions pi ON pc.position_id = pi.position_id
				RIGHT JOIN positions p ON pc.position_id = p.id
				GROUP BY p.id
				ORDER BY average DESC
			*/
			//KLUDGE: Not sure if output is correct.
			$r = $this->db->select('DATE(pc.date_time_clicked) date, (((SELECT sum(id) FROM position_clicks WHERE position_id = pi.position_id) / (SELECT SUM(id) FROM position_impressions WHERE position_id = pc.position_id)) * 100) value')
				->from('position_clicks pc')
				->join('position_impressions pi', 'pc.position_id = pi.position_id')
				->group_by('DATE(pc.date_time_clicked)')
				->order_by('DATE(pc.date_time_clicked)', 'ASC')
				->get()->result();
			$a = $this->getDataProviderAndParams($r);
			return $a;
		}
		private final function readPositionsDwells()
		{
			$i = $this->input;
			$f = $i->post('date_from');
			$t = $i->post('date_to');
			$r = $this->db->select('DATE(pd.date_time_created) date, SUM(pd.seconds) value')
					->from('position_dwells pd')
					->join('positions p', 'pd.position_id = p.id')
					->join('employers e', 'p.employer_id = e.id')
					->join('users u', 'e.user_id = u.id')
					->where('DATE(pd.date_time_created) >=', $f)
					->or_where('DATE(pd.date_time_created) <=', $t)
					->group_by('DATE(pd.date_time_created)')
					->order_by('DATE(pd.date_time_created)', 'ASC')
					->get()->result();
			$a = $this->getDataProviderAndParams($r);
			return $a;
		}
		private final function readPositionsAvgDwellRates()
		{
			return $this->db->select('')
					->from('')
					->join('', '')
					->where('', '')
					->get();
		}
		private final function readPositionsConversions()
		{
			$i = $this->input;
			$f = $i->post('date_from');
			$t = $i->post('date_to');
			$r = $this->db->select
					(
						'DATE(pa.date_time_applied) date, ' . 
						'SUM(pa.id) value'
					)
					->from('position_applications pa')
					->join('positions p', 'pa.position_id = p.id')
					->join('employers e', 'p.employer_id = e.id')
					->join('users u', 'e.user_id = u.id')
					->where('DATE(pa.date_time_applied) >=', $f)
					->or_where('DATE(pa.date_time_applied) <=', $t)
					->group_by('DATE(pa.date_time_applied)')
					->order_by('DATE(pa.date_time_applied)', 'ASC')
					->get()->result();
			$a = $this->getDataProviderAndParams($r);
			return $a;
		}
		private final function readPositionsConversionRates()
		{
			$i = $this->input;
			$f = $i->post('date_from');
			$t = $i->post('date_to');
			$r = $this->db->select
					(
						'DATE(pa.date_time_applied) date, ' . 
						'COUNT(pa.id) value'
					)
					->from('position_applications pa')
					->join('positions p', 'pa.position_id = p.id')
					->join('employers e', 'p.employer_id = e.id')
					->join('users u', 'e.user_id = u.id')
					->where('DATE(pa.date_time_applied) >=', $f)
					->or_where('DATE(pa.date_time_applied) <=', $t)
					->group_by('DATE(pa.date_time_applied)')
					->order_by('DATE(pa.date_time_applied)', 'ASC')
					->get()->result();
			$a = $this->getDataProviderAndParams($r);
			return $a;
		}
		//
		private final function readPositionsUniqueClicks()
		{
			return $this->db->select('')
					->from('')
					->join('', '')
					->where('', '')
					->get();
		}
		private final function readPositionsUniqueDwellingApplicants()
		{
			return $this->db->select('')
					->from('')
					->join('', '')
					->where('', '')
					->get();
		}
		private final function readPositionsUniqueDwellingFrequencies()
		{
			return $this->db->select('')
					->from('')
					->join('', '')
					->where('', '')
					->get();
		}
		//
		private final function readPositionsEngagementDataByDays()
		{
			return $this->db->select('')
					->from('')
					->join('', '')
					->where('', '')
					->get();
		}
		//
		private final function readPositionsFrequencyPerformanceDwells()
		{
			return $this->db->select('')
					->from('')
					->join('', '')
					->where('', '')
					->get();
		}
		private final function readPositionsFrequencyPerformanceCtrs()
		{
			return $this->db->select('')
					->from('')
					->join('', '')
					->where('', '')
					->get();
		}
		private final function readPositionsFrequencyPerformanceImpressions()
		{
			return $this->db->select('')
					->from('')
					->join('', '')
					->where('', '')
					->get();
		}
		private final function readPositionsFrequencyPerformanceUniqueFrequencyLevels()
		{
			return $this->db->select('')
					->from('')
					->join('', '')
					->where('', '')
					->get();
		}
		private final function readPositionsFrequencyPerformanceTotalImpressionsFrequencies()
		{
			return $this->db->select('')
					->from('')
					->join('', '')
					->where('', '')
					->get();
		}
		private final function readPositionsFrequencyPerformanceConversionRatesFrequencies()
		{
			return $this->db->select('')
					->from('')
					->join('', '')
					->where('', '')
					->get();
		}
		//
		public final function readDelivery($metric, $isGeographic = false)
		{
			switch($metric)
	        {
	          case 'Clicks':
	            $data = $this->readPositionsClicks($isGeographic);
	          break;
	          case 'Impressions':
	            $data = $this->readPositionsImpressions($isGeographic);
	          break;
	          case 'Click-Through Rates':
	            $data = $this->readPositionsCtrs($isGeographic);
	          break;
	          case 'Dwells':
	            $data = $this->readPositionsDwells($isGeographic);
	          break;
	          case 'Average Dwell Rates':
	            $data = $this->readPositionsAvgDwellRates($isGeographic);
	          break;
	          case 'Conversions':
	            $data = $this->readPositionsConversions($isGeographic);
	          break;
	          case 'Conversion Rates':
	            $data = $this->readPositionsConversionRates($isGeographic);
	          break;
	        }
	        return $data;
		}
		public final function readUnique($metric, $isGeographic = false)
		{
			switch($metric)
			{
				case 'Unique Clicks':
		            $data = $this->readPositionsUniqueClicks($isGeographic);
				break;
				case 'Unique Dwelling Applicants':
					$data = $this->readPositionsUniqueDwellingApplicants($isGeographic);
				break;
				case 'Unique Dwelling Frequencies':
					$data = $this->readPositionsUniqueDwellingFrequencies($isGeographic);
				break;
			}
			return $data;
		}
		public final function readEngagement($metric, $isGeographic = false)
		{
			switch($metric)
			{
				case 'Engagement Data By Days':
					$data = $this->readPositionsEngagementDataByDays($isGeographic);
				break;
			}
			return $data;
		}
		public final function readFrequencyPerformance($metric, $isGeographic = false)
		{
			switch($metric)
	        {
	          case 'Frequency Performance Dwells':
	            $data = $this->readPositionsFrequencyPerformanceDwells($isGeographic);
	          break;
	          case 'Frequency Performance Click-Through Rates':
	            $data = $this->readPositionsFrequencyPerformanceCtrs($isGeographic);
	          break;
	          case 'Frequency Performance Impressions':
	            $data = $this->readPositionsFrequencyPerformanceImpressions($isGeographic);
	          break;
	          case 'Frequency Performance Unique Frequency Levels':
	            $data = $this->readPositionsFrequencyPerformanceUniqueFrequencyLevels($isGeographic);
	          break;
	          case 'Frequency Performance Total Impressions':
	            $data = $this->readPositionsFrequencyPerformanceTotalImpressionsFrequencies($isGeographic);
	          break;
	          case 'Frequency Performance Conversion Rate':
	            $data = $this->readPositionsFrequencyPerformanceConversionRatesFrequencies($isGeographic);
	          break;
	        }
		}
		//Employer Metrices. Refer to analytics_helper
		//for definitions.
		/*public final function readDelivery(
			$employerId,
			$metric,
			$dateFrom,
			$dateTo
		) {
			//TODO: Decode %20.
			$dates = array( $dateFrom, $dateTo );
			$this->load->model( 'positionmodel' );
			$positions = $this->positionmodel->readByEmployerId( $employerId )->result();
			$a = array();
			foreach ( $positions as $p ) {
				array_push( $a, $p->id );
			}
			switch ( $metric ) {
			case 'Clicks':
				return $this->db->select( 'id' )
				->from( 'position_clicks' )
				->where_in( 'date_time_clicked', $dates )
				->where_in( 'id', $a )
				->count_all_results();
				break;
			case 'Impressions':
				return $this->db->select( 'id' )
				->from( 'position_impressions' )
				->where_in( 'date_time_viewed', $dates )
				->where_in( 'id', $a )
				->count_all_results();
				break;
			case 'Click-Through Rates':
				$clicks = $this->db->select( 'id' )
				->from( 'position_clicks' )
				->where_in( 'date_time_clicked', $dates )
				->where_in( 'id', $a )
				->count_all_results();
				//
				$imps = $this->db->select( 'id' )
				->from( 'position_impressions' )
				->where_in( 'date_time_viewed', $dates )
				->where_in( 'id', $a )
				->count_all_results();
				//
				return ($clicks / $imps) * 100;
				break;
			case 'Dwells':
				return $this->db->select( 'SUM(seconds)' )
				->from( 'position_dwells' )
				->where_in( 'date_time_created', $dates )
				->where_in( 'id', $a )
				->get();
				break;
			case 'Average Dwell Rates';
				//
			break;
			}
		}
		public final function readUnique(
			$employerId,
			$metric,
			$dateFrom,
			$dateTo
		) {
			switch ( $metric ) {
			case 'Clicks':
				break;
			case 'Dwelling Applicants':
				break;
			case 'Average Frequencies':
				break;
			}
		}
		public final function readEngagement(
			$employerId,
			$metric,
			$dateFrom,
			$dateTo
		) {
			switch ( $metric ) {
			case 'Data By Day':
				break;
			}
		}
		public final function readPerformanceFrequency(
			$employerId,
			$metric,
			$dateFrom,
			$dateTo
		) {
			switch ( $metric ) {
			case 'Dwells':
				break;
			case 'Click-Through Rates':
				break;
			case 'Impressions':
				break;
			case 'Unique Frequency Levels':
				break;
			case 'Total Impressions Frequencies':
				break;
			case 'Total Conversions Frequencies':
				break;
			}
		}*/
	}