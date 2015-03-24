<?php
	function getPaginationDetails($limit, $configs = null)
  {
    $CI = get_instance();
    $CI->load->library('pagination');
    $className = $CI->router->fetch_class();
    $methodName = $CI->router->fetch_method();
    $perPage = 12;
    $c = array
    (
      'base_url' => site_url($className . '/' . $methodName) . '/',
      'per_page' => $perPage,
      'total_rows' => $limit
    );
    if(!empty($configs))
    {
      foreach ($configs as $c => $i) {
        $c[$c] = $i;
      }
    }
    $CI->pagination->initialize($c);
    $links = $CI->pagination->create_links();
    $a = array('perPage' => $perPage,'links' => $links);
    return $a;
  }