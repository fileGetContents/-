<?php
/**
 * Created by PhpStorm.
 * User: 庾治超
 * Date: 2016/11/17
 * Time: 14:59
 */

class  Wanhuu  extends CI_Controller{


   public function index(){
       $this->load->view("admin/load");
   }

//管理员登录
    public function login(){
        $where['admin']   =$this->input->post("admin");                 //账号
        $where['password']=md5($this->input->post('password'));          //密码
        $admin_db=$this->db->select('*')->from("admin")->where($where)->get();
        $admin=$admin_db->result_array();
        if(!empty($admin)){
          //  $this->session->set_userdata("user_phone","18280195336");
            //修改登录时间
            $this->db->update('admin',array('time'=>date('Y-m-d H:i:s')),array('admin_id'=>$admin[0]['admin_id']));
            $this->session->set_userdata("admin",$where['admin']);
            $this->session->set_userdata("admin_id",$admin[0]['admin_id']);
              echo 1;
        }else{
            echo   0;//登录失败
        }

    }

//显示首页
    public  function  admin_index(){


       if(isset($_SESSION['admin'])){
        $this->load->view('admin/index.php');
       }else{
           header("location:www.baidu.com");
       }
    }

}