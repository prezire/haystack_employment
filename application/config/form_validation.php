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
			'field' => 'organization_name',
			'label' => 'Organization Name',
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
	'workhistory/update' => array
	(
		array
		(
			'field' => 'position',
			'label' => 'Position',
			'rules' => ''
		)
	),
  	'subscriber/create' => array
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
		)
	),
  	'subscriber/update' => array
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
		)
	),
	'internship/create' => array
	(
		array
		(
			'field' => 'name',
			'label' => 'Name',
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
  	'internship/update' => array
	(
		array
		(
			'field' => 'name',
			'label' => 'Name',
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
			'field' => 'headline',
			'label' => 'Headline',
			'rules' => ''
		)
	),
	'additionalinformation/update' => array
	(
		array
		(
			'field' => 'information',
			'label' => 'Information',
			'rules' => ''
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
    'organization/create' => array
	(
		array
		(
			'field' => 'name', 
			'label' => 'Name', 
			'rules' => 'required|xss_clean|trim'
		)
	),
	'organization/update' => array
	(
		array
		(
			'field' => 'name', 
			'label' => 'Name', 
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
		array
		(
			'field' => 'name', 
			'label' => 'Name', 
			'rules' => 'required|xss_clean|trim'
		),
		array
		(
			'field' => 'landline', 
			'label' => 'Landline', 
			'rules' => 'required|xss_clean|trim'
		)
	)
);