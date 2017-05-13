<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_model extends CI_Model {
    public  function  save($user_id,$hotel_id,$in_time,$out_time,$totalPrice){
        $this -> db -> insert('t_order', array(
            'user_id' => $user_id,
            'hotel_id' => $hotel_id,
            'in_time' => $in_time,
            'out_time' => $out_time,
            'price' => $totalPrice
        ));

        return $this -> db -> affected_rows();
    }

    public  function  saveLocal($user_id,$local_id,$in_time,$out_time,$totalPrice){
        $this -> db -> insert('t_order', array(
            'user_id' => $user_id,
            'local_id' => $local_id,
            'in_time' => $in_time,
            'out_time' => $out_time,
            'price' => $totalPrice
        ));

        return $this -> db -> affected_rows();
    }
    public  function  getHotelOrderList($limit,$offset,$user_id){
        $this -> db -> select('TR.*,TH.img,TH.hotel_id AS H_id ,TH.hotel_name');
        $this -> db -> from('t_order AS TR');
        $this -> db -> join('t_hotel AS TH','TH.hotel_id=TR.hotel_id');
        $this -> db -> where('TR.user_id',$user_id);
        $this -> db -> order_by('TR.book_time','desc');
        $this -> db -> limit($limit,$offset);
        return $this -> db -> get() -> result();
    }
    public  function  getHotelOrderCount($user_id){
        $this -> db -> select('TR.*,TH.img,TH.hotel_id AS H_id ,TH.hotel_name');
        $this -> db -> from('t_order AS TR');
        $this -> db -> join('t_hotel AS TH','TH.hotel_id=TR.hotel_id');
        $this -> db -> where('TR.user_id',$user_id);
        return $this -> db -> count_all_results();
    }

    public  function  getLocalOrderList($limit,$offset,$user_id){
        $this -> db -> select('TR.*,TH.photo,TH.local_id AS L_id,TH.local_name,TH.local_city');
        $this -> db -> from('t_order AS TR');
        $this -> db -> join('t_local AS TH','TH.local_id=TR.local_id');
        $this -> db -> where('TR.user_id',$user_id);
        $this -> db -> order_by('TR.book_time','desc');
        $this -> db -> limit($limit,$offset);
        return $this -> db -> get() -> result();
    }
    public  function  getLocalOrderCount($user_id){
        $this -> db -> select('TR.*,TH.photo,TH.local_id AS L_id,TH.local_name,TH.local_city');
        $this -> db -> from('t_order AS TR');
        $this -> db -> join('t_local AS TH','TH.local_id=TR.local_id');
        $this -> db -> where('TR.user_id',$user_id);
        return $this -> db -> count_all_results();
    }
}



















