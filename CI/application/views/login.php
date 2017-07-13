<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- IE 兼容模式 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- 采用高速模式 暂时只支持360浏览器 -->
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>海投万户-登录</title>
    <meta name="Keywords" content="海外房地产,海外资产配置,地产众筹,众筹,收益权,收益权众筹,固定回报,投资理财,美国,纽约,美国地产,公寓,酒店,独栋,别墅,haitouwanhu,万户,海投万户,海投萬户">
    <meta name="description" content="海投万户、海投萬户是以国内投资者的视角，主要针对海外房地产收益权投资的金融平台。专注海外地产市场的旧屋改造和固定收益类项目。打造国内投资者对全球资产投资的新型众筹平台。">
    <link rel="shortcut icon" href="<?php  echo base_url('static/images/favicon.ico') ;?>">
    <link href="<?php echo base_url("static/plugins/bootstrap-3.3.0/css/bootstrap.min.css");?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php  echo base_url("static/css/public.css") ;?>">
    <link rel="stylesheet" href="<?php  echo base_url("static/css/signIn.css") ;?>">
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- 页头 START -->
<div id="header">
    <?php  require_once("static/include/header.php") ;?>
</div>
<!-- 页头 END -->

<!-- 主体 START -->
<div id="main" class="clearfix">
    <div class="signIn">
        <div class="clearfix mt-no-20 mb-no-20">
            <div class="fl-no yellow" style="font-size:18px;">账户登录</div>
            <div class="fr-no size"><a  href="<?php  echo  site_url("Registered/index"); ?>">注册</a></div>
        </div>
        <form role="form" id="signInForm">
            <div class="form-group">
                <input type="text" class="form_input" id="username" name="username" placeholder="请输入手机号">
                <div class="text_vftn"></div>
            </div>
            <div class="form-group">
                <input type="password" class="form_input" placeholder="密码" id="password" name="password">
                <div class="text_vftn"></div>
            </div>
            <div class="form-group verification">
                <label for="" class="verification_chose">输入验证码</label>
                <input type="text" placeholder="验证码" id="pictureVerification" name="pictureVerification">
                <div class="fr-no">
                    <img  style="border:1px solid #dddddd "  onclick="this.src='<?php echo site_url("User/Verify")."?id=".rand(1000,9999);  ?>'"  src="<?php echo site_url("User/Verify")."?id=".rand(1000,9999);  ?>" alt="">
                </div>
                <div class="text_vftn"></div>
            </div>
            <div class="checkbox size">
                <label>
                    <?php
                    if(isset($_COOKIE["pass"])){
                        echo '<input type="checkbox"   name="checkbok"  checked="checked" value="2" id="checkbok">';
                    }else{
                        echo '<input type="checkbox"   name="checkbok"  value="1" id="checkbok">';
                    } ?>
                    记住密码
                </label>
                <a href="<?php echo  site_url("/User/reset");?>" class="fr-no">忘记密码？</a>
            </div>
            <input type="submit" class="btn-yellow" value="登录">
        </form>
    </div>
</div>
<!-- 主体 END -->

<!-- 页脚部分 START -->
<div id="foot" class="visible-md visible-lg">
    <?php  require_once("static/include/part.php") ;?>
</div>
<!-- 页脚部分 END -->

<!-- 页脚 START -->
<div id="footer">
    <?php  require_once("static/include/footer.php") ;?>
</div>
<!-- 页脚 END -->
<!-- 返回顶部 -->
<a href="javascript:;" id="return_top" class="return_top" title="回到顶部"></a>


<script src="<?php echo  base_url('static/plugins/jquery-2.1.4.min.js');?>"></script>
<script src="<?php echo  base_url('static/plugins/bootstrap-3.3.0/js/bootstrap.min.js') ;?>"></script>
<script src="<?php echo  base_url('static/js/jquery.validate.min.js') ;?>"></script>
<script src="<?php echo  base_url('static/js/signIn.js') ;?>"></script>
<script type="text/javascript"  src="<?php echo base_url('static/js/public.js') ;?>"></script>
</body>
</html>