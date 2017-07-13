<?php
/**
 * 首页控制器.
 * User: 庾治超
 * Date: 2016/12/2
 * Time: 9:47
 */

class  Wanhuu_system  extends CI_Controller{


    public  function  index(){
        //会员统计
         $time_admin_db=$this->db->select('time')->from('admin')->where(array('admin'=>$_SESSION['admin']))->get();
         $index["admin_time"]=$time_admin_db->result_array()[0]['time'];
         $query="select  count(user_id) as num from  ci_user where user_name is NULL ";
         $num_db=$this->db->query($query);
         $index['user_no_certification']=$num_db->result_array()[0]['num'];//未认证
         $query2="select  count(user_id) as num2 from  ci_user where user_name !=''" ;
         $num2_db=$this->db->query($query2);
         $index['user_certification'] =$num2_db->result_array()[0]['num2'];//认证数
         $query2="select DISTINCT associated_userid from  ci_associated_up ";
         $ass_db=$this->db->query($query2);
         $index['user_investment']=$ass_db->num_rows();  //投资用户
         //昨日投资用户
         $time=date('Y-m-d H:i:s',time()-24*3600);
         $ass_query2="SELECT distinct('associated_userid') FROM `ci_associated_up` WHERE `associated_time` < '".$time."'";
         $ass_db2=$this->db->query($ass_query2);
         $index['yes_a_a']=$ass_db2->num_rows();//昨日投资用户
         $index['yes_member']=0;
         $mem_query="SELECT * FROM `ci_user` WHERE `user_time` < '".$time."'";
         $mem=$this->db->query($mem_query);
         $index['yes_member']=$mem->num_rows();
         //项目统计
         $pro_db=$this->db->select("*")->from("project")->get();
         $pro=$pro_db->result_array();
         $index["pro_num"]=$pro_db->num_rows();   //项目上线数
         $index["pro_num_success"]=0;             //成功项目数
         foreach($pro as $pro_vaule){
            if($pro_vaule['project_tag']==0){
                 $index["pro_num_success"]++;
            }
         }
          $index['pro_money']=0;                //项目总额
          $g_a_db=$this->db->select("*")->from("associated_up")->join("project_gear","gear_projectid=associated_projectid","left")->get();
          $ga=$g_a_db->result_array();
           foreach($ga as $ga_value) {
                $index['pro_money']=$index['pro_money']+$ga_value["associated_score"]*$ga_value['gear_each'];
           }
         $pro_a_db=$this->db->select("gear_cycle,project_time_over")->from("project")->where("project_tag=0")->join("project_gear","gear_projectid=project_id","left")->get();
         $project=$pro_a_db->result_array();
         $index["project_time"]="";
         $num_x=0;
         foreach($project as $project_value){
             $a="+ ".$project_value['gear_cycle'] ." months";
             $time1=strtotime($a, strtotime($project_value['project_time_over']));
             $time=$time1-time();
             if($time>0){
                 if($num_x==0){
                     $index["project_time"]=floor($time/3600/24);
                     $num_x++;
                 }else{
                     if($index["project_time"]>floor($time/3600/24)){
                         $index["project_time"]=floor($time/3600/24);
                     }
                 }
              }
         }
        //现金提现
        $cash_db_no=$this->db->select("*")->from('user_cash')->where(array("cash_tag"=>null))->get();
        $index["cash_no"]=$cash_db_no->num_rows();  //待审核
        $index['yes_cash_no']=0;                    //昨日待审核
        $cas=$cash_db_no->result_array();
        foreach($cas as $cas_vaule){
            $cas_time=strtotime($cas_vaule['cash_time']);
            if($cas_time<time()-3600*24){
                $index['yes_cash_no']++;
            }
        }
        $cash_db_ok=$this->db->select("*")->from('user_cash')->where(array("cash_tag"=>1))->get();
        $index["cash_ok"]=$cash_db_ok->num_rows();   //提现完成
        $cas2=$cash_db_ok->result_array();
        $index['yes_cash_ok']=0;                     //昨日待审核
        foreach($cas2 as $cas2_value ){
            $cash2=strtotime($cas2_value['cash_time']);
            if($cash2<time()-24*3600){
                $index['yes_cash_ok']++;
            }
        }
        //昨日统计
        $yes_db=$this->db->select("*")->from('user')->get();
        $yes=$yes_db->result_array();
        $num=0;             //会员数
        foreach($yes as $value){
            //24*60*60
            $time=strtotime($value['user_time'])-time();
            if($time<24*60*60){
              $num++;
            }
        }
        $index['member']=$num;
        $yes_a_db=$this->db->select('*')->from('associated_up')->join('user',"associated_userid=user_id",'left')->get();
        $yes_a=$yes_a_db->result_array();
        $yes_a_num=0;      //投资用户
        foreach($yes_a as $value){
            $time_yes=strtotime($value['associated_time'])-time();
            if($time_yes<24*60*60){
              $yes_a_num++;
            }
        }
        $index['yes_a_num']=$yes_a_num;

        //昨日项目统计
        $index['yes_p_s']=0;//昨日成功项目
        $index['yes_p_e']=0;//昨日上线项目
        $pro_db=$this->db->select("*")->from('project')->get();
        $pro=$pro_db->result_array();
        foreach($pro as $value){
            if($value['project_tag']==0){
                $pro_time=strtotime($value['project_time_over']);
                if($pro_time<time()-24*3600){
                    $index['yes_p_s']++;
                }
            }elseif($value['project_tag']==2){
                    $index['yes_p_e']++;
            }
        }
        $this->load->view("admin/system/index",$index);
    }




}