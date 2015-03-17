<?php
  function showView($view, $data = null)
  {
    $CI = get_instance();
    $CI->load->view('commons/layouts/header', $data);
    $CI->load->view($view, $data);
    $CI->load->view('commons/partials/footer');
    $CI->load->view('commons/layouts/footer', $data);
  }
  function showJsonView($data)
  {
    $CI = get_instance();
    $CI->output
    ->set_content_type('application/json')
    ->set_output(json_encode($data));
  }
  function toHumanReadableDate($date)
  {
    $s = '';
    $i = strpos($date, ' ');
    if($i > 0){$s = substr($date, $i);}
    return date("F d, Y", strtotime($date)) . $s;
  }
  function getDateTime()
  {
    $CI = get_instance();
    $CI->load->helper('date');
    $d = '%Y-%m-%d %H:%i:%s';
    $t = time();
    return mdate($d, $t);
  }