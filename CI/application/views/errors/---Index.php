<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <!--先配置根目录路径config/config中的$config['base_url']-->
    <!--设置config/autoload.php中的$autoload['helper'] = array('url');base_url()才能使用-->
    <!--base_url("static/css/index.css") = 根目录(不含index.php)/static/css/index.css-->
    <!--根目录:即config/config中$config['base_url']配置的值-->
    <link href="<?php echo base_url("static/css/index.css"); ?>" type="text/css" rel="stylesheet" />
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
                                //同base_url一样必须先设置config/autoload.php中的$autoload['helper'] = array('url');才能使用
                                //site_url('控制器/方法')=根目录/index.php/控制器/方法,与base_url()的区别就在路径中是否含有"index.php"
                                echo '<a href = '.site_url("User/login").'>请登录</a>';
                            }else{
                                echo '欢迎您：'.$_SESSION['user_name'].'&nbsp;&nbsp;&nbsp;<a href = '.site_url("User/loginOut").'>点击注销</a>';
                            }

                        ?>
                    </td>
                </tr>
                <tr><td><a href = '<?php echo site_url("User/register");?>'>注册</a>&nbsp;<a href = '<?php echo site_url("User/login");?>'>登录</a></td></tr>
            </table>
        </div>
    </div>
</body>
</html>