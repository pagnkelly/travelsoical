<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Local extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> model('local_model');
	}


	public function index(){
		$this->load->view('local/local');
	}
	public function detail(){
		$this->load->view('local/local-detail');
	}

	public function getAll(){
        $page = $this -> input -> get('page');
        $total_rows = $this -> local_model -> getCount();
        $offset = ($page -1)*8;
        

        $result = $this -> local_model -> getAll(8, $offset);
        $data = array(
            'locals' => $result,
            'total_rows' => $total_rows
        );

		echo json_encode($data);
	}




	

}