<?php

class Files_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}

	function table() {
	
		$this->load->helper('file');
		$files = get_dir_file_info('./uploads/');
		
		$result = new stdClass;
		$i = 0;
		
		foreach($files as $file){
		
			$result->$i->name = $file['name'];
			$result->$i->type = get_mime_by_extension($file['name']);
			$result->$i->size = round($file['size']/1024)." KB";
			$result->$i->modified = date('j.m.Y H:i', $file['date']);
			
			$i++;
		}
		
		return $result;
	}
}