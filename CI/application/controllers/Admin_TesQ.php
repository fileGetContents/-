<?php
/**
 * Created by PhpStorm.
 * User: 庾治超
 * Date: 2016/9/1
 * Time: 10:18
 */

defined('BASEPATH') OR exit('No direct script access allowed');
class  Admin_TesQ  extends CI_Controller {

  public  function  index(){

      echo  phpinfo();

  }

    public function index1(){

        $a["notify_time"] = 111;//$_POST["notify_time"];              //通知时间
        $a["sign_type"] = 111;//$_POST["sign_type"];                  //签名方式
        $a["notify_type"] = 111;//$_POST["notify_type"];              //通知类型
        $a["trade_status"] = 222;//$_POST["trade_status"];            //交易状态
        $a["gmt_payment"] = 333;//$_POST["gmt_payment"];              //交易支付时间
        $a["version"] =444; //$_POST["version"];                      //签名方式
        $a["sign"] = 555;//$_POST["sign"];                            //参数字符集编码
        $a["extension"] = 6666;//$_POST["extension"];                  //扩展参数
        $a["gmt_create"] =777; //$_POST["gmt_create"];                //交易创建时间
        $a["_input_charset"] =888; //$_POST["_input_charset"];        //时间  年月月日日时时分分秒秒
        $a["outer_trade_no"] = "201703250326255";//$_POST["outer_trade_no"];        //客户网站唯一订单号
        $a["trade_amount"] = 100;//$_POST["trade_amount"];            //交易金额
        $a["inner_trade_no"] ="201703250326255"; //$_POST["inner_trade_no"];        //支付平台交易订单号
        $a["notify_id"] = 1111111;//$_POST["notify_id"];                  //通知ID
        //  $this->load->model('Pay_model');
        //  $flag=$this->Pay_model->notify($a);
        //  if(1==1){
        if (isset($a["inner_trade_no"])) {  //交易成功
            //加载记忆这sql语句
            $xml = simplexml_load_file("pay/sure.xml");         //加载xml
            $result = $xml->xpath("book");                      //加载节点
            $order = $this->db->select('associated_order')->from('associated_up')->where(array('associated_order' => $a["outer_trade_no"]))->get();   //查询语句
            $order = $order->result_array();
            //      echo  'success';
            if (!empty($order)) {  //预约过
                $c = 0;
                foreach ($result as $value) {
                    if ($value->out_trade_no == $order[0]['associated_order']) {  //这里判定是否为该xml
                        $row = $this->db->update('associated_up', array('associated_inner_trade_no' => $a["inner_trade_no"]), 'associated_order=' . $a['outer_trade_no']);//添加商户的订单
                        if ($row > 0) {
                            //删除未支付状态
                            $associated_db = $this->db->select("associated_userid,associated_projectid,associated_digital")->from('associated_up')->where('associated_inner_trade_no=' . $a["inner_trade_no"])->get();
                            $associated = $associated_db->result_array();
                            $user_db = $this->db->select('user_phone')->from('user')->where("user_id=" . $associated[0]['associated_userid'])->get();
                            $user = $user_db->result_array();
                            $order_db = $this->db->select()->from('user_order')->where(array('order_userphone' => $user[0]['user_phone'], 'order_project_id' => $associated[0]['associated_projectid'], "order_project_di" => $associated[0]['associated_digital']))->get();
                            $order_a = $order_db->result_array();
                            if (!empty($order_a)) {
                                $this->db->delect("user_order", "order_id=" . $order_a[0]['order_id']);
                            }
                            $this->db->query($value->en_query);          //修改活动礼包
                            unset($xml->book[$c]);      //删除
                            echo 'success';    //成功
                        } else {
                            echo 'flash';      //失败
                        }
                    }
                    $c++;
                }
            } else {  //没有预约过的
                $i = 0;
                foreach ($result as $value) {
                    if ($value->out_trade_no == $a['outer_trade_no']) { //判定是哪一个成功了回来了
                        $this->db->trans_start();                    //开启事物回滚
                        $this->db->query($value->query_update);      //修改份数
                        $this->db->query($value->query);             //修改用户
                        $this->db->query($value->en_query);          //修改活动礼包
                        if ($value->query_pro != 1) {
                            $this->db->query($value->query_pro);     //修改项目状态
                        }
                        $this->db->trans_complete();                 //开启事物回滚
                        if ($this->db->trans_complete() == false) {
                            echo "false";       //失败
                        } else {  //成功
                            $row = $this->db->update('associated_up', array('associated_inner_trade_no' => $a["inner_trade_no"]), 'associated_order=' . $a['outer_trade_no']);
                            if ($row > 0) {
                                //删除未支付状态
                                $associated_db = $this->db->select("associated_userid,associated_projectid,associated_digital")->from('associated_up')->where('associated_inner_trade_no=' . $a["inner_trade_no"])->get();
                                $associated = $associated_db->result_array();
                                $user_db = $this->db->select('user_phone')->from('user')->where("user_id=" . $associated[0]['associated_userid'])->get();
                                $user = $user_db->result_array();
                                $order_db = $this->db->select()->from('user_order')->where(array('order_userphone' => $user[0]['user_phone'], 'order_project_id' => $associated[0]['associated_projectid'], "order_project_di" => $associated[0]['associated_digital']))->get();
                                $order_a = $order_db->result_array();
                                if (!empty($order_a)) {
                                    $this->db->delete("user_order", "order_id=" . $order_a[0]['order_id']);
                                }
                                unset($xml->book[$i]);      //删除
                                $xml->asXML("pay/sure.xml");
                                echo 'success';    //成功添加到数据库
                            } else {


                                echo 'false1';  //这里是失败
                            }
                        }
                    } else {
                        echo $value->out_trade_no."Ssssssssss". $a['outer_trade_no'];
                        echo 'false2';
                    }
                    $i++;
                }
            }
        } else {
            echo "success";  //未完成支付

        }


    }



    //文本添加用户
    public function insert(){
        $file =base_url("admin/user/2017219.txt");
        $content = file_get_contents($file);
        $array=explode("\r\n", $content);
        for($i=0; $i<count($array); $i++)
        {
            $a=explode("/",$array[$i]);
            if(isset($a[1])){
                $where['user_IDcard']=$a[1];
                $where['user_name']=$a[0];
                $where['user_phone']=$a[2];
                $where['user_passwork']=$a[2];
            }else{
                $where=array(
                    'user_phone'=>$a[0],
                    'user_passwork'=>$a[0],
                    "user_time"=>date("Y-m-d H:i:s")
                );
            }
            $this->db->insert("user",$where);
        }

    }


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







}

