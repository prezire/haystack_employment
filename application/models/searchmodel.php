<?php  
  class SearchModel extends CI_Model
  {
    public function __construct()
    {
      parent::__construct();
    }
    /*
      Configure the search fields by putting the necessary 
      table names and assign each one according to the 
      results view, which consists only of 3 fields href, 
      title and description.
      
      For example, the "roles" table consists of id, name 
      and description fields. The "name" field is different
      from the one in the results view file that is called 
      "title". In order for the view to work, assign the 
      following items from the controller like so:
      $tables = array
      (
        array
        (
          'name' => 'roles',
          'fields' => array('name', 'description'),
          'orders' => array('name', 'ASC'),
          'href' => 'role/update/',
          'titles' => array('name'), 
          'descriptions' => array('description')
        ),
        array
        (
          'name' => 'users',
          'fields' => array('full_name', 'country'),
          'orders' => array('full_name', 'ASC'),
          'href' => 'user/update/',
          'titles' => array('title', 'full_name'), 
          'descriptions' => array('email', 'country')
        )
      );
      Description of the param keys:
      - name = is the name of the table to search.
      - fields = the list of fields of the table to look for keywords.
      - orders = the field to be used for sorting the results.
      - href = the URL used by the view that will be used as anchor.
        The ID field will be concatenated in the href.
      - titles = The list of fields wherein their values are 
        displayed as the title for each item.
      - descriptions = The list of fields wherein their values
        are displayed as the description of each item.
    */
    public final function search($table)
    {
      $t = $table;
      $tableName = $t['name'];
      $fields = $t['fields'];
      $orders = $t['orders'];
      $href = $t['href'];
      $titles = $t['titles'];
      $descriptions = $t['descriptions'];
      $k = $this->input->post('keywords');
      //
      $this->db->select('*');
      $this->db->from($tableName);
      $this->db->like($fields[0], $k);
      $i = count($fields);
      if($i > 1)
      {
        for($a = 1; $a < $i; $a++)
        {
          $this->db->or_like($fields[$a], $k);
        }
      }
      //
      /*$this->db->where('date_to >= now()');
      $this->db->where('enabled > 0');
      $this->db->where('vacancy_count > 0');
      $this->db->where('archived < 1');*/
      //
      $this->db->order_by($orders[0], $orders[1]);
      $items = array();
      $o = $this->db->get()->result_array();
      foreach($o as $r)
      {
        //Construct title and description.
        $tmpTitle = '';
        $tmpDescr = '';
        foreach($titles as $ttl)
        {
          $tmpTitle .= ' ' .$r[$ttl];
        }
        foreach($descriptions as $descr)
        {
          $tmpDescr .=  ' ' .$r[$descr];
        }
        $tmpTitle = str_ireplace($k, '<b>' . $k . '</b>', $tmpTitle);
        $tmpDescr = str_ireplace($k, '<b>' . $k . '</b>', $tmpDescr);
        //
        $this->load->helper('inflector');
        $h = $href . '/' . $r['id'];
        $t = humanize(singular($tableName)) . ': ' . $tmpTitle;
        $d = character_limiter($tmpDescr, 150);
        $a = array
        (
          'href' => $h,
          'title' => $t,
          'description' => $d
        );
        array_push($items, $a);
      }
      return $items;
    }
    private final function getPositions($keywords)
    {
      $aSpaces = explode(' ', $keywords);
      $hasSpaces = count($aSpaces) > 1;
      if($hasSpaces)
      {
        foreach($aSpaces as $s)
        {
          $this->db->or_like('name', $s);
        }
      }
      else
      {
        $this->db->or_like('name', $keywords);
      }
    }
    public final function positions()
    {
      $k = $this->input->post('keywords');
      $aCommas = explode(',', $k);
      $hasCommas = count($aCommas) > 1;
      $this->db->select('*')
            ->from('positions')
            ->where('vacancy_count >', 0)
            ->where('enabled', 1)
            ->where('archived', 0)
            ->where('DATE(NOW()) >= ', 'date_from', false)
            ->where('DATE(NOW()) <=', 'date_to', false);
      if($hasCommas)
      {
        foreach ($aCommas as $c) 
        {
          $this->getPositions(trim($c));
        }
      }
      else
      {
        $this->getPositions($k);
      }
      $o = $this->db->get();
      return $o;
    }
  }