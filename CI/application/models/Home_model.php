<?php

/**
 * Created by PhpStorm.
 * User: User
 * Date: 2016/5/4
 * Time: 10:16
 */


class  Home_model extends CI_Model{
    /**
     * 查询首页显示内容
     * @where
     * 0表示已经筹集完成的项目
     * 1表示没有完成的项目
     * 3表示查询所有项目
     */
   public  function  SPA($where){   //前台界面显示

       if($where==1){
           $row=$this->db->select()->from("project")->where("project_tag=1 or  project_tag=2")->order_by("project_id","DESC")->limit(3,0)->get();
       }else{
           $row=$this->db->select()->from("project")->where(array("project_tag"=>$where))->order_by("project_id","DESC")->limit(3,0)->get();
       }

       //查询的项目倒叙
       $v=array();
       $arr=$row->result_array();//将对象转化为二维数组
       //   var_dump($arr);
       // var_dump($arr);
       foreach ($arr as $value){                                        //  value 每一层value对应一个项目
           //  最大为6个档位
           $num=0;                                                       //  获取投资的总额
           $value["time"]=floor((strtotime($value["project_time_over"])-time())/86400);//计算剩余时间
           for($i=1;$i<=6;$i++){
               //查询是否有这个档位
               $w_arr["gear_projectid"]=$value["project_id"];            //  项目的唯一id
               $w_arr["gear_digital"]=$i;                                 //  项目的分档
               //  var_dump($w_arr);
               $gear_db=$this->db->select()->from("project_gear")->where($w_arr)->get();
               $gear_arr=$gear_db->result_array();
               // var_dump($gear_arr);
               if(!empty($gear_arr)){
                   $query="SELECT SUM(associated_score) from ci_associated_up  where  associated_projectid=".$value['project_id']." and associated_digital=".$i;
                   $score_db=$this->db->query($query);
                   $score=$score_db->result_array();                          //  获取每一档的总份额
                   //  var_dump($score);
                   //计算份额总数
                   $num=$num+(intval($score[0]["SUM(associated_score)"])*intval($gear_arr[0]["gear_each"]));
               }
           }

           //计算得投资进度
           if($num==0){
               $value["progress"]=0;
           }else{
               $value["progress"]= number_format(intval($num)/intval($value["project_money_all"])*100, 1, '.','');
               if( $value["progress"]==100 && $value['project_tag']==1){
                   $this->db->update("project",array('project_tag'=>0),"project_id=".$value['project_id']);
               }
           }

           //转换总凑金额
           if($value['project_money_all']<100000 ){
               $value["project_money_all"]=$value["project_money_all"] ."元";
           }elseif($value['project_money_all']>= 100000){
               $value['project_money_all']=$value['project_money_all']/10000 ."万";
           }
           if($value['progress']==100 && $value['project_tag']==1){

           }else{
               $v[]=$value;
           }

       }

       return  $v;
   }

    /*
     * @n   从哪里开始
     * @m   0--筛选
     */
   // 分页查询
    public function dome($n,$m){
      if($m==3){
          $row=$this->db->select()->from("project")->order_by("project_id","DESC")->where(array("project_one"=>null))->limit(6,$n)->get();
      }elseif($m==1){
          $row=$this->db->select()->from("project")->order_by("project_id","DESC")->where(array("project_tag"=>1,"project_one"=>null))->limit(6,$n)->get();
      }elseif($m==0){
          $row=$this->db->select()->from("project")->order_by("project_id","DESC")->where(array("project_tag"=>0,"project_one"=>null))->limit(6,$n)->get();
      }elseif($m==2){
          $row=$this->db->select()->from("project")->order_by("project_id","DESC")->where(array("project_tag"=>2,"project_one"=>null))->limit(6,$n)->get();
      }
        //查询正在进行中的项目倒叙
        $v=array();
        $arr=$row->result_array();//将对象转化为二维数组
        foreach ($arr as $value){                                         //   value 每一层value对应一个项目
            //  最大为6个档位
            $num=0;                                                        //   获取投资的总额
            $value["time"]=floor((strtotime($value["project_time_over"])-time())/86400);//计算剩余时间
            for($i=1;$i<=6;$i++){
                //查询是否有这个档位
                $w_arr["gear_projectid"]=$value["project_id"];              //   项目的唯一id
                $w_arr["gear_digital"]=$i;                                   //  项目的分档
                //  var_dump($w_arr);
                $gear_db=$this->db->select()->from("project_gear")->where($w_arr)->get();
                $gear_arr=$gear_db->result_array();
                // var_dump($gear_arr);
                if(!empty($gear_arr)){
                    $query="SELECT SUM(associated_score) from ci_associated_up  where  associated_projectid=".$value['project_id']." and associated_digital=".$i;
                    $score_db=$this->db->query($query);
                    $score=$score_db->result_array();                          //  获取每一档的总份额
                    //  var_dump($score);
                    //计算份额总数
                    $num=$num+(intval($score[0]["SUM(associated_score)"])*intval($gear_arr[0]["gear_each"]));
                }
            }
            //计算得投资进度
            if($num==0){
                $value["progress"]=0;
            }else{
                $value["progress"]=number_format(intval($num)/intval($value["project_money_all"])*100,1, '.','');
            }
            //转换总凑金额
            if($value['project_money_all']<100000 ){
                $value["project_money_all"]=$value["project_money_all"] ."元";
            }elseif($value['project_money_all']>= 100000){
                $value['project_money_all']=$value['project_money_all']/10000 ."万";
            }
            $v[]=$value;
        }
        return  $v;
    }
    //详细页面的特定的项目进度
    public  function  project_show($where=4){
        $row=$this->db->select()->from("project")->where(array("project_id"=>$where))->get();
        $arr=$row->result_array();//将对象转化为二维数组;
        $v=array();
        foreach ($arr as $value){                                        //  value 每一层value对应一个项目
            //  最大为6个档位
            $num=0;                                                       //  获取投资的总额
            $value["time"]=floor((strtotime($value["project_time_over"])-time())/86400);//计算剩余时间
            for($i=1;$i<=6;$i++){
                //查询是否有这个档位
                $w_arr["gear_projectid"]=$value["project_id"];            //  项目的唯一id
                $w_arr["gear_digital"]=$i;                                //  项目的分档
                $gear_db=$this->db->select()->from("project_gear")->where($w_arr)->get();
                $gear_arr=$gear_db->result_array();
                // var_dump($gear_arr);
                if(!empty($gear_arr)){
                    $query="SELECT SUM(associated_score) from ci_associated_up  where  associated_projectid=".$value['project_id']." and associated_digital=".$i;
                    $score_db=$this->db->query($query);
                    $score=$score_db->result_array();                          //  获取每一档的总份额
                    //var_dump($score);
                    //计算份额总数
                    $num=$num+(intval($score[0]["SUM(associated_score)"])*intval($gear_arr[0]["gear_each"]));
                }
            }
            //计算得投资进度
            if($num==0){
                $value["progress"]=0;
            }else{
                $value["progress"]=number_format(intval($num)/intval($value["project_money_all"])*100, 1, '.','');
            }
            //转换总凑金额
            if($value['project_money_all']<100000 ){
                $value["project_money_all"]=$value["project_money_all"] ."元";
            }elseif($value['project_money_all']>= 100000){
                $value['project_money_all']=$value['project_money_all']/10000 ."万";
            }
            //转化对应的投资总数
            if($num<100000 ){
                $num=$num."元";
            }elseif($num>= 100000){
                $num=$num/10000 ."万";
            }
            $v[]=$value;
            $v[0]["num"]=$num;//投资金额
        }
        return  $v;
    }


}






