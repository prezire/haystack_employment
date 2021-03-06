<?php
	class AnalyticsModel extends CI_Model
	{
		public function __construct() {
			parent::__construct();
		}
		public final function index() {
			//
		}
		public final function createEmailer() {
			$a = getPostValuePair( array( 'user_id' ) );
			$this->db->insert( 'analytics_saved_reports', $a );
			return $this->readEmailer( $this->db->insert_id() );
		}
		public final function readEmailer( $id ) {
			$this->db->where( 'id', $id );
			return $this->db->get_where( 'analytics_saved_reports' );
		}
		//Get all reports from a specific organization_id using role_name.
		public final function readSavedReportsByRoleName( $userId, $roleName ) {
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
			return $this->db->get( 'analytics_saved_reports' );
		}
		public final function deleteEmailer( $id ) {
			$this->db->where( 'id', $id );
			$this->db->delete( 'analytics_saved_reports' );
		}

		private final function saveExportedReport($postData)
		{
			$i = $this->input;
			$data = urldecode($postData);
			list($type, $data) = explode(';', $data);
			list(, $data) = explode(',', $data);
			$data = base64_encode($data);
			//TODO: Other post data params.
			$id = $i->post('id');
			$title = $i->post('title');
			$orgId = $i->post('organization_id');
			$s = $id . $title . $orgId;
			$filename = generateToken($s) . '.png';
			file_put_contents($filename, $data);
		}
		public final function readSendableReports($frequency = 'Daily') {
			$params = $_SERVER['argv'];
			$frequency = $params[3];
			$d = date('d', time());
			$this->db->select('*')->from('analytics_saved_reports');
			switch($frequency)
			{
				case 'Daily':
					$this->db->where('frequency', $frequency);
				break;
				case 'Weekly':
					if($d == 1 || $d == 7 || $d == 21)
					{
						$this->db->where('frequency', $frequency);
					}
				break;
				case 'Monthly':
					if($d == 30)
					{
						$this->db->where('frequency', $frequency);
					}
				break;
			}
			$o = $this->db->get();
			$records = $o->result();
			foreach ($records as $r)
			{
				//Generate file and save.
				$file = $this->saveExportedReport(sendReceivePostData(array()));
				$a = array('file_path' => $file);
				$this->db->where('id', $r->id)
						->update('analytics_saved_reports', $a);
			}
			return $o;
		}
		/*
			@param  $options  Array of the following items:
			 - frequency String  Daily (Default), Weekly, Monthly.
			 - geographic String  Country. Optional
			 - industry  String. Required. Default is null.
			 - from Date. Required. Default is today - 1.
			 - to Date. Required. Default is today.
		*/
		//@param 	$graphType		Refer to analytics.js under renderGraph().
		private final function getDataProviderAndParams
		(
			$queryResult, 
			$graphType = 'Line'
		)
		{
			$maximum = 0;
			foreach ($queryResult as $o) {
				$i = $o->value;
				if($i > $maximum) $maximum = $i;
			}
			$a = array
			(
				'provider' => $queryResult,
				'parameters' => array('maximum' => $maximum),
				'graphType' => $graphType
			);
			return $a;
		}
		private final function readPositionsClicks($params)
		{
			$f = $params['date_from'];
			$t = $params['date_to'];
			//Don't go down to Time level for Delivery.
			$r = $this->db->select
			(
				'DATE(pc.date_time_clicked) date, COUNT(pc.id) value'
			)->from('position_clicks pc')
				->join('positions p', 'pc.position_id = p.id')
				->join('employers e', 'p.employer_id = e.id')
				->join('users u', 'e.user_id = u.id')
				->join('employer_companies ec', 'e.id = ec.employer_id')
				->join('organizations o', 'o.id = ec.organization_id')
				->where('o.id', $params['organization_id'])
				->where('DATE(pc.date_time_clicked) >=', $f)
				->where('DATE(pc.date_time_clicked) <=', $t) //TODO: Change to where.
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
		private final function readPositionsImpressions($params)
		{
			$f = $params['date_from'];
			$t = $params['date_to'];
			$r = $this->db->select
			(
				'DATE(pi.date_time_viewed) date, COUNT(pi.id) value'
			)->from('position_impressions pi')
					->join('positions p', 'pi.position_id = p.id')
					->join('employers e', 'p.employer_id = e.id')
					->join('users u', 'e.user_id = u.id')
					->join('employer_companies ec', 'e.id = ec.employer_id')
					->join('organizations o', 'o.id = ec.organization_id')
					->where('o.id', $params['organization_id'])
					->where('DATE(pi.date_time_viewed) >=', $f)
					->where('DATE(pi.date_time_viewed) <=', $t)
					->group_by('DATE(pi.date_time_viewed)')
					->order_by('DATE(pi.date_time_viewed)', 'ASC')
					->get()->result();
			$a = $this->getDataProviderAndParams($r);
			return $a;
		}
		//BUG: Incorrect output.
		private final function readPositionsCtrs($params)
		{
			$f = $params['date_from'];
			$t = $params['date_to'];
			$s = "SELECT 
					DATE(pc.date_time_clicked) date, 
					(
						COUNT(pc.id)
						/
						(
							SELECT COUNT(pi.id) 
							FROM position_impressions pi 
							JOIN `positions` p ON `pi`.`position_id` = `p`.`id`
							JOIN `employers` e ON `p`.`employer_id` = `e`.`id`
							JOIN `users` u ON `e`.`user_id` = `u`.`id`
							JOIN `employer_companies` ec ON `e`.`id` = `ec`.`employer_id`
							JOIN `organizations` o ON `o`.`id` = `ec`.`organization_id`
							WHERE `o`.`id` =  '" . $params['organization_id'] . "'
							AND DATE(pi.date_time_viewed) >= DATE(pc.date_time_clicked)
							AND DATE(pi.date_time_viewed) <= DATE(pc.date_time_clicked)
							GROUP BY DATE(pi.date_time_viewed)
							ORDER BY DATE(pi.date_time_viewed) ASC
						) * 100 
					) value
				FROM (`position_clicks` pc)
				JOIN `positions` p ON `pc`.`position_id` = `p`.`id`
				JOIN `employers` e ON `p`.`employer_id` = `e`.`id`
				JOIN `users` u ON `e`.`user_id` = `u`.`id`
				JOIN `employer_companies` ec ON `e`.`id` = `ec`.`employer_id`
				JOIN `organizations` o ON `o`.`id` = `ec`.`organization_id`
				WHERE `o`.`id` =  '" . $params['organization_id'] . "'
				AND DATE(pc.date_time_clicked) >= '" . $f . "'
				AND DATE(pc.date_time_clicked) <= '" . $t . "'
				GROUP BY DATE(pc.date_time_clicked)
				ORDER BY DATE(pc.date_time_clicked) ASC";
			$r = $this->db->query($s)->result();
			$a = $this->getDataProviderAndParams($r);
			return $a;
		}
		private final function readPositionsDwells($params)
		{
			$f = $params['date_from'];
			$t = $params['date_to'];
			$r = $this->db->select('DATE(pd.date_time_created) date, SUM(pd.seconds) value')
					->from('position_dwells pd')
					->join('positions p', 'pd.position_id = p.id')
					->join('employers e', 'p.employer_id = e.id')
					->join('users u', 'e.user_id = u.id')
					->join('employer_companies ec', 'e.id = ec.employer_id')
					->join('organizations o', 'o.id = ec.organization_id')
					->where('o.id', $params['organization_id'])
					->where('DATE(pd.date_time_created) >=', $f)
					->or_where('DATE(pd.date_time_created) <=', $t)
					->group_by('DATE(pd.date_time_created)')
					->order_by('DATE(pd.date_time_created)', 'ASC')
					->get()->result();
			$a = $this->getDataProviderAndParams($r);
			return $a;
		}
		private final function readPositionsAvgDwellRates($params)
		{
			$f = $params['date_from'];
			$t = $params['date_to'];
			$s = "SELECT 
					DATE(pd.date_time_created) date,
					(
						(
							(
								SELECT COUNT(pi.id) 
								FROM position_impressions pi 
								JOIN `positions` p ON `pi`.`position_id` = `p`.`id`
								JOIN `employers` e ON `p`.`employer_id` = `e`.`id`
								JOIN `users` u ON `e`.`user_id` = `u`.`id`
								JOIN `employer_companies` ec ON `e`.`id` = `ec`.`employer_id`
								JOIN `organizations` o ON `o`.`id` = `ec`.`organization_id`
								WHERE `o`.`id` =  '" . $params['organization_id'] . "'
								AND DATE(pi.date_time_viewed) >= DATE(pd.date_time_created)
								AND DATE(pi.date_time_viewed) <= DATE(pd.date_time_created)
								GROUP BY DATE(pi.date_time_viewed)
								ORDER BY DATE(pi.date_time_viewed) ASC
							) 
							/
							AVG(pd.seconds)
						) * 100
					) value
					FROM (`position_dwells` pd)
					JOIN `positions` p ON `pd`.`position_id` = `p`.`id`
					JOIN `employers` e ON `p`.`employer_id` = `e`.`id`
					JOIN `users` u ON `e`.`user_id` = `u`.`id`
					JOIN `employer_companies` ec ON `e`.`id` = `ec`.`employer_id`
					JOIN `organizations` o ON `o`.`id` = `ec`.`organization_id`
					WHERE `o`.`id` =  '" . $params['organization_id'] . "'
					AND DATE(pd.date_time_created) >= '" . $f. "'
					AND DATE(pd.date_time_created) <= '" . $t . "'
					GROUP BY DATE(pd.date_time_created)
					ORDER BY DATE(pd.date_time_created) ASC";
			$r = $this->db->query($s)->result();
			$a = $this->getDataProviderAndParams($r);
			return $a;
		}
		private final function readPositionsConversions($params)
		{
			$f = $params['date_from'];
			$t = $params['date_to'];
			$s = "SELECT 
					DATE(pi.date_time_viewed) date, 
					(
						SELECT COUNT(pa.id)
						FROM (`position_applications` pa)
						JOIN `positions` p ON `pa`.`position_id` = `p`.`id`
						JOIN `employers` e ON `p`.`employer_id` = `e`.`id`
						JOIN `users` u ON `e`.`user_id` = `u`.`id`
						JOIN `employer_companies` ec ON `e`.`id` = `ec`.`employer_id`
						JOIN `organizations` o ON `o`.`id` = `ec`.`organization_id`
						WHERE `o`.`id` =  '" . $params['organization_id'] . "'
						AND DATE(pa.date_time_applied) >= DATE(pi.date_time_viewed)
						AND DATE(pa.date_time_applied) <= DATE(pi.date_time_viewed)
						GROUP BY DATE(pa.date_time_applied)
						ORDER BY DATE(pa.date_time_applied) ASC
					) value

					FROM (`position_impressions` pi)
					JOIN `positions` p ON `pi`.`position_id` = `p`.`id`
					JOIN `employers` e ON `p`.`employer_id` = `e`.`id`
					JOIN `users` u ON `e`.`user_id` = `u`.`id`
					JOIN `employer_companies` ec ON `e`.`id` = `ec`.`employer_id`
					JOIN `organizations` o ON `o`.`id` = `ec`.`organization_id`
					WHERE `o`.`id` =  '" . $params['organization_id'] . "'
					AND DATE(pi.date_time_viewed) >= '" . $f . "'
					AND DATE(pi.date_time_viewed) <= '" . $t . "'
					GROUP BY DATE(pi.date_time_viewed)
					ORDER BY DATE(pi.date_time_viewed) ASC";
			$r = $this->db->query($s)->result();
			$a = $this->getDataProviderAndParams($r);
			return $a;
		}
		private final function readPositionsConversionRates($params)
		{
			$f = $params['date_from'];
			$t = $params['date_to'];
			$s = "SELECT 
					DATE(pi.date_time_viewed) date, 
					(
						(
							(
								SELECT COUNT(pa.id) 
								FROM position_applications pa
								JOIN `positions` p ON `pa`.`position_id` = `p`.`id`
								JOIN `employers` e ON `p`.`employer_id` = `e`.`id`
								JOIN `users` u ON `e`.`user_id` = `u`.`id`
								JOIN `employer_companies` ec ON `e`.`id` = `ec`.`employer_id`
								JOIN `organizations` o ON `o`.`id` = `ec`.`organization_id`
								WHERE `o`.`id` =  '" . $params['organization_id'] . "'
								AND DATE(pa.date_time_applied) >= DATE(pi.date_time_viewed)
								AND DATE(pa.date_time_applied) <= DATE(pi.date_time_viewed)
								GROUP BY DATE(pa.date_time_applied)
								ORDER BY DATE(pa.date_time_applied) ASC
							)
							/ 
							COUNT(pi.id)
						) * 100
					) value
					FROM (`position_impressions` pi)
					JOIN `positions` p ON `pi`.`position_id` = `p`.`id`
					JOIN `employers` e ON `p`.`employer_id` = `e`.`id`
					JOIN `users` u ON `e`.`user_id` = `u`.`id`
					JOIN `employer_companies` ec ON `e`.`id` = `ec`.`employer_id`
					JOIN `organizations` o ON `o`.`id` = `ec`.`organization_id`
					WHERE `o`.`id` =  '" . $params['organization_id'] . "'
					AND DATE(pi.date_time_viewed) >= '" . $f . "'
					AND DATE(pi.date_time_viewed) <= '" . $t . "'
					GROUP BY DATE(pi.date_time_viewed)
					ORDER BY DATE(pi.date_time_viewed) ASC";
			$r = $this->db->query($s)->result();
			$a = $this->getDataProviderAndParams($r);
			return $a;
		}
		//
		private final function readPositionsUniqueClicks($params)
		{
			return $this->db->select('')
					->from('')
					->join('', '')
					->where('', '')
					->get();
		}
		private final function readPositionsUniqueImpressions($params)
		{
			return $this->db->select('')
					->from('')
					->join('', '')
					->where('', '')
					->get();
		}
		private final function readPositionsUniqueCtrs($params)
		{
			return $this->db->select('')
					->from('')
					->join('', '')
					->where('', '')
					->get();
		}
		private final function readPositionsUniqueDwellingApplicants($params)
		{
			return $this->db->select('')
					->from('')
					->join('', '')
					->where('', '')
					->get();
		}
		//
		private final function readPositionsEngagementDataByDays($params)
		{
			return $this->db->select('')
					->from('')
					->join('', '')
					->where('', '')
					->get();
		}
		private final function readApplicantEngagementDataByDays($params)
		{
			return $this->db->select('')
					->from('')
					->join('', '')
					->where('', '')
					->get();
		}
		//
		public final function readDelivery($params = array())
		{
			$data = null;
			switch($params['report_type'])
			{
				case 'Delivery':
					switch($params['metric'])
			        {
			          case 'Clicks':
			            $data = $this->readPositionsClicks($params);
			          break;
			          case 'Impressions':
			            $data = $this->readPositionsImpressions($params);
			          break;
			          case 'Click-Through Rates':
			            $data = $this->readPositionsCtrs($params);
			          break;
			          case 'Dwells':
			            $data = $this->readPositionsDwells($params);
			          break;
			          case 'Average Dwell Rates':
			            $data = $this->readPositionsAvgDwellRates($params);
			          break;
			          case 'Conversions':
			            $data = $this->readPositionsConversions($params);
			          break;
			          case 'Conversion Rates':
			            $data = $this->readPositionsConversionRates($params);
			          break;
			        }
			    break;
			    case 'Unique':
			    	switch($params['metric'])
			        {
			          case 'Clicks':
			            $data = $this->readPositionsUniqueClicks($params);
			          break;
			          case 'Impressions':
			            $data = $this->readPositionsUniqueImpressions($params);
			          break;
			          case 'Click-Through Rates':
			            $data = $this->readPositionsUniqueCtrs($params);
			          break;
			          case 'Dwelling Applicants':
			            $data = $this->readPositionsDwellingApplicants($params);
			          break;
			        }
			    break;
	        }
	        return $data;
		}
		public final function readEngagement($params = array())
		{
			switch($params['metric'])
			{
				case 'Engagement Data By Days':
					$data = $this->readPositionsEngagementDataByDays($params);
				break;
			}
			return $data;
		}
		public final function readFrequencyPerformance($params = array())
		{
			switch($params['metric'])
	        {
	          case 'Frequency Performance Dwells':
	            $data = $this->readPositionsFrequencyPerformanceDwells($params);
	          break;
	          case 'Frequency Performance Click-Through Rates':
	            $data = $this->readPositionsFrequencyPerformanceCtrs($params);
	          break;
	          case 'Frequency Performance Impressions':
	            $data = $this->readPositionsFrequencyPerformanceImpressions($params);
	          break;
	          case 'Frequency Performance Unique Frequency Levels':
	            $data = $this->readPositionsFrequencyPerformanceUniqueFrequencyLevels($params);
	          break;
	          case 'Frequency Performance Total Impressions':
	            $data = $this->readPositionsFrequencyPerformanceTotalImpressionsFrequencies($params);
	          break;
	          case 'Frequency Performance Conversion Rate':
	            $data = $this->readPositionsFrequencyPerformanceConversionRatesFrequencies($params);
	          break;
	        }
		}
	}