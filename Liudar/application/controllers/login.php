<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this ->load -> library('encrypt');
		$this -> load -> model('user_model');
	}


	public function index(){
		$this -> load -> view('login');
	}

	public function checkLogin() {
		$name = $this -> input -> post('name');
		$password = $this -> input -> post('password');
		$password = $this -> encrypt -> sha1($password);
		if(preg_match('/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/', $name)){
			$row = $this -> user_model -> mailLogin($name,$password);
		}else{
			$row = $this -> user_model -> telLogin($name,$password);
		}

		if($row){
			$this -> session -> set_userdata('LiuDarUser', $row);
			echo "true";
		}else{
			echo "false";
		}
		

	}


	

}