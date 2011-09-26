<?php

class Pages_model extends CI_Model {

    function __construct(){
   
        parent::__construct();
    }
    
	// разделы сайта
	
	function topics() {
	
		$sql = 'SELECT id, name FROM help WHERE parent = 0 AND enabled = 1 ORDER BY priority';
		$query = $this->db->query($sql);
		
		return $query->result();
	}
	
	// страница хелпа
	
	function page($id) {
	
		$sql = sprintf('SELECT * FROM help WHERE id = %d', $id);
		$query = $this->db->query($sql);
		
		return $query->row();
	}
}