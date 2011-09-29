<?php

class Files extends MY_Controller {
	
	function __construct() {
	
		parent::__construct();

		$this->load->model('files_model');
		$this->lang->load('admin');
		
		$this->prefix = 'admin/files'; // prefix to views
		$this->title = 'HelpMe CMS | '.$this->lang->line('files'); // pages header
		
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

		$data['table'] = $this->files_model->table();
		$this->load->view($this->prefix.'/table', $data);
	}
	
	// form
	
	function form() {
	
		$this->load->view($this->prefix.'/form');
	}
	
	// delete
	
	function delete() {
	
		$file = $this->input->post('file');
		
		if($file != '') {
		
			$path = $_SERVER['DOCUMENT_ROOT'].'/uploads/'.$file;

			if(unlink($path)) {
				echo $this->lang->line('file_deleted'); 
			}
			
			else {
				echo $this->lang->line('delete_error');
			}
		}
		
		else {
			echo $this->lang->line('delete_error');
		}
	}
	
	// upload
	
	function upload() {

		$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/uploads/';
		$config['overwrite'] = TRUE;
		$config['allowed_types'] = '*';
		
		$this->load->library('upload', $config);
		$config['max_size']	= '30000';
		
		
		if(!$this->upload->do_upload()) {
			echo $this->lang->line('upload_error');
		}
		
		else {
			echo $this->lang->line('file_added');
		}
	}
}