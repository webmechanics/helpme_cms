<?php

// Pages

class Content extends MY_Controller {

	function __construct() {
	
		parent::__construct();

		$this->load->model('content_model');
		$this->lang->load('admin');
		
		$this->prefix = 'admin/content'; // prefix to views
		$this->title = 'HelpMe CMS | '.$this->lang->line('pages'); // pages header
		
		$this->_auth();
	}
	
	// pages page

	function index() {

		$data['title'] = $this->title;
		$data['header'] = $this->load->view('admin/shared/header', '', true);
		$data['footer'] = $this->load->view('admin/shared/footer', '', true);
		
		$this->load->view($this->prefix.'/main', $data);
	}
	
	// table
	
	function table() {

		$data['table'] = $this->content_model->table();
		$this->load->view($this->prefix.'/table', $data);
	}
	
	// select
	
	function dropdown() {
	
		$data['table'] = $this->content_model->dropdown();
		$this->load->view($this->prefix.'/select', $data);
	}
	
	// form
	
	function form() {
	
		$this->load->view($this->prefix.'/form');
	}
	
	// edit form
	
	function edit() {
	
		$data['row'] = $this->content_model->row($this->uri->segment(4,0));
		$this->load->view($this->prefix.'/form', $data);
	}
	
	// add page
	
	function add() {
	
		$this->content_model->add();
		echo $this->lang->line('page_added');
	}
	
	// delete page
	
	function delete() {
	
		$id = $this->uri->segment(4,0);

		$this->content_model->delete($id); 
		echo $this->lang->line('page_deleted');
	}
	
	// update page
	
	function update() {
			
		$this->content_model->update();
		echo $this->lang->line('page_updated'); 
	}
	
	// update field
	
	function enable() {
			
		$this->content_model->update_cell();
		echo $this->lang->line('updated'); 
	}
	
	// escaping search string
	
	function escape() {
			
		echo htmlentities($this->input->post('str')); 
	}
	
	// pages priority change
	
	function arrange() {
	
		$this->content_model->arrange();
	}
}