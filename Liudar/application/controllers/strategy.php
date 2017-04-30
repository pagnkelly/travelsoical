<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Strategy extends CI_Controller {

	function __construct() {
		parent::__construct();
	}


	public function index(){
		$this->load->view('strategy/strategy');
	}

	public function publish(){
		$this->load->view('strategy/strategy-edit');
	}

	public function detail(){
		$this->load->view('strategy/strategy-detail');
	}






	

}