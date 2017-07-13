<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="<?php echo base_url("static/css/index.css"); ?>" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src = "<?php echo base_url("static/js/jquery/jquery-1.11.3.js"); ?>"></script><!--jQuery框架-->
    <script type="text/javascript" src = "<?php echo base_url("static/js/jquery.validate/jquery.validate.js"); ?>"></script><!--加载js-->
    <script type="text/javascript" src="<?php echo base_url("static/js/Verify.js"); ?>"></script>
</head>
<body>
    <div class = '_center'>
        <div class = '_title'>
            <div class = '_name' style = 'height: 50%;'>主页</div>
            <table style = 'height: 50%;'>
                <tr>
                    <td>
                        <?php
                            if(!isset($_SESSION['user_name'])){
                                echo '<a href = '.site_url("User/login").'>请登录</a>';
                            }else{
                                echo '欢迎您：'.$_SESSION['user_name'].'&nbsp;&nbsp;&nbsp;<a href = '.site_url("User/loginOut").'>点击注销</a>';
                            }

                        ?>
                    </td>
                </tr>
                <tr><td><a href = '<?php echo site_url("User/register");?>'>注册</a>&nbsp;<a href = '<?php echo site_url("Home/login");?>'>登录</a></td></tr>
            </table>
        </div>
        <div class = '_register'>
            <form id = 'register' action="<?php echo site_url("User/userRegister");?>" method="post">
                <table class = "table">
                    <tr><td><font size="7">用户注册</font></td></tr>
                    <tr><td><label for='uname'>用户名(邮箱):</label><br/><br/><input id = 'uname' type="text" name="uname" class = '_in' /></td></tr>
                    <tr><td><label for="upwd">密 码:</label><br/><br/><input id="upwd" type="password" name="upwd" class = '_in' /></td></tr>
                    <tr><td><label for="upwd1">确 认 密 码:</label><br/><br/><input id="upwd1" type="password" class = '_in' name = "upwd1" /></td></tr>
                    <tr><td><div style = 'position:relative;height: 37px'><img style = 'position:absolute;right:43%;' onclick="this.src = '<?php echo site_url("User/Verify");?>'" src="<?php echo site_url("User/Verify");?>"><input class = "code" name="code" id="code" type="text" placeholder="请输入验证码" required /></div></td></tr>
                    <tr><td></td></tr>
                    <tr><td></td></tr>
                    <tr><td></td></tr>
                    <script>
                        $(document).ready(function(){
                            $('.code').blur(function(){
                                $code = $(this).val();
                                $.ajax({
                                    url:'<?php echo site_url("User/captcha");?>',
                                    type:'post',
                                    dataType:'json',
                                    data:'code='+$code,
                                    success:function($bool){
                                        if($bool == "2"){
//                                            alert(1);
                                            $('.code').css({border:'1px solid red'}).val('');
                                        }
                                    },
                                    error:function(){
                                        alert("服务器无响应");
                                    }
                                });
                            });
                        });
                    </script>
                    <tr><td><input type="submit" class = "sb" name="btn" /></td></tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>