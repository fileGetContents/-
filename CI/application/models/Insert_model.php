<?php
/**
 * Created by PhpStorm.
 * User: 庾治超
 * Date: 2016/9/1
 * Time: 10:36
 */


class  Insert_model  extends  CI_Model{

    /*
     *   添加
     */
    public  function ins($table,$new_project){

        $row=$this->db->insert($table,$new_project);
        if($row>0){
            return  1;//添加失败
        }else{
            return  0;//添加成功
        }
    }



}