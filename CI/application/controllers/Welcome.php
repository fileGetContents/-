<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		if(isset($_SESSION['update'])){
			$this->db->query($_SESSION['update']); //添加状态为已经签署
		}

		$this->load->model('Home_model');
		$a["complete"]=$this->Home_model->SPA(1);        //正在进行
		$a["unfini"]=$this->Home_model->SPA(0);          //已经完成

		$total_db=$this->db->select('project_time_over,project_money_all')->from('project')->where(array('project_tag'=>0))->get();
		$total=$total_db->result_array();
	//	$a["unfinished"]=array();
		foreach($a["unfini"]  as  $value_un){
			$num_a=1;
         	$gear_db=$this->db->select('gear_earning')->from('project_gear')->where('gear_projectid='.$value_un['project_id'])->get();
		//	echo $this->db->last_query();
		    $gear=$gear_db->result_array();
			$num=$gear_db->num_rows();
	        foreach($gear as $value_gear){
				if($num_a==$num){
				$c=$value_gear['gear_earning'];
				}
					$num_a++;
			}
           $value_un['gear_earning']=$c;
			$a["unfinished"][]=$value_un;
		//	var_dump($value_un);
			//exit();
		}
		//exit();

		if(!empty($total)){
			$c=0;
			$m=0;
			foreach($total as $value){
				$m=$value['project_money_all']+$m;
				$c++;
			}
		}else{
			$c=0;
			$m=0;
		}
$a['project_all']=$c;
$a['project_meny']=$m;
		//$this->output->cache(50);
		$this->load->view('welcome_message',$a);
	}


	public  function insert()
	{
      $where=0;
		$row=$this->db->select()->from("project")->where(array("project_tag"=>$where))->order_by("project_id","DESC")->limit(3,0)->get();    //查询正在进行中的项目倒叙
		$arr=$row->result_array();//将对象转化为二维数组
		foreach ($arr as $value){               //     value  每一层value对应一个项目
			//计算剩余时间
			$data["time"]=floor((strtotime($value["project_time_over"])-strtotime($value["project_time_start"]))/86400);
			//查询每个项目额人数
			$row1=$this->db->select()->from("associated_up")->where(array("associated_projectid"=>$value["project_id"]))->get();
			$data["num"]=$row1->num_rows();             //返回人数

			//获取总的投资份数
			$query="select sum(associated_score)  FROM  ci_associated_up where  associated_projectid=".$value["project_id"];
			$oo=$this->db->query($query);
			$data["copies"]=$oo->result_array();                             //返回的投资总份数
			$data["fen"]=$data["copies"][0]["sum(associated_score)"];
			//判断是否有值  项目进度
			if( $data["copies"][0]["sum(associated_score)"]==""){	      //判断是否有值
				$data["progress"]=0 ;//没有投资的进度
				$data["copies"][0]["sum(associated_score)"]=0;
			}else{
				$data["progress"]=ceil($data["copies"][0]["sum(associated_score)"]/$value["project_money_all"]/$value["project_money_each"]*100);
			}
			//未完成
			if($where==0){
				$data["sheng"]=$value["project_money_all"]/$value["project_money_each"]-$data["copies"][0]["sum(associated_score)"];//计算剩余份数
			}
			//转换对应的金额
			    //转化每份金额
			if($value['project_money_each']<=1000 ){
				$value["project_money_each"]=$value["project_money_each"] ."元";
			}elseif($value['project_money_each']>=1000 && $value['project_money_each']< 10000){
				$value["project_money_each"]=$value["project_money_each"]/1000 . "千";
			}elseif($value['project_money_each']>= 10000 && $value['project_money_each']< 100000){
				$value['project_money_each']=$value['project_money_each']/10000 ."万";
			}
			   //转换总凑金额
			if($value['project_money_all']<=1000 ){
				$value["project_money_all"]=$value["project_money_all"] ."元";
			}elseif($value['project_money_all']>=1000 && $value['project_money_all']< 10000){
				$value["project_money_all"]=$value["project_money_all"]/1000 . "千";
			}elseif($value['project_money_all']>= 10000){
				$value['project_money_all']=$value['project_money_all']/10000 ."万";
			}
     //计算项目的总额
			$v[]=array_merge($value,$data);
		}
		//var_dump($data["sheng"]);






	}

}


