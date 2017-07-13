<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 16-1-9
 * Time: 上午11:31
 * To change this template use File | Settings | File Templates.
 */
class captcha{
    public $str;
    public $on;
    public function __construct($on){
        $this->on=$on["length"];
        $arr=array();
        //获取验证码的值0~9a~zA~Z 随机4个;
        for($i=0;$i<$this->on;$i++){
            if(rand(0,2)==0){
                $arr[$i]= rand(0,9);
            }else if(rand(0,2)==1){
                $arr[$i]= chr(rand(97,122));
            }else{
                $arr[$i]= chr(rand(65,90));
            }
        }
        $str1=implode("",$arr);
        $this->str=$str1;
//        $CI = & get_instance();
//        $CI->session->set_userdata('code', $str1);
        $_SESSION["code"] = $this->str;
        $img=imagecreatetruecolor(70+($this->on-4)*15,30);
        $bg = imagecolorallocate($img,rand(200,255),rand(200,255),rand(200,255)); //背景颜色
        imagefill($img,0,0,$bg);
        $x=5;//字体间距；
        for($i=0;$i<$this->on;$i++){
            $font_angle=rand(-30,30);//字体角度
            $font_size=rand(15,20); //字体大小
            $font_color=imagecolorallocate($img,rand(0,200),rand(0,200),rand(0,200)); //字体颜色
            $font_file = "./fonts/".rand(1,5).".ttf"; //字体文件
            imagettftext($img,$font_size,$font_angle,$x,20,$font_color,$font_file,$this->str[$i]);
            $x+=15;
        }
        header("content-type:image/jpeg");
//        imagejpeg($img);
        imagejpeg($img);
    }
}
