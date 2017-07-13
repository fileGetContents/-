<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class  Aboutus  extends CI_Controller {

//关于我们
    public function  index(){
    $this->load->view('about');
    }

 //支付投资风险透支协议
    public function  block(){
        $this->load->view('block');
    }

    //服务协议
    public function  service(){
        $this->load->view('service');
    }

    //发起众筹凑
    public function  initiator(){
        $this->load->view('initiator');
    }

    //用户添加众筹项目
    public   function  user_pro(){
    $pro=array(
        "pro_name"=>$this->input->post("pro_name") ,
        "pro_corporation"=> $this->input->post("pro_corporation"),
        "pro_userName"=>$this->input->post("pro_userName"),
        "pro_userPhone"=>$this->input->post("pro_userPhone"),
        "pro_userEmail"=>$this->input->post("pro_userEmail"),
        "pro_userAddress"=>$this->input->post("pro_userAddress"),
        "pro_configuration"=>$this->input->post("pro_configuration"),
        "pro_area"=>$this->input->post("pro_area"),
        "pro_homeDegression"=>$this->input->post("pro_homeDegression"),
        "pro_homeRent"=>$this->input->post("pro_homeRent"),
        "pro_rentStart"=>$this->input->post("pro_rentStart"),
        "pro_rentOver"=>$this->input->post("pro_rentOver"),
        "pro_utilities"=>$this->input->post("pro_utilities"),
        "pro_opex"=>$this->input->post("pro_opex"),
        "pro_otherSpending"=>$this->input->post("pro_otherSpending"),
        "pro_income"=>$this->input->post("pro_income"),
        "pro_incomeTag"=>$this->input->post("pro_incomeTag"),
        "pro_renStart"=>$this->input->post("pro_renStart"),
        "pro_moneyAll"=>$this->input->post("pro_moneyAll"),
        "pro_introduce"=>$this->input->post("pro_introduce"),
        "pro_images"=>$this->input->post("pro_images"),
    );
       $this->db->insert("user_project",$pro);

        echo 1;

    }


    public function vouchers(){


        $this->load->view("vouchers");

    }


    public function test(){

       $row=$this->db->insert("envelope",
            array(
                "envelope_user_phone"=>"18280195336",
                "envelope_money"       =>36,
                "envelope_range"       =>"满¥5000减¥36",
                "envelope_start"       =>"2017-1-18 00:00:00",
                "envelope_over"        =>"2017-2-18 00:00:00",
                "envelope_source"      =>"新年大礼包",
                "envelope_tag"         =>1,
            )
        );


        echo  $row;
    }





}