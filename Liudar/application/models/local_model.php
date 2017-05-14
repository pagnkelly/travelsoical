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
    public function getAllOrderBy($limit,$offset,$action,$rank){
        $this -> db -> select('*');
        $this -> db -> from('t_local');
        $this -> db -> limit($limit,$offset);
        $this -> db -> order_by($action, $rank);
        return $this -> db -> get() -> result();
    }
    public function getDetail($local_id){
		return $this -> db -> get_where('t_local', array(
          'local_id' => $local_id
        )) -> row();
    }
    public function SearchDes($limit,$offset,$search){
        $this -> db -> select('*');
        $this -> db -> from('t_local');
        $this -> db -> like('local_des',$search);
        $this -> db -> or_like('local_city', $search); 
        $this -> db -> limit($limit,$offset);
        return $this -> db -> get() -> result();
    }
    public function SearchDesOrderBy($limit,$offset,$search,$action,$rank){
        $this -> db -> select('*');
        $this -> db -> from('t_local');
        $this -> db -> like('local_des',$search);
        $this -> db -> or_like('local_city', $search); 
        $this -> db -> limit($limit,$offset);
        $this -> db -> order_by($action, $rank);
        return $this -> db -> get() -> result();
    }
    public function getSearchCount($search){
        $this -> db -> select('*');
        $this -> db -> from('t_local');
        $this -> db -> like('local_des',$search);
        $this -> db -> or_like('local_city', $search); 
        return $this -> db -> count_all_results();
    }
}



















