<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Personal extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> model('user_model');
	}


	public function index(){
		$user = $this -> session -> userdata('LiuDarUser');
		$user_id = $user -> user_id;
		$res = $this -> user_model -> getById($user_id);
		$this -> load -> view('personal/personal',array('userInfo' => $res));

	}


	public function detail(){
		$this->load->view('personal/personal-detail');
	}
	public function updatePersonal(){
		$user_id = $this -> input -> post('user_id');
		$user_name = $this -> input -> post('user_name');
		$gender = $this -> input -> post('gender');
		$introduction = $this -> input -> post('introduction');
		$signature = $this -> input -> post('signature');

		$res = $this -> user_model -> getById($user_id);
		$name = $res -> user_name;
		if($name != $user_name){
			$isSameName = $this -> user_model -> checkUserName($user_name);
			if($isSameName){
				echo "name";
				return 'false';
			}
		}
		
		$row = $this -> user_model -> updatePersonal($user_id,$user_name,$gender,$introduction,$signature);
		if($row){
			echo 'true';
		}
	}

	public function updatePersonalImg() {
		$user_id = $this -> input -> post('id');
		$user_name = $this -> input -> post('user_name');
		$res = $this -> user_model -> getById($user_id);
		$name = $res -> user_name;

		$file_path = iconv("UTF-8", "GBK", "./uploads/".$name.'/');
		if(!file_exists($file_path)){
			mkdir($file_path,0777,true);
		}
		$config['upload_path'] = $file_path;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '3072';
        $config['file_name'] = date("YmdHis") . '_' . rand(10000, 99999);

        $this->load->library('upload', $config);
        $this->upload->do_upload('photo');
        $upload_data = $this->upload->data();
        if ( $upload_data['file_size'] > 0 )
        {
            $photo_url = $file_path.$upload_data['file_name'];//.$upload_data['file_ext'];
            $rows = $this -> user_model -> undatePersonalImg($user_id,$photo_url);
           
            if($rows > 0){
                redirect('personal');
            }
        }
	}

}