<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Local extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> model('local_model');
		$this -> load -> model('order_model');
	}


	public function index(){
		$this->load->view('local/local');
	}
	public function detail(){
		$local_id = $this -> input -> get('id');
		$data = $this -> local_model -> getDetail($local_id);
		$this->load->view('local/local-detail',array( 'data' => $data));
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

	public function order(){
		$user_id = $this -> input -> post('user_id');
		$local_id = $this -> input -> post('local_id');
		$in_time = $this -> input -> post('in_time');
		$out_time = $this -> input -> post('out_time');
		$totalPrice = $this -> input -> post('totalPrice');
		$row = $this -> order_model -> saveLocal($user_id,$local_id,$in_time,$out_time,$totalPrice);
		if($row){
			echo "true";
		}
	}


	

}