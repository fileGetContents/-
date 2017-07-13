<?php
header("Content-type:text/html;charset=utf8");

class  Captcha_model  extends  CI_Model{

    private $charset = 'abcdefghkmnprstuvwxyABCDEFGHKMNPRSTUVWXY3456789';    //随机因子
    private $code;                           //验证码
    private $codelen = 4;                    //验证码长度
    private $width = 107;                    //宽度
    private $height = 34;                    //高度
    private $img;                            //图形资源句柄
    private $font;                           //指定的字体
    private $fontsize = 20;                  //指定字体大小
    private $fontcolor;                      //指定字体颜色


    public  function   Captcha($on){
        //字体
        $this->font =  "./fonts/".rand(1,5).".TTF";
        //  $this->createBg();  生成背景颜色
        $this->img = imagecreatetruecolor($this->width, $this->height);
        $color = imagecolorallocate($this->img, mt_rand(157,255), mt_rand(157,255), mt_rand(157,255));
        imagefilledrectangle($this->img,0,$this->height,$this->width,0,$color);
        //  $this->createCode();   生成随几验证码
        $_len = strlen($this->charset)-1;
        for ($i=0;$i<$this->codelen;$i++){
            $this->code .= $this->charset[mt_rand(0,$_len)];
        }
        $_SESSION["code"]=$this->code;
        //生成线条、雪花
        //$this->createLine();
//        for ($i=0;$i<6;$i++){
//            $color = imagecolorallocate($this->img,mt_rand(0,156),mt_rand(0,156),mt_rand(0,156));
//            imageline($this->img,mt_rand(0,$this->width),mt_rand(0,$this->height),mt_rand(0,$this->width),mt_rand(0,$this->height),$color);
//        }
//        for ($i=0;$i<100;$i++){
//            $color = imagecolorallocate($this->img,mt_rand(200,255),mt_rand(200,255),mt_rand(200,255));
//            imagestring($this->img,mt_rand(1,5),mt_rand(0,$this->width),mt_rand(0,$this->height),'*',$color);
//        }
        //生成文字
        //$this->createFont();
        $_x = $this->width / $this->codelen;
        for ($i=0;$i<$this->codelen;$i++) {
            $this->fontcolor = imagecolorallocate($this->img,mt_rand(0,156),mt_rand(0,156),mt_rand(0,156));
            imagettftext($this->img,$this->fontsize,mt_rand(-30,30),$_x*$i+mt_rand(1,5),$this->height / 1.4,$this->fontcolor,$this->font,$this->code[$i]);
        }
        //输出图片
        //    $this->outPut();

        header('Content-type:image/png');
        imagepng($this->img);
        imagedestroy($this->img);
    }




}


