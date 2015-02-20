<?php
  function getPostValuePair($excludeList = array())
  {
    $CI = get_instance();
    $post = $CI->input->post();
    $list = array();
    foreach($post as $key => $value)
    {
      if(!in_array($key, $excludeList))
      {
        $list[$key] = $value;
      }
    }
    return $list;
  }
  /*
    Filters the currently executing method based on the listed 
    methods names. Place this in the constructor.

    @param  $methodNames  Array. The list of methods to filter.
    @param  $type   String. Either include or exclude. Include checks
    all methodsNames and re-routes the user if he's not logged in.
    
    Exclude is used when there are are a lot of methodNames 
    and only a few methods that does need any checking. When
    exclude is used all methods are checked except for the ones
    listed in the methodNames.

    Example:
    1. validateLoginSession(array('index', 'create'))
      - If method is index or create, this method checks for session.

    2. validateLoginSession(array('read'), 'exclude')
      - If method is index, create, update, this method checks
      for session and redirects the user if he's not logged in.
      If the executing method is read, this method does nothing.
  */
  function validateLoginSession($methodNames, $type = 'include')
  {
    $CI = get_instance();
    $m = $CI->router->fetch_method();
    $b = in_array($m, $methodNames);
    switch($type)
    {
      case 'include':
        if($b)
        {
          if(!isLoggedIn())
          {
            redirect(site_url('auth/login'));
          }
        }
      break;
      case 'exclude':
        if(!$b)
        {
          if(!isLoggedIn())
          {
            redirect(site_url('auth/login'));
          }
        }
      break;
    }
  }
  function generateToken($key)
  {
    return sha1($key . date('Ymd') . rand(0, 999) . time());
  }
  function getLoggedUser()
  {
    $CI = get_instance();
    return $CI->session->userdata('user');
  }
  function isLoggedIn()
  {
    return getLoggedUser() != null;
  }
  function getRoleById($id)
  {
    $CI = get_instance();
    $CI->load->model('rolemodel');
    return $CI->rolemodel->read($id);
  }
  function getRoleName()
  {
    $usr = getLoggedUser();
    if(isset($usr->role_id))
    {
      $roleName = getRoleById($usr->role_id)->row()->name;
      return $roleName;
    }
    else return '';
  }
  function isPermitted($permissionName)
  {
    $CI = get_instance();
    $uId = getLoggedUser()->id;
    $CI->db->select('id');
    $CI->db->from('permitted_roles pr');
    $CI->db->join('roles r', 'r.id = pr.role_id');
    $CI->db->join('users u', 'u.role_id = r.id');
    $CI->db->join('permissions p', 'p.id = pr.permission_id');
    $CI->db->where('r.id', $uId);
    $CI->db->where('p.name', $permissionName);
    $CI->db->get();
    return $CI->db->num_rows() > 0;
  }
  function sendEmailer
  (
    $subject, 
    $from, 
    $to, 
    $message, 
    $cc = null,
    $bcc = null
  )
  {
    $CI = get_instance();
    $CI->load->config('custom_configs');
    $conf = $CI->config->item('email');
    //
    //$CI->email->initialize($conf['server']);
    $CI->load->library('email', $conf['server']);
    $CI->email->set_newline("\r\n");
    $CI->email->from($from);
    $CI->email->to($to);
    $CI->email->bcc($cc);
    $CI->email->subject($subject);
    $CI->email->message($message);
    //echo $message; exit;
    if(!$CI->email->send())
    {
      show_error($CI->email->print_debugger());
      exit;
    }
  }
  function upload($fieldName)
  {
    if($_FILES[$fieldName]['error'] < 1)
    {
      $config['upload_path'] = './public/uploads/';
      $config['allowed_types'] = 'gif|jpg|png|pdf|doc';
      $config['encrypt_name'] = true;
      //
      $CI = get_instance();
      $CI->load->library('upload', $config);
      if($CI->upload->do_upload($fieldName))
  		{
        return $CI->upload->data();
  		}
  		else
  		{
  			return $CI->upload->display_errors();
  		}
    }
    else
    {
      return null;
    }
  }
  function getShiftPatterns()
  {
    $a = array
    (
     'No Shift'	=>	'No Shift',
      '2 Shift'	=>	'2 Shift',
      'Night Shift'	=>	'Night Shift',
      '3 Shift or Semi Continuous (8 hour shifts, averaging 40 hours per week)'	=>	'3 Shift or Semi Continuous (8 hour shifts, averaging 40 hours per week)',
      'Staggered days'	=>	'Staggered days',
      'Twilight or Evening Shift'	=>	'Twilight or Evening Shift',
      'Regular 4-on 4 off'	=>	'Regular 4-on 4 off',
      'Continentals (4-team, 8-hour or 12-hour patterns, averaging 42 hours per week)'	=>	'Continentals (4-team, 8-hour or 12-hour patterns, averaging 42 hours per week)',
      'Weekend shifts'	=>	'Weekend shifts'

    );
    return $a;
  }
  function getCountries()
  {
    $a = array
    (
      "All Countries" =>	"All Countries", 
      "Afghanistan" => "Afghanistan", 
      "Albania" => "Albania", 
      "Algeria" => "Algeria", 
      "American Samoa" => "American Samoa", 
      "Andorra" => "Andorra", 
      "Angola" => "Angola", 
      "Anguilla" => "Anguilla", 
      "Antarctica" => "Antarctica", 
      "Antigua and Barbuda" => "Antigua and Barbuda", 
      "Argentina" => "Argentina", 
      "Armenia" => "Armenia", 
      "Aruba" => "Aruba", 
      "Australia" => "Australia", 
      "Austria" => "Austria", 
      "Azerbaijan" => "Azerbaijan", 
      "Bahamas" => "Bahamas", 
      "Bahrain" => "Bahrain", 
      "Bangladesh" => "Bangladesh", 
      "Barbados" => "Barbados", 
      "Belarus" => "Belarus", 
      "Belgium" => "Belgium", 
      "Belize" => "Belize", 
      "Benin" => "Benin", 
      "Bermuda" => "Bermuda", 
      "Bhutan" => "Bhutan", 
      "Bolivia" => "Bolivia", 
      "Bosnia and Herzegowina" => "Bosnia and Herzegowina", 
      "Botswana" => "Botswana", 
      "Bouvet Island" => "Bouvet Island", 
      "Brazil" => "Brazil", 
      "British Indian Ocean Territory" => "British Indian Ocean Territory", 
      "Brunei Darussalam" => "Brunei Darussalam", 
      "Bulgaria" => "Bulgaria", 
      "Burkina Faso" => "Burkina Faso", 
      "Burundi" => "Burundi", 
      "Cambodia" => "Cambodia", 
      "Cameroon" => "Cameroon", 
      "Canada" => "Canada", 
      "Cape Verde" => "Cape Verde", 
      "Cayman Islands" => "Cayman Islands", 
      "Central African Republic" => "Central African Republic", 
      "Chad" => "Chad", 
      "Chile" => "Chile", 
      "China" => "China", 
      "Christmas Island" => "Christmas Island", 
      "Cocos (Keeling) Islands" => "Cocos (Keeling) Islands", 
      "Colombia" => "Colombia", 
      "Comoros" => "Comoros", 
      "Congo" => "Congo", 
      "Congo" => "Congo", 
      "the Democratic Republic of the" => "the Democratic Republic of the", 
      "Cook Islands" => "Cook Islands", 
      "Costa Rica" => "Costa Rica", 
      "Cote d'Ivoire" => "Cote d'Ivoire", 
      "Croatia (Hrvatska)" => "Croatia (Hrvatska)", 
      "Cuba" => "Cuba", 
      "Cyprus" => "Cyprus", 
      "Czech Republic" => "Czech Republic", 
      "Denmark" => "Denmark", 
      "Djibouti" => "Djibouti", 
      "Dominica" => "Dominica", 
      "Dominican Republic" => "Dominican Republic", 
      "East Timor" => "East Timor", 
      "Ecuador" => "Ecuador", 
      "Egypt" => "Egypt", 
      "El Salvador" => "El Salvador", 
      "Equatorial Guinea" => "Equatorial Guinea", 
      "Eritrea" => "Eritrea", 
      "Estonia" => "Estonia", 
      "Ethiopia" => "Ethiopia", 
      "Falkland Islands (Malvinas)" => "Falkland Islands (Malvinas)", 
      "Faroe Islands" => "Faroe Islands", 
      "Fiji" => "Fiji", 
      "Finland" => "Finland", 
      "France" => "France", 
      "France Metropolitan" => "France Metropolitan", 
      "French Guiana" => "French Guiana", 
      "French Polynesia" => "French Polynesia", 
      "French Southern Territories" => "French Southern Territories", 
      "Gabon" => "Gabon", 
      "Gambia" => "Gambia", 
      "Georgia" => "Georgia", 
      "Germany" => "Germany", 
      "Ghana" => "Ghana", 
      "Gibraltar" => "Gibraltar", 
      "Greece" => "Greece", 
      "Greenland" => "Greenland", 
      "Grenada" => "Grenada", 
      "Guadeloupe" => "Guadeloupe", 
      "Guam" => "Guam", 
      "Guatemala" => "Guatemala", 
      "Guinea" => "Guinea", 
      "Guinea-Bissau" => "Guinea-Bissau", 
      "Guyana" => "Guyana", 
      "Haiti" => "Haiti", 
      "Heard and Mc Donald Islands" => "Heard and Mc Donald Islands", 
      "Holy See (Vatican City State)" => "Holy See (Vatican City State)", 
      "Honduras" => "Honduras", 
      "Hong Kong" => "Hong Kong", 
      "Hungary" => "Hungary", 
      "Iceland" => "Iceland", 
      "India" => "India", 
      "Indonesia" => "Indonesia", 
      "Iran (Islamic Republic of)" => "Iran (Islamic Republic of)", 
      "Iraq" => "Iraq", 
      "Ireland" => "Ireland", 
      "Israel" => "Israel", 
      "Italy" => "Italy", 
      "Jamaica" => "Jamaica", 
      "Japan" => "Japan", 
      "Jordan" => "Jordan", 
      "Kazakhstan" => "Kazakhstan", 
      "Kenya" => "Kenya", 
      "Kiribati" => "Kiribati", 
      "Korea" => "Korea", 
      "Democratic People's Republic of" => "Democratic People's Republic of", 
      "Korea" => "Korea", 
      "Republic of" => "Republic of", 
      "Kuwait" => "Kuwait", 
      "Kyrgyzstan" => "Kyrgyzstan", 
      "Lao" => "Lao", 
      "People's Democratic Republic" => "People's Democratic Republic", 
      "Latvia" => "Latvia", 
      "Lebanon" => "Lebanon", 
      "Lesotho" => "Lesotho", 
      "Liberia" => "Liberia", 
      "Libyan Arab Jamahiriya" => "Libyan Arab Jamahiriya", 
      "Liechtenstein" => "Liechtenstein", 
      "Lithuania" => "Lithuania", 
      "Luxembourg" => "Luxembourg", 
      "Macau" => "Macau", 
      "Macedonia" => "Macedonia", 
      "The Former Yugoslav Republic of" => "The Former Yugoslav Republic of", 
      "Madagascar" => "Madagascar", 
      "Malawi" => "Malawi", 
      "Malaysia" => "Malaysia", 
      "Maldives" => "Maldives", 
      "Mali" => "Mali", 
      "Malta" => "Malta", 
      "Marshall Islands" => "Marshall Islands", 
      "Martinique" => "Martinique", 
      "Mauritania" => "Mauritania", 
      "Mauritius" => "Mauritius", 
      "Mayotte" => "Mayotte", 
      "Mexico" => "Mexico", 
      "Micronesia" => "Micronesia", 
      "Federated States of" => "Federated States of", 
      "Moldova" => "Moldova", 
      "Republic of" => "Republic of", 
      "Monaco" => "Monaco", 
      "Mongolia" => "Mongolia", 
      "Montserrat" => "Montserrat", 
      "Morocco" => "Morocco", 
      "Mozambique" => "Mozambique", 
      "Myanmar" => "Myanmar", 
      "Namibia" => "Namibia", 
      "Nauru" => "Nauru", 
      "Nepal" => "Nepal", 
      "Netherlands" => "Netherlands", 
      "Netherlands Antilles" => "Netherlands Antilles", 
      "New Caledonia" => "New Caledonia", 
      "New Zealand" => "New Zealand", 
      "Nicaragua" => "Nicaragua", 
      "Niger" => "Niger", 
      "Nigeria" => "Nigeria", 
      "Niue" => "Niue", 
      "Norfolk Island" => "Norfolk Island", 
      "Northern Mariana Islands" => "Northern Mariana Islands", 
      "Norway" => "Norway", 
      "Oman" => "Oman", 
      "Pakistan" => "Pakistan", 
      "Palau" => "Palau", 
      "Panama" => "Panama", 
      "Papua New Guinea" => "Papua New Guinea", 
      "Paraguay" => "Paraguay", 
      "Peru" => "Peru", 
      "Philippines" => "Philippines", 
      "Pitcairn" => "Pitcairn", 
      "Poland" => "Poland", 
      "Portugal" => "Portugal", 
      "Puerto Rico" => "Puerto Rico", 
      "Qatar" => "Qatar", 
      "Reunion" => "Reunion", 
      "Romania" => "Romania", 
      "Russian Federation" => "Russian Federation", 
      "Rwanda" => "Rwanda", 
      "Saint Kitts and Nevis" => "Saint Kitts and Nevis", 
      "Saint Lucia" => "Saint Lucia", 
      "Saint Vincent and the Grenadines" => "Saint Vincent and the Grenadines", 
      "Samoa" => "Samoa", 
      "San Marino" => "San Marino", 
      "Sao Tome and Principe" => "Sao Tome and Principe", 
      "Saudi Arabia" => "Saudi Arabia", 
      "Senegal" => "Senegal", 
      "Seychelles" => "Seychelles", 
      "Sierra Leone" => "Sierra Leone", 
      "Singapore" => "Singapore", 
      "Slovakia (Slovak Republic)" => "Slovakia (Slovak Republic)", 
      "Slovenia" => "Slovenia", 
      "Solomon Islands" => "Solomon Islands", 
      "Somalia" => "Somalia", 
      "South Africa" => "South Africa", 
      "South Georgia and the South Sandwich Islands" => "South Georgia and the South Sandwich Islands", 
      "Spain" => "Spain", 
      "Sri Lanka" => "Sri Lanka", 
      "St. Helena" => "St. Helena", 
      "St. Pierre and Miquelon" => "St. Pierre and Miquelon", 
      "Sudan" => "Sudan", 
      "Suriname" => "Suriname", 
      "Svalbard and Jan Mayen Islands" => "Svalbard and Jan Mayen Islands", 
      "Swaziland" => "Swaziland", 
      "Sweden" => "Sweden", 
      "Switzerland" => "Switzerland", 
      "Syrian Arab Republic" => "Syrian Arab Republic", 
      "Taiwan" => "Taiwan", 
      "Province of China" => "Province of China", 
      "Tajikistan" => "Tajikistan", 
      "Tanzania" => "Tanzania", 
      "United Republic of" => "United Republic of", 
      "Thailand" => "Thailand", 
      "Togo" => "Togo", 
      "Tokelau" => "Tokelau", 
      "Tonga" => "Tonga", 
      "Trinidad and Tobago" => "Trinidad and Tobago", 
      "Tunisia" => "Tunisia", 
      "Turkey" => "Turkey", 
      "Turkmenistan" => "Turkmenistan", 
      "Turks and Caicos Islands" => "Turks and Caicos Islands", 
      "Tuvalu" => "Tuvalu", 
      "Uganda" => "Uganda", 
      "Ukraine" => "Ukraine", 
      "United Arab Emirates" => "United Arab Emirates", 
      "United Kingdom" => "United Kingdom", 
      "United States" => "United States", 
      "United States Minor Outlying Islands" => "United States Minor Outlying Islands", 
      "Uruguay" => "Uruguay", 
      "Uzbekistan" => "Uzbekistan", 
      "Vanuatu" => "Vanuatu", 
      "Venezuela" => "Venezuela", 
      "Vietnam" => "Vietnam", 
      "Virgin Islands (British)" => "Virgin Islands (British)", 
      "Virgin Islands (U.S.)" => "Virgin Islands (U.S.)", 
      "Wallis and Futuna Islands" => "Wallis and Futuna Islands", 
      "Western Sahara" => "Western Sahara", 
      "Yemen" => "Yemen", 
      "Yugoslavia" => "Yugoslavia", 
      "Zambia" => "Zambia", 
      "Zimbabwe"	=> "Zimbabwe"
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