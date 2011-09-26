<?php

class Users_model extends CI_Model {

    function __construct(){
   
        parent::__construct();
    }
    
	// таблица данных
	
	function table() {
	
		$sql = 'SELECT * FROM admins';
		$query = $this->db->query($sql);
		
		return $query->result();
	}
	
	// выборка строки данных для редактирования
	
	function row($id) {
	
		$sql = sprintf('SELECT * FROM admins WHERE id = %d', $id);
		$query = $this->db->query($sql);
		
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
	
		$this->db->where('id', $id);
		$this->db->delete('admins'); 
	}
	
	// обновить данные объекта
	
	function update() {
			
		$input = $this->input->post('f');
		$id = $this->input->post('id');
		
		$this->db->where('id', $id);
		
		$data = $this->process_data($input);

		if(!empty($data)){
			$this->db->update('admins', $data);
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