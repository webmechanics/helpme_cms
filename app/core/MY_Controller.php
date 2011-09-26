<?php

class MY_Controller extends CI_Controller {

    function __construct() {
    
        parent::__construct();
        
        if($this->input->get('debug') != false) {
        	$this->output->enable_profiler(TRUE);
        }
	}
	
	function _auth() {
			
		if($this->session->userdata('email')) {
			return;
		}
		
		else {
			header("Location: /admin/");
		}
	}
}