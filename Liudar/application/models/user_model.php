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
    
}



















