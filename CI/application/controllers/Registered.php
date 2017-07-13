<?php
/**
 * Created by PhpStorm.
 * User: 庾治超
 * Date: 2016/8/27
 * Time: 11:00
 */

// 用户注册控制器

defined('BASEPATH') OR exit('No direct script access allowed');

class Registered extends CI_Controller {


    public function index()
    {
        $this->load->view('registered');
    }

    //添加新用户
     public   function insert(){
             $user['user_phone'] = $this->input->post('phone');                           //获取账号
             $user['user_passwork'] = $this->input->post('password');                     //获取密码
             $preg="/^1[34578]\\d{9}$/";
             $recommended=$this->input->post("recommended");                               //推荐码
             if(preg_match($preg,$user['user_phone'])){  //验证密码
                 $db=$this->db->select("*")->from("user")->where(array("user_phone"=>$user['user_phone']))->get();
                 $user_db=$db->result_array();
                 if(!empty($user_db)){
                     echo  3;  //已经被注册过了
                 }else{
                     $user["user_time"] = date("Y-m-d H:i:s");
                     $user['user_money'] = 0;
                   $row = $this->db->insert("user", $user);
                     if ($row > 0) {//添加成功
                         //保存用户账号信息
                         $message = array(
                             "message_user_phone" => $user['user_phone'],
                             "message_name" => "欢迎您,成为海投萬户的用户",
                             "message_time" => date("Y-m-d h:i:s"),
                             "message_tag" => 1
                         );
                         $this->db->insert("message", $message);
                         $this->session->set_userdata("user_phone", $user['user_phone']);
                         $this->session->set_userdata("message", "inline-block");
                         //发送短信
                         $this->load->model('CurlOpen_model');
                         $appkey = 'd87365b3a73d7170';//你的appkey
                         $mobile = $user['user_phone'];//手机号 超过1024请用POST
                         $content = '感谢您成功注册海投万户。添加实名认证后，就可以参加众筹啦。如有问题请联系海投万户。【海投万户】';//utf8
                         $url = "http://api.jisuapi.com/sms/send?appkey=" . $appkey . "&mobile=" . $mobile . "&content=" . $content;
                         $result = $this->CurlOpen_model->curlOpen($url);
                         $jsoninsertarr = json_decode($result, true);
                         if($recommended!=$user['user_phone']){
                           $db=$this->db->select("user_phone")->from("user")->where(array("user_phone"=>$recommended))->get();
                           $rec=$db->result_array();
                             if(!empty($rec)){
                                 $this->db->insert("user_recommended",array("recommend_oldUser"=>$recommended,"recommend_newUser"=> $user['user_phone']));
                             }
                         }

                         //这里是添加用户的红包
                         $this->db->insert("envelope",
                             array(
                                 "envelope_user_phone"=>$user['user_phone'],
                                 "envelope_money"       =>16,
                                 "envelope_range"       =>"满¥1000减¥16",
                                 "envelope_start"       =>"2017-1-18 00:00:00",
                                 "envelope_over"        =>"2017-2-18 00:00:00",
                                 "envelope_source"      =>"新年大礼包",
                                 "envelope_tag"         =>1,
                             )
                         );

                         $this->db->insert("envelope",
                             array(
                                 "envelope_user_phone"=>$user['user_phone'],
                                 "envelope_money"       =>36,
                                 "envelope_range"       =>"满¥5000减¥36",
                                 "envelope_start"       =>"2017-1-18 00:00:00",
                                 "envelope_over"        =>"2017-2-18 00:00:00",
                                 "envelope_source"      =>"新年大礼包",
                                 "envelope_tag"         =>1,
                             )
                         );

                         $this->db->insert("envelope",
                             array(
                                 "envelope_user_phone"=>$user['user_phone'],
                                 "envelope_money"       =>66,
                                 "envelope_range"       =>"满¥10000减¥66",
                                 "envelope_start"       =>"2017-1-18 00:00:00",
                                 "envelope_over"        =>"2017-2-18 00:00:00",
                                 "envelope_source"      =>"新年大礼包",
                                 "envelope_tag"         =>1,
                             )
                         );

                         echo 1;  //成功
                     } else {
                         echo 0;//注册失败
                     }
                 }
             }else{
                 echo  4;//手机号不正确
             }

     }



    //判断电话号码是否被注册过
    public  function  in(){
        $phone=$this->input->post("phone");                                                                 //获取账号信息
        $row=$this->db->select("user_phone")->where(array("user_phone"=>$phone))->from("user")->get();                 //查询账号
        $true=$row->result_array();
        if(!empty($true)){
            echo    'false';//存在这样一个账号
        }else{
            echo    'true';//不存在这样一个账号
        }

    }


    public  function  send(){

      if(strtoupper($_SESSION["code"]) == strtoupper($_POST["code"])){
          $phone=$this->input->post("phone");//18280195336;//
          $match="/^1[34578]\\d{9}$/";
          if(preg_match($match,$phone)){  //判定是否为电话号码
              $db=$this->db->select("user_phone")->from("user")->where(array("user_phone"=>$phone))->get();
              $result=$db->result_array();

              if(empty($result)){
            //    发送短信
                $this->load->model('CurlOpen_model');
                $appkey = 'd87365b3a73d7170';//你的appkey
                $mobile = $phone;//手机号 超过1024请用POST
                $mun=rand(100000,999999);//验证码
                $this->session->set_userdata("cap_num",$mun);  //保存验证码
                $content = '您的验证码为：'.$mun.' 请于10分钟内输入该验证码，完成验证。如非本人操作，请忽略本短信。【海投万户】';//utf8
                $url = "http://api.jisuapi.com/sms/send?appkey=".$appkey."&mobile=".$mobile."&content=".$content;
                $result =$this->CurlOpen_model->curlOpen($url);
                $jsonarr = json_decode($result,true);
                       if($jsonarr['status'] != 0)
                       {
                           echo  0 ;  //失败
                       }else{
                           echo  $mun;  //成功
                       }

              }else{
                echo  0;//已经存在该电话号码
              }
          }else{
              echo 0;//电话号码匹配失败
          }

     }else{
         echo  0; //验证码失败
     }

    }


    public function  cap_num(){
        if(isset($_SESSION['cap_num'])){
            $num=$this->input->post('num');
            if($num==$_SESSION['cap_num']){
                 echo "true";   //成功
            }else{
                 echo  "false";
            }
        }else{
            echo "false";
        }
    }

}
