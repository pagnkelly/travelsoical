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
        $action = $this -> input -> get('action');
        if($action){
        	$action = 't_hotel.'.$action;
        	$rank = $this -> input -> get('rank');
        	$result = $this -> hotel_model -> getAllOrderBy(9, $offset,$action,$rank);
        }else{
        	$result = $this -> hotel_model-> getAll(9, $offset);
        }
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
        $offset = ($page -1)*9;
        $hotel_name = trim($this -> input -> get('hotel_name'));
        $city_name = trim($this -> input -> get('city_name'));
        $action = $this -> input -> get('action');
        if($action){
        	$action = 't_hotel.'.$action;
        	$rank = $this -> input -> get('rank');
        	if($hotel_name != '' && $city_name != ''){
	        	$result = $this -> hotel_model-> SearchBothOrderBy(9, $offset,$hotel_name,$city_name,$action,$rank);
	        	$total_rows = $this -> hotel_model -> getBothCount($hotel_name,$city_name);
	        }else if($hotel_name != '' ){
	        	$result = $this -> hotel_model-> SearchHotelOrderBy(9, $offset,$hotel_name,$action,$rank);
	        	$total_rows = $this -> hotel_model -> getHotelCount($hotel_name);
	        }else{
	        	$result = $this -> hotel_model-> SearchCityOrderBy(9, $offset,$city_name,$action,$rank);
	        	$total_rows = $this -> hotel_model -> getCityCount($city_name);
	        }
        }else{
        	if($hotel_name != '' && $city_name != ''){
	        	$result = $this -> hotel_model-> SearchBoth(9, $offset,$hotel_name,$city_name);
	        	$total_rows = $this -> hotel_model -> getBothCount($hotel_name,$city_name);
	        }else if($hotel_name != '' ){
	        	$result = $this -> hotel_model-> SearchHotel(9, $offset,$hotel_name);
	        	$total_rows = $this -> hotel_model -> getHotelCount($hotel_name);
	        }else{
	        	$result = $this -> hotel_model-> SearchCity(9, $offset,$city_name);
	        	$total_rows = $this -> hotel_model -> getCityCount($city_name);
	        }
        }

        $data = array(
            'hotels' => $result,
            'total_rows' => $total_rows
        );
		echo json_encode($data);

	}




}