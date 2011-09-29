<?php

class Search_model extends CI_Model {

    function __construct(){
   
        parent::__construct();
    }
    
	// разделы сайта
	
	function search($str = "") {
		
		$this->db->select('DISTINCT(`id`), name')->from('help')->like('name', $str)->or_like('keywords', $str)->or_like('content', $str)->where('enabled', 1)->order_by('name','asc');
		$query = $this->db->get();
		
		return $query->result();
	}
}