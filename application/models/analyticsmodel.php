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
	private final function readPositionsClicks()
	{
		return $this->db->select('')
				->from('')
				->join('', '')
				->where('', '')
				->get();
	}
	private final function readPositionsImpressions()
	{
		return $this->db->select('')
				->from('')
				->join('', '')
				->where('', '')
				->get();
	}
	private final function readPositionsCtrs()
	{
		return $this->db->select('')
				->from('')
				->join('', '')
				->where('', '')
				->get();
	}
	private final function readPositionsDwells()
	{
		return $this->db->select('')
				->from('')
				->join('', '')
				->where('', '')
				->get();
	}
	private final function readPositionsDwellRates()
	{
		return $this->db->select('')
				->from('')
				->join('', '')
				->where('', '')
				->get();
	}
	private final function readPositionsConversions()
	{
		return $this->db->select('')
				->from('')
				->join('', '')
				->where('', '')
				->get();
	}
	private final function readPositionsConversionRates()
	{
		return $this->db->select('')
				->from('')
				->join('', '')
				->where('', '')
				->get();
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
            $data = $this->readPositionsClicks($bGeographic);
          break;
          case 'Impressions':
            $data = $this->readPositionsImpressions($bGeographic);
          break;
          case 'Click-Through Rates':
            $data = $this->readPositionsCtrs($bGeographic);
          break;
          case 'Dwells':
            $data = $this->readPositionsDwells($bGeographic);
          break;
          case 'Average Dwell Rates':
            $data = $this->readPositionsDwellRates($bGeographic);
          break;
          case 'Conversions':
            $data = $this->readPositionsConversions($bGeographic);
          break;
          case 'Conversion Rates':
            $data = $this->readPositionsConversionRates($bGeographic);
          break;
        }
        return $data;
	}
	public final function readUnique($metric, $isGeographic = false)
	{
		switch($metric)
		{
			case 'Unique Clicks':
	            $data = $this->readPositionsUniqueClicks($bGeographic);
			break;
			case 'Unique Dwelling Applicants':
				$data = $this->readPositionsUniqueDwellingApplicants($bGeographic);
			break;
			case 'Unique Dwelling Frequencies':
				$data = $this->readPositionsUniqueDwellingFrequencies($bGeographic);
			break;
		}
		return $data;
	}
	public final function readEngagement($metric, $isGeographic = false)
	{
		switch($metric)
		{
			case 'Engagement Data By Days':
				$data = $this->readPositionsEngagementDataByDays($bGeographic);
			break;
		}
		return $data;
	}
	public final function readFrequencyPerformance($metric, $isGeographic = false)
	{
		switch($metric)
        {
          case 'Frequency Performance Dwells':
            $data = $this->readPositionsFrequencyPerformanceDwells($bGeographic);
          break;
          case 'Frequency Performance Click-Through Rates':
            $data = $this->readPositionsFrequencyPerformanceCtrs($bGeographic);
          break;
          case 'Frequency Performance Impressions':
            $data = $this->readPositionsFrequencyPerformanceImpressions($bGeographic);
          break;
          case 'Frequency Performance Unique Frequency Levels':
            $data = $this->readPositionsFrequencyPerformanceUniqueFrequencyLevels($bGeographic);
          break;
          case 'Frequency Performance Total Impressions':
            $data = $this->readPositionsFrequencyPerformanceTotalImpressionsFrequencies($bGeographic);
          break;
          case 'Frequency Performance Conversion Rate':
            $data = $this->readPositionsFrequencyPerformanceConversionRatesFrequencies($bGeographic);
          break;
        }
	}
	//Employer Metrices. Refer to analytics_helper
	//for definitions.
	public final function readDelivery(
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
	}
}
