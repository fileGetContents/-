<?php

/**
 * 个人中心控制器
 */

//关于我们
class  Personal  extends CI_Controller {

//基本资料
    public  function index(){
        if(isset($_SESSION['user_phone'])){
            $phone=$_SESSION['user_phone'];
        }else{
            header("location:".site_url());
        }

        //修改全消息为0
        $this->db->update("message",array("message_tag"=>0),array("message_user_phone"=>$_SESSION['user_phone']));
        $this->session->set_userdata("message","mail11");
      //个人资料
        $user_db=$this->db->select("*")->from("user")->where(array("user_phone"=>$phone))->get();
        $user=$user_db->result_array();
//真实姓名：1111身份证号码：513922****0650 已经认证
        foreach($user as $value){
            if($value["user_email"]==null){ $personal['email']='[未设置]';$personal['email_way']="设置邮箱";}else{$personal['email']=$value['user_email'];$personal["email_way"]="修改邮箱";}    //邮箱
            if($value['user_sex']==null){$personal["address"]="[未设置]";}else{$personal["address"]=$value['user_sex'];} //住址
            if($value['user_wechat']==null){$personal['wechat']="[未设置]";}else{$personal["wechat"]=$value['user_wechat'];}//微信号
            if($value["user_name"]==null){$personal['sheng']="申请认证";}else{$personal["user_name"]=$value["user_name"];$personal["user_IDcard"]=substr($value['user_IDcard'],0,4)."**********".substr($value['user_IDcard'],14,4);$personal['sheng']="已认证";}//身份验证
            if($value['user_money']==null){
                $personal['user_money_y']=0;
            }else{
                $personal['user_money_y']=$value['user_money'];
            };//余额

        }
      //投资记录
        $pro_db=$this->db->select("gear_each,associated_score")->from("associated_up")->where(array("associated_userid"=>$user[0]['user_id']))->join("project_gear","associated_projectid=gear_projectid  and  associated_digital=gear_digital","left")->get();
        $personal["user_num"]=$pro_db->num_rows();//投资次数
        $personal['user_money']=0;                //投资金额
        $pro=$pro_db->result_array();
        foreach($pro as $pro_vaule){
            $personal["user_money"]=$personal["user_money"]+($pro_vaule["gear_each"]*$pro_vaule['associated_score']);
        }
      //最新消息
       $mes_db=$this->db->select("*")->from("message")->where(array("message_user_phone"=>$phone))->limit(12,0)->get();
       $personal['message'] =$mes_db->result_array();
      //未支付项目
        $order_db=$this->db->select("*")->from("user_order")->where(array("order_userphone"=>$phone))->join("project","order_project_id=project_id","left")->join("project_gear",'gear_projectid=project_id  and gear_digital=order_project_di')->get();
        $order=$order_db->result_array();
        $personal["order"]=array();
        foreach($order as $order_value){
            if($order_value["order_time"]>time()){
                $order_value['money']=$order_value['order_project_sore']*$order_value['gear_each'];
                $order_value["href"]=base_url("Project/buy_jiyi")."?id=".$order_value['project_id']."&names=".$order_value['project_name']."&tag=".$order_value['gear_digital']."&price=".$order_value['gear_each']."&test_box=".$order_value['order_project_sore']."&proce_all=".$order_value['money'];
                $personal["order"][]=$order_value;
             //   $personal["order"]=base_url("project/index");
            }else{
                $this->db->delete("user_order",array("order_id"=>$order_value['order_id']));
            }

        }

        //查询活动奖励
        $en_db=$this->db->select("*")->from('envelope')->where(array('envelope_user_phone'=>$_SESSION['user_phone']))->order_by('envelope_id',"DESC")->limit(8,0)->get();
        $env=$en_db->result_array();
        $personal['envelope']=$env;

        $this->load->view("personal",$personal);
    }

    /**
     * 购买项目
     */
    public  function  personal_page(){
        if(isset($_SESSION['user_phone'])){
            $phone=$_SESSION['user_phone'];                //$_SESSION['user_phone'];
        }else{
           header("Location:http://www.haitouwanhu.com/Personal/index");
        }
        $user_db=$this->db->select("user_id")->from("user")->where(array("user_phone"=>$phone))->get();
        $user=$user_db->result_array()[0]["user_id"];
        $n=$this->uri->segment(3,0);
        $ass_db=$this->db->select("*")->from("associated_up")->where(array("associated_userid"=>$user))->join("project","associated_projectid=project_id","left")->join("project_gear","gear_projectid=associated_projectid and gear_digital=associated_digital","left")->limit(9,$n)->order_by("associated_id","DESC")->get();
        $ass=$ass_db->result_array();
        $p_page["page"]=array();
        foreach($ass as $value){
        $value['money']=$value['associated_score']*$value['gear_each'];
        if($value["project_tag"]==2){
            $value['contract'] ="未开放";
            $value['condition']="已预约";
        }else{
          if($value["associated_tag"]==1 && $value['associated_balance']==0 && $value['associated_state']==1){  //完成付款签署
               $value['contract']="<a  target='_Top'  href='".site_url("Pay/preview")."?signid=".$value['gear_sign']."&&docid=".$value['gear_sign_docid']."' >查看</a>";
               $value['condition']="已经完成";
          }elseif($value["associated_tag"]==0 && $value['associated_balance']>0){ //预约签署
              $value['contract']="待签署";
              $value['condition']="<a  href='".site_url('Project/index')."?id=".$value["associated_projectid"]."'>未支付</a>";
          }elseif($value['associated_state']==null && $value['associated_balance']==0 && $value["associated_tag"]==1){  //第二次购买
               $where=array(
                   'associated_projectid'=>$value['associated_projectid'],
                   'associated_digital'  =>$value['associated_digital'],
                   'associated_userid'   =>$value['associated_userid'],
               );
               $see_db=$this->db->select("*")->from("associated_up")->where($where)->get();
               $see=$see_db->result_array();
               foreach($see as $see_vaule){
                  if($see_vaule['associated_state']==1){
                      $c=1;
                  }
               }
              if(isset($c)){
                  $value['contract']="<a  href='".site_url("Pay/preview")."?signid=".$value['gear_sign']."&&docid=".$value['gear_sign_docid']."'>查看</a>";
                  $value['condition']="已经完成";
              }else{
                  $value['contract']="<a  target='_Top'  href='".site_url("Pay/loadSign")."?digital=".$value["associated_digital"]."&&projcet_id=".$value['associated_projectid']."' >待签署</a>";
                  $value['condition']= '<a href="javascript:void(0)" class="yellow" onclick="parent.showRefund(this)">申请退款</a>';
              }


          }

        }
            //判定是否有退款
            $refund_db=$this->db->select('refund_tag')->from('user_refund')->where(array('refund_associated_order'=>$value['associated_order']))->get();
            $refund=$refund_db->result_array();
            if(!empty($refund)){
               if($refund[0]['refund_tag']==1) {
                   $value['contract']="未开放";
                   $value['condition']= '退款中';
               }else{
                   $value['contract']="未开放";
                   $value['condition']= '退款完成';
               }
            }







        $p_page['page'][]=$value;
        }

//加载分页
        $this->load->library('pagination');                                            //加载分页辅助函数
        $base_url = base_url('Personal/personal_page');                             //分页显示地址
        $this->load->model('Page_model');
        $page=9;
        $num_db=$this->db->select("associated_id")->from('associated_up')->where(array("associated_userid"=>$user))->get();
        $num=$num_db->num_rows();
        $config=$this->Page_model->page($num,$base_url,$page);
        $this->pagination->initialize($config);                                        //加载配置

        $this->load->view("personal_page",$p_page);
    }

//修改微信号
    public function ajax_email(){
        $user["user_email"]=$this->input->post('email');//邮箱号
        $email="/^([a-zA-Z0-9_\\.\\-])+\\@(([a-zA-Z0-9\\-])+\\.)+([a-zA-Z0-9]{2,4})+$/";
        if(preg_match($email,$user['user_email'])){  //验证邮箱号
            $row=$this->db->update("user",$user,array("user_phone"=>$_SESSION['user_phone']));
            if($row>0){
                echo 1;
            }else{
                echo 0;
            }
        }else{
            echo 0;
        }

    }

//修改密码
    public function ajax_pass_work(){
     $user['user_passwork']  = $this->input->post("passwork");//密码
     $pass="/^[A-Za-z0-9]{6,16}$/";
     if(preg_match($pass,$user['user_passwork'])){
       $row=$this->db->update("user",$user,array("user_phone"=>$_SESSION['user_phone']));
         if($row>0){
             echo 1;
         }else{
             echo 0;
         }
     }else{
         echo 2;
     }

    }

//修改住住址
    public  function ajax_address(){
        $user['user_sex']=$this->input->post("address");
        if($user["user_sex"]!=""){
            $rows=$this->db->update("user",$user,array("user_phone"=>$_SESSION['user_phone']));
            if($rows>0){
                echo 1;
            }else{
                echo 0;
            }
        }else{
            echo  0;
        }
    }

//修改微信号
     public function  ajax_wechat(){

      $user['user_wechat']=$this->input->post("wechat");//微信号
      $wechat="/^[a-zA-Z][a-zA-Z0-9_-]{5,19}$/";
      $db=$this->db->select("user_wechat")->from("user")->where($user)->get();
      $wec=$db->result_array();
       if(empty($wec)){
           if(preg_match($wechat,$user['user_wechat'])){
               $rows=$this->db->update("user",$user,array("user_phone"=>$_SESSION['user_phone']));
               if($rows>0){
                   echo 1;
               }else{
                   echo 0;
               }
           }else{
               echo  0;
           }
       }else{
           echo 2;
       }

     }


//身份认证
    public function  ajax_IDcard(){
      $user['user_name']=$this->input->post("name");//姓名
      $user['user_IDcard']=$this->input->post("IDcard"); //身份证号
      $IDcard="/^[1-9]\\d{5}[1-9]\\d{3}((0\\d)|(1[0-2]))(([0|1|2]\\d)|3[0-1])\\d{3}([0-9]|X)$/";
   //   if(preg_match($name,$user['user_name'])){
          if(preg_match($IDcard,$user['user_IDcard'])){
              //这样一个身份证号
//              //api接口
              $this->load->model("CurlOpen_model");
              $url="http://api.jisuapi.com/idcardverify/verify?appkey=d87365b3a73d7170&idcard= ".$user['user_IDcard']."&realname=".$user['user_name'];
              $result = $this->CurlOpen_model->curlOpen($url); //curlOpen
              $jsonarr = json_decode($result, true);
              if($jsonarr['status'] != 0)
              {
                echo 0;
              }else{
              $result = $jsonarr['result'];
//        echo $result['idcard'].' '.$result['realname'].' '.$result['province'].' '.$result['city'].' '.$result['town'].'<br>';
//        echo $result['sex'].' '.$result['birth'].' '.$result['verifystatus'].' '.$result['verifymsg'].'<br>';
              $user_a=array(
                  "user_IDcard"=>$result['idcard'],                   //获取身份证号
                  "user_name"=>$result['realname'],                   //获取真实姓名
                  "user_province"=>$result['province'],               //获取省份
                  "user_city"=>$result['city'],                       //获取所在城市
                  "user_town"=>$result['town'],                       //获取所在城镇
                  "user_birth"=>$result["birth"],                     //获取用户生日
              );
              $row=$this->db->update("user",$user_a,"user_phone=".$_SESSION["user_phone"]);
              if($row>0){
                  echo  1;
              }else{
                  echo  0;
              }
              }

          }else{
              echo 0;
          }
     // }else{
    //        echo  0;
    //    }
    }

    //提现记录
   public  function advance(){
       if(isset($_SESSION['user_phone'])){
           $phone=$_SESSION['user_phone'];
       }else{
           header("location:".site_url());
       }
       $n=$this->uri->segment(9,0);
       $cash_db=$this->db->select("*")->from("user_cash")->where(array("cash_user_phone"=>$_SESSION['user_phone']))->order_by("cash_id","DESC")->limit(9,$n)->get();
       $cash["cash"]=$cash_db->result_array();
       //加载分页
       $this->load->library('pagination');                                            //加载分页辅助函数
       $base_url = base_url('Personal/advance');                             //分页显示地址
       $this->load->model('Page_model');
       $page=9;
       $num_db=$this->db->select("cash_id")->from('user_cash')->where(array("cash_user_phone"=>$_SESSION['user_phone']))->get();
       $num=$num_db->num_rows();
       $config=$this->Page_model->page($num,$base_url,$page);
       $this->pagination->initialize($config);                                        //加载配置
       $this->load->view("personal_advance",$cash);
   }

//提现控制器
    public   function  withdraw(){
        if(isset($_SESSION['user_phone'])){
            $phone=$_SESSION['user_phone'];
        }else{
            header("location:".site_url());
        }
       $bank_db=$this->db->select("*")->from("user_bank")->where(array("bank_user_phone"=>$_SESSION['user_phone']))->get();
       $bank["bank"]=$bank_db->result_array();
       $user_db=$this->db->select("user_money")->from("user")->where(array("user_phone"=>$_SESSION['user_phone']))->get();
       $bank["user_money"]=$user_db->result_array()[0]["user_money"];
       $num=rand(1000,9999);
       $this->session->set_userdata("token",$num);
       $this->load->view("personal_withdraw",$bank);
    }

    /**
     *提现表单控制器
     */
    public function ajax_withdraw(){
      //  data:"bank="+bank+"&money="+money+"&token="+token,
       // echo 1;
        $token=$this->input->post("token");                         //提现令牌
        $cash['cash_bank_number']=$this->input->post("bank");       //提现账号
        $cash['cash_money']=$this->input->post("money");            //提现金额
        $cash['cash_user_phone']=$this->session->userdata("user_phone");//提现手机号
        $cash['cash_time']=date("Y-m-d H:i:s");//提现时间
        $db=$this->db->select("user_money")->from("user")->where(array("user_phone"=>$_SESSION['user_phone']))->get();
        $money=$db->result_array()[0]['user_money'];//余额
      if($token==$this->session->userdata("token")){
        if($money>=$cash['cash_money']){
                 //开启事务
                $this->db->trans_start();
                //修改余额
                $this->db->update("user",array("user_money"=>$money-$cash['cash_money']),"user_phone=".$_SESSION['user_phone']);
                $this->db->insert("user_cash",$cash);
                $this->db->trans_complete();
                if ($this->db->trans_status() === FALSE){
                  //失败
                    echo  2;
                }else{
                    echo  1;
                }
            }else{
                //失败
                echo  0;
            }
      }else{
          echo  3;
      }


    }

    //用户添加银行卡号
    public  function   personal_bank(){
        $city=$this->input->post('city');         //市
        $province=$this->input->post('province'); //省
        $where=array(
            'bank_user_phone'=>   $_SESSION['user_phone'],         //用户账号
            'bank_number'=>       $this->input->post('number'),    //银行卡卡号
            'bank_user_name'=>    $this->input->post('user_name'), //开户名
            'bank_bank_name'=>    $this->input->post('bank_name'), //银行名字
            'bank_province'=>     explode("省",$province)[0],       //省
            'bank_city'=>         explode("市",$city)[0],           //市
            'bank_address'=>      $this->input->post('address'),   //开户支行
            'bank_type'=>         $this->input->post('type'),      //类型
            'bank_attribute'=>    $this->input->post('attribute'), //属性
            'bank_time'=>         date('Y/m/d H:i:s')
        );
        $c=0;
        foreach($where as $value){
            if($value==null){
                $m=array('用户账号','银行卡号',"持卡人姓名","银行名称","省","市","开户支行","类型","属性");
               echo  '<script  type="text/javascript">
                       alert("'.$m[$c].'不能为空");
                       window.location.href="http://www.haitouwanhu.com/personal/withdraw";
                       </script>';
                exit();
            }
$c++;
        }
        //查询是否存在有改银行卡号
      $select_db=$this->db->select("*")->from("ci_user_bank")->where(array("bank_number"=>$where['bank_number']))->get();
      $select=$select_db->result_array();
       if(!empty($select)){
           exit("已经绑定过了");
       }else{
           $row=$this->db->insert('user_bank',$where);
           if($row>0){
               header('Location:http://www.haitouwanhu.com/personal/withdraw');
           }else{
               echo   '添加失败';
           }
       }

    }

    /**
     *删除银行卡
     */
   public  function  cancel(){
       $bank['bank_number']=$this->input->get("id");
       $row=$this->db->delete("user_bank",$bank);
       if($row>0){
           header("Location:http://www.haitouwanhu.com/personal/withdraw");
       }else{
           header("Location:http://www.haitouwanhu.com/personal/withdraw");
       }
   }

    /**
     *退款申请
     */
   public  function ajax_refund(){
       $refund['refund_associated_order']=$this->input->post("order");
       $refund['refund_why']=$this->input->post('whu');
       $refund['refund_money']=$this->input->post('mon');
       $refund['refund_tag']=1;
       $refund['refund_time']=date("Y-m-d H:i:s");
       $refund['refund_user_phone']=$_SESSION['user_phone'];
       $ass_db=$this->db->select('associated_id')->from('associated_up')->where(array('associated_order'=>$refund['refund_associated_order']))->get();
       $ass=$ass_db->result_array();
       if(!empty($ass)){
         $ref_db=$this->db->select('refund_associated_order')->from('user_refund')->where(array('refund_associated_order'=>$refund['refund_associated_order']))->get();
         $ref=$ref_db->result_array();
           if(empty($ref)){  //是否申请过
               $rows=$this->db->insert("user_refund",$refund);
               if($rows>0){
                   echo  1;
               }else{
                   echo  0;
               }
           }else{
               echo  3;
           }
       }else{
           echo  2;
       }


   }

    /**
     * 删除未支付项目
     */

    public function cancel_project(){

       $order_time=$this->input->get('id'); //项目时间
       $row=$this->db->delete('user_order',array('order_userphone'=>$_SESSION['user_phone'],"order_time"=>$order_time));
       if($row>0){
           header('Location:http://www.haitouwanhu.com/Personal/index');
       }else{
        echo  '<script  type="text/javascript">
               alert("删除失败");
               </script>';
           header('Location:http://www.haitouwanhu.com/index');
       }
    }























    /**
     * 版本 1.0方案
     */



    //添加微信号  修改为微信号
    public function  ajaxData(){
        $arr=array(
            "user_sex"=>$this->input->post("sex"),
            "user_wechat"=>$this->input->post("wechat"),
            "user_email"=>$this->input->post("email")
        );
        $res= $this->db->update("user",$arr,"user_phone=".$_SESSION["user_phone"]);
        echo   $res;

    }

//修改密码

    public function  change(){
        $this->load->model("Personal_model");
        $personal=$this->Personal_model->fa();
        $this->load->view("p_change",$personal);

    }

    //验证原密码

    public function changeAjax(){
        $pass=$this->input->post("pass");
        $phone=$_SESSION["user_phone"];
        $row=$this->db->select("user_passwork")->from("user")->where(array("user_passwork"=>$pass,"user_phone"=>$phone))->get();
        $res=$row->result_array();
        if(!empty($res)){
            echo 1;
        }else{
            echo  0;
        }
    }

//修改原密码

    public  function   changePass(){

        $arr=array(
            "user_passwork"=>$this->input->post("newpass")
        );
        //查看原来的代码
        $user_db=$this->db->select("user_passwork")->from("user")->where(array("user_phone"=>$_SESSION['user_phone'],"user_passwork"=>$arr['user_passwork']))->get();
        $user=$user_db->result_array();
        if(!empty($user)) {
            echo 0;
        }else{
            $row=$this->db->update("user",$arr,"user_phone=".$_SESSION["user_phone"]);
            if($row>0){
                echo 1;
            }else{
                echo 0;
            }
        }
    }


//身份验证

    public  function validation(){

        $this->load->model("Personal_model");
        $personal=$this->Personal_model->fa();
        //查询是否已经是身份验证过了
        $yan=$this->db->select("user_IDcard")->from("user")->where("user_phone=".$_SESSION["user_phone"])->get();
        $res=$yan->result_array();
        //   var_dump($res[0]["user_IDcard"]);
        if($res[0]["user_IDcard"]==null){
            $personal["yan"]=0;       //有验证
        }else{
            $personal["yan"]=1;       //没有验证
        }
        // var_dump($personal["yan"]);
        $this->load->view("p_validation",$personal);
    }

    //验证身份

    public function  validationIdCard(){
        $this->load->model("CurlOpen_model");
        $realname=$this->input->post("name");
        $idcard=$this->input->post("idCard");
        $url="http://api.jisuapi.com/idcardverify/verify?appkey=d87365b3a73d7170&idcard=$idcard&realname=$realname";
        $result = $this->CurlOpen_model->curlOpen($url); //curlOpen
        $jsonarr = json_decode($result, true);
        //   exit(var_dump($jsonarr));
        if($jsonarr['status'] != 0)
        {
            echo $jsonarr['msg'];
            exit();
        }
        $result = $jsonarr['result'];
//        echo $result['idcard'].' '.$result['realname'].' '.$result['province'].' '.$result['city'].' '.$result['town'].'<br>';
//        echo $result['sex'].' '.$result['birth'].' '.$result['verifystatus'].' '.$result['verifymsg'].'<br>';
        $user=array(
            "user_idcard"=>$result['idcard'],                   //获取身份证号
            "user_name"=>$result['realname'],                   //获取真实姓名
            "user_province"=>$result['province'],               //获取省份
            "user_city"=>$result['city'],                       //获取所在城市
            "user_town"=>$result['town'],                       //获取所在城镇
            "user_birth"=>$result["birth"],                     //获取用户生日
        );
        $row=$this->db->update("user",$user,"user_phone=".$_SESSION["user_phone"]);
        if($row>0){
            echo  1;
        }else{
            echo  2;
        }

    }
//已支付项目
    public function  p_project(){

        //获取每个电话的唯一id号
        $user=$this->db->select("user_id")->from("user")->where(array("user_phone"=>$_SESSION["user_phone"]))->get();
        $userid=$user->result_array();
        $num=$this->db->select()->from("associated_up")->where(array("associated_userid"=>$userid[0]["user_id"]))->get();
        $personal["num"]=$num->num_rows();//查询已经投资项目的总数
        //投资总额
        $num_arr=$num->result_array();
        $money=$this->db->select()->from("associated_up")->where(array("associated_userid"=>$userid[0]["user_id"]))->get();
        $personal["money"]=0;
        $amoney=$money->result_array();
        foreach($num_arr as $value){      //每次投资的金额
            $where["gear_projectid"]=$value["associated_projectid"];
            $where["gear_digital"]=$value["associated_digital"];
            $gear_db=$this->db->select()->from("project_gear")->where($where)->get();
            $gear_arr=$gear_db->result_array();
            $personal["money"]=$personal["money"]+intval($gear_arr[0]["gear_each"])*intval($value["associated_score"]);//投资总金额
        }
        $n=$this->uri->segment(3, 0);
        $ass=$this->db->select()->from("associated_up")->where(array("associated_userid"=>$userid[0]["user_id"]))->limit(10,$n)->order_by('associated_time','DESC')->get();
        $res=$ass->result_array();
        $v=array();
        //     var_dump($res);
        foreach($res as  $value){   //每一层对应一个项目
            $pro=$this->db->select()->from("project")->where(array("project_id"=>$value["associated_projectid"]))->get();
            $prow=$pro->result_array();
            $value["associated_time"]=str_replace(" ","<br/>",$value["associated_time"]);
            //   var_dump($prow);
            //查询上上签关于项目的地址
            $sign=$this->db->select("gear_sign_docid,gear_sign")->from("project_gear")->where(array("gear_digital"=>$value["associated_digital"],"gear_projectid"=>$value["associated_projectid"]))->get();
            $sign=$sign->result_array();
            $where["gear_projectid"]=$value["associated_projectid"];
            $where["gear_digital"]=$value["associated_digital"];
            $gear_db=$this->db->select()->from("project_gear")->where($where)->get();
            $gear_arr=$gear_db->result_array();
            $prow[0]['money']=intval($value["associated_score"]) * intval($gear_arr[0]["gear_each"]);//获取每一次的投资额
            $prow[0]["time"]=$value["associated_time"];
            $prow[0]["docid"]=$sign[0]["gear_sign_docid"] ;
            $prow[0]["sign"] =$sign[0]["gear_sign"];

            //判定以前签署过没有
            //关于合同
             if($prow[0]["project_tag"]==2){
                $prow[0]["contract"]="未开放";
                $prow[0]["state"]="已预约";
            }else{
                if($value["associated_tag"]==1  &&  $value["associated_state"]==1){
                    //查询相关上上签的合同id和合同存放地址
                    $sd=$this->db->select("gear_sign_docid,gear_sign")->from("project_gear")->where(array("gear_projectid"=>$value["associated_projectid"], "gear_digital"=>$value["associated_digital"]))->get();
                    $sd=$sd->result_array();
                    $prow["0"]["contract"]="<a href='".site_url("Pay/preview")."?signid=".$sd[0]['gear_sign']."&docid=".$sd[0]['gear_sign_docid']."'>查看</a>";
                    $prow[0]["state"]="已完成";
                }elseif($value["associated_tag"]==1  && $value["associated_state"]!=1 ){
                    //判定还是否存在以前的签署过得
                   $c_db=$this->db->select('associated_state')->from('associated_up')->where(array('associated_userid'=>$userid[0]["user_id"],'associated_projectid'=>$value['associated_projectid'],'associated_digital'=>$value['associated_digital']))->get();
                   $c=$c_db->result_array();
                   foreach($c as  $value_c){
                       if($value_c['associated_state']==1){
                           $c_tag=1;
                       }
                   }
                    if(isset($c_tag)){
                        $sd=$this->db->select("gear_sign_docid,gear_sign")->from("project_gear")->where(array("gear_projectid"=>$value["associated_projectid"], "gear_digital"=>$value["associated_digital"]))->get();
                        $sd=$sd->result_array();
                        $prow["0"]["contract"]="<a href='".site_url("Pay/preview")."?signid=".$sd[0]['gear_sign']."&&docid=".$sd[0]['gear_sign_docid']."'>查看</a>";
                        $prow[0]["state"]="已完成";
                    }else{
                        $prow["0"]["contract"]="<a href='".site_url("Pay/loadSign")."?digital=".$value["associated_digital"]."&&projcet_id=".$value['associated_projectid']."target='_Top' >待签署</a>";
                        $prow[0]["state"]="<a  style='color: red'>申请退款</a>";
                    }

                }else{
                    $prow["0"]["contract"]="待签署";
                    $prow[0]["state"]="<a href='".site_url('Project/index')."?id=".$value["associated_projectid"]."'>未支付</a>";
                }
//判定有没有申请退款
                $prow[0]['order']=$value['associated_order'];
                $refund_db=$this->db->select('refund_tag,refund_money')->from('user_refund')->where('refund_associated_order='.$value['associated_order'])->get();
                $refund=$refund_db->result_array();
                if(!empty($refund)){
                    foreach($refund as  $value_r){
                        if($value_r['refund_tag']==1){
                            $prow["0"]["contract"]='未开放';
                            $prow[0]["state"]="退款中";
                        }elseif($value_r['refund_tag']==0){
                            $prow["0"]["contract"]='未开放';
                            $prow[0]["state"]="退款完成";
                            //减去一个投资项目
                            $personal["num"]=$personal['num']-1;
                            //减去投资的金额
                            $personal["money"]=$personal["money"]-$value_r['refund_money'];
                        }
                    }
                }
//查看是否已经赎回了
            if(isset($value['associated_ransom'])){
                if($value['associated_ransom']==1){
                    $prow["0"]["contract"]="<a href='".site_url("Pay/preview")."?signid=".$sd[0]['gear_sign']."&&docid=".$sd[0]['gear_sign_docid']."'>查看</a>";
                    $prow[0]["state"]="<span class='redeem'>已赎回</span>";

                }
             }
            }
            $v[]=$prow[0];
        }
        //项目详情
        $personal["project"]=$v;
        //分页配置
        $this->load->library('pagination');                                            //加载分页辅助函数
        $base_url = "http://www.wanhuu.cn/Personal/p_project";                       //分页显示地址
        $this->load->model('Page_model');
        $page=10;
        $config=$this->Page_model->page($personal["num"],$base_url,$page);
        $this->pagination->initialize($config);                                        //加载配置
        $this->load->view('p_project',$personal);
    }


//我的资金

    public function  money(){
        //获取投资项目次数  总金额
        $this->load->model("Personal_model");
        $personal=$this->Personal_model->fa();
        //提现金额
        $money_db=$this->db->select('user_money')->from('user')->where('user_phone='.$_SESSION['user_phone'])->get();
        $money=$money_db->result_array();
        if(!empty($money[0]['user_money'])){
            $personal['money_all']=$money[0]['user_money'];
            $personal['money_ok']=intval($money[0]['user_money']);
            $personal['money_no']=$money[0]['user_money']-$personal['money_ok'];
        }else{
            $personal['money_all']=0;
            $personal['money_ok']=0;
            $personal['money_no']=0;
        }
        //申请提现
       $bank_db=$this->db->select()->from('user_bank')->where('bank_user_phone='.$_SESSION['user_phone'])->get();
       $bank=$bank_db->result_array();
       $personal['bank']=$bank;
       $num=0;
        foreach($bank  as $value){
            $num++;
        }
        $personal['bank_num']=$num;
        $personal['user_phone']=substr($_SESSION['user_phone'],0,3)."******".substr($_SESSION['user_phone'],8);
        $this->load->view("p_meny",$personal);
    }




//我的消息
   public function message(){

        $this->load->model("Personal_model");
        $personal=$this->Personal_model->fa();
        $row=$this->db->select()->from("ci_message")->where("message_user_phone=".$_SESSION["user_phone"])->get();
        $total_rows=$row->num_rows();
        $base_url="http://www.wanhuu.cn/Personal/message";
        $m=$this->uri->segment(3,0);
        $row2=$this->db->select()->from("ci_message")->where("message_user_phone=".$_SESSION["user_phone"])->limit(10,$m)->get();
        $personal["message"]=$row2->result_array();
        $this->load->library('pagination');                                             //加载分页辅助函数
        $this->load->model('Page_model');
        $page=10;
        $config=$this->Page_model->page($total_rows,$base_url,$page);
        $this->pagination->initialize($config);                                         //加载配置
        $this->load->view("p_message",$personal);
    }

    public function message_up(){
        $mes_arr["message_tag"]=1;
        $mes_arr["message_user_phone"]=$_SESSION["user_phone"];
        $mes_up["message_tag"]=0;
        $mes_row=$this->db->update("message",$mes_up,$mes_arr);
        if($mes_row>0){
            $this->session->unset_userdata("message");
            $this->session->set_userdata("message","none");
        }
    }

//未支付项目
    public function p_projec_no(){
        $m=$this->uri->segment(3,0);
        $this->load->model("Personal_model");
        $personal=$this->Personal_model->fa();
        $order_db=$this->db->select('order_userphone,order_time,order_project_id,order_project_di,order_project_sore')->from('user_order')->where(array('order_userphone'=>$_SESSION['user_phone']))->get();
        $personal['nums']=$order_db->num_rows();
        $order_db=$this->db->select('order_userphone,order_time,order_project_id,order_project_di,order_project_sore')->from('user_order')->where(array('order_userphone'=>$_SESSION['user_phone']))->limit(10,$m)->get();
        $order=$order_db->result_array();
        //跳转地址  项目名称 投资时间  金额
       //判定过期没有
      $projec_no=array();
     if(!empty($order)) {
         $i=0;
         foreach ($order as $value) {
             if($value['order_time']>time()){
             $project_db = $this->db->select('project_name')->from('project')->where('project_id=' . $value['order_project_id'])->get();
             $project = $project_db->result_array();
             $projec_no[$i]['name'] ="<a href='".site_url('project')."?id=".$value['order_project_id']."'>".$project[0]['project_name']."</a>";
             $gear_db = $this->db->select('gear_each')->from('project_gear')->where(array('gear_projectid' => $value['order_project_id'], 'gear_digital' => $value['order_project_di']))->get();
             $gear = $gear_db->result_array();
             $projec_no[$i]['all'] = $gear[0]['gear_each'] * $value['order_project_sore']; //投资金额
             $all =  $gear[0]['gear_each'] * $value['order_project_sore'];                //投资金额
             $time = $value['order_time']-1800;
             $pro_time = date("Y-m-d H:i:s",$time);
             $projec_no[$i]["time"] = str_replace(" ", "<br/>", $pro_time);              //投资时间
             $projec_no[$i]['pay'] = "<a href='".site_url('Project/buy_jiyi') . "?id=" . $value['order_project_id'] . "&names=" . $project[0]['project_name'] . "&tag=" . $value['order_project_di'] . "&price=" . $gear[0]['gear_each'] . "&test_box=" . $value['order_project_sore'] . "&proce_all=" . $all . "'>未支付</a>";
             $i++;
           }else{
               $this->load->model('Overdue_model');
               $this->Overdue_model->overdue($value['order_time']);
             }
         }

     }
        $personal['order']=$projec_no;
        $this->load->library('pagination');                                            //加载分页辅助函数
        $base_url = "http://www.wanhuu.cn/Personal/p_projec_no";                         //分页显示地址
        $this->load->model('Page_model');
        $page=10;
        $config=$this->Page_model->page($personal['nums'],$base_url,$page);
        $this->pagination->initialize($config);                                        //加载配置
      //  $this->db->select()->from()->where()->get();
       $this->load->view('p_projec_no',$personal);
    }

//提现记录
   public function record(){
       $this->load->model("Personal_model");
       $personal=$this->Personal_model->fa();
       $num=$this->db->select()->from("user_cash")->where(array('cash_user_phone'=>$_SESSION['user_phone']))->get();
       $personal["num"]=$num->num_rows();//查询已经投资项目的总数
       //提现记录
       $n=$this->uri->segment(3,0);
       $cash_db=$this->db->select('cash_bank_number,cash_money,cash_time,cash_tag')->from('user_cash')->where(array('cash_user_phone'=>$_SESSION['user_phone']))->limit(10,$n)->order_by('cash_time','DESC')->get();
       $cash=$cash_db->result_array();
       if(!empty($cash)){
        $v=array();
         foreach($cash  as $value){
             $value['cash_time']=str_replace(" ", "<br/>", $value['cash_time']);              //投资时间
             $v[]=$value;
         }
           $personal['cash']=$v;
       }else{
           $personal['cash']=1;
       };
       $this->load->library('pagination');                                             //加载分页辅助函数
       $this->load->model('Page_model');
       $config=$this->Page_model->page($personal["num"],$base_url='http://www.wanhuu.cn/Personal/record',$page=10);
       $this->pagination->initialize($config);
       $this->load->view('p_record',$personal);
   }






}