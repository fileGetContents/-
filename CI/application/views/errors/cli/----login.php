<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo base_url('static/css/sign_in.css');  ?>">
    <style>
        .Phone_number label span{
            background: url(static/img/4-2.png);
        }
    </style>
</head>
<body>
<!-- 头部 -->
<div class="header">
    <a href="#"><img src="static/img/logo.png" alt=""></a>
    <h1>欢迎登录</h1>
</div>
<!-- 主体 -->
<div class="coonter">
    <div class="denglv">
        <div class="yonghu">
            <h4>账户登录</h4>
            <p><a href="<?php echo site_url('Registered/index'); ?>">注册</a></p>
        </div>
        <!-- sign_in.php -->
<div action="" id="account" >
            <div class="Phone_number">
               <?php
                 if(isset($_COOKIE["phone"])){
                     echo    '<input id="phone" name="phone" type="text"  value="'.$_COOKIE['phone'].'"  placeholder="请输入手机号码">';
                 }else{
                     echo    '<input id="phone" name="phone" type="text"   placeholder="请输入手机号码">';
                 }
               ?>
            </div>
            <div class="login_password">
                <?php
                if(isset($_COOKIE["pass"])){
                    echo '<input id="password" name="password" value='.$_COOKIE["pass"].' type="password">';
                }else{
                    echo '<input id="password"  name="password" type="password" placeholder="密码">';
                }
                ?>
            </div>
            <div class="remember">
                <?php
                if(isset($_COOKIE["pass"])){
                    echo '<input type="checkbox"   name="checkbok"  checked="checked" value="2" id="checkbok">';
                }else{
                    echo '<input type="checkbox"   name="checkbok"  value="1" id="checkbok">';
                } ?>
               记住密码
                <a href="#">忘记密码?</a>

            </div>
            <input type="submit" id="deng" value="用户登录">
            <div  id="tishi" style="display: none">
                密码或者账号错误
            </div>
</div>
    </div>
</div>
<!-- 尾部 -->
<footer>
    <div class="footer_bottom">
        <p>COPYRIGHT    &copy; 1998 - 2016 KONGZHONG ALL 空中网版权所有</p>
        <p>京ICP证020001号 京网文[2011]0267-160号 经营许可证编号:B2-20090197</p>
    </div>
</footer>
<script src="<?php  echo  base_url('static/js/jquery-3.1.0.min.js');?>"></script>
<script src="<?php  echo  base_url('static/js/jquery.validate.min.js');?>"></script>
<script  type="text/javascript">
    $(function(){

        $("#deng").click(function(){
             var    phone=$("#phone").val();
             var password=$("#password").val();
             var checkbox=$("#checkbok").val();
            $.ajax({
                type:"post",
                url:"<?php   echo  site_url("User/login");?>",
                dataType:"json",
                data:"phone="+phone+"&passwork="+password+"&checkbok="+checkbox,
                success:function($obj){
                 if($obj==1){
                     window.location="<?php  echo site_url('Welcome/index');?>"
                 }else{
                   var  tishi=document.getElementById("tishi");
                         tishi.style.display="block";
                 }
                },
                 error:function(){
                     alert("系统繁忙,请稍后再试")
                 }
            })
        });

        $("#checkbok").click(function(){
            var  o=parseInt($(this).val());
            if(o==1){
               $(this).val(2);//记住密码
            }else if(o==2){
                $(this).val(1);//不用记住密码
            }
        });


        $("#account").validate({
            rules:{
                phone: {
                    required: true,
                    rangelength:[6,20]
                },
                password: {
                    required: true,
                    rangelength:[6,18]
                }
            },
            messages:{
                phone: {
                    required: "请输入用户名",
                    rangelength: "dsdsds"
                },
                password: {
                    required: "请输入密码",
                    rangelength: "输入格式不正确"
                }
            }
        })
    })
</script>
</body>
</html>