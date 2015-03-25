<?php
  //Report Types.
  function getAnalyticsFields($roleName)
  {
  	switch($roleName)
  	{
  		case 'Employer':
  			$a = array
  			(
  				'Delivery' => 'Delivery',
  				'Unique' => 'Unique',
  				'Engagement' => 'Engagement',
  				'Performance Frequency' => 'Performance Frequency'
  			);
  		break;
  		case 'Faculty':
  			$a = array('Empoyability');
  		break;
  		case 'Applicant':
  			//
  		break;
  	}
  	return $a;
  }
  function getAnalyticsFieldMetrices($roleName, $fieldName)
  {
    switch($roleName)
    {
      case 'Employer':
        $a = array
	    (
	      'Delivery' => array
		      (
		      	'Clicks' => 'Clicks', 
		      	'Impressions' => 'Impressions', 
		      	'Click-Through Rates' => 'Click-Through Rates', 
		      	'Dwells' => 'Dwells', 
		      	'Average Dwell Rates' => 'Average Dwell Rates',
		      	'Conversions' => 'Conversions',
		      	'Conversion Rates' => 'Conversion Rates'
		      ),
	      'Unique' => array
		      (
		      	'Clicks' => 'Clicks',
            'Impressions' => 'Impressions',
		      	'Dwelling Applicants' => 'Dwelling Applicants', 
		      	'Average Frequencies' => 'Average Frequencies'
		      ),
	      'Engagement' => array
		   		(
		    		'Data By Days' => 'Data By Days'
				  ),
	      'Performance Frequency' => array
		      (
		      	'Dwells' => 'Dwells', 
		      	'Click-Through Rates' => 'Click-Through Rates', 
		      	'Impressions' => 'Impressions', 
		      	'Unique Frequency Levels' => 'Unique Frequency Levels', 
		      	'Total Impressions Frequencies' => 'Total Impressions Frequencies', 
		      	'Conversion Rate Frequencies' => 'Conversion Rate Frequencies'
		      )
	    );
      break;
      case 'Faculty':
        $a = array
        (
          'Employability',
          'Industry'
        );
      break;
      case 'Applicant':
        $a = array
        (
          ''
        );
      break;
    }
    return $a[urldecode($fieldName)];
  }
  //Y-Axis, Target Audiences.
  function getAnalyticsSeries()
  {
  	return array('Person' => 'Person', 'Geographic' => 'Geographic');
  }