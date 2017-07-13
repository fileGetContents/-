<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>众筹</title>
    <link href="<?php echo base_url('static/css/bootstrap.min.css');?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url("static/css/homePage.css"); ?>">
    <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
</head>
<body>
<!-- 导航条 -->
<div class="header">
    <div class="container">
        <a href="#">
            <img src="<?php echo base_url('static/images/logo.png')?>" alt="">
        </a>
        <ul class="shouye_list">
            <li>
                <a href="#">首页</a>
            </li>
            <li>
                <a href="#">投资项目</a>
            </li>
            <li>
                <a href="#">用户指南</a>
            </li>
        </ul>
        <div class="demo_rigister">
            <?php
               if(!isset($_SESSION["user_phone"])){
                   echo "<a href='http://localhost/0111/index.php/User/index'>登录</a>";
                   echo "<a href='http://localhost/0111/index.php/Registered/index'>注册</a>";
               }else{
                   echo "<a  class='welcome'>欢迎你，".$_SESSION["user_phone"]."</a>";
               }

             ?>
        </div>
    </div>
</div>
<!-- 轮播图 -->
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <a><img src="<?php echo base_url('static/images/02.png');?>" class="img-responsive" alt=""></a>
        </div>
        <div class="item">
            <a><img src="<?php echo base_url('static/images/02.png');?>" class="img-responsive" alt=""></a>
        </div>
        <div class="item">
            <a><img src="<?php echo base_url('static/images/02.png');?>" class="img-responsive" alt=""></a>
        </div>
    </div>
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <img class="forward img-responsive" src="<?php echo base_url('static/img/switch_left.png');?>" alt="">
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <img class="successively img-responsive" src="<?php echo base_url('static/img/switch_right.png');?>" alt="">
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- 主体 -->
<div class="container">
    <!-- 投资产品 -->
    <div class="row">
        <h1 class="text-center">投资产品</h1>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="thumbnail logv_reove">
                <div class="rilegou">
                    <img class="img-responsive blur" src="<?php echo base_url('static/img/1_03.png');?>" alt="...">
                    <div class="years text-center">
                        <p>年华22%</p>
                        <h1>美国日了狗</h1>
                    </div>
                    <a href="#" class="zhezhaoce"></a>
                </div>
                <div class="progress">
                    <div class="progress-bar  progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                        60%
                    </div>
                </div>
                <div class="caption">
                    <p class="clearfix">
                        <span class="pull-left">每份￥1.00万</span>
                        <span class="pull-right">已有13人预约</span>
                    </p>
                    <p class="clearfix">
                        <span class="pull-left">总筹￥200万</span>
                        <span class="pull-right">剩余时间26天</span>
                    </p>
                </div>
            </div>
        </div>


        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="thumbnail logv_reove">
                <div class="rilegou">
                    <img class="img-responsive blur" src="<?php echo base_url('static/img/1_03.png');?>" alt="...">
                    <div class="years text-center">
                        <p>年华22%</p>
                        <h1>美国日了狗</h1>
                    </div>
                    <a href="#" class="zhezhaoce"></a>
                </div>
                <div class="progress">
                    <div class="progress-bar  progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                        60%
                    </div>
                </div>
                <div class="caption">
                    <p class="clearfix">
                        <span class="pull-left">每份￥1.00万</span>
                        <span class="pull-right">已有13人预约</span>
                    </p>
                    <p class="clearfix">
                        <span class="pull-left">总筹￥200万</span>
                        <span class="pull-right">剩余时间26天</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="thumbnail logv_reove">
                <div class="rilegou">
                    <img class="img-responsive blur" src="<?php echo base_url('static/img/1_03.png');?>" alt="...">
                    <div class="years text-center">
                        <p>年华22%</p>
                        <h1>美国日了狗</h1>
                    </div>
                    <a href="#" class="zhezhaoce"></a>
                </div>
                <div class="progress">
                    <div class="progress-bar  progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                        60%
                    </div>
                </div>
                <div class="caption">
                    <p class="clearfix">
                        <span class="pull-left">每份￥1.00万</span>
                        <span class="pull-right">已有13人预约</span>
                    </p>
                    <p class="clearfix">
                        <span class="pull-left">总筹￥200万</span>
                        <span class="pull-right">剩余时间26天</span>
                    </p>
                </div>
            </div>
        </div>
        <button class="btn btn-warning center-block">了解更多</button>
    </div>
    <!-- 流程图 -->
    <div class="row">
        <h1 class="text-center">流程图</h1>
        <ul class="list-inline">
            <li class="text-center baifen">
                <img class="img-responsive center-block" src="<?php echo base_url('static/img/4-1.png');?>" alt="">
                <p>选择项目</p>
            </li>
            <li class="text-center baifen">
                <img class="img-responsive center-block" src="<?php echo base_url('static/img/4-2.png');?>" alt="">
                <p>选择项目</p>
            </li>
            <li class="text-center baifen">
                <img class="img-responsive center-block" src="<?php echo base_url('static/img/4-3.png');?>" alt="">
                <p>选择项目</p>
            </li>
            <li class="text-center baifen">
                <img class="img-responsive center-block" src="<?php echo base_url('static/img/4-4.png');?>" alt="">
                <p>选择项目</p>
            </li>
            <li class="text-center baifen">
                <img class="img-responsive center-block" src="<?php echo base_url('static/img/4-5.png');?>" alt="">
                <p>选择项目</p>
            </li>
        </ul>
    </div>
    <!-- 已处置 -->
    <div class="row">
        <h1 class="text-center">已处置，用过的用户都说好</h1>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="thumbnail logv_reove">
                <div class="rilegou">
                    <img class="img-responsive blur" src="<?php echo base_url('static/img/1_03.png');?>" alt="...">
                    <div class="years text-center">
                        <p>年华22%</p>
                        <h1>美国日了狗</h1>
                    </div>
                    <a href="#" class="zhezhaoce"></a>
                </div>
                <div class="caption">
                    <p class="clearfix">
                        <span class="pull-left">每份￥1.00万</span>
                        <span class="pull-right">已有13人预约</span>
                    </p>
                    <p class="clearfix">
                        <span class="pull-left">总筹￥200万</span>
                        <span class="pull-right">已完成100%</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="thumbnail logv_reove">
                <div class="rilegou">
                    <img class="img-responsive blur" src="<?php echo base_url('static/img/1_03.png');?>" alt="...">
                    <div class="years text-center">
                        <p>年华22%</p>
                        <h1>美国日了狗</h1>
                    </div>
                    <a href="#" class="zhezhaoce"></a>
                </div>
                <div class="caption">
                    <p class="clearfix">
                        <span class="pull-left">每份￥1.00万</span>
                        <span class="pull-right">已有13人预约</span>
                    </p>
                    <p class="clearfix">
                        <span class="pull-left">总筹￥200万</span>
                        <span class="pull-right">已完成100%</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="thumbnail logv_reove">
                <div class="rilegou">
                    <img class="img-responsive blur" src="<?php echo base_url('static/img/1_03.png');?>" alt="...">
                    <div class="years text-center">
                        <p>年华22%</p>
                        <h1>美国日了狗</h1>
                    </div>
                    <a href="#" class="zhezhaoce"></a>
                </div>
                <div class="caption">
                    <p class="clearfix">
                        <span class="pull-left">每份￥1.00万</span>
                        <span class="pull-right">已有13人预约</span>
                    </p>
                    <p class="clearfix">
                        <span class="pull-left">总筹￥200万</span>
                        <span class="pull-right">已完成100%</span>
                    </p>
                </div>
            </div>
        </div>
        <button class="btn btn-warning center-block">了解更多</button>
    </div>
    <!-- 合作伙伴 -->
    <div class="row">

    </div>
</div>
<!-- 尾部 -->
<footer>
    <div class="footer_bottom">
        <p>COPYRIGHT    &copy; 1998 - 2016 KONGZHONG ALL 空中网版权所有</p>
        <p>京ICP证020001号 京网文[2011]0267-160号 经营许可证编号:B2-20090197</p>
        <p><a href="#">关于我们</a><a href="#">联系我们</a></p>
    </div>
</footer>
<script src="<?php echo base_url('static/js/jquery-3.1.0.min.js');?>"></script>
<script src="<?php echo base_url('static/js/bootstrap.min.js');?>"></script>
</body>
</html>