<?php

class Content_model extends CI_Model {

    function __construct(){
   
        parent::__construct();
    }
    
	// таблица данных
	
	function table() {
	
		$sql = 'SELECT help.id, help.name, help.enabled, help.priority, t1.name AS parent FROM help LEFT JOIN help AS t1 ON help.parent = t1.id ORDER BY name';
		$query = $this->db->query($sql);
		
		return $query->result();
	}
	
	// селект
	
	function dropdown() {
	
		$sql = 'SELECT id, name, parent FROM help ORDER BY name';
		$query = $this->db->query($sql);
		
		return $query->result();
	}
	
	// выборка строки данных для редактирования
	
	function row($id) {
	
		$sql = sprintf('SELECT * FROM help WHERE id = %d', $id);
		$query = $this->db->query($sql);
		
		$result = $query->row();
		
		return $result;
	}
    
	// добавить объект
	
	function add() {
	
		$input = $this->input->post('f');
		$data = $this->process_data($input);

		if(!empty($data)){
			$this->db->insert('help', $data);
		}
	}
	
	// удалить объект
	
	function delete($id) {
	
		$this->db->where('id', $id);
		$this->db->delete('help'); 
	}
	
	// обновить данные объекта
	
	function update() {
			
		$input = $this->input->post('f');
		$id = $this->input->post('id');
		
		$this->db->where('id', $id);
		
		$data = $this->process_data($input);

		if(!empty($data)){
			$this->db->update('help', $data);
		}
	}
	
	// упорядочить строки
	
	function arrange() {
			
		$rows = $this->input->post('row');
		$i = 1;
		
		foreach($rows as $row) {
		
			$this->db->where('id', $row);
			$data['priority'] = $i;
			
			if(!empty($data)){
				$this->db->update('help', $data);
			}
			
			$i++;
		}
	}
	
	// обновить ячейку таблицы
	
	function update_cell() {
			
		$name = $this->input->post('name');
		$value = $this->input->post('value');
		
		$id = $this->input->post('id');
		$this->db->where('id', $id);
		
		$data[$name] = $value;

		if(!empty($data)){
			$this->db->update('help', $data);
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