<?php
	/*
		Employer:
		    Delivery: 
		      -Detect over/under delivery
		      - Metrices:
		        - Clicks = Views the entire details from the listing
		        - Impressions = Seen from the listing
		        - Click-Through Rates = % of Total Clicks out of Served Impressions 
		        - Dwells = The number of seconds an applicant is looking at the
		          entire details
		        - Average Dwell Rates = The average time all applicants spent
		         engaging with the Posting???
		        - Conversions = Position Applications
		        - Conversion Rates = % Position Applications out of served Impressions
		    Unique:
		      - Displays data about unique Applicants and their interactivity 
		      with your ads
		      - Use this report to analyze audience behavior across 
		      various interactions
		      - Metrices:
		        - Clicks = 
		        - Dwelling Applicants = 
		        - Average Frequencies = The average number of times a user was 
		        exposed to the Posting
		  	Engagement:
		  		- Metrices:
					- Data By Days = Use this graph to see which days performed best 
					for all the metrices above
			Performance Frequency:
				- Frequency – the number of times a user was exposed to an ad
				- Displays data for ad performance based on exposure to the ad
				- Metrices:
					- Dwells
					- CTRs
					- Impressions = The number of Applicants who saw a Posting 
					at least the number of times indicated by the frequency. 
					Or the total number of impressions served for an 
					indicated frequency
					- Unique Frequency Levels = The number of unique Applicants 
					who reached the indicated frequency of viewed impressions
					- Total Impressions Frequencies = The sum of impressions 
					viewed up to the indicated frequency for all Applicants
					- Total Conversions to Frequency = The sum of conversions 
					recorded up to the indicated frequency for all Applicants
					- Conversion Rate Frequency = The percent of 
					"Total Conversions to Frequency" out of 
					"Total Impressions to Frequency
  */
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
		      	'Dwelling Applicants' => 'Dwelling Applicants', 
		      	'Average Frequencies' => 'Average Frequencies'
		      ),
	      'Engagement' => array
		   		(
		    		'Data By Days' => 'Data By Days'
				),
	      'Frequency Performance' => array
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
          'Employability'
        );
      break;
      case 'Applicant':
        //
      break;
    }
    return $a[$fieldName];
  }
  //Y-Axis.
  function getAnalyticsSeries()
  {
  	return array('Person' => 'Person', 'Geographic' => 'Geographic');
  }