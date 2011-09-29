<?php

class Pages_model extends CI_Model {

    function __construct(){
   
        parent::__construct();
    }
    
	// разделы сайта
	
	function topics($parent = 0) {
		
		$this->db->select('id, name')->from('help')->where('parent', $parent)->where('enabled', 1)->order_by('priority','asc'); 
		$query = $this->db->get();
		
		return $query->result();
	}
	
	// страница хелпа
	
	function page($id) {
	
		$this->db->select('*')->from('help')->where('id', $id); 
		$query = $this->db->get();
		
		return $query->row();
	}
}