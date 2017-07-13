<?php
/**
 * 短信控制器
 * User: 庾治超
 * Date: 2016/12/2
 * Time: 9:46
 */

class   Wanhuu_message  extends CI_Controller{



    //短信控制器
    public  function  index(){

        //查看权限
        $this->load->model("Wanhuu_model");
        $this->Wanhuu_model->permissions("permissions_note","查看");
        $n=$this->uri->segment(3,0);
        $mobile_db=$this->db->select("*")->from("user_mobile")->order_by("mobile_id","DESC")->limit(12,$n)->get();
        $index['mobile']=$mobile_db->result_array();
        //加载分页
        $this->load->library('pagination');
        $this->load->model("Page_model","page");
        //   $total_rows,$base_url,$page=6
        $base_url=site_url("Wanhuu_message/index");  //分页显示地址
        $rows_db=$this->db->select('mobile_id')->from("user_mobile")->get();
        $total_rows= $rows_db->num_rows();    //总数量
        $config=$this->page->page($total_rows,$base_url,$page=12);
        $this->pagination->initialize($config);
        $this->load->view("admin/message/index",$index);
    }
    public function index_modal(){
        $this->load->view("admin/message/index_modal");
    }

//极数api  发送短信
    public function  index_sendApi(){
        $this->load->model('Wanhuu_model');
        $this->Wanhuu_model->permissions("permissions_note","发送");
         $a="";
        $time=$this->input->post("time");                   //时间
        $content=$this->input->post("content");             //发送的内容
        $way=$this->input->post("way");                     //方式
        $phone=$this->input->post("phone");                 //自定义的电话号码
        $where["mobile_time"]=str_replace("T"," ",$time);
        $where['mobile_tag']=0;
        $where['mobile_content']=$content;
        if($way=="custom"){
            $where["mobile_way"]="自定义";
            $user=explode(",",$phone);//获取电话号码
            $a=$user;
           for($i=0;$i<count($user);$i++){
               $where["user_mobile"]=$user[$i];
               $this->db->insert("user_mobile",$where);
           }

        }elseif($way==1){
            $where["mobile_way"]="所有会员";
            $user_db=$this->db->select("user_phone")->from("user")->get();
            $user=$user_db->result_array();
            foreach($user as $value){
                $where["user_mobile"]=$value["user_phone"];
                $this->db->insert("user_mobile",$where);
                $a=$a.$value["user_phone"].",";
            }
        }else{
            $where["mobile_way"]=$way."级会员";
            $user_db=$this->db->select("user_phone")->from("user")->where(array("user_grade"=>$way))->get();
            $user=$user_db->result_array();
            foreach($user as $value){
                $where["user_mobile"]=$value["user_phone"];
                $this->db->insert("user_mobile",$where);
                $a=$a.$value["user_phone"].",";
            }
        }
        //发送短信
        $this->load->model('CurlOpen_model');
        $mobile = $a;
        $url = "http://api.jisuapi.com/sms/send";
        $post_data = array(
            'appkey' => 'd87365b3a73d7170',//key
            'mobile' =>$mobile,
            'content'=>$content,
        );
        $result =$this->CurlOpen_model->send_post($url,$post_data);

    }


    public function mail(){
        $n=$this->uri->segment(3,0);
        $email_db=$this->db->select("*")->from("user_email")->limit(12,$n)->order_by("email_id","DESC")->get();
        $mail['email']=$email_db->result_array();
        $this->load->library('pagination');
        $this->load->model("Page_model","page");
        $base_url=site_url("Wanhuu_message/mail");  //分页显示地址
        $rows_db=$this->db->select('email_id')->from("user_email")->get();
        $total_rows= $rows_db->num_rows();    //总数量
        $config=$this->page->page($total_rows,$base_url,$page=12);
        $this->pagination->initialize($config);                                       //加载配置
        $this->load->view("admin/message/mail",$mail);
    }

   public   function mail_modal(){

       $this->load->view("admin/message/mail_modal");
   }
    //添加数据库
  public function mail_insert(){
      //查看权限
      $this->load->model("Wanhuu_model");
      $this->Wanhuu_model->permissions("permissions_email","发送");
      $time=$this->input->post("time");                   //时间
      $email_name=$this->input->post("email_name");       //邮箱标题
      $email_content=$this->input->post("email_content"); //邮箱内容
      $way=$this->input->post("way");                     //方式
      $phone=$this->input->post("phone");                 //发送的电话号码
      if($way==1){
          $user_db=$this->db->select("user_phone,user_email")->from("user")->get();//获取所有电话号码
          $user=$user_db->result_array();
          foreach($user as $user_value){
              if($user_value['user_email']!=null){
                  $where=array(
                      "email_user_phone"=>$user_value["user_phone"],
                      "email_name"      =>$email_name,
                      "email_content"   =>$email_content,
                      "email_time"      =>str_replace("T"," ",$time),
                      "email_way"       =>"所有会员",
                      "email_tag"       =>0,
                      "email_user_email"=>$user_value['user_email']
                  );
                    $this->db->insert("user_email",$where);
              }
          }

      }elseif($way=="custom"){//自定义发送
          $user=explode(",",$phone);
          for($i=0;$i<count($user);$i++){
             $user1_db=$this->db->select("user_email")->from("user")->where(array("user_phone"=>$user[$i]))->get();
             $user1=$user1_db->result_array();
              $where=array(
                  "email_user_phone"=>$user[$i],
                  "email_name"      =>$email_name,
                  "email_content"   =>$email_content,
                  "email_time"      =>str_replace("T"," ",$time),
                  "email_way"       =>"自定义发送",
                  "email_tag"       =>0,
                  "email_user_email"=>
                      $user1[$i]['user_email']
              );
              $this->db->insert("user_email",$where);
          }
      }elseif($way=="S"){
          $user_db=$this->db->select("user_phone")->from("user")->where("user_grade=S")->get();//获取所有电话号码
          $user=$user_db->result_array();
          foreach($user as $user_value) {
              if ($user_value['user_email'] != null) {
                  $where=array(
                      "email_user_phone"=>$user_value["user_phone"],
                      "email_name"      =>$email_name,
                      "email_content"   =>$email_content,
                      "email_time"      =>str_replace("T"," ",$time),
                      "email_way"       =>"S级会员",
                      "email_tag"       =>0,
                      "email_user_email"=>$user_value['user_email']
                  );
                  $this->db->insert("user_email", $where);
              }
          }
      }elseif($way=="A"){
          $user_db=$this->db->select("user_phone")->from("user")->where(array("user_grade"=>"A"))->get();//获取所有电话号码
          $user=$user_db->result_array();
          foreach($user as $user_value) {
              if ($user_value['user_email'] != null) {
                  $where=array(
                      "email_user_phone"=>$user_value["user_phone"],
                      "email_name"      =>$email_name,
                      "email_content"   =>$email_content,
                      "email_time"      =>str_replace("T"," ",$time),
                      "email_way"       =>"A级会员",
                      "email_tag"       =>0,
                      "email_user_email"=>$user_value['user_email']
                  );
                          $this->db->insert("user_email",$where);
              }
          }
      }elseif($way=="B"){
          $user_db=$this->db->select("user_phone")->from("user")->where(array("user_grade"=>"B"))->get();//获取所有电话号码
          $user=$user_db->result_array();
          foreach($user as $user_value) {
              if ($user_value['user_email'] != null) {
                  $where=array(
                      "email_user_phone"=>$user_value["user_phone"],
                      "email_name"      =>$email_name,
                      "email_content"   =>$email_content,
                      "email_time"      =>str_replace("T"," ",$time),
                      "email_way"       =>"B级会员",
                      "email_tag"       =>0,
                      "email_user_email"=>$user_value['user_email']
                  );
                       $this->db->insert("user_email",$where);
              }
          }
      }elseif($way=="C"){
          $user_db=$this->db->select("user_phone")->from("user")->where(array("user_grade"=>"C"))->get();//获取所有电话号码
          $user=$user_db->result_array();
          foreach($user as $user_value) {
              if ($user_value['user_email'] != null) {
                  $where=array(
                      "email_user_phone"=>$user_value["user_phone"],
                      "email_name"      =>$email_name,
                      "email_content"   =>$email_content,
                      "email_time"      =>str_replace("T"," ",$time),
                      "email_way"       =>"C级会员",
                      "email_user_email"=>$user_value['user_email'],
                      "email_tag"       =>0,
                  );
                        $this->db->insert("user_email",$where);
              }
          }
      }
      //开始以次发送邮件
      $email_db=$this->db->select("*")->from("user_email")->where(array("email_tag"=>0))->get();
      $email=$email_db->result_array();
      foreach($email as $email_value){
        $this->load->model("Email_model","Email");
        $result=$this->Email->email($email_value["email_user_email"],$email_value['email_name'],$email_value['email_content']);
        $this->db->update("user_email",array("email_tag"=>1),"email_id=".$email_value['email_id']);
         sleep(2);
      }
  }

    /**
     * 删除邮件发送记录
     */
    public function ajax_delect(){
        $email['email_id']=$this->input->get('id');
        $row=$this->db->delete('user_email',$email);
        if($row>0){
            echo  1;
        }else{
            echo  0;
        }
    }

    /**
     * 邮件详情
     */
    public function details(){
         $email['email_id']=$this->input->get('id');
         $db=$this->db->select('*')->from('user_email')->where($email)->get();
         $details['email']=$db->result_array();
         $this->load->view('admin/message/mail_details',$details);
    }

   public function  station(){

       $this->load->model("Wanhuu_model");
       $this->Wanhuu_model->permissions("permissions_station","查看");

       $n=$this->uri->segment(3,0);
       $message_db=$this->db->select("*")->from("message")->order_by("message_id","DESC")->limit(12,$n)->get();
       $station['message']=$message_db->result_array();
       //加载分页
       $this->load->library('pagination');
       $this->load->model("Page_model","page");
       //   $total_rows,$base_url,$page=6
       $base_url=site_url("Wanhuu_message/station");  //分页显示地址
       $rows_db=$this->db->select('message_id')->from("message")->get();
       $total_rows= $rows_db->num_rows();    //总数量
       $config=$this->page->page($total_rows,$base_url,$page=12);
       $this->pagination->initialize($config);                                       //加载配置
       $this->load->view("admin/message/station",$station);
   }


  public function station_modal(){


      $this->load->view("admin/message/station_modal");
  }


    public function station_delect(){
        $this->load->model("Wanhuu_model");
        $this->Wanhuu_model->permissions("permissions_station","删除");
        $station['message_id']=$this->input->get("station");
        $row=$this->db->delete("message",$station);
        if($row>0){
            echo 1;
        }else{
            echo  0;
        }

    }


    //短信发送接口
    public function station_SMSapi(){

    }





   //添加站内消息
    public function  station_insert(){

      $this->load->model("Wanhuu_model");
      $this->Wanhuu_model->permissions("permissions_station","发送");


      $time=$this->input->post("time");  //时间
       $way=$this->input->post("way");   //方式
      $name=$this->input->post("name");  //内容
      $phone=$this->input->post("phone");//发送的电话号码
      if($way==1){
      $user_db=$this->db->select("user_phone")->from("user")->get();//获取所有电话号码
      $user=$user_db->result_array();
       foreach($user as $user_value){
        $where=array(
            "message_user_phone"=>$user_value["user_phone"],
            "message_name"      =>$name,
            "message_time"      =>str_replace("T"," ",$time),
            "message_tag"       =>0,
            "message_way"       =>"所有会员"
        );
        $this->db->insert("message",$where);
       }
      }elseif($way=="custom"){//自定义发送
      $user=explode(",",$phone);
      for($i=0;$i<count($user);$i++){
          $where=array(
              "message_user_phone"=>$user[$i],
              "message_name"      =>$name,
              "message_time"      =>str_replace("T"," ",$time),
              "message_tag"       =>0,
              "message_way"       =>"自定义发送"
          );
                 $this->db->insert("message",$where);
          }
      }elseif($way=="S"){
          $user_db=$this->db->select("user_phone")->from("user")->where(array("user_grade"=>"S"))->get();//获取所有电话号码
          $user=$user_db->result_array();
          foreach($user as $user_value){
              $where=array(
                  "message_user_phone"=>$user_value["user_phone"],
                  "message_name"      =>$name,
                  "message_time"      =>str_replace("T"," ",$time),
                  "message_tag"       =>0,
                  "message_way"       =>"S级会员"
              );
              $this->db->insert("message",$where);
          }
      }elseif($way=="A"){
          $user_db=$this->db->select("user_phone")->from("user")->where(array("user_grade"=>"A"))->get();//获取所有电话号码
          $user=$user_db->result_array();
          foreach($user as $user_value){
              $where=array(
                  "message_user_phone"=>$user_value["user_phone"],
                  "message_name"      =>$name,
                  "message_time"      =>str_replace("T"," ",$time),
                  "message_tag"       =>0,
                  "message_way"       =>"A级会员"
              );
              $this->db->insert("message",$where);
          }

      }elseif($way=="B"){
          $user_db=$this->db->select("user_phone")->from("user")->where(array("user_grade"=>"B"))->get();//获取所有电话号码
          $user=$user_db->result_array();
          foreach($user as $user_value){
              $where=array(
                  "message_user_phone"=>$user_value["user_phone"],
                  "message_name"      =>$name,
                  "message_time"      =>str_replace("T"," ",$time),
                  "message_tag"       =>0,
                  "message_way"       =>"B级会员"
              );
              $this->db->insert("message",$where);
          }

      }elseif($way=="C"){
          $user_db=$this->db->select("user_phone")->from("user")->where(array("user_grade"=>"C"))->get();//获取所有电话号码
          $user=$user_db->result_array();
          foreach($user as $user_value){
              $where=array(
                  "message_user_phone"=>$user_value["user_phone"],
                  "message_name"      =>$name,
                  "message_time"      =>str_replace("T"," ",$time),
                  "message_tag"       =>0,
                  "message_way"       =>"C级会员"
              );
              $this->db->insert("message",$where);
          }
      }

        header("Location: http://www.haitouwanhu.com/Wanhuu_message/station_modal");
    }




  public function  api(){

      //发送短信
      $this->load->model('CurlOpen_model');
      $appkey = 'd87365b3a73d7170';//你的appkey
      $mobile = "18280195336";//手机号 超过1024请用POST
      $content = '感谢您成功注册海投万户。添加实名认证后，就可以参加众筹啦。如有问题请联系海投万户。【海投万户】';//utf8
      $url = "http://api.jisuapi.com/sms/send";
      $post_data = array(
          'appkey' =>$appkey,
          'mobile' =>$mobile,
          'content'=>$content,
      );
      $result =$this->CurlOpen_model->send_post($url,$post_data);

//      $a="";
//      if($way=="custom"){
//
//          for($i=0;$i<count($user);$i++){
//              $a=$a .$user['i'].",";
//          }
//      }else{
//          foreach($user as $user_value){
//              $a=$a.$user_value['user_phone'].',';
//          }
//      }
//      $this->load->model('CurlOpen_model');
//      $appkey = 'd87365b3a73d7170';//你的appkey
//      $mobile = $a;//手机号 超过1024请用POST
//      $content = '感谢您成功注册海投万户。添加实名认证后，就可以参加众筹啦。如有问题请联系海投万户。【海投万户】';//utf8
//      $url = "http://api.jisuapi.com/sms/send";
//      $post_data = array(
//          'appkey' =>$appkey,
//          'mobile' =>$mobile,
//          'content'=>$content,
//      );
//      $result =$this->CurlOpen_model->send_post($url,$post_data);
  }
}