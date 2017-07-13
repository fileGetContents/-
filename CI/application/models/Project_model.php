<?php
/**
 * Created by PhpStorm.
 * User: 庾治超
 * Date: 2016/9/30
 * Time: 9:35
 */

class   Project_model  extends  CI_Model{


    //修改项目的
    public function   update(){

        $project_db=$this->db->select("project_time_start,project_time_over")->where("project_id=1")->get();
        $time=$project_db->reslut_array();//返回数组



    }




}