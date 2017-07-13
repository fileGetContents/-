<?php
/**
 * Created by PhpStorm.
 * User: 庾治超
 * Date: 2016/8/27
 * Time: 9:07
 */

//  用户登陆控制器
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    /**
     * user显示
     */
     public function login(){

         $this->load->view('login');
     }
    /**
     * user登录
     */
    public  function login_user(){
        if(strtoupper($_SESSION["code"]) == strtoupper($_POST["code"])){//通过验证
         //获取用户的真实ip地址及其地址
        $this->load->model('Ip_model');                               //加载Ip方法
        $ip=$this->Ip_model->ip();
        $address=$this->Ip_model->ip_address($ip);                   //返回ip地址的数组
        $user["user_phone"]=$this->input->post("phone");             //获取账号
        $user["user_passwork"]=$this->input->post("passwork");       //获取密码
        $record["record_time"]=date("y-m-d h:i:s");                  //获取当前时间
        $record["record_ip"]=$ip;                                    //获取用户的真实IP地址
        $record["record_user_phone"]=$user['user_phone'];            //获取用户的登录账号
        $record["record_address"]=$address['city'];                          //获取用户登录地址
        //判断是否记住密码；
        $remember=$this->input->post("checkbok");
        if($remember==2){
            setcookie("phone",$user["user_phone"],time()+36000,"/");            //记住账号
            setcookie("pass",$user["user_passwork"],time()+36000,"/");          //记住密码
        }else{
            setcookie("phone",$user["user_phone"],  time()-36000,"/");          //删除账号
            setcookie("pass",$user["user_passwork"],time()-36000,"/");          //删除密码
        }
        $row=$this->db->select("*")->from("user")->where($user)->get();         //执行语句
        $result=$row->result_array();                                           //返回数组
        //查看是否有消息
        $mes["message_user_phone"]=$user["user_phone"];
        $mes["message_tag"]=1;
        $mes_sel=$this->db->select("message_tag")->from("message")->where($mes)->get();
        $mes_arr=$mes_sel->result_array();
        if(!empty($mes_arr)){
            $this->session->set_userdata("message","mail");
        }else{
            $this->session->set_userdata("message","mail11");
        }
        if(!empty($result)){
            $ip=$this->db->insert("user_record",$record);//执行语句
            //数组不为空
            $this->session->set_tempdata("user_phone",$user['user_phone'],3600);
            echo   1;   //用户登录成功
        }else{
            echo   0;   //登录失败返回值
        }
        }else{
            echo 2;
        }
    }

    public   function  ajax_phone(){
        $user["user_phone"]=$this->input->post("phone");
        $db=$this->db->select("user_phone")->from("user")->where($user)->get();
        $m=$db->result_array();
        if(!empty($m)){
            echo   "true";
        }else{
            echo   "false";
        }
    }


    public function ajax_cop(){
        if(strtoupper($_SESSION["code"]) == strtoupper($_POST["code"])) {   //通过验证
            echo       "true";
        }else{
              echo      "false";
        }

    }




    /**
     * 版本1.0
     */

    //显示登陆
    public function index()
    {
        $this->load->view('login');
    }

    //显示验证码
    public function Verify(){
        $_SESSION['code'] = null;
        $this->load->model('Captcha_model');
        $this->Captcha_model->captcha(4);
    }

//
//    //用户登陆
//    public function  login(){
//        //获取用户的真实ip地址及其地址
//        $this->load->model('Ip_model');                               //加载Ip方法
//        $ip=$this->Ip_model->ip();
//        $address=$this->Ip_model->ip_address($ip);                   //返回ip地址的数组
//        $user["user_phone"]=$this->input->post("phone");             //获取账号
//        $user["user_passwork"]=$this->input->post("passwork");       //获取密码
//        $record["record_time"]=date("y-m-d h:i:s");                  //获取当前时间
//        $record["record_ip"]=$ip;                                    //获取用户的真实IP地址
//        $record["record_user_phone"]=$user['user_phone'];            //获取用户的登录账号
//        $record["record_address"]=$address['city'];                          //获取用户登录地址
//        //判断是否记住密码；
//        $remember=$this->input->post("checkbok");
//        if($remember==2){
//            setcookie("phone",$user["user_phone"],time()+36000,"/");            //记住账号
//            setcookie("pass",$user["user_passwork"],time()+36000,"/");          //记住密码
//        }else{
//            setcookie("phone",$user["user_phone"],  time()-36000,"/");          //删除账号
//            setcookie("pass",$user["user_passwork"],time()-36000,"/");          //删除密码
//        }
//        $row=$this->db->select()->from("user")->where($user)->get();//执行语句
//        $result=$row->result_array();                                           //返回数组
//        //查看是否有消息
//        $mes["message_user_phone"]=$user["user_phone"];
//        $mes["message_tag"]=1;
//        $mes_sel=$this->db->select("message_tag")->from("message")->where($mes)->get();
//        $mes_arr=$mes_sel->result_array();
//        if(!empty($mes_arr)){
//            $this->session->set_userdata("message","inline-block");
//        }else{
//            $this->session->set_userdata("message","none");
//        }
//
//        if(!empty($result)){
//            $ip=$this->db->insert("user_record",$record);//执行语句
//            //数组不为空
//            $this->session->set_userdata("user_phone",$user['user_phone']);
//            echo   1;   //用户登录成功
//        }else{
//            echo   0;   //登录失败返回值
//        }
//    }

//验证验证码
    public function captcha(){
        if(strtoupper($_SESSION["code"]) == strtoupper($_POST["code"])){
            //成功
            echo 1;
        }else{
            //失败
            echo 0;
        }

    }


    public function captcha2(){
        if(strtoupper($_SESSION["code"]) == strtoupper($_POST["code"])){
            //成功并发送验证码
            $this->load->model('CurlOpen_model');
            $appkey = 'd87365b3a73d7170';//你的appkey
            $mobile = $_SESSION['user_phone'];//手机号 超过1024请用POST
            $mun=$this->input->post("num");
            $content = '您的验证码为：'.$mun.' 请于10分钟内输入该验证码，完成验证。如非本人操作，请忽略本短信。【海投万户】';//utf8
            $url = "http://api.jisuapi.com/sms/send?appkey=".$appkey."&mobile=".$mobile."&content=".$content;
            $result =$this->CurlOpen_model->curlOpen($url);
            $jsonarr = json_decode($result,true);
            if($jsonarr['status'] != 0)
            {
                echo  0 ;  //失败
            }else{
                echo  1;  //成功
            }
        }else{
            //失败
            echo 0;
        }

    }

    /**
     *   注册验证码
     */
    public function captcha3(){
        if(strtoupper($_SESSION["code"]) == strtoupper($_POST["code"])){
             echo    'true';
        }else{
            echo     'false';
        }
    }









    //注销登陆
    public  function  sessionD(){
        $this->session->unset_userdata("user_phone");
        echo "<script> window.location='".site_url()."' </script>";
    }


    public  function  userGuide(){
        $this->load->view("userGuide");
    }


   public function jsapi(){
       $this->load->model('CurlOpen_model');
       $appkey = 'd87365b3a73d7170';//你的appkey
       $mobile = $this->input->post("mobile");//手机号 超过1024请用POST
       $mun=$this->input->post("num");
       $content = '您的验证码为：'.$mun.' 请于10分钟内输入该验证码，完成验证。如非本人操作，请忽略本短信。【海投万户】';//utf8
       $url = "http://api.jisuapi.com/sms/send?appkey=".$appkey."&mobile=".$mobile."&content=".$content;
       $result =$this->CurlOpen_model->curlOpen($url);
       $jsonarr = json_decode($result,true);
       if($jsonarr['status'] != 0)
       {
           echo  $jsonarr['status'] ;  //失败
      }else{
           echo  $jsonarr['status'] ;  //成功
       }


   }




    /**
     *忘记密码
     */
    public function reset(){

        $this->load->view("login_reset");

    }
    /**
     * 查询用户是否存在
     */
    public function presence(){
        $user['user_phone']=$this->input->post('phone');
        $phone="/^1[34578]\\d{9}$/";
        if(preg_match($phone,$user['user_phone'])){
            $db=$this->db->select("*")->from("user")->where($user)->get();
            $use=$db->result_array();
            if(!empty($use)){
                echo "true";//存在
            }else{
                echo 'false';//不存在
            }

        }else{
            echo "false";//不是一个电话号码
        }
    }

    /**
     * 发送验证吗
     */
    public function send(){
        if(strtoupper($_SESSION["code"]) == strtoupper($_POST["code"])){
            $phone=$this->input->post("phone");//18280195336;//
            $match="/^1[34578]\\d{9}$/";
            if(preg_match($match,$phone)){  //判定是否为电话号码
                $db=$this->db->select("user_phone")->from("user")->where(array("user_phone"=>$phone))->get();
                $result=$db->result_array();
                if(!empty($result)){
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
                           echo  "false" ;  //失败
                       }else{
                           echo  $mun; //成功
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


    /**
     * 修改密码
     */
    public  function  up(){

        $user=$this->input->post("phone");                                         //获取账号信息
        $data["user_passwork"]=$this->input->post("passwork");                    //获取新的密码
        $phone="/^1[34578]\\d{9}$/";
        if(preg_match($phone,$user)){
            $row=$this->db->update("user",$data,"user_phone=".$user);
            if($row>0){//修改成功
                echo 1;
            }else{
                echo 0;
            }
        }


    }





    public  function  capate(){
       $where=array(
       'cash_bank_number'=>$this->input->post('bank'),                                  //获取银行卡编号
       'cash_money' =>$this->input->post('money'),                                      //提现金额
       'cash_time'=>date('Y:m:d H:i:s'),                                                //申请时时间
       'cash_tag'=>0,                                                                   //0申请成功   1提现成功
       'cash_user_phone'=>$_SESSION['user_phone'],
       'cash_order'=>time(),
       );
        $money_db=$this->db->select('user_money')->from('user')->where('user_phone='.$_SESSION['user_phone'])->get();
        $money=$money_db->result_array();
        $money_yu=$money[0]['user_money']-$where['cash_money'];
      if($money_yu>=0){
          $this->db->trans_start();
          $this->db->update('user',array('user_money'=>$money_yu),array('user_phone'=>$_SESSION['user_phone']));
          $this->db->insert('user_cash',$where);
          $this->db->trans_complete();
          if ($this->db->trans_status() === FALSE){
            echo  0;
          }else{
             echo  1;
          }
      }else {
            echo 2;
      }
  }




    //删除银行卡
    public  function  bank_delect(){

        $bank_number=$this->input->post('bank_number');
        $row=$this->db->delete('user_bank',array('bank_number'=>$bank_number));
        $a=$this->db->last_query();
        $this->session->set_userdata('aaa',$a);
        if($row>0){
            echo 1;
        }else{
            echo 0;
        }

    }



    //申请退款
    public   function  refund()
    {
        $where['refund_user_phone'] = $_SESSION['user_phone'];                  //电话号码
        $where['refund_associated_order'] = $this->input->post('order');        //订单号
        $where['refund_why'] = $this->input->post('why');                       //申请退款理由
        $where['refund_money'] = $this->input->post('money');                   //申请金额
        $where['refund_tag'] = 1;                                               //未完成
        $where['refund_time'] = date('Y-m-d H:i:s');                            //申请时间
         //查看是否完成签字   完成签字无法申请退款
        $ass_db=$this->db->select("associated_contract")->from('associated_up')->where(array('associated_order'=> $where['refund_associated_order']))->get();
        $ass=$ass_db->result_array();

        if($ass[0]['associated_contract']!=1){
           $row = $this->db->insert('user_refund', $where);
           if ($row > 0) {
               echo 1; //申请成功
           } else {
               echo 0; //申请
           }
       }else{
           echo  2;//已经完成签字   不能经行退款
       }
    }

}


