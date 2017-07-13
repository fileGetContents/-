<?php
/**
 * Created by PhpStorm.
 * User: 庾治超
 * Date: 2016/9/1
 * Time: 10:18
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class  Admin extends CI_Controller
{


    public function index()
    {
        // var_dump($ret);
        $row = $this->db->select()->from("project")->where("project_tag", 0)->get();
        $pro["ongoing"] = $row->result_array();                               //返回所有的未经行中的项目
        $this->load->view('admin/project_insert', $pro);
        //  var_dump($pro);
    }

    //添加项目操作
    public function project()
    {
        //获取对应的值
        $new_project = array(
            "project_name" => $this->input->post("name"),                     //项目名字
            "project_time_start" => $this->input->post("time_start"),               //项目开始时间
            "project_time_over" => $this->input->post("time_over"),                //项目结束时间
            "project_money_each" => $this->input->post("money_each"),               //项目每份金额
            "project_money_all" => $this->input->post("money_all"),                //项目总凑金额
            "project_introduce" => $this->input->post("introduce"),                //项目介绍
            //  "project_images"=>      $this->input->post("images"),                 //项目图片
            "project_earnings" => $this->input->post("earnings"),                 //年化收益
            //   "project_tag"     =>   1                                             //添加为新增项目
        );
        //图片上传
        $config = array(
            "upload_path" => "./static/images/",                                               //图片存放地址
            "allowed_types" => "jpg|jpeg|gif|png",                                             //支持的图片格式
            "max_size" => "20000",                                                             //最大的图片上传格式
            "file_name" => uniqid() . date("YmdHis") . mt_rand()                                   //图片上传的新的名字
        );
        $this->load->library("upload", $config);

        //加载上传操作
        $this->upload->do_upload("images");
        $images = $this->upload->data();
        $new_project['project_images'] = 'static/images/' . $images['orig_name'];                //判断上传后的数据
        // 添加操作
        $this->load->model("Insert_model");
        $ret = $this->Insert_model->ins("project", $new_project);
        echo $ret;
        //var_dump($new_project);
    }

    //修改项目
    public function project_Modify()
    {
        $id = $this->input->get('id');              //获取项目的唯一id
        $this->load->model('Select_model');        //加载查询方法
        $modify["project"] = $this->Select_model->sel('project', array("project_id" => $id));//返回对应的数组
        $this->load->view('admin/project_modify', $modify);
        //    var_dump($modify['project']);
    }

    //修改操作
    public function project_change()
    {
        $id = $this->input->post("id");                                               //获取项目唯一id
        //获取对应的值
        $upd_project = array(
            "project_name" => $this->input->post("name"),                    //项目名字
            "project_time_start" => $this->input->post("time_start"),               //项目开始时间
            "project_time_over" => $this->input->post("time_over"),                //项目结束时间
            "project_money_each" => $this->input->post("money_each"),               //项目每份金额
            "project_money_all" => $this->input->post("money_all"),                //项目总凑金额
            "project_introduce" => $this->input->post("introduce"),                //项目介绍
            "project_earnings" => $this->input->post("earnings"),                 //年化收益
        );
        //图片上传
        if ($this->input->post("images") == "") {
        } else {
            $config = array(
                "upload_path" => "./static/images/",                                             //图片存放地址
                "allowed_types" => "jpg|jpeg|gif|png",                                           //支持的图片格式
                "max_size" => "20000",                                                           //最大的图片上传格式
                "file_name" => uniqid() . date("YmdHis") . mt_rand()                             //图片上传的新的名字
            );
            $this->load->library("upload", $config);                                             //加载上传操作
            $this->upload->do_upload("images");
            $images = $this->upload->data();
            $upd_project['project_images'] = 'static/images/' . $images['orig_name'];            //判断上传后的数据
        }
//       修改操作
        $row = $this->db->update("project", $upd_project, "project_id=" . $id);//
        echo $row;
        //  var_dump($upd_project);

    }


    //会员管理
    public function user()
    {
        $row = $this->db->select()->from("user")->get();
        $arr = $row->result_array();
        //判断是否实名认证过
        $arr1 = array();
        foreach ($arr as $value) {
            if (!empty($value['user_IDcard'])) {
                $value["or"] = 1;
            } else {
                $value["or"] = 0;
            }
            $arr1[] = $value;
        }

        //投资金额和投资个数
        $this->load->model("Personal_model");
        $personal = $this->Personal_model->admin_fa();
        $length = count($arr1);
        //var_dump($length);
        for ($i = 0; $i < $length; $i++) {
            $arr1[$i]["num"] = $personal[$i]["num"];
            $arr1[$i]["money"] = $personal[$i]["money"];
        }
        // var_dump($personal);

        //查看用户上次登陆的ip地址以及登路的时间
        $arr2 = array();
        foreach ($arr1 as $value) {
            $rec = $this->db->select()->from("user_record")->where("record_user_phone=" . $value["user_phone"])->order_by("record_id", "DESC")->limit(1, 0)->get();
            $record = $rec->result_array();
            //     var_dump($record);
            if (!empty($record)) {
                $value["record_time"] = $record[0]["record_time"];
                $value["record_ip"] = $record[0]["record_ip"];
                $value["record_address"] = $record[0]["record_address"];
                $value["record_m"] = 1;//有登录记录
                $arr2[] = $value;
            } else {
                $value["record_m"] = 0;//没有登录记录
                $arr2[] = $value;
            }

        }
        $user["user"] = $arr2;
        //  var_dump($user);
        $this->load->view("admin/user", $user);
    }


    //会员详细页面
    public function user_show()
    {

        $phone = $this->input->get("phone");
        //获取每个电话的唯一id号
        $user = $this->db->select("user_id")->from("user")->where(array("user_phone" => $phone))->get();
        $userid = $user->result_array();
        $num = $this->db->select()->from("associated_up")->where(array("associated_userid" => $userid[0]["user_id"]))->get();
        $personal["num"] = $num->num_rows();//查询已经投资项目的总数
        //投资总额
        $money = $this->db->select()->from("associated_up")->where(array("associated_userid" => $userid[0]["user_id"]))->get();
        $personal["money"] = 0;
        $amoney = $money->result_array();
        foreach ($amoney as $value) {
            $pro = $this->db->select()->from("project")->where(array("project_id" => $value["associated_id"]))->get();
            $pro = $this->db->select()->from("project")->where(array("project_id" => $value["associated_id"]))->get();
            $prow = $pro->result_array();
            $personal["money"] = intval($value["associated_score"]) * intval($prow[0]["project_money_each"]) + $personal["money"];//获取每一次的投资额
        }
        $n = $this->uri->segment(3, 0);
        $ass = $this->db->select()->from("associated_up")->where(array("associated_userid" => $userid[0]["user_id"]))->limit(6, $n)->get();
        $res = $ass->result_array();
        //   var_dump($personal["num"]);
        $v = array();
        foreach ($res as $value) { //每一层对应一个项目
            $pro = $this->db->select()->from("project")->where(array("project_id" => $value["associated_id"]))->get();
            $prow = $pro->result_array();
            $prow[0]['money'] = intval($value["associated_score"]) * intval($prow[0]["project_money_each"]);//获取每一次的投资额
            //var_dump($prow);
            $prow[0]["time"] = $value["associated_time"];
            $v[] = $prow[0];
        }
        //项目详情
        $personal["project"] = $v;
        // var_dump($personal);
        //分页配置
        $this->load->library('pagination');                                           //加载分页辅助函数
        $base_url = "http://www.wanhuu.cn/index.php/Personal/p_project";              //分页显示地址
        $this->load->model('Page_model');
        $config = $this->Page_model->page($personal["num"], $base_url);
        $this->pagination->initialize($config);                                        //加载配置

        //查询用户的基本信息
        $rows = $this->db->select()->from("user")->where(array("user_phone" => $phone))->get();
        $arows = $rows->result_array();
        $personal["user"] = $arows;
        //查询用户的登陆记录
        $mie = $this->db->select()->from("user_record")->where(array("record_user_phone" => $phone))->limit(6, 0)->get();
        $m = $mie->result_array();
        $personal["m"] = $m;
        // var_dump($userid[0]["user_id"]);
        // var_dump($personal);
        $this->load->view('admin/user_show', $personal);
        // echo    $this->pagination->create_links();
    }


//
    public function dom()
    {
        $this->load->helper('directory');
        $map = directory_map('./application/');

    }


    public function email()
    {

        $this->load->library('email');                //加载email
        $config['protocol'] = 'smtp';                 //邮件发送协议
        $config['smtp_host'] = 'ssl://smtp.qq.com';   //SMTP 服务器地址
        $config['smtp_user'] = '1932425337@qq.com';   //SMTP 用户名
        $config['smtp_pass'] = 'upqchykuwdtvdccj';    //授权码
        $config['smtp_port'] = 465;                   //端口号
        $config['smtp_timeout'] = 30;                 //SMTP 超时时间（单位：秒）
        $config['mailtype'] = 'text';                 //邮件类型。如果发送的是 HTML 邮件，必须是一个完整的网页， 确保网页中没有使用相对路径的链接和图片地址，它们在邮件中不能正确显示。
        $config['charset'] = 'utf-8';                 //字符集
        $config['wordwrap'] = TRUE;                   //是否启用自动换行
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $config['crlf'] = "\r\n";
        $this->email->from('1932425337@qq.com', 'biaoti');
        $this->email->to('1946431302@qq.com');            //对方电子邮件
        $this->email->subject('消息标题');              //消息标题
        $this->email->message('消息内容');//消息内容
        $this->email->send();
        $this->email->clear();
    }
}

