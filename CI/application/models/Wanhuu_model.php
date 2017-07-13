<?php
/**
 * 权限管理.
 * User: 庾治超
 * Date: 2017/1/11
 * Time: 17:10
 */

class  Wanhuu_model extends CI_Model{

//权限
    /**
     * @param $where  类型权限
     * @param $limits 权限字段
     */
    public  function  permissions($where,$limits){

       $db=$this->db->select("*")->from('permissions')->where(array('permissions_admin_id'=>$_SESSION['admin_id']))->get();
       $per=$db->result_array();//结果集
            $a=explode("/",$per[0][$where]);  //截取
            if(!in_array($limits,$a)) {
                exit('权限不足');
            }
    }



   }