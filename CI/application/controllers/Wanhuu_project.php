<?php
/**
 * 项目控制器.
 * User: 庾治超
 * Date: 2016/12/2
 * Time: 9:46
 */

class  Wanhuu_project  extends  CI_Controller{


    public  function  index(){

        //权限
        $this->load->model("Wanhuu_model");
        $this->Wanhuu_model->permissions("permissions_project","查看");
        $n=$this->uri->segment(3,0);
        //查询项目的倒叙
        $pro_db=$this->db->select("*")->from("project")->order_by("project_id","DESC")->limit(12,$n)->get();
        $project=$pro_db->result_array();
       // var_dump($project);
        $index['project']=array();
        foreach($project as $pro_value){
            //已筹金额
        $gear_db=$this->db->select("*")->from("project_gear")->where("gear_projectid=".$pro_value['project_id'])->get();
        $gear=$gear_db->result_array();
        //每种方式的投资金额
        $pro_value['money']=0;
           foreach($gear  as  $gear_value){
               $tag=array();
               $query="select SUM(associated_score) as score  from   ci_associated_up  where associated_projectid=".$gear_value['gear_projectid']."  and  associated_digital=".$gear_value['gear_digital'];
               $sum_db=$this->db->query($query);
               $sum=$sum_db->result_array();
               $pro_value['money']=$sum[0]['score'] * $gear_value['gear_each'] +$pro_value['money'];
               $digital=array("A","B","C","D");
               //状态
               if($pro_value['project_tag']==0){  //筹集完成
                   $pro_value['way']="持有期";
               }elseif($pro_value['project_tag']==1){
                   $pro_value['way']="筹集中";
               }elseif($pro_value['project_tag']==2){
                   $pro_value['way']="预约中";
               }else{
                   $pro_value['way']=$pro_value['project_tag'];
               }
           }
            //状态
            if($pro_value['project_tag']==0){  //筹集完成
                $pro_value['way']="持有期";
            }elseif($pro_value['project_tag']==1){
                $pro_value['way']="筹集中";
            }elseif($pro_value['project_tag']==2){
                $pro_value['way']="预约中";
            }else{
                $pro_value['way']=$pro_value['project_tag'];
            }
            $index['project'][]=$pro_value;
        }

        //分页显示地址
        $this->load->library('pagination');
        $this->load->model("Page_model","page");
        $base_url=site_url("Wanhuu_project/index");  //分页显示地址
        $rows_db=$this->db->select('project_id')->from("project")->get();
        $total_rows= $rows_db->num_rows();    //总数量
        $config=$this->page->page($total_rows,$base_url,$page=15);
        $this->pagination->initialize($config);                                       //加载配置

        $this->load->view("admin/project/index",$index);
    }


//修改项目
    public function new_project(){

      $this->load->model("Wanhuu_model");
      $this->Wanhuu_model->permissions("permissions_project","修改");
     $project['project_id']=$this->uri->segment(3,-1);

     if($project['project_id']!=-1){
         $pro_db=$this->db->select("*")->from("project")->where($project)->get();
         $pro=$pro_db->result_array();
         $gear_db=$this->db->select("gear_money,gear_each,gear_earning,gear_digital,gear_cycle")->from('project_gear')->where('gear_projectid='.$project['project_id'])->get();
         $pro["digital"]=$gear_db->result_array();
         $pro["project"]=$pro[0];
         $this->load->view("admin/project/new",$pro);
     }
    }

  public  function  new_sub(){
      $project=$this->input->post("project");
      $gear=$this->input->post("gear[]");
     //修改项目的的基本资料
      $pro_where=array(
                    "project_name"=>$project[1],
                    "project_way" =>$project[2],
              "project_time_start"=>$project[3],
          "project_time_subscribe"=>$project[4],
              "project_time_over" =>$project[5],
                   "project_cycle"=>$project[6],
               "project_money_all"=>$project[7],
                     "project_tag"=>$project[8],
              "project_subscribe" =>$project[9],
              "project_introduce" =>$project[10],
            "project_introduction"=>$project[11],
                    "project_data"=>$this->input->post("project_data"),
      );
      $pro_row=$this->db->update("project",$pro_where,"project_id=".$project[0]);
      $gear_arr=array();
     //  array_slice()  拆分数组
      for($i=1;$i<=4;$i++){
          if(in_array($i,$gear)){
              if($i==1){
               $gear_arr[]=array_slice($gear,0,5);
              }else{
               $gear_arr[]=array_slice($gear,$i*5-5,5);
              }
          }
      }
     //  in_array();   是否存在数组里
      foreach($gear_arr  as  $gear_value){
          if(!empty($gear_value)){
              $gear_where=array(
                  "gear_cycle"   =>$gear_value[0],
                  "gear_money"   =>$gear_value[1],
                  "gear_earning" =>$gear_value[2],
                  "gear_each"    =>$gear_value[3],
              );
              $gear_row=$this->db->update("project_gear",$gear_where,array("gear_projectid"=>$project[0],"gear_digital"=>$gear_value[4]));
              if($gear_row>0) {
                  echo    '修改成功';
               }else{
                  echo   '修改失败';
               }
          }
      }

      $image=array(
          array('ima'=>"images_one"),
          array('ima'=>"images_two"),
          array("ima"=>"images3"),
          array("ima"=>"images4"),
          array("ima"=>"images5"),
          array("ima"=>"images"),
          array("ima"=>"logo"),
      );

      foreach($image  as $value){
//      图片配置
          $config['upload_path']   = './static/images/';                      //图片保存路径
          $config['allowed_types'] = 'gif|jpg|png';                    //文件格式
          $config['max_size']      = '2024';                           //最大值
          $config['max_width']     = '1024';
          $config['max_height']    = '1024';
          $config['file_name']     =date("YmdHis").uniqid().mt_rand(); //文件后的图片
          $this->load->library("upload",$config);
          if ( ! $this->upload->do_upload($value['ima'])) {//图片上传失败
              $error = array('error' => $this->upload->display_errors());
              var_dump($error);
          } else {
              $images=$this->upload->data();
              if($value['ima']=="images_one"){
                  $value['ima']="images1";
              }
              if($value['ima']=="images_two"){
                  $value['ima']="images2";
              }

            $row=$this->db->update("project",array("project_".$value["ima"]=>"static/images/".$images['file_name']),"project_id=".$project[0]);
          }
      }
     // 201701131747405878a23c0cc194011457055.png
      //修改合同  项目图片
      for($a=1;$a<=6;$a++){
          $img="images".$a;
          $contract="contract".$a;
          if(isset($_FILES[$img])){//上传图片
              $config['upload_path']   = './static/images/';               //图片保存路径
              $config['allowed_types'] = 'gif|jpg|png';                    //文件格式
              $config['max_size']      = '2024';                           //最大值
              $config['max_width']     = '1024';
              $config['max_height']    = '1024';
              $config['file_name']     =date("YmdHis").uniqid().mt_rand(); //文件后的图片
              $this->load->library('upload', $config);
              if ( ! $this->upload->do_upload($img)) {              //图片上传失败
                  $error = array('error' => $this->upload->display_errors());
              } else {
                  $images=$this->upload->data()  ;
                  $row=$this->db->update("project_gear",array("gear_images"=>$images['file_name']),array("gear_projectid"=>$project[0],"gear_digital"=>$a));
              }
          }
           //上传pdf
          if(isset($_FILES[$contract])){
             if($_FILES[$contract]["tmp_name"]!=""){
                move_uploaded_file($_FILES[$contract]['tmp_name'], "sign/demo/resources/" . $_FILES[$contract]['name']);
                $this->db->update("project_gear",array("gear_contract"=>$_FILES[$contract]['name']),array("gear_projectid"=>$project[0],"gear_digital"=>$a));
             }
          }
      }









    //  header("Location:".base_url('Wanhuu_project/new_project')."/".$project[0]);//返回相应的项目修改项
  }



//添加项目

   public function add_project(){

       //添加项目权限
       $this->load->model("Wanhuu_model");
       $this->Wanhuu_model->permissions("permissions_project","添加");
       $this->load->view("admin/project/add_project");
   }


    public  function add_pro(){
        $project=$this->input->post("project");
        $gear=$this->input->post("gear");
        //修改项目的的基本资料
        $pro_where=array(
            "project_id"=>time(),
            "project_name"=>$project[0],
            "project_way" =>$project[1],
            "project_time_start"=>str_replace("T"," ",$project[2]),
            "project_time_subscribe"=>str_replace("T"," ",$project[3]),
            "project_time_over" =>str_replace("T"," ",$project[4]),
            "project_cycle"=>$project[5],
            "project_money_all"=>$project[6],
            "project_tag"=>$project[7],      //状态
            "project_subscribe" =>$project[8],
            "project_introduce" =>$project[9],
            "project_party"=>$project[10],
            "project_data"=>$this->input->post("project_control"),
            "project_withdrawal"=>10,
        );
        $this->db->insert("project",$pro_where);
        $project_id=$pro_where['project_id'];
        $gear_arr=array();
        //  array_slice()  拆分数组
        for($i=1;$i<=6;$i++){
            if(in_array($i,$gear)){
                if($i==1){
                    $gear_arr[]=array_slice($gear,0,5);
                }else{
                    $gear_arr[]=array_slice($gear,$i*5-5,5);
                }
            }
        }
        //  in_array();   是否存在数组里
        foreach($gear_arr  as  $gear_value){
            if(!in_array("",$gear_value)){  //去有空的值
            $gear_where=array(
                "gear_cycle"   =>$gear_value[0],
                "gear_money"   =>$gear_value[1],
                "gear_earning" =>$gear_value[2],
                "gear_each"    =>$gear_value[3],
                "gear_projectid"=>$project_id,
                "gear_copies"   =>$gear_value[1]/$gear_value[3],
                "gear_digital"  =>$gear_value[4],
            );
            $gear_row=$this->db->insert("project_gear",$gear_where);
          }
        }

        $image=array(
            array("ima"=>"images1"),
            array("ima"=>"images2"),
            array("ima"=>"images3"),
            array("ima"=>"images4"),
            array("ima"=>"images5"),
            array("ima"  =>"images"),
            array("ima"   =>"logo")
        );

        foreach($image  as $value){
//      图片配置
            $config['upload_path']   = './static/images/';              //图片保存路径
            $config['allowed_types'] = 'gif|jpg|png';                   //文件格式
            $config['max_size']      = '2024';                          //最大值
            $config['max_width']     = '1024';
            $config['max_height']    = '1024';
            $config['file_name']     =date("YmdHis").uniqid().mt_rand();//文件后的图片
            $this->load->library("upload",$config);
            if ( ! $this->upload->do_upload($value['ima'])) {//图片上传失败
                $error = array('error' => $this->upload->display_errors());
            } else {
                $images=$this->upload->data()  ;
                $row=$this->db->update("project",array("project_".$value["ima"]=>"static/images/".$images['file_name']),"project_id=".$project_id);
            }
        }

        //上传方案合同和图片
        for($i=1;$i<=6;$i++) {
            $file_way = "way" . $i;        //上传图片
            $file_pdf = "way" . $i . "_pdf"; //上传pdf
            //上传方案图片
            if ($_FILES[$file_way]['error'] == 0) {                       //正确
                $config['upload_path'] = './static/images/';                //图片保存路径
                $config['allowed_types'] = 'gif|jpg|png';                 //文件格式/
                $config['max_size'] = '2024';                             //最大值
                $config['max_width'] = '1024';
                $config['max_height'] = '1024';
                $config['file_name'] = date("YmdHis") . uniqid() . mt_rand();//文件后的图片
                $this->load->library("upload", $config);
                if (!$this->upload->do_upload($file_way)) {//图片上传失败
                    $error = array('error' => $this->upload->display_errors());
                }
                //上传合同pdf
                if ($_FILES[$file_pdf]['error'] == 0) {
                    $pdf = move_uploaded_file($_FILES[$file_pdf]['tmp_name'], "static/project_pdf/" . $_FILES[$file_pdf]['name']);
                    //添加数据库
                }
                $where = array(
                    "gear_projectid" => $pro_where['project_id'],
                    "gear_digital" => $i,
                ); //条件
                $images=$this->upload->data()  ;
                $updaye = array(
                    "gear_contract"=>$_FILES[$file_pdf]["name"],
                    "gear_signx"   =>"0.1",
                    "gear_signy"   =>"0.1",
                    "gear_images"  =>"static/images/".$images['file_name'],
                    "gear_sign_page"=>$this->input->post("sign_start"),
                );//修改地方
                $this->db->update("project_gear",$updaye,$where);
            }
        }
            //方案上传项目合同
            $pro_data = $_POST['project_contract_name'];
            for ($a = 1; $a <= count($pro_data); $a++) {
                $data_pdf = "contract_" . $a;
                move_uploaded_file($_FILES[$data_pdf]['tmp_name'], "static/project_pdf/" . $_FILES[$data_pdf]['name']);
                $data_insert=array(
                    "data_projectid"=>$pro_where['project_id'],
                    "data_name"     =>$pro_data[$a-1],
                    "data_src"      => "project_pdf/" . $_FILES[$data_pdf]['name'],
                );
                $this->db->insert("project_data",$data_insert);
            }

//        var_dump($_FILES['contract_1']);
//        move_uploaded_file($_FILES['contract_1']['tmp_name'],"static/project_pdf/".$_FILES['contract_1']['name']);



      echo   "添加成功";
    }
    /**
     * 档位控制器
     *
     */
    public function pjt_ck(){
        $id=$this->uri->segment(3,0);
        $gear_db=$this->db->select("*")->from("project_gear")->where("gear_projectid=".$id)->join("project","gear_projectid=project_id")->get();
        $gear=$gear_db->result_array();
        $pjt["ck"]=array();
        foreach($gear as $gear_value){
            if($gear_value["project_tag"]==0){  //筹集完成
              $a="+ ".$gear_value['gear_cycle'] ." months";
              $time1=strtotime($a, strtotime($gear_value['project_time_over']));
              $time=$time1-time();
                if(floor($time/3600/24)>0){
                    $gear_value["surplus"]=floor($time/3600/24)."天"; //剩余天数
                }else{
                    $gear_value["surplus"]="已经赎回";
                }
                $gear_value['time']=date("Y-m-d",$time1);
            }else{
                $gear_value["surplus"]="未筹集完成";
            }
            $query="select SUM(associated_score)  as score from ci_associated_up  where associated_projectid=".$gear_value['gear_projectid'] ." and associated_digital=".$gear_value['gear_digital'];
            $num1=$this->db->query($query);
            $num2=$num1->result_array();
            $num=$num2[0]["score"];
            $gear_value['num_money']=$num*$gear_value['gear_each'];
            $pjt["ck"][]=$gear_value;
        }


        $this->load->view("admin/project/pjt_ck",$pjt);
    }


    /**
     * 项目购买记录
     */
    public function yg_pjt(){
        //权限
        $this->load->model("Wanhuu_model");
        $this->Wanhuu_model->permissions("permissions_project","已购项目列表");
        $id=$this->input->get("id");   //项目id
        $ass_db=$this->db->select("*")->from("associated_up")->where("associated_projectid=".$id)->get();
        $ass=$ass_db->result_array();
        $yg['ass']=array();
        foreach($ass as $ass_value){
            $user_db=$this->db->select("user_phone")->from("user")->where("user_id=".$ass_value["associated_userid"])->get();
            $gear_db=$this->db->select("gear_each")->from("project_gear")->where(array("gear_projectid"=>$ass_value['associated_projectid'],"gear_digital"=>$ass_value['associated_digital']))->get();
            $gear=$gear_db->result_array();
            $user=$user_db->result_array();
            $ass_value["user_phone"]=$user[0]['user_phone'];
            $ass_value["user_money"]=$ass_value["associated_score"]*$gear[0]["gear_each"];
            $yg["ass"][]=$ass_value;
        }
        $this->load->view("admin/project/yg_pjt",$yg);
    }

    public   function   Excel(){
        //导出权限
        $this->load->model("Wanhuu_model");
        $this->Wanhuu_model->permissions("permissions_project","导出");
        require_once("php_execl/Classes/PHPExcel.php");
        $excel = new PHPExcel();//实例化类
        //Excel表格式,这里简略写了8列
        $letter = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S');
        //表头数组
        $tableheader = array('项目编号','名称','开始时间','结束时间',"总凑","项目周期","年化","周期","合同文件编号","合同编号","剩余份数","年华总凑金额");
        //填充表头信息
        for($i = 0;$i < count($tableheader);$i++) {
            $excel->getActiveSheet()->setCellValue("$letter[$i]1","$tableheader[$i]");
        }
        $gear_db=$this->db->select("*")->from("project_gear")->join("project","project_id=gear_projectid","left")->get();
        $gear=$gear_db->result_array();
        foreach($gear as $value){
            $data[]=array(
                $value['project_id'],$value['project_name'],$value['project_time_start'],$value['project_time_over'],
                $value['project_money_all'],$value['project_cycle'],$value['gear_earning'],$value['gear_cycle'],$value['gear_sign_docid'],
                $value['gear_sign'],$value['gear_copies'],$value['gear_money'],
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

}