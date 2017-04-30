<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Regist extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> model('user_model');
		$this->load->library('encrypt');
	}


	public function index(){
		$this->load->view('regist');
	}


	public function save(){
		$telphone = $this -> input -> post('telphone');
		$mail = $this -> input -> post('mail');
		$name = $this -> input -> post('name');
		$password = $this -> input -> post('password');

		$isSameName = $this -> user_model -> checkUserName($name);

		$isSameTel = $this -> user_model -> checkUserTel($telphone);

		if($isSameName){
			echo "name";
			return 'false';
		}
		if($isSameTel){
			echo "telphone";
			return 'false';
		}
		$password = $this->encrypt->sha1($password);
		$row = $this -> user_model -> save($telphone, $mail, $name, $password);
		if($row){
			$this -> session -> set_userdata('LiuDarUser', $row);
			echo 'true';
		}else{
			echo 'false';
		}

	}


	

}