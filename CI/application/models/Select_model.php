<?php
/**
 * Created by PhpStorm.
 * User: 庾治超
 * Date: 2016/9/2
 * Time: 15:14
 */

class  Select_model extends CI_Model{

    //整张表查询
    public function  sel($table,$where){
        $row=$this->db->select()->from($table)->where($where)->get();
        $rew=$row->result_array();                                     //返回一个二维数组
        return  $rew;
    }



}