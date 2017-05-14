<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hotel_model extends CI_Model {

    public function getPush(){
      $this -> db -> select('*');
      $this -> db -> from('t_hotel hotel');
      $this -> db -> limit(4);
      $this -> db -> order_by('hotel.sale_num', 'desc');
      return $this -> db -> get() -> result();
    }

    public function getType($id) {
      $this -> db -> select('*');
      $this -> db -> from('t_hotel_type');
      $this -> db -> where('hotel_id',$id);
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

    public function getAllOrderBy($limit,$offset,$action,$rank){
      $this -> db -> select('*');
      $this -> db -> from('t_hotel');
      $this -> db -> limit($limit,$offset);
      $this -> db -> order_by($action, $rank);
      return $this -> db -> get() -> result();
    }

    public function getDetail($id) {
      return $this -> db -> get_where('t_hotel', array(
          'hotel_id' => $id
         )) -> row();
    }


    public function SearchBoth($limit, $offset,$hotel_name,$city_name){
      $this -> db -> select('*');
      $this -> db -> from('t_hotel');
      $this -> db -> like('hotel_name',$hotel_name);
      $this -> db -> like('address',$city_name);
      $this -> db -> limit($limit,$offset);
      return $this -> db -> get() -> result();
    }
    public function SearchBothOrderBy($limit, $offset,$hotel_name,$city_name,$action,$rank){
      $this -> db -> select('*');
      $this -> db -> from('t_hotel');
      $this -> db -> like('hotel_name',$hotel_name);
      $this -> db -> like('address',$city_name);
      $this -> db -> limit($limit,$offset);
      $this -> db -> order_by($action, $rank);
      return $this -> db -> get() -> result();
    }
    public function getBothCount($hotel_name,$city_name){
      $this -> db -> select('*');
      $this -> db -> from('t_hotel');
      $this -> db -> like('hotel_name',$hotel_name);
      $this -> db -> like('address',$city_name);
      return $this -> db -> count_all_results();
    }
    public function SearchHotel($limit, $offset,$hotel_name){
      $this -> db -> select('*');
      $this -> db -> from('t_hotel');
      $this -> db -> like('hotel_name',$hotel_name);
      $this -> db -> limit($limit,$offset);
      return $this -> db -> get() -> result();
    }
    public function SearchHotelOrderBy($limit, $offset,$hotel_name,$action,$rank){
      $this -> db -> select('*');
      $this -> db -> from('t_hotel');
      $this -> db -> like('hotel_name',$hotel_name);
      $this -> db -> limit($limit,$offset);
      $this -> db -> order_by($action, $rank);
      return $this -> db -> get() -> result();
    }
    public  function  getHotelCount($hotel_name){
      $this -> db -> select('*');
      $this -> db -> from('t_hotel');
      $this -> db -> like('hotel_name',$hotel_name);
      return $this -> db -> count_all_results();
    }
    public function SearchCity($limit, $offset,$city_name){
      $this -> db -> select('*');
      $this -> db -> from('t_hotel');
      $this -> db -> like('address',$city_name);
      $this -> db -> limit($limit,$offset);
      return $this -> db -> get() -> result();
    }
    public function SearchCityOrderBy($limit, $offset,$city_name,$action,$rank){
      $this -> db -> select('*');
      $this -> db -> from('t_hotel');
      $this -> db -> like('address',$city_name);
      $this -> db -> limit($limit,$offset);
      $this -> db -> order_by($action, $rank);
      return $this -> db -> get() -> result();
    }
    public  function  getCityCount($city_name){
      $this -> db -> select('*');
      $this -> db -> from('t_hotel');
      $this -> db -> like('address',$city_name);
      return $this -> db -> count_all_results();
    }
}



















