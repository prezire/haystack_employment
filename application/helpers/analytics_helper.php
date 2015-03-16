<?php
	/*
		Employer:
		    Delivery: 
		      -Detect over/under delivery
		      - Metrices:
		        - Clicks = Views the entire details from the listing
		        - Impressions = Seen from the listing
		        - Click-Through Rate = % of Total Clicks out of Served Impressions 
		        - Dwell = The number of seconds an applicant is looking at the
		          entire details
		        - Average Dwell Rate = The average time all applicants spent
		         engaging with the Posting???
		    Unique:
		      - Displays data about unique Applicants and their interactivity 
		      with your ads
		      - Use this report to analyze audience behavior across 
		      various interactions
		      - Metrices:
		        - Clicks = 
		        - Dwelling Applicants = 
		        - Average Frequency = The average number of times a user was 
		        exposed to the Posting
		  	Engagement:
		  		- Metrices:
					- Data By Day = Use this graph to see which days performed best 
					for all the metrices above
			Performance Frequency:
				- Frequency – the number of times a user was exposed to an ad
				- Displays data for ad performance based on exposure to the ad
				- Metrices:
					- Dwell
					- CTR
					- Impressions = The number of Applicants who saw a Posting 
					at least the number of times indicated by the frequency. 
					Or the total number of impressions served for an 
					indicated frequency
					- Unique Frequency Level = The number of unique Applicants 
					who reached the indicated frequency of viewed impressions
					- Total Impressions Frequency = The sum of impressions 
					viewed up to the indicated frequency for all Applicants
					- Total Conversions to Frequency = The sum of conversions 
					recorded up to the indicated frequency for all Applicants
					- Conversion Rate Frequency = The percent of 
					"Total Conversions to Frequency" out of 
					"Total Impressions to Frequency
  */
  function getAnalyticsReportTypes($userType)
  {
    switch($userType)
    {
      case 'Employer':
        $a = array
	    (
	      'Delivery' => array
		      (
		      	'Clicks', 
		      	'Impressions', 
		      	'Click-Through Rate', 
		      	'Dwell', 
		      	'Average Dwell Rate'
		      ),
	      'Unique' => array
		      (
		      	'Clicks', 
		      	'Dwelling Applicants', 
		      	'Average Frequency'
		      ),
	      'Engagement' => array
		   		(
		    		'Data By Day'
				),
	      'Frequency Performance' => array
		      (
		      	'Dwell', 
		      	'Click-Through Rate', 
		      	'Impressions', 
		      	'Unique Frequency Level', 
		      	'Total Impressions Frequency', 
		      	'Conversion Rate Frequency'
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
    return $a;
  }