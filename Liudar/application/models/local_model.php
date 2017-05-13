<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Local_model extends CI_Model {

    public function getCount(){
        return $this->db->count_all('t_local');
    }

    public function getAll($limit,$offset){
		$this -> db -> select('*');
		$this -> db -> from('t_local');
		$this -> db -> limit($limit,$offset);
		return $this -> db -> get() -> result();
    }
    public function getDetail($local_id){
		return $this -> db -> get_where('t_local', array(
          'local_id' => $local_id
        )) -> row();
    }
}



















