<?php
	function getPositionCategories() {
		$a = array
		(
			'Full-Time' => 'Full-Time',
			'Part-Time' => 'Part-Time',
			'Internship' => 'Internship'
		);
		return $a;
	}
	function getShiftPatterns() {
		$a = array
		(
			'No Shift' => 'No Shift',
			'2 Shift' => '2 Shift',
			'Night Shift' => 'Night Shift',
			'3 Shift or Semi Continuous (8 hour shifts, averaging 40 hours per week)' => '3 Shift or Semi Continuous (8 hour shifts, averaging 40 hours per week)',
			'Staggered days' => 'Staggered days',
			'Twilight or Evening Shift' => 'Twilight or Evening Shift',
			'Regular 4-on 4 off' => 'Regular 4-on 4 off',
			'Continentals (4-team, 8-hour or 12-hour patterns, averaging 42 hours per week)' => 'Continentals (4-team, 8-hour or 12-hour patterns, averaging 42 hours per week)',
			'Weekend shifts' => 'Weekend shifts'

		);
		return $a;
	}
	function getIndustries()
  {
    $a = array
    (
      'Accounting / Auditing / Taxation' =>	'Accounting / Auditing / Taxation',
      'Admin / Secretarial' => 'Admin / Secretarial',
      'Advertising / Media' => 'Advertising / Media',
      'Architecture / Interior Design' => 'Architecture / Interior Design',
      'Banking and Finance' => 'Banking and Finance',
      'Building and Construction' => 'Building and Construction',
      'Consulting' => 'Consulting',
      'Customer Service' => 'Customer Service',
      'Design' => 'Design',
      'Education and Training' => 'Education and Training',
      'Engineering' => 'Engineering',
      'Entertainment' => 'Entertainment',
      'Environment / Health' => 'Environment / Health',
      'Events / Promotions' => 'Events / Promotions',
      'F&B' => 'F&B',
      'General Management' => 'General Management',
      'General Work' => 'General Work',
      'Healthcare / Pharmaceutical' => 'Healthcare / Pharmaceutical',
      'Hospitality' => 'Hospitality',
      'Human Resources' => 'Human Resources',
      'Information Technology' => 'Information Technology',
      'Insurance' => 'Insurance',
      'Legal' => 'Legal',
      'Logistics / Supply Chain' => 'Logistics / Supply Chain',
      'Manufacturing' => 'Manufacturing',
      'Marketing / Public Relations' => 'Marketing / Public Relations',
      'Medical / Therapy Services' => 'Medical / Therapy Services',
      'Others' => 'Others',
      'Professional Services' => 'Professional Services',
      'Public / Civil Service' => 'Public / Civil Service',
      'Purchasing / Merchandising' => 'Purchasing / Merchandising',
      'Real Estate / Property Management' => 'Real Estate / Property Management',
      'Repair and Maintenance' => 'Repair and Maintenance',
      'Risk Management' => 'Risk Management',
      'Sales / Retail' => 'Sales / Retail',
      'Sciences / Laboratory / R&D' => 'Sciences / Laboratory / R&D',
      'Security and Investigation' => 'Security and Investigation',
      'Social Services' => 'Social Services',
      'Telecommunications' => 'Telecommunications',
      'Travel / Tourism'	=> 'Travel / Tourism'
    );
    return $a;
  }
  function getApplicationStatuses()
  {
    $CI = get_instance();
    $CI->load->model('applicationstatusmodel');
    $stats = $CI->applicationstatusmodel->index()->result();
    $a = array();
    foreach($stats as $t)
    {
      $s = $t->name;
      $a[$s] = $s;
    }
    return $a;
  }