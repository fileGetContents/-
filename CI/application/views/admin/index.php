<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="<?php echo  base_url('admin/css/H-ui.min.css') ; ?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo  base_url('admin/css/index.css');  ?>"/>
</head>
<body>
<header class="navbar-wrapper">
    <div class="navbar_balck">
        <a class="logo navbar-logo f-l mt-10 ml-50 hidden-xs" href="http://www.haitouwanhu.com/Wanhuu/admin_index"><img src="<?php echo base_url('admin/images/logo.png'); ?>" alt=""></a>
        <ul class="f-r mr-50">
            <li><a href="<?php echo site_url('Wanhuu/admin_index') ;?>">首页</a></li>
            <li><a href="<?php echo site_url();?>">注销</a></li>
        </ul>
    </div>
</header>
<div class="Hui-aside">
    <div class="sidebar">
        <ul>
            <li class="title">
                <span>会员管理 <i class="down"></i></span>
                <ul class="in-sidebar">
                    <li><a href="<?php   echo  site_url('Wanhuu_member/index') ;?>" target="menuFrame">个人会员</a></li>
                </ul>
            </li>
            <li class="title">
                <span>项目管理 <i class="down"></i></span>
                <ul class="in-sidebar">
                    <li><a href="<?php  echo    site_url("Wanhuu_project/index") ;?>" target="menuFrame">众筹项目</a></li>
                </ul>
            </li>
            <li class="title">
                <span>资金管理 <i class="down"></i></span>
                <ul class="in-sidebar">
                    <li><a href="<?php echo site_url('Wanhuu_capital/index') ;?>"   target="menuFrame">提现记录</a></li>
                    <li><a href="<?php echo site_url('Wanhuu_capital/submit') ;?>"  target="menuFrame">退款记录</a></li>
                    <li><a href="<?php echo site_url('Wanhuu_capital/redeem') ;?>"  target="menuFrame">资金赎回</a></li>
                    <li><a href="<?php echo site_url('Wanhuu_capital/rebate') ;?>"  target="menuFrame">活动返利</a></li>
                </ul>
            </li>
            <li class="title">
                <span>短信 <i class="down"></i></span>
                <ul class="in-sidebar">
                    <li><a href="<?php  echo  site_url('Wanhuu_message/mail') ;?>"    target="menuFrame">邮件</a></li>
                    <li><a href="<?php  echo  site_url('Wanhuu_message/index');?>"    target="menuFrame">短信</a></li>
                    <li><a href="<?php  echo  site_url('Wanhuu_message/station');?>"  target="menuFrame">站内信息</a></li>
                </ul>
            </li>
            <li class="title">
                <span>管理员管理 <i class="down"></i></span>
                <ul class="in-sidebar">
                    <li><a href="<?php  echo  site_url('Wanhuu_administeation/index');?>" target="menuFrame">管理列表</a></li>
                    <li><a href="<?php  echo  site_url('Wanhuu_administeation/role');?>"  target="menuFrame">角色管理</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<section class="Hui-article-box">
    <div class="Hui-article">
        <iframe scrolling="yes" frameborder="0" src="<?php  echo  site_url('Wanhuu_system/index');?>" name="menuFrame"></iframe>
    </div>
</section>
</body>
<script type="text/javascript" src="<?php echo  base_url('admin/js/jquery-1.12.4.js') ; ?>"></script>
<script type="text/javascript" src="<?php echo  base_url('admin/js/public.js') ; ?>"></script>
<script type="text/javascript" src="<?php echo  base_url('admin/js/add_delete.js') ; ?>"></script>
<script>
    $(function(){
        $(".title span").click(function(){
            $(this).siblings('.in-sidebar').slideToggle().parents('.title').siblings().children('.in-sidebar').slideUp();
            $(this).children('i').toggleClass('up');
            $(this).parents('.title').siblings().children('span').children('.down').removeClass('up');
        });
        $('.in-sidebar li a').click(function(){
            $(this).parent().addClass('active').siblings('.active').removeClass('active');
            $(this).parents('.title').siblings().children('.in-sidebar').children().removeClass('active');
        });
    });
</script>
</html>