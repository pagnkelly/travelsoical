<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hotel extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> model('hotel_model');
		$this -> load -> model('order_model');
	}


	public function index(){
		$push = $this->hotel_model-> getPush();
		$this ->load ->view('hotel/hotel',array(
			'push' => $push
		));
	}

	public function detail(){
		$id = $this -> input -> get('id');
		$type = $this -> hotel_model -> getType($id);
		$res = $this -> hotel_model -> getDetail($id);
		$this->load->view('hotel/hotel-detail',array('data' => $res , 'types' => $type));
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

	public function order(){
		$user_id = $this -> input -> post('user_id');
		$hotel_id = $this -> input -> post('hotel_id');
		$in_time = $this -> input -> post('in_time');
		$out_time = $this -> input -> post('out_time');
		$totalPrice = $this -> input -> post('totalPrice');

		$row = $this -> order_model -> save($user_id,$hotel_id,$in_time,$out_time,$totalPrice);
		if($row){
			echo "true";
		}
	}

	public function search(){
        $page = $this -> input -> get('page');
        $total_rows = $this -> hotel_model -> getCount();
        $offset = ($page -1)*9;
        $hotel_name = $this -> input -> get('hotel_name');
        $city_name = $this -> input -> get('city_name');
        var_dump($hotel_name); die();
        $result = $this -> hotel_model-> getAll(9, $offset);
        $data = array(
            'hotels' => $result,
            'total_rows' => $total_rows
        );

		echo json_encode($data);

	}

}