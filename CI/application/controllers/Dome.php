<?php

//投资项目控制器

class  Dome  extends CI_Controller {

    public function  index(){
        $n=$this->uri->segment(3, 0);                                                   //获取在那个节点
        //查询结果
        $this->load->model("Home_model");
        $m=$this->input->get("tag");
        $arr["complet"]=$this->Home_model->dome($n,3);
        $arr['compl']=array();
        foreach($arr["complet"]  as  $value){
            $value['project_time_over']=str_replace('-','.',$value['project_time_over']);
            $value['project_time_start']=str_replace('-','.',$value['project_time_start']);
            $arr['compl'][]=$value;
        }
        $arr['complete']=array();
        foreach($arr["compl"]  as  $value_un){
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
            $arr["complete"][]=$value_un;
            //	var_dump($value_un);
            //exit();
        }

        //分页
        $total_rows=$this->db->count_all("project");
        $base_url=site_url("Dome/index");
        $this->load->library('pagination');                                           //加载分页辅助函数
        $this->load->model('Page_model');
        $config=$this->Page_model->page($total_rows,$base_url);
        $this->pagination->initialize($config);                                       //加载配置
        $this->load->view("dome",$arr);
    }


    public function  domeo(){

        $n=$this->uri->segment(3, 0);                                                   //获取在那个节点
        //查询结果
        $this->load->model("Home_model");
        $m=$this->input->get("tag");
        $arr["complet"]=$this->Home_model->dome($n,1);
        $arr['complete']=array();
        foreach($arr["complet"]  as  $value){
            $value['project_time_over']=str_replace('-','.',$value['project_time_over']);
            $value['project_time_start']=str_replace('-','.',$value['project_time_start']);
            $arr['complete'][]=$value;
        }
        //分页
        $row=$this->db->select()->from("project")->order_by("project_id","DESC")->where(array("project_tag"=>1))->get();
        $total_rows=$row->num_rows();
        $base_url=site_url("Dome/domeo");
        $this->load->library('pagination');                                           //加载分页辅助函数
        $this->load->model('Page_model');
        $config=$this->Page_model->page($total_rows,$base_url);
        $this->pagination->initialize($config);                                       //加载配置
        $this->load->view("domeo",$arr);
    }


    public function  domew(){

        $n=$this->uri->segment(3, 0);                                                   //获取在那个节点
        //查询结果
        $this->load->model("Home_model");
        $m=$this->input->get("tag");
        $arr["complet"]=$this->Home_model->dome($n,0);
        $arr['complete']=array();
        foreach($arr["complet"]  as  $value){
            $value['project_time_over']=str_replace('-','.',$value['project_time_over']);
            $value['project_time_start']=str_replace('-','.',$value['project_time_start']);
            $num_a=1;
            $gear_db=$this->db->select('gear_earning')->from('project_gear')->where('gear_projectid='.$value['project_id'])->get();
            $gear=$gear_db->result_array();
            $num=$gear_db->num_rows();
            foreach($gear as $value_gear){
                if($num_a==$num){
                    $c=$value_gear['gear_earning'];
                }
                $num_a++;
            }
            $value['gear_earning']=$c;



            $arr['complete'][]=$value;
        }
        //分页
        $row=$this->db->select()->from("project")->order_by("project_id","DESC")->where(array("project_tag"=>0))->get();
        $total_rows=$row->num_rows();
        $base_url=site_url("Dome/domew");
        $this->load->library('pagination');                                           //加载分页辅助函数
        $this->load->model('Page_model');
        $config=$this->Page_model->page($total_rows,$base_url);
        $this->pagination->initialize($config);                                       //加载配置
        $this->load->view("domew",$arr);
    }

    public function  domef(){

        $n=$this->uri->segment(3, 0);                                                   //获取在那个节点
        //查询结果
        $this->load->model("Home_model");
        $m=$this->input->get("tag");
        $arr["complet"]=$this->Home_model->dome($n,2);
        $arr['complete']=array();
        foreach($arr["complet"]  as  $value){
            $value['project_time_over']=str_replace('-','.',$value['project_time_over']);
            $value['project_time_start']=str_replace('-','.',$value['project_time_start']);
            $arr['complete'][]=$value;
        }
        //分页
        $row=$this->db->select()->from("project")->order_by("project_id","DESC")->where(array("project_tag"=>2))->get();
        $total_rows=$row->num_rows();
        $base_url=site_url("Dome/domef");
        $this->load->library('pagination');                                           //加载分页辅助函数
        $this->load->model('Page_model');
        $config=$this->Page_model->page($total_rows,$base_url);
        $this->pagination->initialize($config);                                       //加载配置
        $this->load->view("domef",$arr);
    }


    /**
     * 投资项目控制器
     */

    public function  investment(){
     $n=$this->uri->segment(3, 0);
     $db=$this->db->select("*")->from("project")->where(array('project_one'=>1))->order_by("project_id","DESC")->limit(6,$n)->get();
     $inv['data']=$db->result_array();
     //加载分页
     $data=$this->db->select("*")->from("project")->where(array('project_one'=>1))->get();
     $total_rows=$data->num_rows();
     $base_url=site_url("Dome/investment");
     $this->load->library('pagination');                                           //加载分页辅助函数
     $this->load->model('Page_model');
     $config=$this->Page_model->page($total_rows,$base_url);
     $this->pagination->initialize($config);                                       //加载配置

     $this->load->view("investment",$inv);

    }
}