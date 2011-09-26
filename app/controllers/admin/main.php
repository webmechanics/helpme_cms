<?php

class Main extends MY_Controller {

	function __construct(){
	
		parent::__construct();
		
		$this->lang->load('admin');
	}

	function index(){
	
		$this->load->view('admin/login');
	}
	
	function login(){
		
		// логин и пароль берем из POST
		
		$credentials['email'] = $this->input->post('email');
		$credentials['password'] = sha1($this->input->post('password'));
		
		// смотрим есть ли в БД пользователь

		$this->db->from('admins');
		$this->db->where($credentials);
		
		$result = $this->db->count_all_results();
		
		//если есть - идем в компании
			
		if($result == 1) {
			
			$this->session->set_userdata('email', $credentials['email']);
			header("Location: /admin/content/");
		}
		
		// иначе - говорим что логин неудался
		
		else {
		
			header("Location: /admin/");
		}
	}
	
	function logout() {
	
		// обнуляем логин и пароль
	
		$this->session->unset_userdata('email');
		
		header("Location: /admin/");
	}
	
	function gravatar() {
		
		$hash =  md5(strtolower($this->session->userdata('email')));
		$default = urlencode('http://'.$_SERVER['HTTP_HOST'].'/img/32_32/lock.png' );
		$size = 32;
		
		$picture = file_get_contents(sprintf('http://www.gravatar.com/avatar/%s?s=%d&d=%s', $hash, $size, $default));
		
		header("Expires: Fri, 30 Oct 1998 14:19:41 GMT");
		
		echo $picture;
	}
	
	function info() {
		phpinfo();
	}
}