<?php
$config = array
(
	'contact' => array
	(
		array
		(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'required|xss_clean|is_unique[users.email]|trim|valid_email'
		),
		array
		(
			'field' => 'full_name',
			'label' => 'Full_name',
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'topic',
			'label' => 'Topic',
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'message',
			'label' => 'Message',
			'rules' => 'required|xss_clean|trim'
		)
	),
	'user/create' => array
	(
		array
		(
			'field' => '',
			'label' => '',
			'rules' => ''
		)
	),
  	'user/update' => array
	(
		array
		(
			'field' => '',
			'label' => '',
			'rules' => ''
		)
	),
	'member/create' => array
	(
		array
		(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'required|xss_clean|is_unique[users.email]|trim|valid_email'
		)
	),
	'member/update' => array
	(
		array
		(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'required|xss_clean|is_unique[users.email]|trim|valid_email'
		)
	),
  	'applicant/create' => array
	(
		array
		(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'required|xss_clean|is_unique[users.email]|trim|valid_email'
		),
		array
		(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'full_name',
			'label' => 'Full Name',
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'current_position_title',
			'label' => 'Current Position Title',
			'rules' => 'required|xss_clean|trim'
		)
	),
  	'applicant/update' => array
	(
		array
		(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'required|xss_clean|trim|valid_email'
		),
		array
		(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'full_name',
			'label' => 'Full Name',
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'current_position_title',
			'label' => 'Current Position Title',
			'rules' => 'required|xss_clean|trim'
		)
	),
	'pooledApplicant/update' => array
	(
		array
		(
			'field' => 'notes',
			'label' => 'Notes',
			'rules' => 'required|xss_clean|trim'
		)
	),
  	'employer/create' => array
	(
		array
		(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'required|xss_clean|is_unique[users.email]|trim|valid_email'
		),
		array
		(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'full_name',
			'label' => 'Full Name',
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'company_name',
			'label' => 'Company Name',
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'company_address',
			'label' => 'Company Address',
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'company_city',
			'label' => 'Company City',
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'company_country',
			'label' => 'Company Country',
			'rules' => 'required|xss_clean|trim'
		)
	),
  	'employer/update' => array
	(
		array
		(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'required|xss_clean|trim|valid_email'
		),
		array
		(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'full_name',
			'label' => 'Full Name',
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'organization_name',
			'label' => 'Organization Name',
			'rules' => 'required|xss_clean|trim'
		)
	),
	'faculty/create' => array
	(
		array
		(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'required|xss_clean|is_unique[users.email]|trim|valid_email'
		),
		array
		(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'full_name',
			'label' => 'Full Name',
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'school_name',
			'label' => 'School Name',
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'school_address',
			'label' => 'School Address',
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'school_city',
			'label' => 'School City',
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'school_country',
			'label' => 'School Country',
			'rules' => 'required|xss_clean|trim'
		)
	),
  	'faculty/update' => array
	(
		array
		(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'required|xss_clean|trim|valid_email'
		),
		array
		(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'full_name',
			'label' => 'Full Name',
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'organization_name',
			'label' => 'Organization Name',
			'rules' => 'required|xss_clean|trim'
		)
	),
	'workhistory/update' => array
	(
		array
		(
			'field' => 'position',
			'label' => 'Position',
			'rules' => ''
		)
	),
	'position/create' => array
	(
		array
		(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'date_from',
			'label' => 'Date From',
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'date_to',
			'label' => 'Date To',
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'industry',
			'label' => 'Industry',
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'category',
			'label' => 'Category',
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'shift_pattern',
			'label' => 'Shift Pattern',
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'salary',
			'label' => 'Salary',
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'working_hours',
			'label' => 'Working Hours',
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'vacancy_count',
			'label' => 'Vacancy Count',
			'rules' => 'required|xss_clean|trim'
		)
	),
  	'position/update' => array
	(
		array
		(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'date_from',
			'label' => 'Date From',
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'date_to',
			'label' => 'Date To',
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'working_hours',
			'label' => 'Working Hours',
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'vacancy_count',
			'label' => 'Vacancy Count',
			'rules' => 'required|xss_clean|trim'
		)
	),
  	'resume/update' => array
	(
		array
		(
			'field' => 'name',
			'label' => 'Name',
			'rules' => 'required|xss_clean|trim|min_length[1]'
		)
	),
	'resume/request' => array
	(
		array
		(
			'field' => 'emails',
			'label' => 'Emails',
			'rules' => 'required|xss_clean|trim|min_length[3]|valid_emails'
		)
	),
	'additionalinformation/update' => array
	(
		array
		(
			'field' => 'additional_information',
			'label' => 'Additional Information',
			'rules' => 'xss_clean|trim'
		)
	),
	'education/update' => array
	(
		array
		(
			'field' => 'degree',
			'label' => 'Degree',
			'rules' => ''
		)
	),
  	'auth/login' => array
    (
      array
      (
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'required|valid_email|xss_clean|trim'
      ),
      array
      (
        'field' => 'password',
        'label' => 'Password',
        'rules' => 'required|xss_clean|trim'
      )
    ),
    'auth/forgotPassword' => array
    (
      array
      (
        'field' => 'email',
        'label' => 'Email',
        'rules' => 'required|valid_email|xss_clean|trim'
      )
    ),
    'auth/updatePassword' => array
    (
      array
      (
        'field' => 'password',
        'label' => 'New Password',
        'rules' => 'required|xss_clean|trim|matches[confirm_password]'
      ),
      array
      (
        'field' => 'confirm_password',
        'label' => 'Confirm New Password',
        'rules' => 'required|xss_clean|trim'
      )
    ),
    'comment/create' => array
    (
      array
      (
        'field' => 'comment',
        'label' => 'Comment',
        'rules' => 'required|xss_clean|trim'
      )
    ),
    'comment/update' => array
    (
      array
      (
        'field' => 'comment',
        'label' => 'Comment',
        'rules' => 'required|xss_clean|trim'
      )
    ),
    'company/create' => array
	(
		array
		(
			'field' => 'company_name', 
			'label' => 'Company Name', 
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'company_address', 
			'label' => 'Company Address', 
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'company_city', 
			'label' => 'Company City', 
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'company_country', 
			'label' => 'Company Country', 
			'rules' => 'required|xss_clean|trim'
		)
	),
	'company/update' => array
	(
		array
		(
			'field' => 'name', 
			'label' => 'Name', 
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'description', 
			'label' => 'Description', 
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'landline', 
			'label' => 'Landline', 
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'mobile', 
			'label' => 'Mobile', 
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'website', 
			'label' => 'Website', 
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'email', 
			'label' => 'Email', 
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'address', 
			'label' => 'Address', 
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'city', 
			'label' => 'City', 
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'state', 
			'label' => 'State', 
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'country', 
			'label' => 'Country', 
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'zip_code', 
			'label' => 'Zip Code', 
			'rules' => 'required|xss_clean|trim'
		),
	),
	'search' => array
    (
    	array
   		(
        	'field' => 'keywords',
        	'label' => 'Keywords',
        	'rules' => 'required|trim|xss_clean'
    	)
    ),
    'analytics/emailer' => array
    (
    	array
		(
			'field' => 'recipients',
			'label' => 'Email Recipients',
			'rules' => 'required|xss_clean|trim|min_length[3]|valid_emails'
		),
    	array
   		(
        	'field' => 'date_from',
        	'label' => 'Date From',
        	'rules' => 'required|trim|xss_clean'
    	),
    	array
   		(
        	'field' => 'date_to',
        	'label' => 'Date To',
        	'rules' => 'required|trim|xss_clean'
    	),
    	array
   		(
        	'field' => 'title',
        	'label' => 'Title',
        	'rules' => 'required|trim|xss_clean|trim|min_length[3]'
    	)
    )
);