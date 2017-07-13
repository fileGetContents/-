<?php
/**
 * Created by PhpStorm.
 * User: 庾治超
 * Date: 2016/9/29
 * Time: 10:06
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class  Pay extends CI_Controller
{

    //修改用户和项目的相关信息
    public function buy_update()
    {

        if (!isset($_SESSION['user_phone'])) {
            header('Location:http://www.haitouwanhu.com/');
            exit();
        }

        $id = $this->input->get("id");        //项目id
        $test_box = $this->input->get("test_box");  //购买份数
        $tag = $this->input->get("tag");       //购买方案
        $names = $this->input->get("names");     //项目名字
        $price = $this->input->get("price");     //支付金额
        $envelope = $this->input->get('envelope');  //抵用卷金额
//判定分数够不
        $mmm = $this->db->select('gear_copies')->from('project_gear')->where(array('gear_projectid' => $id, 'gear_digital' => $tag))->get();
        $mmm1 = $mmm->result_array();
        $cop = $mmm1[0]['gear_copies'];//份数
        $cop_a = $this->db->select("order_time,order_project_id,order_project_di")->from('user_order')->where(array('order_userphone' => $_SESSION['user_phone'], "order_project_id" => $id, "order_project_di" => $tag))->get();
        $cop_b = $cop_a->result_array();
        //保存半个小时
//查询项目保存的时间
        $cop_c = $this->db->select('order_project_sore,order_time,order_userphone')->from('user_order')->where(array('order_project_di' => $tag, "order_project_id" => $id))->get();
        $cop_d = $cop_c->result_array();
        if (!empty($cop_d)) {
            foreach ($cop_d as $value) {
                if ($value['order_time'] < time() && $value['order_userphone'] != $_SESSION['user_phone']) {
                    $cop = $cop - $value['order_project_sore'];
                }
            }
        }
        if ($cop >= $test_box) {//完成保存
            if (!empty($cop_b)) {
                $this->db->update('user_order', array("order_time" => time() + 1800, "order_project_sore" => $test_box), array('order_userphone' => $_SESSION['user_phone'], "order_project_id" => $cop_b[0]['order_project_id'], "order_project_di" => $cop_b[0]['order_project_di']));
            } else {
                $this->db->insert('user_order', array('order_time' => time() + 1800, 'order_project_sore' => $test_box, 'order_userphone' => $_SESSION['user_phone'], "order_project_id" => $id, "order_project_di" => $tag));
            }
        } else {
            exit('购买失败');
        }
        $this->session->set_userdata("projcet_id", $id);  //记忆项目id
        $this->session->set_userdata("digital", $tag);    //记忆购买的方案
        //判定项目状态
        $project_db = $this->db->select("project_tag")->from("project")->where("project_id=" . $id)->get();
        $project = $project_db->result_array();
        $user_id_db = $this->db->select("user_id")->from("user")->where("user_phone=" . $_SESSION["user_phone"])->get();
        $user_id_arr = $user_id_db->result_array();
        $user_id = $user_id_arr[0]["user_id"];     //获取用户id
        if ($project[0]["project_tag"] == 1) {      //这是项目在进行中
            //将数据添加到用户购买记录
            //判断是否预约过
            $ass_db = $this->db->select("associated_tag,associated_order")->from("associated_up")->where(array("associated_projectid" => $id, "associated_userid" => $user_id))->get();
            $ass_arr = $ass_db->result_array();
            if (isset($ass_arr[0]["associated_tag"]) && $ass_arr[0]["associated_tag"] == 0) {      //预约之后支付余款
                $update = array(
                    "associated_projectid" => $id,              //项目id
                    "associated_userid" => $user_id,         //用户id
                    "associated_digital" => $tag,             //购买方案
                    "associated_score" => $test_box,        //购买数量
                );
                //在支付完成后 跳转到支付网银网关之后执行该语句
                $this->load->model("Pay_model", "Pay");                      //实例化支付类
                $where["return_url"] = site_url('Pay/loadSign');              //跳转到签字页面                       // 前端回调地址
                $where["out_trade_no"] = date("Yhshis") . $test_box;           //商户唯一订单id
                $where["trade_amount"] = $price;                                //支付金额
                $where["product_name"] = $names . "余款支付";                    //标题
                $where["notify_url"] = site_url("TestQ/b");                    //回掉地址
                $query = " UPDATE ci_associated_up SET associated_order='" . date("Yhshis") . $test_box . "',associated_tag = 1, associated_balance = 0, associated_time = '" . date("Y-m-d H:i:s") . "'  WHERE associated_projectid = " . $update["associated_projectid"] . " AND associated_userid = " . $update["associated_userid"] . " AND associated_digital = " . $update["associated_digital"] . " AND associated_score = " . $update["associated_score"] . " AND associated_score = " . $update["associated_score"] . " AND associated_order=" . $ass_arr[0]['associated_order'];
                $jian = 0;//判定是否减份数的标志
            } else {  //没有预约过     或者已经购买在购买一次      或者是第一次购买
                $this->load->model("Pay_model", "Pay");                      // 实例化支付类
                $where["out_trade_no"] = date("Yhshis") . $test_box;            // 商户唯一订单id    +时间+份数
                //查询是否需要签名
                $em = $this->db->select()->from('associated_up')->where(array('associated_userid' => $user_id, "associated_digital" => $tag, "associated_projectid" => $id))->get();
                $em = $em->result_array();
                if (!empty($em)) {     //购买了一次在买一次
                    $where["return_url"] = site_url('Welcome/index');              // 跳转到签字页面    // 前端回调地址
                    //判定是否签署过该合同
                    $sian = $this->db->select('associated_contract,associated_state')->from('associated_up')->where(array('associated_projectid' => $id, 'associated_userid' => $user_id))->get();
                    $sign = $sian->result_array();
                    $contract = 0;
                    $state = 0;
                    foreach ($sign as $value) {
                        if ($value['associated_contract'] == 1) {
                            $contract = 1;
                        }
                        if ($value['associated_state'] == 1) {
                            $state = 1;
                        }
                    }
                    if ($contract == 1 && $state == 1) {  //完成签署
                        $query = "INSERT INTO `ci_associated_up` (`associated_userid`, `associated_projectid`, `associated_score`, `associated_time`, `associated_digital`, `associated_tag`, `associated_balance`,`associated_order`,`associated_state`,`associated_contract`)VALUES (" . $user_id . "," . $id . "," . $test_box . ", '" . date("Y-m-d H:i:s") . "', " . $tag . ", 1, 0," . $where['out_trade_no'] . ",1,1)";
                    } elseif ($contract == 1) {//未签署   追加过
                        $query = "INSERT INTO `ci_associated_up` (`associated_userid`, `associated_projectid`, `associated_score`, `associated_time`, `associated_digital`, `associated_tag`, `associated_balance`,`associated_order`,`associated_state`,`associated_contract`)VALUES (" . $user_id . "," . $id . "," . $test_box . ", '" . date("Y-m-d H:i:s") . "', " . $tag . ", 1, 0," . $where['out_trade_no'] . ",0,1)";
                    } elseif ($contract == 0) {//未追加过
                        $query = "INSERT INTO `ci_associated_up` (`associated_userid`, `associated_projectid`, `associated_score`, `associated_time`, `associated_digital`, `associated_tag`, `associated_balance`,`associated_order`,`associated_state`,`associated_contract`)VALUES (" . $user_id . "," . $id . "," . $test_box . ", '" . date("Y-m-d H:i:s") . "', " . $tag . ", 1, 0," . $where['out_trade_no'] . ",0,0)";
                    }
                    $jian = 1;//判定是否减份数的标志
                } else {
                    $jian = 1;
                    $where["return_url"] = site_url('Pay/loadSign');
                    $query = "INSERT INTO `ci_associated_up` (`associated_userid`, `associated_projectid`, `associated_score`, `associated_time`, `associated_digital`, `associated_tag`, `associated_balance`,`associated_order`)VALUES (" . $user_id . "," . $id . "," . $test_box . ", '" . date("Y-m-d H:i:s") . "', " . $tag . ", 1, 0," . $where["out_trade_no"] . ")";
                }
                $where["trade_amount"] = $price;                              // 支付金额
                $where["product_name"] = $names . "支付款";
                $where["notify_url"] = site_url("TestQ/b");                  //回掉地址

            }
        } else {  //这是项目在预约中
            $jian = 1;//判定是否减份数的标志
            $this->load->model("Pay_model", "Pay");                      //实例化支付类
            $where["return_url"] = site_url('Welcome/index');            //返回首页 前端回调地址
            $where["out_trade_no"] = date("Yhshis") . $test_box;            //商户唯一订单id
            $where["trade_amount"] = $price;                              //支付金额
            $where["product_name"] = $names . "定金支付";
            $where["notify_url"] = site_url("TestQ/b");                   //回掉地址
            $query = "INSERT INTO `ci_associated_up` (`associated_userid`, `associated_projectid`, `associated_score`, `associated_time`, `associated_digital`, `associated_tag`, `associated_balance`,`associated_order`) VALUES (" . $user_id . "," . $id . "," . $test_box . ", '" . date("Y-m-d H:i:s") . "', " . $tag . ", 0, " . $price . "," . $where["out_trade_no"] . ")";
        }
        //跳转支付界面
        //修改项目的份数
        //查询项目的剩余份数
        $num = $this->db->select("gear_copies")->from("ci_project_gear")->where(array("gear_digital" => $tag, "gear_projectid" => $id))->get();
        $num = $num->result_array();
        if ($jian == 1) {
            $numm = $num[0]["gear_copies"] - $test_box;
            //这是修改份数
            $query_update = "update  ci_project_gear  set   gear_copies=" . $numm . "  where gear_digital=" . $tag . "  and gear_projectid=" . $id;
        } else {
            //这是修改份数
            $query_update = "update  ci_project_gear  set   gear_copies=" . $num[0]["gear_copies"] . "  where gear_digital=" . $tag . "  and gear_projectid=" . $id;
        }

        //修改活动SQl

        if ($project[0]["project_tag"] == 1) {  //项目进行中
            $en_query = 'update  ci_envelope  set  envelope_tag=0 where  envelope_user_phone = "' . $_SESSION['user_phone'] . '"  and  envelope_money=' . $envelope;
        } else { //项目预约中
            $en_query = 'select  * from ci_user ';
        }


        $xml = simplexml_load_file("pay/sure.xml");            //加载xml
        $result = $xml->xpath("book");                           //加载节点
        $book = $xml->addChild("book");                        //添加节点
        $book->addAttribute("id", "5");                         //为节点添加属性
        $book->addChild("query_update", $query_update);         //修改数据库语句
        $book->addChild("en_query", $en_query);                 //修改活动
        $book->addChild("query", $query);                       //添加用户信息语句
        $book->addChild('query_pro', 1);                        //修改项目的状态
        $book->addChild("out_trade_no", $where['out_trade_no']);//唯一识别标记
        $xml->asXML("pay/sure.xml");                           //保存


        $this->Pay->index($where);

    }

    public function sign_ok()
    {
        $digital = $this->input->post('digital');
        $projcet_id = $this->input->post('projcet_id');
        $use_db = $this->db->select('user_id')->from('user')->where(array('user_phone' => $_SESSION['user_phone']))->get();
        $use = $use_db->result_array();
        $biao_db = $this->db->select('associated_inner_trade_no')->from('associated_up')->where(array('associated_projectid' => $projcet_id, 'associated_digital' => $digital, 'associated_userid' => $use[0]['user_id']))->get();
        $biao = $biao_db->result_array();
        $this->session->set_userdata("aaaa", $this->db->last_query());  //记忆项目id
        if (!empty($biao[0]['associated_inner_trade_no'])) {
            echo 1; //这里是存在
        } else {
            echo 0;  //这里是不存在
        }
    }


    public function aaa()
    {
        echo $_SESSION['aaaa'];
    }

    public $sdk;                          //SDK类
    public $last_contract;                //返回项目相关结果
    public $mid;                          //开发者密匙
    public $pem;                          //类似开发者密码
    public $host;                         //提交地址

    //支付完成后  判断是否注过上上签的      //如果没有   为用户注册上上签的用户
    public function loadSign()
    {


        $digital = $this->input->get('digital');
        $projcet_id = $this->input->get('projcet_id');
        if (!is_null($digital)) {  //这里是从个人中心进入
            $this->session->set_userdata("projcet_id", $projcet_id);
            $this->session->set_userdata("digital", $digital);
            $use_db = $this->db->select('user_id')->from('user')->where(array('user_phone' => $_SESSION['user_phone']))->get();
            $use = $use_db->result_array();
            $biao_db = $this->db->select('associated_inner_trade_no')->from('associated_up')->where(array('associated_projectid' => $projcet_id, 'associated_digital' => $digital, 'associated_userid' => $use[0]['user_id']))->get();
            $biao = $biao_db->result_array();
            if (!empty($biao[0])) {
                $biao['biao'] = '已完成';
            } else {
                $biao['biao'] = '订单正在处理中...';
            }
        } elseif (isset($_SESSION["digital"])) {   //存在session  这里是从支付界面进入的
            $projcet_id = $_SESSION["projcet_id"];
            $digital = $_SESSION["digital"];
            $use_db = $this->db->select('user_id')->from('user')->where(array('user_phone' => $_SESSION['user_phone']))->get();
            $use = $use_db->result_array();
            $biao_db = $this->db->select('associated_inner_trade_no')->from('associated_up')->where(array('associated_projectid' => $projcet_id, 'associated_digital' => $digital, 'associated_userid' => $use[0]['user_id']))->get();
            $biao = $biao_db->result_array();
            if (!empty($biao[0]['associated_inner_trade_no'])) {
                $biao['biao'] = '已完成';
            } else {
                $biao['biao'] = '订单正在处理中...';
            }
        } else {
            exit();
        }

        $con_db = $this->db->select("gear_contract")->from("project_gear")->where(array("gear_projectid" => $projcet_id, "gear_digital" => $digital))->get();
        $con = $con_db->result_array();
        if ($con[0]["gear_contract"] == null) {
            header("Location:http://www.haitouwanhu.com");
        }
        $con["con"] = "sign/demo/resources/" . $con[0]["gear_contract"];

        //加载上上签接口
        define('CONFIG_NAME', 'demo');
        require('sign/demo/initialize.php');
        require('sign/src/SDK.php');
        error_reporting(E_ALL);
        $server_config = $this->getServerConfig();
        $mid = $server_config['mid'];
        $this->mid = $mid;
        $pem = $server_config['pem'];
        $this->pem = $pem;
        $host = $server_config['host'];
        $this->host = $host;
        $this->sdk = BestSignSDK\SDK::getInstance($mid, $pem, $host);
        $this->sdk->setDebugLevel(BestSignSDK\Logger::DEBUG_LEVEL_INFO);
        $this->last_contract = null;
        //查询用户是否注册拥有上上签的编号
        $user_db = $this->db->select("user_sign")->from("user")->where("user_phone=" . $_SESSION["user_phone"])->get();
        $sign = $user_db->result_array();
        if (!isset($sign[0]["user_sign"])) {       //没有注册过上上签的用户
            //为用户创建账户
            $infor = $this->db->select()->from("user")->where("user_phone=" . $_SESSION["user_phone"])->get();//查询用户相关信息
            $user = $infor->result_array();
            $email = "";                                                                    //用户邮箱
            $mobile = $_SESSION["user_phone"];                                              //用户账号
            $name = $user[0]['user_name'];                                                  //用户姓名
            $user_type = 1;                                                                 //个人用户的标记
            $response = $this->sdk->regUser($email, $mobile, $name, $user_type);
            $uid = $this->db->update("user", array("user_sign" => $_SESSION["user_phone"]), "user_phone=" . $_SESSION["user_phone"]);
            if ($response["response"]["info"]["code"] == 100000) {  //用户申请成功
                $ca_type = BestSignSDK\Constants::CA_TYPE_ZJCA;
                $name = $user[0]["user_name"];                               //用户的名字
                $password = $user[0]["user_phone"];                              //用户的密码(也是手机号)
                $link_mobile = $user[0]["user_phone"];                              //用户的电话号码
                $email = "";                                                         //用户的邮箱
                $link_id_code = $user[0]["user_IDcard"];                             //用户的身份证号
                $address = $user[0]["user_city"] . "市";                                                 //
                $result = $this->sdk->certificateApply($ca_type, $name, $password, $name, $link_mobile, $email, $address, "浙江省", "杭州市", $link_id_code);
                if ($result["isResult"]) {   //CA 证书申请成功
                    $this->db->update("user", array("user_sign_id" => 1), "user_phone=" . $_SESSION["user_phone"]);
                } else {                     //CA 证书申请失败
                    //  $this->db->update("user",array("user_sign_id"=>0),"user_phone=".$_SESSION["user_phone"]);
                }
            } else {  //用户申请失败
                //捕获失败信息
            }
        } else {//已经注册过上上签
            //判断是否成功申请过 个人CA证书
            $sign_id_db = $this->db->select()->from("user")->where(array("user_phone=" . $_SESSION["user_phone"]))->get();  //查询是否成功注册过
            $sign_id = $sign_id_db->result_array();
            $user = $sign_id;
            if (isset($sign_id[0]["user_sign_id"])) { //判断成功申请过CA证书

            } else {
                //为用户申请
                $ca_type = BestSignSDK\Constants::CA_TYPE_ZJCA;
                $name = $user[0]["user_name"];                                       //用户的名字
                $password = $user[0]["user_passwork"];                               //用户的密码
                $link_mobile = $user[0]["user_phone"];                               //用户的电话号码
                $email = "";
                $link_id_code = $user[0]["user_IDcard"];                             //用户的身份证号
                $address = $user[0]["user_city"] . "市";                                                 //
                $result = $this->sdk->certificateApply($ca_type, $name, $password, $name, $link_mobile, $email, $address, "浙江省", "杭州市", $link_id_code);
                if ($result["isResult"]) {   //CA 证书申请成功
                    $this->db->update("user", array("user_sign_id" => 1), "user_phone=" . $_SESSION["user_phone"]);
                } else {                     //CA 证书申请失败
                }
            }
        }

        $con['biao'] = $biao['biao'];
        $con['project_id'] = $projcet_id;
        $con['digital'] = $digital;
        $this->load->view("load", $con);
    }


//  选择方式
//  需要      项目id
//  如果是项目第一次签署  就调用合同发送接口    并且获取项目合同的编号

    public function signWay()
    {
        $pag = $this->input->post("pag"); //方式
        //加载上上签接口
        define('CONFIG_NAME', 'demo');
        require('sign/demo/initialize.php');
        require('sign/src/SDK.php');
        error_reporting(E_ALL);
        $server_config = $this->getServerConfig();
        $mid = $server_config['mid'];
        $this->mid = $mid;
        $pem = $server_config['pem'];
        $this->pem = $pem;
        $host = $server_config['host'];
        $this->host = $host;
        $this->sdk = BestSignSDK\SDK::getInstance($mid, $pem, $host);
        $this->sdk->setDebugLevel(BestSignSDK\Logger::DEBUG_LEVEL_INFO);
        $this->last_contract = null;
        $project = $this->db->select("gear_sign,gear_contract")->from("project_gear")->where(array("gear_projectid" => $_SESSION["projcet_id"], "gear_digital" => $_SESSION["digital"]))->get();
        $projectanme = $this->db->select('project_name')->from("project")->where(array("project_id" => $_SESSION["projcet_id"]))->get();
        $projectname1 = $projectanme->result_array();
        $pro = $project->result_array();
        $user_id = $this->db->select('user_id')->from('user')->where('user_phone=' . $_SESSION['user_phone'])->get();
        $user_id = $user_id->result_array();
        $user_id = $user_id[0]['user_id'];
        if (!isset($pro[0]["gear_sign"])) {                                      //创建并上传合同
            $file_data = $this->getResource($pro[0]["gear_contract"]);           //获取合同路径
            $use = $this->db->select("user_email,user_name,user_phone")->from("user")->where("user_phone=" . $_SESSION["user_phone"])->get();
            $use_arr = $use->result_array();
            $use_arr[0]["user_email"] = "";//用户邮箱设置为空
            $receive_user = BestSignSDK\ReceiveUser::buildData($use_arr[0]["user_email"], $use_arr[0]["user_name"], $use_arr[0]["user_phone"], BestSignSDK\Constants::USER_TYPE_PERSONAL, BestSignSDK\Constants::CONTRACT_NEEDVIDEO_NONE, false);
            $userlist = array($receive_user);
            //平台固定账号
            $senduser = BestSignSDK\SendUser::buildData("22345678@163.com", '合同签署', "13912345678", 3, false, BestSignSDK\Constants::USER_TYPE_PERSONAL, false, "合同签署", "");
            $senduser = array($senduser);
            $this->last_contract = $this->sdk->sjdsendcontractdocUpload($userlist, $senduser, $file_data);
            $this->db->update("project_gear", array("gear_sign_docid" => $this->last_contract["response"]["content"]["contlist"][0]["continfo"]["docid"], "gear_sign" => $this->last_contract["response"]["content"]["contlist"][0]["continfo"]["signid"]), array("gear_projectid" => $_SESSION["projcet_id"], "gear_digital" => $_SESSION["digital"]));
            $this->db->update("associated_up", array("associated_contract" => 1), array('associated_userid' => $user_id, "associated_projectid" => $_SESSION['projcet_id'], "associated_digital" => $_SESSION['digital']));//创建后成功追加签署人
        } else {
            //不需要创建合同 追加签署人
            $a = $this->db->select("associated_contract")->from("associated_up")->where(array('associated_userid' => $user_id, "associated_projectid" => $_SESSION['projcet_id'], "associated_digital" => $_SESSION['digital']))->get();   //
            $a = $a->result_array();
            if (!isset($a[0]["associated_contract"])) {  // 追加签署人
                $pro_db = $this->db->select("gear_contract,gear_sign")->from("project_gear")->where(array("gear_projectid" => $_SESSION["projcet_id"], "gear_digital" => $_SESSION["digital"]))->get();
                $pro_tag = $pro_db->result_array();
                $signid = $pro_tag[0]["gear_sign"];
                $user_db = $this->db->select("user_email,user_name")->from("user")->where("user_phone=" . $_SESSION["user_phone"])->get();
                $user_arr = $user_db->result_array();
                $mobile = $_SESSION["user_phone"];     // 电话号码
                $email = "";                           // 邮箱
                $name = $user_arr[0]["user_name"];     // 用户名字
                $userlist = BestSignSDK\ReceiveUser::buildData($email, $name, $mobile, BestSignSDK\Constants::USER_TYPE_PERSONAL, BestSignSDK\Constants::CONTRACT_NEEDVIDEO_NONE, false);
                $userlist = array($userlist);
                $result = $this->sdk->sjdsendcontract($signid, $userlist);
                if ($result["response"]["info"]["code"] == 100000) {
                    $this->db->update("associated_up", array("associated_contract" => 1), array('associated_userid' => $user_id, "associated_projectid" => $_SESSION['projcet_id'], "associated_digital" => $_SESSION['digital']));
                } else {//没有成功追加签署人
                }
            } else {   //无需在追加签署人
            }
        }
        //判定签署位置
        $pace_db = $this->db->select("gear_signx,gear_signy,gear_sign_page")->from("project_gear")->where(array("gear_projectid" => $_SESSION["projcet_id"], "gear_digital" => $_SESSION["digital"]))->get();
        $pace = $pace_db->result_array();
        //判定签署页 和签署位置
        if ($pace[0]["gear_signy"] >= 0.9) {//这表示需要翻页
            $pagenum = $pace[0]["gear_sign_page"] + 1;                    //页数
            $signx = 0.1;                                               //签字坐标
            $signy = 0.1;                                               //签字坐标
            $this->db->update("project_gear", array("gear_signx" => $signx, "gear_signy" => $signy, "gear_sign_page" => $pagenum), array("gear_projectid" => $_SESSION["projcet_id"], "gear_digital" => $_SESSION["digital"]));//修改位置
        } elseif ($pace[0]["gear_signx"] >= 0.9) {                         //这表示需要换行
            $pagenum = $pace[0]["gear_sign_page"];                       //页数
            $signx = 0.1;                                                //签字坐标
            $signy = $pace[0]["gear_signy"] + 0.1;                         //签字坐标
            $this->db->update("project_gear", array("gear_signx" => $signx, "gear_signy" => $signy, "gear_sign_page" => $pagenum), array("gear_projectid" => $_SESSION["projcet_id"], "gear_digital" => $_SESSION["digital"]));//修改位置
        } else {                                                             //这个表示需要增加 x 轴
            $pagenum = $pace[0]["gear_sign_page"];                            //页数
            $signx = $pace[0]["gear_signx"] + 0.1;                              //签字坐标
            $signy = $pace[0]["gear_signy"];                                  //签字坐标
            $this->db->update("project_gear", array("gear_signx" => $signx, "gear_signy" => $signy, "gear_sign_page" => $pagenum), array("gear_projectid" => $_SESSION["projcet_id"], "gear_digital" => $_SESSION["digital"]));//修改位置
        }
        $u_db = $this->db->select("user_sign_id,user_sign")->from("user")->where("user_phone=" . $_SESSION["user_phone"])->get();
        $u = $u_db->result_array();
        $project_sign_db = $this->db->select("gear_sign,gear_copies")->from("project_gear")->where(array("gear_projectid" => $_SESSION["projcet_id"], "gear_digital" => $_SESSION["digital"]))->get();
        $project_sign = $project_sign_db->result_array();
        if ($pag == 2) {//手动签署   废除
            $fsid = $project_sign[0]["gear_sign"];                                         //合同的标签
            $email = $_SESSION["user_phone"];                                            //用户的账号
            $returnurl = "http://www.haitouwanhu.com";           //返回地址 返回首页
            $typedevice = BestSignSDK\Constants::DEVICE_TYPE_PC;
            $openflagString = 0;
            //   array('associated_userid'=>$user_id,"associated_projectid"=>$_SESSION['projcet_id'],"associated_digital"=>$_SESSION['digital'])
            $result = $this->sdk->getSignPageSignimagePc($fsid, $email, $pagenum, $signx, $signy, $returnurl, $typedevice, $openflagString);
            $update = " UPDATE `ci_associated_up` SET `associated_state` = 1 WHERE  `associated_userid`=" . $user_id . " AND  `associated_projectid`=" . $_SESSION['projcet_id'] . " AND `associated_digital`=" . $_SESSION['digital'];
            $this->session->set_userdata("update", $update);    //记忆购买的方案
            header("Location:" . $result);           //echo      跳转到上上签完成签署
        } elseif ($pag == 1) {                                      //自动签署
            $signid = $project_sign[0]["gear_sign"];           //合同编号
            $email = $_SESSION["user_phone"];                  //用户的账号
            $openflag = 0;
            $result = $this->sdk->AutoSignbyCA($signid, $email, $pagenum, $signx, $signy, $openflag);
            if ($result["response"]["info"]["code"] == 100000) {  //签字状态成功
                $row = $this->db->update("associated_up", array("associated_state" => 1), array('associated_userid' => $user_id, "associated_projectid" => $_SESSION['projcet_id'], "associated_digital" => $_SESSION['digital']));//修改方式
                if ($row > 0) {
                    //发送短信
                    $this->load->model('CurlOpen_model');
                    $appkey = 'd87365b3a73d7170';     //你的appkey
                    $mobile = $_SESSION['user_phone'];//手机号 超过1024请用POST
                    $mun = $this->input->post("num");
                    $content = '您已成功购买' . $projectname1[0]['project_name'] . '项目，可在个人中心查看已购项目。如有问题请联系海投万户。【海投万户】';//utf8
                    $url = "http://api.jisuapi.com/sms/send?appkey=" . $appkey . "&mobile=" . $mobile . "&content=" . $content;
                    $result = $this->CurlOpen_model->curlOpen($url);
                    $jsonarr = json_decode($result, true);
                    header("Location:http://www.haitouwanhu.com");  //签署成功
                } else {
                    exit("签署失败");
                }
            } else {
                exit('签字失败');
            }

        }

    }

    public function aa()
    {
        define('CONFIG_NAME', 'demo');
        require('sign/demo/initialize.php');
        require('sign/src/SDK.php');
        error_reporting(E_ALL);
        $server_config = $this->getServerConfig();
        $mid = $server_config['mid'];
        $pem = $server_config['pem'];
        $host = $server_config['host'];
        $this->sdk = BestSignSDK\SDK::getInstance($mid, $pem, $host);
        $this->sdk->setDebugLevel(BestSignSDK\Logger::DEBUG_LEVEL_INFO);
        $this->last_contract = null;
        $signid = '1478224730774FPDK2';      //合同编号
        $result = $this->sdk->endcontract($signid);

        var_dump($result);

    }


    public function getResource($file_name)
    {
        $path = 'http://www.haitouwanhu.com/sign/demo/resources/' . $file_name;
        //   var_dump($path);
        return file_get_contents($path);

    }


    public function getServerConfig()
    {
        require('sign/demo/conf/config.php');
        if (!array_key_exists(CONFIG_NAME, $SERVERS_CONFIG)) {
            die('ERROR: $SERVERS_CONFIG[' . CONFIG_NAME . "] not exists\n");
        }
        return $SERVERS_CONFIG[CONFIG_NAME];
    }


    //合同预览
    public function preview()
    {
        define('CONFIG_NAME', 'demo');
        require('sign/demo/initialize.php');
        require('sign/src/SDK.php');
        error_reporting(E_ALL);
        $server_config = $this->getServerConfig();
        $mid = $server_config['mid'];
        $pem = $server_config['pem'];
        $host = $server_config['host'];
        $this->sdk = BestSignSDK\SDK::getInstance($mid, $pem, $host);
        $this->sdk->setDebugLevel(BestSignSDK\Logger::DEBUG_LEVEL_INFO);
        $this->last_contract = null;
        $signid = $this->input->get('signid');//$sign[0]["project_sign"];       //项目id
        $docid = $this->input->get('docid');//$sign[0]['project_sign_docid'];  //项目的存放地址
        $status = 3;
        // echo   1;
        $result = $this->sdk->ViewContract($signid, $docid, $status);
        header("Location:" . $result);                 //预览成功
////
//        return  $result;

    }

    //合同下载
    public function download()
    {
        $sign_db = $this->db->select("project_sign,project_sign_docid")->from("project")->where("project_id=48")->get();
        $sign = $sign_db->result_array();
        $signid = $sign[0]["project_sign"];       //项目id
        $status = 3;
        $result = $this->sdk->contractDownloadMobile($signid, $status);

    }


//合同结束

    public function over_sign()
    {
        define('CONFIG_NAME', 'demo');
        require('sign/demo/initialize.php');
        require('sign/src/SDK.php');
        error_reporting(E_ALL);
        $server_config = $this->getServerConfig();
        $mid = $server_config['mid'];
        $pem = $server_config['pem'];
        $host = $server_config['host'];
        $sdk = BestSignSDK\SDK::getInstance($mid, $pem, $host);
        $sdk->setDebugLevel(BestSignSDK\Logger::DEBUG_LEVEL_INFO);
        $signid = "1479696364609QVGB2";
        // $docid ='1479696364609HC1O1';
        // $status=3;
        $result = $sdk->endcontract($signid);
        //  $result = $this->sdk-c>ViewContract($signid, $docid, $status);
        //  var_dump($result);
//        header("Location:".$result);
    }


    public function shangchuan()
    {
        define('CONFIG_NAME', 'demo');
        require('sign/demo/initialize.php');
        require('sign/src/SDK.php');
        error_reporting(E_ALL);
        $server_config = $this->getServerConfig();
        $mid = $server_config['mid'];
        $pem = $server_config['pem'];
        $host = $server_config['host'];
        $this->sdk = BestSignSDK\SDK::getInstance($mid, $pem, $host);
        $this->sdk->setDebugLevel(BestSignSDK\Logger::DEBUG_LEVEL_INFO);
        $file_data = $this->getResource('demo.pdf');//合同路径
        $receive_user = BestSignSDK\ReceiveUser::buildData("", "庾治超", '18280195336', BestSignSDK\Constants::USER_TYPE_PERSONAL, BestSignSDK\Constants::CONTRACT_NEEDVIDEO_NONE, false);
        $userlist = array($receive_user);
        $senduser = BestSignSDK\SendUser::buildData("22345678@163.com", '合同签署', "13912345678", 3, false, BestSignSDK\Constants::USER_TYPE_PERSONAL, false, "title", "");
        $senduser = array($senduser);
        $last_contract = $this->sdk->sjdsendcontractdocUpload($userlist, $senduser, $file_data);
        //  var_dump($last_contract);
        //  echo  '<br/>';
        //   var_dump($last_contract["response"]["content"]["contlist"][0]["continfo"]["docid"]);
        //   echo  '<br/>';
        // var_dump($last_contract["response"]["content"]["contlist"][0]["continfo"]["signid"]);
    }


    public function sign_sign()
    {
        define('CONFIG_NAME', 'demo');
        require('sign/demo/initialize.php');
        require('sign/src/SDK.php');
        error_reporting(E_ALL);
        $server_config = $this->getServerConfig();
        //    var_dump($server_config);
        $mid = $server_config['mid'];
        $pem = $server_config['pem'];
        $host = $server_config['host'];
        $this->sdk = BestSignSDK\SDK::getInstance($mid, $pem, $host);
        $this->sdk->setDebugLevel(BestSignSDK\Logger::DEBUG_LEVEL_INFO);
        $signid = '1479696364609QVGB2';
        $email = '18280195336';
        $pagenum = 1;
        $signx = '0.1';
        $signy = '0.2';
        $openflag = 0;
        $result = $this->sdk->AutoSignbyCA($signid, $email, $pagenum, $signx, $signy, $openflag);
        var_dump($result);
    }


    public function f()
    {

        define('CONFIG_NAME', 'demo');
        require('sign/demo/initialize.php');
        require('sign/src/SDK.php');
        error_reporting(E_ALL);
        $server_config = $this->getServerConfig();
        $mid = $server_config['mid'];
        $pem = $server_config['pem'];
        $host = $server_config['host'];
        $this->sdk = BestSignSDK\SDK::getInstance($mid, $pem, $host);
        $this->sdk->setDebugLevel(BestSignSDK\Logger::DEBUG_LEVEL_INFO);
//
        $name = "庾治超";                                    //用户的名字
        $password = "18280195336";                                //用户的密码(也是手机号)
        $link_mobile = "18280195336";                               //用户的电话号码
        $email = "";                                                         //用户的邮箱
        $link_id_code = "513922199607140650";                             //用户的身份证号
        $address = "资阳市";                                                 //
        $result1 = $this->sdk->certificateApply($ca_type = BestSignSDK\Constants::CA_TYPE_ZJCA, $name, $password, $name, $link_mobile, $email, $address, "浙江省", "杭州市", $link_id_code);

        var_dump($result1);
        echo "<br/>";

        $signid = "1479696364609QVGB2";
        $mobile = "18280195336";      //  电话号码
        $email = "";      //  邮箱
        $name = "庾治超";     //  用户名字
        $userlist = BestSignSDK\ReceiveUser::buildData($email, $name, $mobile, BestSignSDK\Constants::USER_TYPE_PERSONAL, BestSignSDK\Constants::CONTRACT_NEEDVIDEO_NONE, false);
        $userlist = array($userlist);
        $result2 = $this->sdk->sjdsendcontract($signid, $userlist);

        var_dump($result2);
        echo "<br/>";


        $signid = "1479696364609QVGB2";                   //合同编号
        $email = "18280195336";                            //电话号码
        $openflagString = 1;
        $openflag = 0;
        $typedevice = BestSignSDK\Constants::DEVICE_TYPE_PC;
        //   $result3 = $this->sdk->AutoSignbyCA($signid, $email, $pagenum=1, $signx=0.4, $signy=0.3, $openflag);
        $returnurl = "http://www.haitouwanhu.com";
        $result3 = $this->sdk->getSignPageSignimagePc($signid, $email, $pagenum = 1, $signx = 0.1, $signy = 0.4, $returnurl, $typedevice, $openflagString);
        header("Location:" . $result3);
        // var_dump($result3);echo"<br/>";
    }


    public function f2()
    {

    }
}