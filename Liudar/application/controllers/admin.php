<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this ->load -> library('encrypt');
		$this -> load -> model('admin_model');
	}


	public function index(){
		$this -> load -> view('admin/login');
	}
	public function main(){
		$this -> load -> view('admin/admin-index');
	}
	public function checkLogin() {
		$name = $this -> input -> post('name');
		$password = $this -> input -> post('password');
		$password = $this -> encrypt -> sha1($password);
		$row = $this -> admin_model -> checkLogin($name,$password);
		if($row){
			$this -> session -> set_userdata('LiuDarAdmin', $row);
			echo "true";
		}else{
			echo "false";
		}
		

	}
	public function hotelOrder() {
		$id = $this -> input -> get('id');
		$row = $this -> admin_model -> hotelOrder($id);
		echo json_encode($row);
	}
	public function localOrder() {
		$id = $this -> input -> get('id');
		$row = $this -> admin_model -> localOrder($id);
		echo json_encode($row);
	}
}