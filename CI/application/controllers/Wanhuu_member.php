<?php
/**
 * 会员管理控制器
 * User: 庾治超
 * Date: 2016/12/2
 * Time: 9:46
 */

class  Wanhuu_member   extends  CI_Controller{

    public  function  index(){
        //权限管理
        $this->load->model("Wanhuu_model");
        $this->Wanhuu_model->permissions("permissions_member","查看");
        $n=$this->uri->segment(5,0);  //
        $order['where']=$this->uri->segment(3,"user_id");
        $order['way']=$this->uri->segment(4,"DESC");
        if( $order['where']=="buy_num"){//购买项目数
            $db_user=$this->db->select("*")->from("user")->join("user_recommended","recommend_newUser=user_phone","left")->get();
            $users=$db_user->result_array();
            //每个投资的金额
            $buy_num=array();
            foreach($users as $v){
               $query="select count(distinct associated_projectid) as num  from   ci_associated_up  where  associated_userid=".$v['user_id'];
               $buy=$this->db->query($query)->result_array();
               $v['buy_num']=$buy[0]['num'];
               $buy_num[]=$v;
            }
         //整合结果集排序
         if( $order['way']=="DESC"){
             $c=$this->multi_array_sort($buy_num,"buy_num",SORT_DESC);
         }else{
             $c=$this->multi_array_sort($buy_num,"buy_num",SORT_ASC);
         }
         //进行对应的分页
            if($n+12>=count($buy_num)){
                $m=count($buy_num);
            }else{
                $m=$n+12;
            }

         for($i=$n;$i<$m;$i++){
             $user[]=$c[$i];
         }
        }else if($order['where']=="buy_money"){//购买金额数
            $db_user=$this->db->select("*")->from("user")->join("user_recommended","recommend_newUser=user_phone","left")->get();
            $users=$db_user->result_array();
            foreach($users as $v){
                $db=$this->db->select("*")->from("associated_up")->where(array("associated_userid"=>$v['user_id']))->join("project_gear","gear_projectid=associated_projectid","left")->get();
                $ass=$db->result_array();
                $v['buy_money']=0;
                foreach($ass  as $c) {
                   $v['buy_money']=$v['buy_money']+ $c['associated_score']*$c['gear_each'];
                }
                $buy_money[]=$v;
            }
            //整合结果集排序
            if( $order['way']=="DESC"){
                $c=$this->multi_array_sort($buy_money,"buy_money",SORT_DESC);
            }else{
                $c=$this->multi_array_sort($buy_money,"buy_money",SORT_ASC);
            }
            //进行对应的分页
            if($n+12>=count($buy_money)){
                $m=count($buy_money);
            }else{
                $m=$n+12;
            }
            for($i=$n;$i<$m;$i++){
                $user[]=$c[$i];
            }
        }else{  //其他情况
            $user_db=$this->db->select("*")->from('user')->order_by($order['where'],$order['way'])->limit(12,$n)->join("user_recommended","recommend_newUser=user_phone","left")->get();  //会员倒叙
            $user=$user_db->result_array();
        }
        $index['user']=array();
        foreach($user  as $user_value) {  //每一层对应一个用户
            //最后登录ip
            $record_db = $this->db->select("record_ip,record_time")->from("user_record")->where("record_user_phone=" . $user_value["user_phone"])->order_by("record_id", "DESC")->limit(1, 1)->get();
            $record = $record_db->result_array();
            if (!empty($record)) {
                $user_value["record_ip"] = $record[0]["record_ip"];      //登录ip
                $user_value["record_time"] = $record[0]["record_time"];  //上次登录的时间
            } else {
                $user_value["record_ip"] ="无";      //登录ip
                $user_value["record_time"] ="无";  //上次登录的时间
            }
            //项目数量
            $associated_db = $this->db->select("*")->from("associated_up")->where("associated_userid=" . $user_value['user_id'])->get();
            $user_value['project_num'] = $associated_db->num_rows(); //投资数量
            //购买总金额
            $user_value["project_buy_money"] = 0;
            $associated = $associated_db->result_array();
            if (!empty($associated)) {
                foreach ($associated as $asscoiated_value) {
                    $gear_db = $this->db->select("gear_each")->from("project_gear")->where(array("gear_projectid" => $asscoiated_value['associated_projectid'], "gear_digital" => $asscoiated_value['associated_digital']))->get();
                    $gear = $gear_db->result_array();
                    $user_value["project_buy_money"] = $user_value["project_buy_money"] + $gear[0]['gear_each'] * $asscoiated_value['associated_score'];
                }
            }
            $index["user"][]=$user_value;  //收集结果
        }


        //加载分页
        $this->load->library('pagination');
        $this->load->model("Page_model","page");
        //   $total_rows,$base_url,$page=6
        $base_url=site_url("Wanhuu_member/index/". $order['where']."/". $order['way']);  //分页显示地址
        $rows_db=$this->db->select('user_id')->from("user")->get();
        $total_rows= $rows_db->num_rows();    //总数量
        $config=$this->page->page($total_rows,$base_url,$page=12);
        $this->pagination->initialize($config);                                       //加载配置
        $this->load->view("admin/member/index",$index);
    }

    /**
     * 对多位数组进行排序
     * @param $multi_array 数组
     * @param $sort_key需要传入的键名
     * @param $sort排序类型   SORT_ASC 升序 SORT_DESC 降序
     */

     public function multi_array_sort($multi_array, $sort_key, $sort = SORT_DESC) {
        if (is_array($multi_array)) {
            foreach ($multi_array as $row_array) {
                if (is_array($row_array)) {
                    $key_array[] = $row_array[$sort_key];
                } else {
                    return FALSE;
                }
            }
        } else {
            return FALSE;
        }
        array_multisort($key_array, $sort, $multi_array);
        return $multi_array;
    }






    public function index_a(){

        $n=$this->uri->segment(3,0);
        $user_db=$this->db->select()->from('user')->limit(12,$n)->get();  //会员倒叙
        $user=$user_db->result_array();
        $index['user']=array();
        foreach($user  as $user_value) {  //每一层对应一个用户
            //最后登录ip
            $record_db = $this->db->select("record_ip,record_time")->from("user_record")->where("record_user_phone=" . $user_value["user_phone"])->order_by("record_id", "DESC")->limit(1, 1)->get();
            $record = $record_db->result_array();
            if (!empty($record)) {
                $user_value["record_ip"] = $record[0]["record_ip"];      //登录ip
                $user_value["record_time"] = $record[0]["record_time"];  //上次登录的时间
            } else {
                $user_value["record_ip"] ="无";      //登录ip
                $user_value["record_time"] ="无";  //上次登录的时间
            }
            //项目数量
            $associated_db = $this->db->select("*")->from("associated_up")->where("associated_userid=" . $user_value['user_id'])->get();
            $user_value['project_num'] = $associated_db->num_rows(); //投资数量
            //购买总金额
            $user_value["project_buy_money"] = 0;
            $associated = $associated_db->result_array();
            if (!empty($associated)) {
                foreach ($associated as $asscoiated_value) {
                    $gear_db = $this->db->select("gear_each")->from("project_gear")->where(array("gear_projectid" => $asscoiated_value['associated_projectid'], "gear_digital" => $asscoiated_value['associated_digital']))->get();
                    $gear = $gear_db->result_array();
                    $user_value["project_buy_money"] = $user_value["project_buy_money"] + $gear[0]['gear_each'] * $asscoiated_value['associated_score'];
                }

            }
            $index["user"][]=$user_value;  //收集结果
        }
        //加载分页
        $this->load->library('pagination');
        $this->load->model("Page_model","page");
        //   $total_rows,$base_url,$page=6
        $base_url=site_url("Wanhuu_member/index2");  //分页显示地址
        $rows_db=$this->db->select('user_id')->from("user")->get();
        $total_rows= $rows_db->num_rows();    //总数量
        $config=$this->page->page($total_rows,$base_url,$page=15);
        $this->pagination->initialize($config);                                       //加载配置
        $this->load->view("admin/member/index_a",$index);



    }

    public function index_m(){

        $n=$this->uri->segment(3,0);
        $user_db=$this->db->select()->from('user')->limit(12,$n)->get();  //会员倒叙
        $user=$user_db->result_array();
        $index['user']=array();
        foreach($user  as $user_value) {  //每一层对应一个用户
            //最后登录ip
            $record_db = $this->db->select("record_ip,record_time")->from("user_record")->where("record_user_phone=" . $user_value["user_phone"])->order_by("record_id", "DESC")->limit(1, 1)->get();
            $record = $record_db->result_array();
            if (!empty($record)) {
                $user_value["record_ip"] = $record[0]["record_ip"];      //登录ip
                $user_value["record_time"] = $record[0]["record_time"];  //上次登录的时间
            } else {
                $user_value["record_ip"] ="无";      //登录ip
                $user_value["record_time"] ="无";  //上次登录的时间
            }
            //项目数量
            $associated_db = $this->db->select("*")->from("associated_up")->where("associated_userid=" . $user_value['user_id'])->get();
            $user_value['project_num'] = $associated_db->num_rows(); //投资数量
            //购买总金额
            $user_value["project_buy_money"] = 0;
            $associated = $associated_db->result_array();
            if (!empty($associated)) {
                foreach ($associated as $asscoiated_value) {
                    $gear_db = $this->db->select("gear_each")->from("project_gear")->where(array("gear_projectid" => $asscoiated_value['associated_projectid'], "gear_digital" => $asscoiated_value['associated_digital']))->get();
                    $gear = $gear_db->result_array();
                    $user_value["project_buy_money"] = $user_value["project_buy_money"] + $gear[0]['gear_each'] * $asscoiated_value['associated_score'];
                }

            }
            $index["user"][]=$user_value;  //收集结果
        }
        //加载分页
        $this->load->library('pagination');
        $this->load->model("Page_model","page");
        //   $total_rows,$base_url,$page=6
        $base_url=site_url("Wanhuu_member/index2");  //分页显示地址
        $rows_db=$this->db->select('user_id')->from("user")->get();
        $total_rows= $rows_db->num_rows();    //总数量
        $config=$this->page->page($total_rows,$base_url,$page=15);
        $this->pagination->initialize($config);                                       //加载配置
        $this->load->view("admin/member/index_a",$index);



    }





   //编辑会员
    public function  add_edit(){
        //会员编辑权限
        $this->load->model("Wanhuu_model");
        $this->Wanhuu_model->permissions("permissions_member","编辑");
        $user_id=$this->input->get("id");
        $user_db=$this->db->select("*")->from("user")->where("user_id=".$user_id)->get();
        $add_edit['user']=$user_db->result_array();
        $bank_db=$this->db->select("*")->from("user_bank")->where("bank_user_phone")->get();
        $add_edit['bank']=$bank_db->result_array();
        $this->load->view("admin/member/add_edit",$add_edit);
    }

//查看购买列表
    public function add_mbr(){
        //权限
        $this->load->model("Wanhuu_model");
        $this->Wanhuu_model->permissions("permissions_member","查看购买列表");

        $user_id=$this->input->get("id");
        $ass_db=$this->db->select('*')->from('associated_up')->where('associated_userid='.$user_id)->get();
        $ass=$ass_db->result_array();
        $add_mbrp['ass']=array();
        if(!empty($ass)){
             foreach($ass as $ass_value){
                 $pro_db=$this->db->select("project_name")->from("project")->where("project_id=".$ass_value['associated_projectid'])->get();
                 $pro=$pro_db->result_array();
                 $ass_value['project_name']=$pro[0]['project_name'];
                   //预约
                 if($ass_value['associated_tag']==0 && $ass_value['associated_balance']!=0){
                     $ass_value['tag']="预约";
                 }
                 //完成支付
                 if($ass_value['associated_tag']==1 && $ass_value['associated_balance']==0){
                     $ass_value['tag']="完成支付";
                 }
                //未签字
                 if($ass_value['associated_tag']==1 && $ass_value['associated_balance']==0 && $ass_value['associated_contract']!=1){
                     $ass_value['tag']="未签字";
                 }
                 $add_mbrp['ass'][]=$ass_value;
             }
        }



        $this->load->view("admin/member/add_mbr",$add_mbrp);
    }


    //导出会员表格
   public   function   Excel(){

       //会员导出权限
       $this->load->model("Wanhuu_model");
       $this->Wanhuu_model->permissions("permissions_member","导出");
       require_once("php_execl/Classes/PHPExcel.php");
       $excel = new PHPExcel();//实例化类
       //Excel表格式,这里简略写了8列
       $letter = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S');
       //表头数组
       $tableheader = array('编号','电话号码','注册时间','性别',"微信号","电子邮箱","姓名","身份证号","省","市","县","生日","上上签id","上上签账号","余额","等级");
       //填充表头信息
       for($i = 0;$i < count($tableheader);$i++) {
           $excel->getActiveSheet()->setCellValue("$letter[$i]1","$tableheader[$i]");
       }
       $user_db=$this->db->select("*")->from("user")->order_by("user_id","DESC")->get();
       $user=$user_db->result_array();
       foreach($user as $value){
             if($value['user_sex']==1){
                 $value["sex"]="先生";
             }elseif($value['user_sex']==2){
                 $value['sex']="女士";
             }else{
                 $value['sex']="";
             }
          $data[]=array(
              $value['user_id'],$value['user_phone'],$value['user_time'],$value['sex'],
              $value['user_wechat'],$value['user_email'],$value['user_name'],$value['user_IDcard'],$value['user_province'],
              $value['user_city'],$value['user_town'],$value['user_birth'],$value['user_sign_id'],$value['user_sign'],
              $value['user_money'],$value['user_grade']
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

    //更新会员等级
     public  function   update(){
     $up_user_db=$this->db->select("associated_userid")->from("associated_up")->get();
     $up_user=$up_user_db->result_array();
     foreach($up_user as $value){
        $query="select associated_score,gear_each from ci_associated_up LEFT JOIN  ci_project_gear on gear_digital=associated_digital and gear_projectid=associated_projectid  WHERE  associated_userid=".$value['associated_userid'];
        $ass_db=$this->db->query($query);
        $ass=$ass_db->result_array();
        $c=0;
        if(!empty($ass)){
           foreach($ass as $ass_value){
              $c=$c+$ass_value["associated_score"]*$ass_value['gear_each'];
            }
        }
         //判定等级
         echo  $c ."/" .$value['associated_userid']."<br/>";
         if($c==0){
             $this->db->update("user",array('user_grade'=>"C"),"user_id=".$value['associated_userid']);
         }elseif($c>0 && $c<=10000){

             $this->db->update("user",array('user_grade'=>"B"),"user_id=".$value['associated_userid']);
         }elseif($c>10000 && $c<=50000){

             $this->db->update("user",array('user_grade'=>"A"),"user_id=".$value['associated_userid']);
         }elseif($c>50000){
             $this->db->update("user",array('user_grade'=>"S"),"user_id=".$value['associated_userid']);
         }else{
             $this->db->query("UPDATE `ci_user` SET `user_grade` = 'C'");
         }

     }

    //修改等级为C的会员
     $this->db->query("UPDATE `ci_user` SET `user_grade` = 'C' WHERE  user_grade IS  NULL");
     header("Location:http://www.haitouwanhu.com/Wanhuu_member/index");
     }


    public function  cheng_rank(){

         $bank=$this->input->post("rank");    //等级
         $phone=$this->input->post("phone");   //电话号码
         $user_db=$this->db->select("user_id")->from("user")->where(array("user_phone"=>$phone))->get();
         $user=$user_db->result_array()[0]["user_id"];
         $this->db->update("user",array("user_grade"=>$bank),"user_phone=".$phone);
         header("Location:http://www.haitouwanhu.com/Wanhuu_member/add_edit?id=".$user);
    }



}