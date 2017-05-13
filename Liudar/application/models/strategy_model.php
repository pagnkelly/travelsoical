<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Strategy_model extends CI_Model {

    public function getCount(){
        return $this->db->count_all('t_strategy');
    }

    public function getAll($limit,$offset){
      $this -> db -> select('*');
      $this -> db -> from('t_strategy strategy');
      $this -> db -> join('t_user user', 'strategy.user_id=user.user_id');
      $this -> db -> limit($limit,$offset);
      return $this -> db -> get() -> result();
    }

    public  function  getStrategyList($limit,$offset,$user_id){
        $this -> db -> select('*');
        $this -> db -> from('t_strategy');
        $this -> db -> where('t_strategy.user_id',$user_id);
        $this -> db -> limit($limit,$offset);
        return $this -> db -> get() -> result();
    }
    public  function  getStrategyCount($user_id){
        $this -> db -> select('*');
        $this -> db -> from('t_strategy');
        $this -> db -> where('t_strategy.user_id',$user_id);
        return $this -> db -> count_all_results();
    }
    // 请求热门攻略，按照浏览次数
    public function getHotAll($limit,$offset){
      $this -> db -> select('*');
      $this -> db -> from('t_strategy strategy');
      $this -> db -> join('t_user user', 'strategy.user_id=user.user_id');
      $this -> db -> order_by('strategy.times','desc');
      $this -> db -> limit($limit,$offset);
      return $this -> db -> get() -> result();
    }

    public function getDetail($id){
        return $this -> db -> get_where('t_strategy', array(
          'strategy_id' => $id
        )) -> row();
    }
    public  function  timesAdd($id,$times){
        $this -> db -> where('strategy_id', $id);
        $this -> db -> update('t_strategy', array(
            'times' => $times
        ));

        return $this -> db -> affected_rows();
    }
    
}



















