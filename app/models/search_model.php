<?php

class Search_model extends CI_Model {

    function __construct(){
   
        parent::__construct();
    }
    
	// разделы сайта
	
	function search($str = "") {
	
		$str = '%'.$str.'%';
		$str = $this->db->escape($str);
	
		$sql = sprintf("SELECT DISTINCT(id), name FROM help WHERE (name LIKE %s OR keywords LIKE %s OR content LIKE %s) AND enabled = 1", $str, $str, $str);
		$query = $this->db->query($sql);
		
		return $query->result();
	}
}