<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Strategy extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> model('strategy_model');
		$this -> load -> model('user_model');
	}


	public function index(){
	    $res = $this -> user_model -> getHotUser();
	    $user = $this -> session -> userdata('LiuDarUser');
	    if($user){
	    	$user_id = $user -> user_id;
	    	foreach ($res as $item ){
		    	$id = $item -> user_id;
		    	$row = $this -> user_model -> isFans($user_id,$id);
		    	if($row){
		    		$item -> is_fans = true;
		    	}else{
		    		$item -> is_fans = false;
		    	}
		    }
	    }else{
	    	foreach ($res as $item ){
		    	$item -> is_fans = false;
		    }
	    }

		$this->load->view('strategy/strategy',array( 'hotUsers' => $res));
	}

	public function publish(){
		$this->load->view('strategy/strategy-edit');
	}

	public function detail(){
		$id = $this -> uri -> segment(3);
		$res = $this -> strategy_model -> getDetail($id);
		$times = $res-> times + 1;
		$user_id = $res -> user_id;
		$fansCount = $this -> user_model -> countFans($user_id);
		$user = $this -> user_model -> getById($user_id);
		$this -> strategy_model -> timesAdd($id,$times);

		$userS = $this -> session -> userdata('LiuDarUser');
		if($userS){
	    	$user_id_S = $user -> user_id;
	    	$row = $this -> user_model -> isFans($user_id_S,$user_id);
	    	if($row){
	    		$user -> is_fans = '取消关注';
	    	}else{
	    		$user -> is_fans = '关注';
	    	}
	    }else{
	    	$user -> is_fans = '关注';
	    }
		$data = array( 'data' => $res , 'user_info'=>$user,'fans'=> $fansCount);
		$this->load->view('strategy/strategy-detail',$data);
	}

	public function getAll(){
        $page = $this -> input -> get('page');
        $total_rows = $this -> strategy_model -> getCount();
        $offset = ($page -1)*5;
        

        $result = $this -> strategy_model -> getAll(5, $offset);
        $user = $this -> session -> userdata('LiuDarUser');
	    if($user){
	    	$user_id = $user -> user_id;
	    	foreach ($result as $item ){
		    	$id = $item -> user_id;
		    	$row = $this -> user_model -> isFans($user_id,$id);
		    	if($row){
		    		$item -> is_fans = '取消关注';
		    	}else{
		    		$item -> is_fans = '关注';
		    	}
		    }
	    }else{
	    	foreach ($result as $item ){
		    	$item -> is_fans = '关注';
		    }
	    }
        foreach ( $result as $value){ 
        	$value ->photo = explode('#',$value ->photo);
		}  
        	
        $data = array(
            'strategys' => $result,
            'total_rows' => $total_rows
        );
		echo json_encode($data);
	}


	public function getHot(){
        $page = $this -> input -> get('page');
        $total_rows = $this -> strategy_model -> getCount();
        $offset = ($page -1)*5;
        

        $result = $this -> strategy_model -> getHotAll(5, $offset);
        foreach ($result as $item ){
		    $item -> is_fans = '关注';
		}
        foreach ( $result as &$value){ 
        	$value ->photo = explode('#',$value ->photo);
		}  
        	
        $data = array(
            'strategys' => $result,
            'total_rows' => $total_rows
        );
		echo json_encode($data);
	}

	public function beFans(){
		$id = $this -> input -> get('id');
		$user = $this -> session -> userdata('LiuDarUser');
		if($user){
	    	$user_id = $user -> user_id;
	    	$row = $this -> user_model -> isFans($user_id,$id);
	    	if($row){
	    		$this -> user_model -> noFans($user_id,$id);
	    		echo 'no';
	    	}else{
	    		$this -> user_model -> beFans($user_id,$id);
	    		echo 'be';
	    	}
	    }
	}
	

}