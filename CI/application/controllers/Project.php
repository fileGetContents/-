<?php
/**
 * Created by PhpStorm.
 * User: 庾治超
 * Date: 2016/9/18
 * Time: 8:54
 */

class Project extends CI_Controller{
    /**
     * 项目详情页
     */
    public function index(){
        $id=$this->input->get("id");
        // $id=$this->input->get("id");
        //查询项目详情
        $pro_db=$this->db->select("*")->from("project")->where("project_id=".$id)->get();
        $pro_arr=$pro_db->result_array();

        //众筹项目or投资项目
        if($pro_arr[0]['project_one']==1){
            $project_show="project_investment";
            if($pro_arr[0]['project_money_all']>100000){
                $pro_arr[0]['project_money_all2']=$pro_arr[0]['project_money_all']/10000 ."万";
                $pro_arr[0]['project_money_all']=$pro_arr[0]['project_money_all']/10000 ."<sub>万</sub>";
            }else{
                $pro_arr[0]['project_money_all2']=$pro_arr[0]['project_money_all'];
            }

            //查看合同
              $db_data=$this->db->select("*")->from("project_data")->where(array("data_projectid"=>$pro_arr[0]['project_id']))->get();
              $pro_arr[0]['data_project']=$db_data->result_array();

        }else{
            $project_show="project_show";
        if(empty($pro_arr)){
            exit("<script>alert('非法操作');window.location='".site_url("")."'</script>");
        }
        //转化金额
        if($pro_arr[0]['project_money_all']>100000){
            $pro_arr[0]['project_money_all']=$pro_arr[0]['project_money_all']/10000 ."万";
        }
        // //var_dump($pro_arr);
        //查询投资记录
        $ass_where["associated_projectid"]=$id;//项目id
        $query="SELECT * FROM `ci_associated_up` WHERE `associated_projectid` = ".$id ." ORDER BY associated_time  DESC";
        $ass_db=$this->db->query($query);
        $ass_arr=$ass_db->result_array();
        // //var_dump($ass_arr);
        $investment=array();
        //查询项目的投资人
        if(!empty($ass_arr)){
            foreach($ass_arr as $value){
                //获得投资的电话号码
              $user_db=$this->db->select("user_phone")->from("user")->where("user_id=".$value["associated_userid"])->get();
              $user_arr=$user_db->result_array();
              $value["phone"]=substr($user_arr[0]["user_phone"],0,3)."******".substr($user_arr[0]["user_phone"], 8);//电话号码
                //echo $phone."<br/>";
                //获取投资的年化收益
              $gear_db=$this->db->select("gear_each,gear_earning")->from("project_gear")->where(array("gear_digital"=>$value["associated_digital"],"gear_projectid"=>$id))->get();
              $gear_arr=$gear_db->result_array();
              $value["earning"]=$gear_arr[0]["gear_earning"];
                 //投资时间 支付状态
              $time_db=$this->db->select('associated_tag')->from('associated_up')->where('associated_projectid='.$id)->get();
              $time=$time_db->result_array();
               if($time[0]['associated_tag']==1){
               $value['tag']="完成";
               }else{
               $value['tag']="未支付";
               }
                //查询持有期
                $ciyou=$this->db->select('gear_cycle')->from("project_gear")->where(array("gear_projectid"=>$value['associated_projectid'],"gear_digital"=>$value['associated_digital']))->get();
                $ciyou=$ciyou->result_array();
                $value['ciyou']=$ciyou[0]["gear_cycle"];
                $value["meny"]=intval($gear_arr[0]["gear_each"]) * intval($value["associated_score"]);//投资金额
                $investment[]=$value;//获取所有结果集
            }
        }

//        var_dump($time);
        $pro_arr[0]["ass"]=$investment;
        // //var_dump($pro_arr);
        //这是计算投资总额的方式  和
        $this->load->model('Home_model');
        $v=$this->Home_model->project_show($id);
        ////var_dump($v);
        $pro_arr[0]["V_time"]=$v[0]["time"];        //剩余天数
        $pro_arr[0]["V_progress"]=$v[0]["progress"];//项目的进度
        $pro_arr[0]["V_num"]=$v[0]["num"];          //投资总额
        //  这是项目的投资方式
        $way_db=$this->db->select("gear_digital,gear_each")->from("project_gear")->where("gear_projectid=".$id)->get();
        $way=$way_db->result_array();
        //   //var_dump($way);
        //判断用户是否预约过
        if($pro_arr[0]["project_tag"]==1){//判断项目是否在经行中
            if(isset($_SESSION["user_phone"])){  //检查是否登录
                //查询手机号id
                $user_db=$this->db->select("user_id")->from("user")->where("user_phone=".$_SESSION["user_phone"])->get();
                $user_id=$user_db->result_array();
                //查询是该用户是否预约过
                $where["associated_projectid"]=$id;
                $where["associated_userid"]=$user_id[0]["user_id"];
                $where["associated_tag"]=0;
                ////var_dump($where);
                $or_db=$this->db->select("associated_score,associated_tag,associated_balance,associated_digital")->from("associated_up")->where($where)->get();
                $or_arry=$or_db->result_array();
                // //var_dump($or_arry);
                if(!empty($or_arry)){      //该用户已经预约过
                    $row["id"]       =intval($pro_arr[0]["project_id"]);                         //项目id
                    $row["names"]    =$pro_arr[0]["project_name"];                               //项目名称
                    $row["tag"]      =intval($or_arry[0]["associated_digital"]);                 //投资方案
                    $row["test_box"] =intval($or_arry[0]["associated_score"]);                   //购买份数
                    $where_g["gear_projectid"]=$id;       //项目id
                    $where_g["gear_digital"]=$row["tag"]; //投资方案
                    $price_db=$this->db->select("gear_each")->from("project_gear")->where($where_g)->get();
                    $price=$price_db->result_array();
                    $row["price"]    =intval($price[0]["gear_each"]);                             //投资单价
                    $row["proce_all"]=$row["price"]* $row["test_box"]  ;                          //总金额
                    $row["m"]=3;
                    $row["proce_d"]=$or_arry[0]["associated_balance"];                            //支付定金
                    $this->session->set_userdata("user_buy",$row);
                    $pro_arr[0]["m"]="<a href='".site_url('Project/buy_sore')."'>支付余款</a>";
                } else{                    //该用户预没有约过
                    if($v[0]["progress"]==100){
                        $pro_arr[0]["m"]="<a href='#'>立即购买</a>";
                    }else{
                        $pro_arr[0]["m"]="<a href='".site_url("project/buy")."?id=".$pro_arr[0]["project_id"]."'>立即购买</a>";
                    }

                }
            }else{
                if($pro_arr[0]["project_tag"]==0){
                    $pro_arr[0]["m"]= "<a href='javascript:;'>已经完成</a>";
                }elseif($pro_arr[0]["project_tag"]==1){
                    $pro_arr[0]["m"]="<a href='".site_url('User/index')."'>立即购买</a>";
                }elseif($pro_arr[0]["project_tag"]==2){
                    $pro_arr[0]["m"]="<a href='".site_url('User/index')."'>立即预约</a>";
                }
            }

            $time_over=strtotime($pro_arr[0]['project_time_over']);  //过期时间时间戳
            if($time_over<time()){
                $over=$this->db->update('project',array('project_tag'=>0),"project_id=".$id);//修改项目的状态
                if($over>0){
                }else{
                    exit('系统繁忙,请稍后再试');
                }
            }

        }elseif($pro_arr[0]["project_tag"]==2){
            //  echo site_url('project/buy') . "?id=" . $project_id . "&&tag=" . $project_tag . "&&image=" . $project_images2 . "&&name=" . $project_name;
         if(isset($_SESSION['user_phone'])){
                $pro_arr[0]["m"]="<a href='".site_url("Project/buy")."?id=".$pro_arr[0]["project_id"]."&tag=".$pro_arr[0]["project_tag"]."&image=".$pro_arr[0]["project_images"]."&name=".$pro_arr[0]["project_name"]."'>立即预约</a>";
         }else{
             $pro_arr[0]["m"]="<a href='#'>立即预约</a>";
         }
            $time_over=strtotime($pro_arr[0]['project_time_start']);  //过期时间时间戳
            if($time_over<time()){
                $over=$this->db->update('project',array('project_tag'=>1),"project_id=".$id);//修改项目的状态
                if($over>0){
                }else{
                    exit('系统繁忙,请稍后再试');
                }
            }

        }else{
            $pro_arr[0]["m"]="<a href='javascript:;'>已经完成</a>";
        }

        //获取年华收益 gear_money,gear_each,gear_copies,gear_digital  //剩余分数
        $earnings=$this->db->select("gear_earning,gear_digital,gear_cycle,gear_money,gear_each,gear_copies")->from('project_gear')->where(array("gear_projectid"=>$id))->get();
        $earnings=$earnings->result_array();
        $cop=$this->db->select('order_time,order_project_sore,order_project_di')->from('user_order')->where(array('order_project_id'=>$id))->get();
        $cop_a=$cop->result_array();
//预留半个小时的份数
        $a=0;
        $b=0;
        $c=0;
        $d=0;
        $e=0;
        $f=0;
        if(!empty($cop_a)){
            foreach($cop_a as $value){
                if($value['order_time']>time()){//没过期
                    if($value['order_project_di']==1){
                        $a=$a+$value['order_project_sore'];
                    }
                    if($value['order_project_di']==2){
                        $b=$b+$value['order_project_sore'];
                    }
                    if($value['order_project_di']==3){
                        $c=$c+$value['order_project_sore'];
                    }
                    if($value['order_project_di']==4){
                        $d=$d+$value['order_project_sore'];
                    }
                    if($value['order_project_di']==5){
                        $e=$e+$value['order_project_sore'];
                    }
                    if($value['order_project_di']==6){
                        $f=$f+$value['order_project_sore'];
                    }
                }else{
                    $this->load->model('Overdue_model');
                    $this->Overdue_model->overdue($value['order_time']);
                }
            }
        }

        $earnings_right=array();
     foreach($earnings  as $earning_value){
           if($earning_value['gear_digital']==1){
               $earning_value['gear_copies']=$earning_value['gear_copies']-$a;
           }elseif($earning_value['gear_digital']==2){
               $earning_value['gear_copies']=$earning_value['gear_copies']-$b;
           }elseif($earning_value['gear_digital']==3){
               $earning_value['gear_copies']=$earning_value['gear_copies']-$c;
           }elseif($earning_value['gear_digital']==4){
               $earning_value['gear_copies']=$earning_value['gear_copies']-$d;
           }elseif($earning_value['gear_digital']==5){
               $earning_value['gear_copies']=$earning_value['gear_copies']-$e;
           }elseif($earning_value['gear_digital']==6){
               $earning_value['gear_copies']=$earning_value['gear_copies']-$f;
           }
         $earnings_right[]=$earning_value;
      }

        $pro_arr[0]["earning"]=$earnings_right;

        //判定账户余额
//      if(isset($_SESSION['user_phone'])){
//      $money_db=$this->db->select('user_money')->from('user')->where(array('user_phone'=>$_SESSION['user_phone']))->get();
//      $money=$money_db->result_array();
//          if($money[0]['user_money']==null){
//              $pro_arr[0]['money']=0;
//          }else{
//              $pro_arr[0]['money']=$money[0]['user_money'];
//          }
//      }
        $data_db=$this->db->select("*")->from('project_data')->where(array('data_projectid'=>$id))->get();
        $pro_arr[0]['data']=$data_db->result_array();//获取验证码
        }


        $this->load->view($project_show,$pro_arr[0]);
    }

    public  function buy(){

        if(!isset($_SESSION['user_phone'])){
            header('Location:http:'.site_url(''));
            exit();
        }

        //   echo site_url('project/buy')."?id".$project_id."&&tag=".$project_tag."&&image=".$project_images2."&&name=".$project_name;
        $buy["id"]   =$this->input->get("id");       //获取项目的id
        $project_buy_db=$this->db->select('project_name,project_images,project_tag,project_name')->from('project')->where('project_id='.$buy["id"])->get();
        $project_buy=$project_buy_db->result_array();
        $buy["tag"]  =$project_buy[0]['project_tag'];         //1  表示正在经行中    2  表示预约中
        $buy["image"]=$project_buy[0]['project_images'];      //获取项目的图片
        $buy["name"] =$project_buy[0]["project_name"];        //获取项目的名字
        //计算每种方式的剩余分数
        $gear_db=$this->db->select("gear_money,gear_each,gear_copies,gear_digital,gear_cycle,gear_earning,gear_images")->from("project_gear")->where("gear_projectid=".$buy["id"])->order_by("gear_digital")->get()  ;
        $gear=$gear_db->result_array();
        $cop=$this->db->select('order_time,order_project_sore,order_project_di')->from('user_order')->where(array('order_project_id'=>$buy['id']))->get();
        $cop_a=$cop->result_array();
        $a=0;
        $b=0;
        $c=0;
        $d=0;
        $e=0;
        $f=0;
        if(!empty($cop_a)){
            foreach($cop_a as $value){
                if($value['order_time']>time()){//没过期
                   if($value['order_project_di']==1){
                   $a=$a+$value['order_project_sore'];
                   }
                    if($value['order_project_di']==2){
                        $b=$b+$value['order_project_sore'];
                    }
                    if($value['order_project_di']==3){
                        $c=$c+$value['order_project_sore'];
                    }
                    if($value['order_project_di']==4){
                        $d=$d+$value['order_project_sore'];
                    }
                    if($value['order_project_di']==5){
                        $e=$e+$value['order_project_sore'];
                    }
                    if($value['order_project_di']==6){
                        $f=$f+$value['order_project_sore'];
                    }
                }else{
                    $this->load->model('Overdue_model');
                    $this->Overdue_model->overdue($value['order_time']);
                }
            }
        }
        $gear_a=array();
foreach($gear  as  $value){
    if($value['gear_digital']==1){
      $value['gear_copies']=$value['gear_copies']-$a;
    }
    if($value['gear_digital']==2){
        $value['gear_copies']=$value['gear_copies']-$b;
    }
    if($value['gear_digital']==3){
        $value['gear_copies']=$value['gear_copies']-$c;
    }
    if($value['gear_digital']==4){
        $value['gear_copies']=$value['gear_copies']-$d;
    }
    if($value['gear_digital']==5){
        $value['gear_copies']=$value['gear_copies']-$f;
    }
    if($value['gear_digital']==6){
        $value['gear_copies']=$value['gear_copies']-$f;
    }
$gear_a[]=$value;

}

        $buy['project']=$gear_a;
        $c=0;
        foreach($buy["project"] as $value){
            if($value["gear_copies"]==0){
                unset($buy["project"][$c]);//删除份数为0的方案
            }
            $c++;
        }
//        if(empty($buy["project"])){//不存在返回列表页
//        header("Location:".site_url("Dome/index"));
//        };

        // //var_dump($buy["project"]);
        foreach($buy["project"]  as  $value){
            $bus["project"][]=$value;
            //    //var_dump($bus["project"]);
        }
        $bus["id"]   = $buy["id"];       //获取项目的id
        $bus["tag"]  = $buy["tag"];      //1 表示正在经行中    2 表示预约中
        $bus["image"]= $buy["image"];    //获取项目的图片
        $bus["name"] = $buy["name"];     //获取项目的名字
        //var_dump($bus["project"]);
        $this->load->view('project_buy',$bus);
    }


    //用于计算每种方式的剩余方式
    public  function  ajax_buy(){

        $buy["id"]   =$this->input->post("project");       //获取项目的id
        //计算每种方式的剩余分数
        $gear_db=$this->db->select("gear_copies,gear_digital")->from("project_gear")->where("gear_projectid=".$buy["id"])->order_by("gear_digital")->get()  ;
        $gear=$gear_db->result_array();
        $cop=$this->db->select('order_time,order_project_sore,order_project_di')->from('user_order')->where(array('order_project_id'=>$buy['id']))->get();
        $cop_a=$cop->result_array();
        $a=0;
        $b=0;
        $c=0;
        $d=0;
        $e=0;
        $f=0;
        if(!empty($cop_a)){
            foreach($cop_a as $value){
                if($value['order_time']>time()){//没过期
                    if($value['order_project_di']==1){
                        $a=$a+$value['order_project_sore'];
                    }
                    if($value['order_project_di']==2){
                        $b=$b+$value['order_project_sore'];
                    }
                    if($value['order_project_di']==3){
                        $c=$c+$value['order_project_sore'];
                    }
                    if($value['order_project_di']==4){
                        $d=$d+$value['order_project_sore'];
                    }
                    if($value['order_project_di']==5){
                        $e=$e+$value['order_project_sore'];
                    }
                    if($value['order_project_di']==6){
                        $f=$f+$value['order_project_sore'];
                    }
                }else{
                    $this->load->model('Overdue_model');
                    $this->Overdue_model->overdue($value['order_time']);
                }
            }
        }
        $gear_a=array();
        foreach($gear  as  $value){
            if($value['gear_digital']==1){
                $value['gear_copies']=$value['gear_copies']-$a;
            }
            if($value['gear_digital']==2){
                $value['gear_copies']=$value['gear_copies']-$b;
            }
            if($value['gear_digital']==3){
                $value['gear_copies']=$value['gear_copies']-$c;
            }
            if($value['gear_digital']==4){
                $value['gear_copies']=$value['gear_copies']-$d;
            }
            if($value['gear_digital']==5){
                $value['gear_copies']=$value['gear_copies']-$f;
            }
            if($value['gear_digital']==6){
                $value['gear_copies']=$value['gear_copies']-$f;
            }
            $gear_a[]=$value;

        }

        $buy['project']=$gear_a;
        $c=0;
        foreach($buy["project"] as $value){
            if($value["gear_copies"]==0){
                unset($buy["project"][$c]);//删除份数为0的方案
            }
            $c++;
        }
        if(empty($buy["project"])){//不存在返回列表页
            echo  1;
        }else{
            echo  json_encode($gear_a);
        };

    }


//用ajax用于提交的和储存的相关的信息
    public function  buy_ajax(){
        $row["id"]       =intval($this->input->post("id"));                       //项目id
        $row["names"]    =$this->input->post("names");                            //项目名称
        $row["tag"]      =intval($this->input->post("tag"));                      //投资方案
        $row["price"]    =intval($this->input->post("price"));                    //投资单价
        $row["test_box"] =intval($this->input->post("test_box"));                 //购买份数
        $row["proce_all"]=intval($this->input->post("proce_all"));                //总金额
        //查询是否通过实名认证
        $user_db=$this->db->select("user_IDcard")->from("user")->where("user_phone=".$_SESSION["user_phone"])->get();
        $user=$user_db->result_array();
        if($user[0]["user_IDcard"]==""){
            //未通过实名认证
            echo  2;
        }else{
            //通过实名认证
            $this->session->set_userdata("user_buy",$row);
            echo  1;
        }
        //保存用户的提价数据
    }


    public function  buy_jiyi(){

        $row["id"]       =intval($this->input->get("id"));                       //项目id
        $row["names"]    =$this->input->get("names");                            //项目名称
        $row["tag"]      =intval($this->input->get("tag"));                      //投资方案
        $row["price"]    =intval($this->input->get("price"));                    //投资单价
        $row["test_box"] =intval($this->input->get("test_box"));                 //购买份数
        $row["proce_all"]=intval($this->input->get("proce_all"));                //总金额
        //查询是否通过实名认证
        $user_db=$this->db->select("user_IDcard")->from("user")->where("user_phone=".$_SESSION["user_phone"])->get();
        $user=$user_db->result_array();
        $this->session->set_userdata("user_buy",$row);
        header("Location:".site_url('Project/buy_sore'));           //echo      跳转到上上签完成签署
        //保存用户的提价数据

    }



    public  function buy_sore()
    {

        //data:"names="+names+"&tag="+tag+"&priced="+priced+"&text_box="+text_box+"&price_all="+price_all,
        if (isset($_SESSION["user_buy"]) && isset($_SESSION["user_phone"])) {
            //从购买界面
            $user_buy = $_SESSION["user_buy"];
            $gear_db=$this->db->select('gear_cycle,gear_earning')->from('project_gear')->where(array('gear_projectid'=>$user_buy['id'],"gear_digital"=>$user_buy['tag']))->get();
            $user_buy['gear_cycle']  =$gear_db->result_array()[0]['gear_cycle'];
            $user_buy['gear_earning']=$gear_db->result_array()[0]['gear_earning'];
            //$this->session->unset_userdata("user_buy");
            $project_db = $this->db->select("project_tag,project_subscribe,project_id")->from("project")->where("project_id=" . $user_buy["id"])->get();
            $pro_tag = $project_db->result_array();
            $user_db=$this->db->select("user_id")->from("user")->where("user_phone=".$_SESSION["user_phone"])->get();
            $user=$user_db->result_array();
            $user_buy["user_id"]=$user[0]["user_id"];//返回的用户的唯一id
            //$pro_tag[0]["project_tag"]            1、购买  2、预约
            //var_dump($pro_tag);
            if(isset($user_buy['m'])){
                if($user_buy['m']==3){                 //用户支付项目余款
                    $pro_tag[0]["project_tag"]=3;
                }
            }else{
                $user_buy['m']=2;
            }
            if($pro_tag[0]["project_tag"]==2){
                $user_buy["proce_d"]=$user_buy["proce_all"]*intval($pro_tag[0]["project_subscribe"])/100;
                $user_buy["proce_y"]=$user_buy["proce_all"]-$user_buy["proce_d"];
            }elseif($pro_tag[0]["project_tag"]==3){
                $user_buy["proce_y"]=intval($user_buy["proce_all"])-intval($user_buy["proce_d"]);
            }else{
                $user_buy["proce_d"]=0;
                $user_buy["proce_y"]=0;
            }
        }else{
            //返回上一页界面  当session 不存在
            echo  "<script>window.history.go(-1)</script>";
        }
        //查询过年红包
         //查看可以使用哪些抵用卷
        //是否在预约中
         if($pro_tag[0]['project_tag']==1  || $pro_tag[0]["project_tag"]==3   ){
          if($pro_tag[0]['project_id']!=1484793659){
              if($user_buy["proce_all"]>=1000  && $user_buy['proce_all']<5000){
                  $en_db=$this->db->select('*')->from('envelope')->where("envelope_user_phone='".$_SESSION['user_phone']."'and envelope_tag=1  and envelope_over>='".date("Y-m-d H:i:s")."'and  envelope_money=16")->get();
              }elseif($user_buy["proce_all"]>=5000  && $user_buy['proce_all']<10000){
                  $en_db=$this->db->select('*')->from('envelope')->where("envelope_user_phone='".$_SESSION['user_phone']."'and envelope_tag=1  and envelope_over>='".date("Y-m-d H:i:s")."'and  envelope_money<=36")->get();
              }elseif($user_buy["proce_all"]>=10000){
                  $en_db=$this->db->select('*')->from('envelope')->where("envelope_user_phone='".$_SESSION['user_phone']."'and envelope_tag=1  and envelope_over>='".date("Y-m-d H:i:s")."'and envelope_money<=68")->get();
              }
          }
      }

        if(isset($en_db)){
            $en=$en_db->result_array();
            if(!empty($en)){
                $user_buy['envelope']=$en;
            }else{
                $user_buy['envelope']=0;
            }
        }else{
            $user_buy['envelope']=0;
        }

          $this->load->view('project_sore',$user_buy);
    }


    //
      public function data(){
          $data['data']=$this->input->get('data');
          $this->load->view("project_data",$data);
      }



}