<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="<?php  echo base_url('static/css/register.css');?>">
    <script src="<?php  echo  base_url('static/js/jquery-3.1.0.min.js');?>"></script>

    <script type="text/javascript" >

        $(function(){
           //判断号码是否被注册过
           $("#phone").blur(function(){
               var  phone=$(this).val();
               //alert(phone);
               $.ajax({
                   type:"post",
                   url:"<?php  echo site_url('Registered/in') ; ?>",
                   dataType:"json",
                   data:"phone="+phone,
                   success:function($obj){
                       if($obj==1) {
                           document.getElementById("phone1").style.display = "block"
                       }else {
                           document.getElementById("phone1").style.display = "none"
                       }
                   },
                   error:function(){
                       alert("服务器繁忙,请稍后再试")
                   }
               })
           });

        //ajax表单提交
            $("#zhuce").click(function(){
                var      phone=$("#phone").val();
                var   password=$("#password2").val();
              alert(password) ;
                $.ajax({
                    type:"POST",
                    dataType:"json",
                    url:"<?php  echo site_url('Registered/insert') ; ?>",
                    data:"phone="+phone+"&password="+password,
                    success:function($obj){
                        if($obj==1){
                            window.location="<?php  echo site_url('Welcome/index');?>"
                        }else{
                            alert("注册失败")
                        }
                    },
                    error:function(){
                        alert("服务器繁忙，请稍后再试")
                    }
                })

            });


            //复选框的值
            $("#checkbok").click(function(){
           //     alert(111);
                var  o=parseInt($(this).val());
                if(o==1){
                    $(this).val(2);//同意
                }else if(o==2){
                    $(this).val(1);//不同意
                }

            });
        })
    </script>
</head>
<body>
<!-- 头部 -->
<div class="header">
    <a href="#"><img src="<?php echo base_url('static/img/logo.png');?>" alt=""></a>
    <h1>欢迎注册</h1>
</div>
<!-- 主体 -->
<div class="coonter">
    <div class="denglv">
        <div class="yonghu">
            <h4>账户注册</h4>
            <p><a href="<?php echo site_url('User/index') ;?>">登录</a></p>
        </div>
        <div  id="account" >
            <div class="Phone_number">
                <label for="">手机号码</label>
                <input id="phone"  name="phone" type="text" placeholder="请输入手机号码">
                <div   id="phone1" style="display: none;">该账号已被注册</div>
            </div>
            <div class="login_password">
                <label for=""  id="password"  >登录密码</label>
                <input type="password"  id="password2" placeholder="密码">
            </div>
            <div class="login_password">
                <label for="">确认密码</label>
                <input type="password" placeholder="密码">
            </div>
            <div class="login_code">
                <label for="">短信验证码</label>
                <input type="text">
                <input type="submit"  id="submit" value="获取验证码">
            </div>
            <div class="remember">
                <input type="checkbox"  value="1"  id="checkbok" >阅读并同意
                <a href="#">服务协议</a>
            </div>
            <div class="login_submit">
                <input type="submit"   id="zhuce"  value="立即注册">
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
</body>
</html>