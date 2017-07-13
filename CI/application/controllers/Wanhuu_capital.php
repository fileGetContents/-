<?php
/**
 * 提现记录控制器
 * User: 庾治超
 * Date: 2016/12/2
 * Time: 9:44
 */

class  Wanhuu_capital   extends  CI_Controller{


    public  function  index(){
       //权限
        $this->load->model('Wanhuu_model');
        $this->Wanhuu_model->permissions('permissions_cash',"查看");
        $n=$this->uri->segment(3,0);
        $cash_db=$this->db->select("*")->from("user_cash")->join("user_bank","bank_number=cash_bank_number","left")->limit(12,$n)->order_by("cash_id","DESC")->get();
        $cash=$cash_db->result_array();
        $index["cash"]=array();
        foreach($cash  as $cash_value){
            if(!isset($cash_value['bank_id'])){
                $cash_value["infro"]="数据库没有相关信息";
            }else{
                $cash_value["infro"]="开户名:".$cash_value['bank_user_name']." ".$cash_value['bank_bank_name']."开户地点:".$cash_value['bank_city'].$cash_value['bank_address'];
            }
            //是否提现成功
          if($cash_value['cash_tag']==0){
              $cash_value['work']="否";
          }elseif($cash_value['cash_tag']==1){
              $cash_value['work']="是";
          }
            $index['cash'][]=$cash_value;
        }
        //加载分页
        $this->load->library('pagination');
        $this->load->model("Page_model","page");
        //   $total_rows,$base_url,$page=6
        $base_url=site_url("Wanhuu_capital/index");  //分页显示地址
        $rows_db=$this->db->select('cash_id')->from("user_cash")->get();
        $total_rows= $rows_db->num_rows();    //总数量
        $config=$this->page->page($total_rows,$base_url,$page=12);
        $this->pagination->initialize($config);                                       //加载配置
        $this->load->view("admin/capital/index",$index);

    }

//提现操作
    public  function add_edit(){
        //提现操作
        $this->load->model("Wanhuu_model");
        $this->Wanhuu_model->permissions("permissions_cash","操作");
        $id=$this->uri->segment(3,0);
        $cash_db=$this->db->select("*")->from("user_cash")->where(array("cash_id"=>$id))->join("user_bank","bank_number=cash_bank_number","left")->get();
        $cash=$cash_db->result_array();
        $this->load->view("admin/capital/add_edit",$cash[0]);
    }

    /**
     * 提款操作
     */
        //提现接口
     public function  payment(){
         //查看权限
            $where=array();
            $order_num=$this->input->post('cash_order');  //订单号
            //查询订单号 用户电话哈号码 提现金额
            $order_db=$this->db->select('cash_bank_number,cash_money,cash_user_phone')->from('user_cash')->where(array("cash_order"=>$order_num))->get();
            $order=$order_db->result_array();
            //查询银行卡相关信息
            $bank_db=$this->db->select()->from('user_bank')->where('bank_number="'.$order[0]['cash_bank_number'].'"')->get();
            $bank=$bank_db->result_array();
            $where['outer_trade_no']=$order_num;                                                       //商户网站唯一订单号
            $where['bank_account_no']=$order[0]['cash_bank_number'];                                   //银行卡号
            $where['account_name']=$bank[0]['bank_user_name'];                                         //用户名
            $where['bank_code']=explode("行",$bank[0]['bank_bank_name'])[1];                           //银行编号
            $where['bank_name']=explode("行",$bank[0]['bank_bank_name'])[0]."行";   ;                  //银行全称
            $where['bank_branch']=$bank[0]['bank_address'];                                            //支行名称
            $where['province']=$bank[0]['bank_province'];                                              //省份
            $where['city']=$bank[0]['bank_city'];                                                      //城市
            $where['card_type']=$bank[0]['bank_type'];                                                 //卡类型
            $where['card_attribute']=$bank[0]['bank_attribute'];                                       //卡属性
            $where['amount']=$order[0]['cash_money'];                                                  //付款金额
            //修改数据的内容
           $row=$this->db->update("user_cash",array("cash_tag"=>1,"cash_cash_time"=>date('Y-m-d H:i:s')));
           if($row>0){
               $this->load->model("Pay_model");
               $this->Pay_model->payment($where);
           }else{
               echo $this->db->last_query();
           }
            //加载接口
     }



    public function rdm_bianji(){
        $id=$this->uri->segment(3,0);
        $gear_db=$this->db->select("gear_each")->from("project_gear")->where(array("gear_id"=>$id))->get();
        $gear=$gear_db->result_array()[0];
        $gear["id"]=$id;
        $this->load->view("admin/capital/rdm_bianji",$gear);
    }

    public  function  bianji(){

         $id=$this->uri->segment(3,0);             //project_gear
         $change=$this->input->get("change");      //年化收益百分比
         $gear_db=$this->db->select("*")->from("project_gear")->where(array("gear_id"=>$id))->get();
         $gear=$gear_db->result_array()[0];
        if($gear["gear_redeem"]==1){
            exit("貌似已经赎回过了");
        }
         $user_db=$this->db->select("*")->from("associated_up")->where(array("associated_projectid"=>$gear['gear_projectid'],"associated_digital"=>$gear['gear_digital']))->join("user","user_id=associated_userid","left")->get();
         $user=$user_db->result_array();
         foreach($user  as $user_value){
             if($user_value['associated_ransom']){
                  $money=$user_value['user_money'] + $gear['gear_each']*$user_value['associated_score']*$change;
                  //开始事务
                  $this->db->trans_start();
                  $this->db->update("associated_up",array("associated_ransom"=>1),"associated_id=".$user_value['associated_id']);
                  $this->db->update("user",array("user_money"=>$money),"user_id=".$user_value['user_id']);
                  $this->db->trans_complete();
                  //执行事务
                  if($this->db->trans_status()){
                      echo "用户编号：".$user_value['user_id']."成功";
                  }else{
                      echo  "用户编号:".$user_value['user_id']."失败";
                  }
             }else{
                 echo   "编号：".$user_value['associated_id']."已经赎回过了";
             }

         }
        //修改项目的状态
     $row=$this->db->update("project_gear",array("gear_redeem"=>1),array("gear_id"=>$gear['gear_id']));
     if($row>0){
         echo  "赎回修改成功";
     }
    }

    public function rdm_modal(){

        $this->load->model("Wanhuu_model");
        $this->Wanhuu_model->permissions("permissions_redeem","操作");

        $id=$this->uri->segment(3,0);
        $gear_db=$this->db->select("*")->from("project_gear")->where(array("gear_id"=>$id))->get();
        $gear=$gear_db->result_array();
        $ass_db=$this->db->select("*")->from("associated_up")->where(array("associated_projectid"=>$gear[0]["gear_projectid"],"associated_digital"=>$gear[0]["gear_digital"]))->join("user","user_id=associated_userid","left")->get();
        $ass=$ass_db->result_array();
        $modal["modal"]=array();
        $modal["id"]=$id;
        foreach($ass as $ass_value){
            $ass_value["all"]=$ass_value['associated_score']*$gear[0]["gear_each"];
            $modal["modal"][]=$ass_value;
        }
        $this->load->view("admin/capital/rdm_modal",$modal);
    }


    /**
     * 资金赎回
     */
    public function redeem (){

      //权限查看
        $this->load->model("Wanhuu_model");
        $this->Wanhuu_model->permissions('permissions_redeem',"查看");


       $gear_db=$this->db->select("*")->from("project_gear")->where(array("project_tag"=>0))->order_by("gear_id","DESC")->join("project","project_id=gear_projectid","left")->get();
       $gear=$gear_db->result_array();
       //删除没到赎回期的时间
       $redeem["redeem"]=array();
        foreach($gear as $gear_value){
            $a="+   ".$gear_value['gear_cycle'] ." months";
            $time=strtotime($a, strtotime($gear_value['project_time_over']));//赎回期
            if($time < time() ){//查询用户
              if($gear_value['gear_redeem']!=1){
                 $query="select associated_id  from ci_associated_up  where  associated_projectid=".$gear_value['gear_projectid']."  and associated_digital=".$gear_value['gear_digital'];
                 $num=$this->db->query($query);
                 $num1=$num->num_rows();
                 $gear_value["user_num"]=$num1;
                 $redeem["redeem"][]=$gear_value;
              }
            }
        }

       $this->load->view("admin/capital/redeem",$redeem);
    }

    public  function sbt_model(){

        $this->load->view("admin/capital/sbt_model");
    }


    /**
     *退款记录
     */

    public function submit(){
        //查看权限
        $this->load->model("Wanhuu_model");
        $this->Wanhuu_model->permissions("permissions_refund","查看");
         $n=$this->uri->segment(3,0);
         $refund_db=$this->db->select("*")->from("user_refund")->order_by("refund_id","DESC")->limit(12,$n)->get();
         $refund=$refund_db->result_array();
         $submit['refund']=array();
        foreach($refund as  $refund_value){
            if($refund_value['refund_tag']==1){
                $refund_value['why']="是";
            }elseif($refund_value["refund_tag"]==0){
                $refund_value['why']="否";
            }
            $submit['refund'][]=$refund_value;
        }

         $this->load->library('pagination');
         $this->load->model("Page_model","page");
        //   $total_rows,$base_url,$page=6
         $base_url=site_url("Wanhuu_capital/submit");  //分页显示地址
         $rows_db=$this->db->select('refund_id')->from("user_refund")->get();
         $total_rows= $rows_db->num_rows();    //总数量
         $config=$this->page->page($total_rows,$base_url,$page=12);
         $this->pagination->initialize($config);                                       //加载配置
         $this->load->view("admin/capital/submit",$submit);

    }


    public function sub_user(){

        //查看权限
     $this->load->model("Wanhuu_model");
     $this->Wanhuu_model->permissions("permissions_refund","操作");
     //   $id=10;//$this->input->post("id");
     $id=$this->input->post("id");
     $refund_db=$this->db->select("*")->from("user_refund")->where("refund_id=".$id)->get();
     $refund=$refund_db->result_array();
     $user_db=$this->db->select("user_money")->from("user")->where("user_phone=".$refund[0]['refund_user_phone'])->get();
     $user=$user_db->result_array();   //用户本金
     if(!empty($refund)){
         if($refund[0]['refund_tag']==0){
                 //开启事务
                 $this->db->trans_start();
                 $this->db->update("user_refund",array("refund_tag"=>1,"refund_refund_time"=>date("Y-m-d H:i:s")),"refund_user_phone=".$refund[0]['refund_user_phone']);
                 $this->db->update("user",array("user_money"=>$user[0]['user_money']+$refund[0]['refund_money']),"user_phone=".$refund[0]['refund_user_phone']);
                 $this->db->trans_complete();
                 if ($this->db->trans_status() === FALSE){
                     echo 0;
                 }else{
                     echo 1;
                 }
         }else{
             echo 2;
         }
     }else{
         echo  1;//失败
     }

    }


//提现记录导出
    public function Excel1(){
       //导出权限
        $this->load->model("Wanhuu_model");
        $this->Wanhuu_model->permissions("permissions_cash","导出");

        require_once("php_execl/Classes/PHPExcel.php");
        $excel = new PHPExcel();//实例化类
        //Excel表格式,这里简略写了8列
        $letter = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S');
        //表头数组
        $tableheader = array('用户账号','提现卡号','提现金额','申请时间','开户名',"开户银行","开户地点","完成提现","确认提现时间");
        //填充表头信息
        for($i = 0;$i < count($tableheader);$i++) {
            $excel->getActiveSheet()->setCellValue("$letter[$i]1","$tableheader[$i]");
        }
        $cash_db=$this->db->select("*")->from("user_cash")->join("user_bank","bank_number=cash_bank_number","left")->order_by("cash_id","DESC")->get();
        $cash=$cash_db->result_array();
        $index["cash"]=array();
        foreach($cash  as $cash_value){
            if(!isset($cash_value['bank_id'])){
                $cash_value["infro"]="数据库没有相关信息";
            }else{
                $cash_value["infro"]="开户名:".$cash_value['bank_user_name']." ".$cash_value['bank_bank_name']."开户地点:".$cash_value['bank_city'].$cash_value['bank_address'];
            }
            //是否提现成功
            if($cash_value['cash_tag']==0){
                $cash_value['work']="否";
            }elseif($cash_value['cash_tag']==1){
                $cash_value['work']="是";
            }

            $index['cash'][]=$cash_value;
        }
        foreach($index['cash'] as $value){
            $data[]=array(
                $value['bank_user_phone'],$value['cash_bank_number'],$value['cash_money'],$value['cash_time'],
                $value['bank_user_name'],$value['bank_bank_name'],$value['bank_city'].$value['bank_address'],$value['work'],
                $value['cash_cash_time']
            );
        }
        //填充表格信息
        for ($i = 2;$i <= count($data) + 1;$i++) {
            $j = 0;
            foreach ($data[$i - 2] as $key=>$value) {
                $excel->getActiveSheet()->setCellValue("$letter[$j]$i","$value" );
                $j++;
            }
        }
        ob_end_clean();
        //创建Excel输入对象
        $write = new PHPExcel_Writer_Excel5($excel);
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
        header("Content-Type:application/force-download");
        header("Content-Type:application/vnd.ms-execl");
        header("Content-Type:application/octet-stream");
        header("Content-Type:application/download");
        header('Content-Disposition:attachment;filename="testdata.xls"');
        header("Content-Transfer-Encoding:binary");
        $write->save('php://output');

    }


    //退款
    public function  Excel2(){

        //导出权限
        $this->load->model("Wanhuu_model");
        $this->Wanhuu_model->permissions("permissions_refund","导出");
        require_once("php_execl/Classes/PHPExcel.php");
        $excel = new PHPExcel();//实例化类
        //Excel表格式,这里简略写了8列
        $letter = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S');
        //表头数组
        $tableheader = array('用户账号','提现金额','申请时间','退款理由',"是否审核","确认退款时间");
        //填充表头信息
        for($i = 0;$i < count($tableheader);$i++) {
            $excel->getActiveSheet()->setCellValue("$letter[$i]1","$tableheader[$i]");
        }
        $refund_db=$this->db->select("*")->from("user_refund")->order_by("refund_id","DESC")->get();
        $refund=$refund_db->result_array();
        $submit['refund']=array();
        foreach($refund as  $refund_value){
            if($refund_value['refund_tag']==1){
                $refund_value['why']="是";
            }elseif($refund_value["refund_tag"]==0){
                $refund_value['why']="否";
            }
            $submit['refund'][]=$refund_value;
        }
        foreach( $submit['refund'] as $value){
            $data[]=array(
                $value['refund_user_phone'],$value['refund_money'],$value['refund_time'],$value['refund_why'],
                $value['why'],$value['refund_time']
            );
        }
        //填充表格信息
        for ($i = 2;$i <= count($data) + 1;$i++) {
            $j = 0;
            foreach ($data[$i - 2] as $key=>$value) {
                $excel->getActiveSheet()->setCellValue("$letter[$j]$i","$value" );
                $j++;
            }
        }
        ob_end_clean();
        //创建Excel输入对象
        $write = new PHPExcel_Writer_Excel5($excel);
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
        header("Content-Type:application/force-download");
        header("Content-Type:application/vnd.ms-execl");
        header("Content-Type:application/octet-stream");
        header("Content-Type:application/download");
        header('Content-Disposition:attachment;filename="testdata.xls"');
        header("Content-Transfer-Encoding:binary");
        $write->save('php://output');
    }

    public function  Excel3(){

        require_once("php_execl/Classes/PHPExcel.php");
        $excel = new PHPExcel();//实例化类
        //Excel表格式,这里简略写了8列
        $letter = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S');
        //表头数组
        $tableheader = array('用户账号','提现金额','申请时间','退款理由',"是否审核","确认退款时间");
        //填充表头信息
        for($i = 0;$i < count($tableheader);$i++) {
            $excel->getActiveSheet()->setCellValue("$letter[$i]1","$tableheader[$i]");
        }
        $refund_db=$this->db->select("*")->from("user_refund")->order_by("refund_id","DESC")->get();
        $refund=$refund_db->result_array();
        $submit['refund']=array();
        foreach($refund as  $refund_value){
            if($refund_value['refund_tag']==1){
                $refund_value['why']="是";
            }elseif($refund_value["refund_tag"]==0){
                $refund_value['why']="否";
            }
            $submit['refund'][]=$refund_value;
        }
        foreach( $submit['refund'] as $value){
            $data[]=array(
                $value['refund_user_phone'],$value['refund_money'],$value['refund_time'],$value['refund_why'],
                $value['why'],$value['refund_time']
            );
        }
        //填充表格信息
        for ($i = 2;$i <= count($data) + 1;$i++) {
            $j = 0;
            foreach ($data[$i - 2] as $key=>$value) {
                $excel->getActiveSheet()->setCellValue("$letter[$j]$i","$value" );
                $j++;
            }
        }
        ob_end_clean();
        //创建Excel输入对象
        $write = new PHPExcel_Writer_Excel5($excel);
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
        header("Content-Type:application/force-download");
        header("Content-Type:application/vnd.ms-execl");
        header("Content-Type:application/octet-stream");
        header("Content-Type:application/download");
        header('Content-Disposition:attachment;filename="testdata.xls"');
        header("Content-Transfer-Encoding:binary");
        $write->save('php://output');



    }

       /**
        * 投资推荐返利
        */
    public function  rebate(){
        //查看返利
        $this->load->model("Wanhuu_model");
        $this->Wanhuu_model->permissions("permissions_rebate","查看");

       // $db=$this->db->select("recommend_time,recommend_rebate,recommend_oldUser,recommend_newUser,associated_score,gear_each")->from("user_recommended")->order_by("recommend_id","DESC")->join("user","recommend_newUser=user_phone","left")->join("associated_up","user_id=associated_userid","left")->join("project_gear","gear_projectid=associated_projectid  and  gear_digital=associated_digital","left")->join("project","project_id=associated_projectid")->where("project_tag=0")->get();
        $db=$this->db->select("associated_rebate,associated_id,associated_time,recommend_id,recommend_time,recommend_rebate,recommend_oldUser,recommend_newUser,associated_score,gear_each")->from("associated_up")->join("project_gear","associated_digital=gear_digital  and  associated_projectid=gear_projectid","left")->join("project","project_id=gear_projectid",'left')->join("user","associated_userid=user_id","left")->limit(12,0)->where("project_tag=0")->join("user_recommended","recommend_newUser=user_phone","left")->order_by("associated_id","DESC")->get();
        $rec=$db->result_array();
        $rebate['rebate']=array();
        if(!empty($rec)){
            foreach($rec as $value){
                 if( $value['recommend_rebate']==null){
                     $value['recommend_rebate']="";
                     $value['recommend_time']="";
                 }
                if($value['associated_rebate']==null){
                    $value['associated_rebate']="待返利";
                }else{
                    $value['associated_rebate']="成功返利";
                }
                $value['money']=$value['associated_score']*$value['gear_each'];//购买金额
                $rebate['rebate'][]=$value;
            }
        }
        $this->load->library('pagination');
        $this->load->model("Page_model","page");
        $base_url=site_url("Wanhuu_capital/rebate");  //分页显示地址
        $rows_db=$this->db->select('associated_id')->from("associated_up")->get();
        $total_rows= $rows_db->num_rows();    //总数量
        $config=$this->page->page($total_rows,$base_url,$page=12);
        $this->pagination->initialize($config);                                       //加载配置

        $this->load->view("admin/capital/rebate",$rebate);

    }

    /**
     * 返利界面
     */
    public function rebate2(){

        $this->load->model("Wanhuu_model");
        $this->Wanhuu_model->permissions("permissions_rebate","操作");


       $n=$this->uri->segment(3,0);
        if($n==0){
            exit("错误");
        }
        $db=$this->db->select("*")->from("user_recommended")->where(array("recommend_oldUser"=>$n))->get();
        $rec=$db->result_array(); //推荐人
        $rebate2['rebate2']=0;
        $rebate2['people']=$rec;
        $rebate2['oldUser']=$n;
        foreach($rec as $value){
            $join_db=$this->db->select("associated_rebate,gear_each,associated_score,associated_rebate")->from("associated_up")->join("project_gear","associated_projectid=gear_projectid and  associated_digital=gear_digital","left")->join("user","user_id=associated_userid","left")->where(array("user_phone"=>$value['recommend_newUser']))->get();
            $join=$join_db->result_array();
            foreach($join  as $join_value){
                if($join_value['associated_rebate']==null){
                    $rebate2['rebate2']= $rebate2['rebate2']+$join_value['gear_each']*$join_value['associated_score'];
                    if($join_value['associated_rebate']==null){
                        $join_value['associated_rebate']="待返利";
                    }else{
                        $join_value['associated_rebate']="成功返利";
                    }
                }else{
                }
            }
        }
        $this->load->view("admin/capital/rebate2",$rebate2);
    }

    public  function ajax_rebate(){

        $phone=$this->input->post('phone');
        $money=$this->input->post('money');
        $db=$this->db->select("*")->from("user_recommended")->where(array('recommend_oldUser'=>$phone))->join('user',"user_phone=recommend_newUser","left")->get();
        $user=$db->result_array();
        //修改关联
        foreach($user as $value){
            $this->db->update("associated_up",array('associated_rebate'=>1),array('associated_userid'=>$value['user_id']));
        }
        //修改金额
        $bd=$this->db->select("user_money")->from('user')->where(array("user_phone"=>$phone))->get();
        $mone=$bd->result_array();
        $con=$mone[0]['user_money']+$money;
        $row=$this->db->update('user',array('user_money'=>$con),array('user_phone'=>$phone));
        if($row>0){
            echo $row;
        }else{
            echo $row;
        }
    }

}