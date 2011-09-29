<?php

class Content_model extends CI_Model {

    function __construct(){
   
        parent::__construct();
    }
    
	// таблица данных
	
	function table() {
		
		$this->db->select('help.id, help.name, help.enabled, help.priority, t1.name AS `parent`')->from('help')->join('help AS `t1`', 'help.parent = t1.id', 'left')->order_by('name','asc');
		$query = $this->db->get();
		
		return $query->result();
	}
	
	// селект
	
	function dropdown() {
	
		$this->db->select('id, name, parent')->from('help')->order_by('name','asc');
		$query = $this->db->get();
		
		return $query->result();
	}
	
	// выборка строки данных для редактирования
	
	function row($id) {
	
		$this->db->select('*')->from('help')->where('id', $id); 
		$query = $this->db->get();
		
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
		
		return $this->db->insert_id();
	}
	
	// удалить объект
	
	function delete($id) {
	
		$this->db->where('id', $id)->delete('help');
	}
	
	// обновить данные объекта
	
	function update() {
			
		$input = $this->input->post('f');
		$id = $this->input->post('id');
		
		$data = $this->process_data($input);

		if(!empty($data)){
			$this->db->where('id', $id)->update('help', $data);
		}
	}
	
	// упорядочить строки
	
	function arrange() {
			
		$rows = $this->input->post('row');
		$i = 1;
		
		foreach($rows as $row) {

			$data['priority'] = $i;
			
			if(!empty($data)){
				$this->db->where('id', $row)->update('help', $data);
			}
			
			$i++;
		}
	}
	
	// обновить ячейку таблицы
	
	function update_cell() {
			
		$name = $this->input->post('name');
		$value = $this->input->post('value');
		
		$id = $this->input->post('id');
		
		$data[$name] = $value;

		if(!empty($data)){
			$this->db->where('id', $id)->update('help', $data);
		}
	}
	
	// подготовка данных для insert-a и update
	
	function process_data($input) {
	
		$data = array();
		
		foreach($input as $key => $value) {
		
			if($key == 'password') {
				$value = sha1($value);
			}
				
			$data[$key] = $value;
		}
		
		return $data;
	}
}