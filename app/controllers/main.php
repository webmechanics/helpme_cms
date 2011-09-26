<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends MY_Controller {

	function __construct() {
		
		parent::__construct();
		
		$this->load->model('pages_model');
		$this->lang->load('frontend');
	}

	function index() {
	
		$this->load->helper('markdown');
		$id = $this->uri->segment(2,1);
		
		$data['topics'] = $this->pages_model->topics();
		$data['page'] = $this->pages_model->page($id);
		
		$this->load->view('page', $data);
	}
	
	function search() {
	
		$this->load->model('search_model');
		$this->load->library('security');
		
		$str = $this->security->xss_clean($_GET['str']);

		$data['topics'] = $this->pages_model->topics();
		$data['result'] = $this->search_model->search($str);
		$data['str'] = $str;
		
		$this->load->view('search', $data);
	}
}