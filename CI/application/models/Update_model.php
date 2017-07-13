<?php


class  Update_model extends CI_Model{

/*
 * @table    表名
 * @arr      修改条件
 * @where    条件
 */
    public function upd($table,$arr,$where){

      $row=$this->db->update($table,$arr,"project_id=".$where);//
      return  $row;
    }


}

