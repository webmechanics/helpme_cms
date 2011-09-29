<?php

class Users_model extends CI_Model {

    function __construct(){
   
        parent::__construct();
    }
    
	// таблица данных
	
	function table() {
	
		$this->db->select('*')->from('admins')->order_by('name','asc');
		$query = $this->db->get();
		
		return $query->result();
	}
	
	// выборка строки данных для редактирования
	
	function row($id) {
	
		$this->db->select('*')->from('admins')->where('id', $id); 
		$query = $this->db->get();
		
		$result = $query->row();
		
		return $result;
	}
    
	// добавить объект
	
	function add() {
	
		$input = $this->input->post('f');
		$data = $this->process_data($input);

		if(!empty($data)){
			$this->db->insert('admins', $data);
		}
	}
	
	// удалить объект
	
	function delete($id) {
	
		$this->db->where('id', $id)->delete('admins'); 
	}
	
	// обновить данные объекта
	
	function update() {
			
		$input = $this->input->post('f');
		$id = $this->input->post('id');
		
		$data = $this->process_data($input);

		if(!empty($data)){
			$this->db->where('id', $id)->update('admins', $data);
		}
	}
		
	// подготовка данных для insert-a и update
	
	function process_data($input) {
	
		$data = array();
		
		foreach($input as $key => $value) {

			if($value != "") {

				if($key == 'password') {
					$value = sha1($value);
				}

				$data[$key] = $value;
			}
		}
		
		return $data;
	}
}