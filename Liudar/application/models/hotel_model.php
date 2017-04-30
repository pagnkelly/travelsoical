<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hotel_model extends CI_Model {

    public function getPush(){
      $this -> db -> select('*');
      $this -> db -> from('t_hotel hotel');
      $this -> db -> limit(4);
      $this -> db -> order_by('hotel.sale_num', 'desc');
      return $this -> db -> get() -> result();
    }

    public function getCount(){
        return $this->db->count_all('t_hotel');
    }

    public function getAll($limit,$offset){
      $this -> db -> select('*');
      $this -> db -> from('t_hotel');
      $this -> db -> limit($limit,$offset);
      return $this -> db -> get() -> result();
    }
    
}


















