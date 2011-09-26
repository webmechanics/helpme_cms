<?php

// User management

class Users extends MY_Controller {

	function __construct() {
	
		parent::__construct();

		$this->load->model('users_model');
		$this->lang->load('admin');
		
		$this->prefix = 'admin/users'; // prefix to views
		$this->title = 'HelpMe CMS | '.$this->lang->line('users'); // pages header
		
		$this->_auth();
	}
	
	// page

	function index() {

		$data['title'] = $this->title;
		$data['header'] = $this->load->view('admin/shared/header', '', true);
		$data['footer'] = $this->load->view('admin/shared/footer', '', true);
		
		$this->load->view($this->prefix.'/main', $data);
	}
	
	// table
	
	function table() {

		$data['table'] = $this->users_model->table();
		$this->load->view($this->prefix.'/table', $data);
	}
	
	// form
	
	function form() {
	
		$this->load->view($this->prefix.'/form');
	}
	
	// edit form
	
	function edit() {
	
		$data['row'] = $this->users_model->row($this->uri->segment(4,0));
		$this->load->view($this->prefix.'/form', $data);
	}
	
	// add user
	
	function add() {
	
		$this->users_model->add();
		echo $this->lang->line('user_added');
	}
	
	// delete user
	
	function delete() {

		$this->users_model->delete($this->input->post('id')); 
		echo $this->lang->line('user_deleted');
	}
	
	// update user data
	
	function update() {
			
		$this->users_model->update();
		echo $this->lang->line('user_updated'); 
	}
	
	// update field
	
	function enable() {
			
		$this->users_model->update_cell();
		echo $this->lang->line('updated'); 
	}
}