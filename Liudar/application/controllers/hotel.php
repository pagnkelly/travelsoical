<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hotel extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> model('hotel_model');
	}


	public function index(){
		$push = $this->hotel_model-> getPush();
		$this ->load ->view('hotel/hotel',array(
			'push' => $push
		));
	}

	public function detail(){
		$this->load->view('hotel/hotel-detail');
	}


	public function getAll(){
        $page = $this -> input -> get('page');
        $total_rows = $this -> hotel_model -> getCount();
        $offset = ($page -1)*9;
        

        $result = $this -> hotel_model-> getAll(9, $offset);
        $data = array(
            'hotels' => $result,
            'total_rows' => $total_rows
        );

		echo json_encode($data);

	}


	

}