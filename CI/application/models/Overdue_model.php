<?php

/**
 * Created by PhpStorm.
 * User: 庾治超
 * Date: 2016/11/11
 * Time: 11:56
 * @where  删除条件过期时间
 *
 */


class  Overdue_model  extends CI_Model{

    public function overdue($where){
     $row=$this->db->delete("user_order",array('order_time'=>$where));
      return $row;
    }


}