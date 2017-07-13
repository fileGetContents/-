<?php

/**
 * 管理员控制器
 * User: 庾治超
 * Date: 2016/12/2
 * Time: 9:43
 */
class   Wanhuu_administeation extends CI_Controller
{

    /**
     * 管理员管理
     */
    public function index()
    {

        $admin_db = $this->db->select("*")->from('admin')->order_by("admin_id", "DESC")->get();
        $index['admin'] = $admin_db->result_array();
        $this->load->view("admin/administration/index", $index);

    }

    /**
     * 删除用户
     */
    public function index_ajax_delect()
    {


        $admin['admin_id'] = $this->input->post('id');
        $row = $this->db->delete('admin', $admin);
        if ($row > 0) {
            echo 1;
        } else {
            echo 0;
        }

    }

    /**
     * 管理员修改显示
     */
    public function add_edit()
    {
        $admin['admin_id'] = $this->uri->segment(3, 0);
        $edit_db = $this->db->select('*')->from('admin')->where($admin)->get();
        $admin['admin'] = $edit_db->result_array();
        $this->load->view("admin/administration/add_edit", $admin);
    }

    /**
     * 修改管理员账号
     */
    public function edit_ajax()
    {

        $admin['admin_id'] = $this->input->post('id');//编号
        $where['admin'] = $this->input->post('name');//账号
        $where['password'] = $this->input->post('pass');//密码
        $row = $this->db->update('admin', $where, $admin);
        if ($row > 0) {
            echo 1;
        } else {
            echo 0;
        }


    }


    /**
     * 添加管理员
     */

    public function add_modal()
    {
        $this->load->view("admin/administration/add_modal");
    }

    /**
     * 管理员添加
     */
    public function model_from()
    {
        $admin1['admin'] = $this->input->get('admin');
        $admin1['password'] = md5($this->input->get('password'));
        $admin1['admin_id'] = time();
        //会员管理
        $admin['permissions_admin_id'] = $admin1['admin_id'];
        $admin['permissions_member'] = "";
        if (isset($_GET['member'])) {
            $admin['permissions_member'] = $admin['permissions_member'] . "查看/";
            if (isset($_GET['member_export'])) {
                $admin['permissions_member'] = $admin['permissions_member'] . "导出/";
            }
            if (isset($_GET['member_compile'])) {
                $admin['permissions_member'] = $admin['permissions_member'] . "编辑/";
            }
            if (isset($_GET['member_delete'])) {
                $admin['permissions_member'] = $admin['permissions_member'] . "删除/";
            }
            if (isset($_GET['member_list'])) {
                $admin['permissions_member'] = $admin['permissions_member'] . "查看购买列表/";
            }
        }
        //项目管理
        $admin['permissions_project'] = "";
        if (isset($_GET['project'])) {
            $admin['permissions_project'] = $admin['permissions_project'] . "查看/";
        }
        if (isset($_GET['project_export'])) {
            $admin['permissions_project'] = $admin['permissions_project'] . "导出/";
        }
        if (isset($_GET['project_update'])) {
            $admin['permissions_project'] = $admin['permissions_project'] . "跟新会员/";
        }
        if (isset($_GET['project_compile'])) {
            $admin['permissions_project'] = $admin['permissions_project'] . "编辑/";
        }
        if (isset($_GET['project_delete'])) {
            $admin['permissions_project'] = $admin['permissions_project'] . "删除/";
        }
        if (isset($_GET['permissions_list'])) {
            $admin['permissions_project'] = $admin['permissions_project'] . "购买项目列表/";
        }
        /**
         *资金管理
         */
        //提现记录
        $admin['permissions_cash'] = "";
        if (isset($_GET['cash'])) {
            $admin['permissions_cash'] = $admin['permissions_cash'] . "查看/";
        }
        if (isset($_GET['cash_export'])) {
            $admin['permissions_cash'] = $admin['permissions_cash'] . "导出/";
        }
        if (isset($_GET['cash_operation'])) {
            $admin['permissions_cash'] = $admin['permissions_cash'] . "操作/";
        }
        //退款记录
        $admin['permissions_refund'] = "";
        if (isset($_GET['refund'])) {
            $admin['permissions_refund'] = $admin['permissions_refund'] . "查看/";
        }
        if (isset($_GET['refund_export'])) {
            $admin['permissions_refund'] = $admin['permissions_refund'] . "导出/";
        }
        if (isset($_GET['refund_operation'])) {
            $admin['permissions_refund'] = $admin['permissions_refund'] . "操作/";
        }
        //资金赎回
        $admin['permissions_redeem'] = "";
        if (isset($_GET['redeem'])) {
            $admin['permissions_redeem'] = $admin['permissions_redeem'] . "查看/";
        }
        if (isset($_GET['redeem_export'])) {
            $admin['permissions_redeem'] = $admin['permissions_redeem'] . "导出/";
        }
        if (isset($_GET['redeem_operation'])) {
            $admin['permissions_redeem'] = $admin['permissions_redeem'] . "操作/";
        }
        //活动返利
        $admin['permissions_rebate'] = "";
        if (isset($_GET['rebate'])) {
            $admin['permissions_rebate'] = $admin['permissions_rebate'] . "查看/";
        }
        if (isset($_GET['rebate_export'])) {
            $admin['permissions_rebate'] = $admin['permissions_rebate'] . "导出/";
        }
        if (isset($_GET['rebate_operation'])) {
            $admin['permissions_rebate'] = $admin['permissions_rebate'] . "操作/";
        }
        //邮件
        $admin['permissions_email'] = "";
        if (isset($_GET['email'])) {
            $admin['permissions_email'] = $admin['permissions_email'] . "查看/";
        }
        if (isset($_GET['email_send'])) {
            $admin['permissions_email'] = $admin['permissions_email'] . "发送/";
        }
        if (isset($_GET['email_delete'])) {
            $admin['permissions_email'] = $admin['permissions_email'] . "操作/";
        }
        //短信
        $admin['permissions_note'] = "";
        if (isset($_GET['note'])) {
            $admin['permissions_note'] = $admin['permissions_note'] . "查看/";
        }
        if (isset($_GET['note_send'])) {
            $admin['permissions_note'] = $admin['permissions_note'] . "发送/";
        }
        if (isset($_GET['note_delete'])) {
            $admin['permissions_note'] = $admin['permissions_note'] . "删除/";
        }
        //站内信息
        $admin['permissions_station'] = "";
        if (isset($_GET['station'])) {
            $admin['permissions_station'] = $admin['permissions_station'] . "查看/";
        }
        if (isset($_GET['station_send'])) {
            $admin['permissions_station'] = $admin['permissions_station'] . "发送/";
        }
        if (isset($_GET['station_delete'])) {
            $admin['permissions_station'] = $admin['permissions_station'] . "删除/";
        }

        //管理员管理
        $admin['permissions_admin'] = "";
        if (isset($_GET['admin_see'])) {
            $admin['permissions_admin'] = $admin['permissions_admin'] . "查看/";
        }
        if (isset($_GET['admin_do'])) {
            $admin['permissions_admin'] = $admin['permissions_admin'] . "操作/";
        }


        $row = $this->db->insert('admin', $admin1);
        $row2 = $this->db->insert('permissions', $admin);

    }


    public function add_admin()
    {

    }

    public function sel_admin()
    {
        $admin = $this->input->post("admin");
        $admin_db = $this->db->select("admin")->from("admin")->where("admin=" . $admin)->get();
        $admin = $admin_db->result_array();
        if (!empty($admin)) {
            echo 0;//为空
        } else {
            echo 1;//不为空
        }

    }


    public function add_to()
    {
        $this->load->view("admin/administration/add_to");
    }


    public function role()
    {

        $this->load->view("admin/administration/role");
    }


    public function role_add()
    {
        $this->load->view("admin/administeation/role_add");
    }


    public function role_edit()
    {
        $this->load->view("admin/administration/role_edit");
    }


    public function role_modal()
    {
        $this->load->view("admin/administration/role_modal");
    }

    public function aa()
    {
        //查看权限
        $this->load->model("Wanhuu_model");
        $this->Wanhuu_model->permissions();
    }


}