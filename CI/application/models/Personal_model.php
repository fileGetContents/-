<?php




class  personal_model extends CI_Model{

    //计算投资金额和每份投资金额的方法
   public   function  fa(){
       //获取每个电话的唯一id号
       $user=$this->db->select("user_id")->from("user")->where(array("user_phone"=>$_SESSION["user_phone"]))->get();
       $userid=$user->result_array();
       //  $userid[0]["user_id"];每个用户的唯一id
       $num=$this->db->select()->from("associated_up")->where(array("associated_userid"=>$userid[0]["user_id"]))->get();
       $persona["num"]=$num->num_rows();//查询已经投资次数
       //投资总额
       $num_arr=$num->result_array();
       //var_dump($num_arr);
       $persona["money"]=0;
       foreach($num_arr as $value){   //每次投资的金额
           $where["gear_projectid"]=$value["associated_projectid"];
           $where["gear_digital"]=$value["associated_digital"];
           $gear_db=$this->db->select()->from("project_gear")->where($where)->get();
           $gear_arr=$gear_db->result_array();
           // var_dump($value);
           //  var_dump($gear_arr);
           $persona["money"]=$persona["money"]+intval($gear_arr[0]["gear_each"])*intval($value["associated_score"]);//投资总金额
       }
       return  $persona;
   }



    public   function  admin_fa(){
        //获取每个电话的唯一id号
        $user=$this->db->select("user_id")->from("user")->get();
        $userid=$user->result_array();
        //  $userid[0]["user_id"];每个用户的唯一id
        $personal=array();
        foreach($userid as $value){
        $num=$this->db->select()->from("associated_up")->where(array("associated_userid"=>$value["user_id"]))->get();
            $persona["num"]=$num->num_rows();//查询已经投资项目的总数
            //投资总额
            $money=$this->db->select()->from("associated_up")->where(array("associated_userid"=>$value["user_id"]))->get();
            $persona["money"]=0;
            $persona["user_id"]=$value["user_id"];
            $amoney=$money->result_array();
            foreach ($amoney as $value1){
                $pro=$this->db->select()->from("project")->where(array("project_id"=>$value1["associated_id"]))->get();
                $pro=$this->db->select()->from("project")->where(array("project_id"=>$value1["associated_id"]))->get();
                $prow=$pro->result_array();
                $persona["money"]=intval($value1["associated_score"]) * intval($prow[0]["project_money_each"])+$persona["money"];//获取每一次的投资额
            }
            $personal[]=$persona;
        }

        return  $personal;
    }
   public  function  user_show(){

   }

   //更改项目的状态

    public function time($id)
    {
        //查询数组
        $project_db = $this->db->select("project_time_start,project_time_over,project_tag")->from("project")->where("project_id=1")->get();
        $time = $project_db->result_array();//返回数组
        $now = time();                     //获取当前时间

        if ($time[0]["tag"] == 1) {
            //由正在进行转化为
            if ($now >= $time[0]["project_time_over"]) {
                $update["project_tag"] = 0;//修改为已经完成
                $rows = $this->db->update("project", $update, "project_id=" . $id);
            }
        } elseif ($time[0]["tag"] == 0) {
            //由预约转化为正在经行
            if ($now >= $time[0]["project_time_start"]) {
                $update["project_tag"] = 0;//修改为已经完成
                $rows = $this->db->update("project", $update, "project_id=" . $id);
            }
        }

    }

    }