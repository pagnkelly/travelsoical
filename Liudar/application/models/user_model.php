<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

    public  function  save($telphone, $mail, $name, $password){
        $this -> db -> insert('t_user', array(
            'user_name' => $name,
            'mail' => $mail,
            'password' => $password,
            'telphone' => $telphone
        ));

        return $this -> db -> affected_rows();
    }

    public function checkUserName($name){
        return $this -> db -> get_where('t_user', array(
          'user_name' => $name
         )) -> row();
    }
    public function checkUserTel($telphone){
        return $this -> db -> get_where('t_user', array(
          'telphone' => $telphone
         )) -> row();
    }
    public function mailLogin($name,$password){
        return $this -> db -> get_where('t_user', array(
          'mail' => $name,
          'password' => $password
         )) -> row();
    }
    public function telLogin($name,$password){
        return $this -> db -> get_where('t_user', array(
          'telphone' => $name,
          'password' => $password
         )) -> row();
    }

    public function undatePersonalImg($user_id,$avator){
        $this -> db -> where('user_id', $user_id);
        $this -> db -> update('t_user', array(
            'avator' => $avator
        ));
        return $this -> db -> affected_rows();
    }

    public function getById($user_id){
       return $this -> db -> get_where('t_user', array(
          'user_id' => $user_id
         )) -> row();
    }

    public function updatePersonal($user_id,$user_name,$gender,$introduction,$signature){
        $this -> db -> where('user_id', $user_id);
        $this -> db -> update('t_user', array(
            'user_name' => $user_name,
            'gender' => $gender,
            'introduction' => $introduction,
            'signature' => $signature
        ));
        return $this -> db -> affected_rows();
    }
    
    public function getHotUser(){
        $this -> db -> select('TA.user_id AS Uid, COUNT(TA.fans_id) AS CNT, TB.*');
        $this -> db -> from('t_fans AS TA, t_user AS TB');
        $this -> db -> where('TA.user_id = TB.user_id');
        $this -> db -> group_by('user_id');
        $this -> db -> order_by('CNT','desc');
        $this -> db -> limit(3);
        return $this -> db -> get() -> result();
    }
    public  function  getCareList($limit,$offset,$user_id){
        $this -> db -> select('t_fans.*,t_user.user_id AS Uid,t_user.*');
        $this -> db -> from('t_fans');
        $this -> db -> join('t_user','t_user.user_id = t_fans.user_id');
        $this -> db -> where('t_fans.fans_id',$user_id);
        $this -> db -> limit($limit,$offset);
        return $this -> db -> get() -> result();
    }
    public  function  getCareCount($user_id){
        $this -> db -> select('*');
        $this -> db -> from('t_fans');
        $this -> db -> join('t_user','t_user.user_id = t_fans.user_id');
        $this -> db -> where('t_fans.fans_id',$user_id);
        return $this -> db -> count_all_results();
    }
    public  function  getFansList($limit,$offset,$user_id){
        $this -> db -> select('*');
        $this -> db -> from('t_fans');
        $this -> db -> join('t_user','t_user.user_id = t_fans.fans_id');
        $this -> db -> where('t_fans.user_id',$user_id);
        $this -> db -> limit($limit,$offset);
        return $this -> db -> get() -> result();
    }
    public  function  getFansCount($user_id){
        $this -> db -> select('*');
        $this -> db -> from('t_fans');
        $this -> db -> join('t_user','t_user.user_id = t_fans.fans_id');
        $this -> db -> where('t_fans.user_id',$user_id);
        return $this -> db -> count_all_results();
    }
    public  function  countFans($user_id){
        $this -> db -> select('*');
        $this -> db -> from('t_fans');
        $this -> db -> where('user_id',$user_id);
        return $this -> db -> count_all_results();
    }
    public function isFans($user_id,$id){
        return $this -> db -> get_where('t_fans', array(
          'fans_id' => $user_id,
          'user_id' => $id
         )) -> row();
    }
    public function beFans($user_id,$id){
        $this -> db -> insert('t_fans', array(
            'fans_id' => $user_id,
            'user_id' => $id
        ));
        return $this -> db -> affected_rows();
    }
    public function noFans($user_id,$id){
        $this -> db -> delete('t_fans', array('fans_id' => $user_id,'user_id' => $id));
        return $this -> db -> affected_rows();
    }

}



















