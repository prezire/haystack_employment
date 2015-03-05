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
        $a = array
        (
          'href' => $href . '/' . $r['id'],
          'title' => $tmpTitle,
          'description' => $tmpDescr
        );
        array_push($items, $a);
      }
      return $items;
    }
  }