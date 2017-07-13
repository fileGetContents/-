<?php

class  TestQ  extends CI_Controller
{


    public function b()
    {
//        /  * 参数：
//     * params {
//         "notify_time":"20160519202857",
//       "    sign_type":"RSA",
//         "notify_type":"trade_status_sync",
//        "trade_status":"TRADE_SUCCESS",
//         "gmt_payment":"2016059202857",
//             "version":"1.0",
//                "sign":"oEQbJA9kGz3jZdSWqobS6bKCB\/OB28LEqqbj6NbAGrN7mVcrXonscLskJ5rFafxQz5dOD5LHx BNvFOHcCoVs6y1xVaodsz FalRAABSm4WIcLXR1Lnsq9cBYn0u0MuoQnVzud6j9kH 1gOQMeTouGS\/l4j5GxYNS5l4Z2l6lQ=",
//           "extension":"{}",
//          "gmt_create":"20160519202857",
//      "_input_charset":"UTF-8",
//      "outer_trade_no":"150",
//        "trade_amount":"9.99",
//      "inner_trade_no":"101146366086633549464",
//           "notify_id":"14fb4632c5264dd1b50a537c61c8bbc4"
//      }
//     * return:
//     */
//
        $a["notify_time"] = $_POST["notify_time"];         //通知时间
        $a["sign_type"] = $_POST["sign_type"];            //签名方式
        $a["notify_type"] = $_POST["notify_type"];          //通知类型
        $a["trade_status"] = $_POST["trade_status"];      //交易状态
        $a["gmt_payment"] = $_POST["gmt_payment"];        //交易支付时间
        $a["version"] = $_POST["version"];             //签名方式
        $a["sign"] = $_POST["sign"];                      //参数字符集编码
        $a["extension"] = $_POST["extension"];              //扩展参数
        $a["gmt_create"] = $_POST["gmt_create"];          //交易创建时间
        $a["_input_charset"] = $_POST["_input_charset"];   //时间  年月月日日时时分分秒秒
        $a["outer_trade_no"] = $_POST["outer_trade_no"];   //客户网站唯一订单号
        $a["trade_amount"] = $_POST["trade_amount"];      //交易金额
        $a["inner_trade_no"] = $_POST["inner_trade_no"];  //支付平台交易订单号
        $a["notify_id"] = $_POST["notify_id"];            //通知ID
        //  $this->load->model('Pay_model');
        //  $flag=$this->Pay_model->notify($a);
        //  if(1==1){
        if (isset($a["inner_trade_no"])) {  //交易成功
            //加载记忆这sql语句
            $xml = simplexml_load_file("pay/sure.xml");       //加载xml
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
                            $associated_db = $this->db->select("associated_userid,associated_projectid,associated_digital")->from('associated_up')->where('associated_up=' . $a["inner_trade_no"])->get();
                            $associated = $associated_db->result_array();
                            $user_db = $this->db->select('user_phone')->from('user')->where("user_id=" . $associated[0]['associated_userid'])->get();
                            $user = $user_db->result_array();
                            $order_db = $this->db->select()->from('user_order')->where(array('order_userphone' => $user[0]['user_phone'], 'order_project_id' => $associated[0]['associated_projectid'], "order_project_di" => $associated[0]['associated_digital']))->get();
                            $order_a = $order_db->result_array();
                            if (!empty($order_a)) {
                                $this->db->delect("user_order", "order_id=" . $order_a[0]['order_id']);
                            }
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
                                $associated_db = $this->db->select("associated_userid,associated_projectid,associated_digital")->from('associated_up')->where('associated_up=' . $a["inner_trade_no"])->get();
                                $associated = $associated_db->result_array();
                                $user_db = $this->db->select('user_phone')->from('user')->where("user_id=" . $associated[0]['associated_userid'])->get();
                                $user = $user_db->result_array();
                                $order_db = $this->db->select()->from('user_order')->where(array('order_userphone' => $user[0]['user_phone'], 'order_project_id' => $associated[0]['associated_projectid'], "order_project_di" => $associated[0]['associated_digital']))->get();
                                $order_a = $order_db->result_array();
                                if (!empty($order_a)) {
                                    $this->db->delect("user_order", "order_id=" . $order_a[0]['order_id']);
                                }
                                unset($xml->book[$i]);      //删除
                                $xml->asXML("pay/sure.xml");
                                echo 'success';    //成功添加到数据库
                            } else {
                                echo 'false';  //这里是失败
                            }
                        }
                    } else {
                        echo 'false';
                    }
                    $i++;
                }
            }
        } else {
            echo "success";  //未完成支付

        }


    }


}