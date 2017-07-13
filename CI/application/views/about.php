<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- IE 兼容模式 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- 采用高速模式 暂时只支持360浏览器 -->
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>海投万户-关于我们</title>
    <link rel="shortcut icon" href="<?php echo   base_url('static/images/favicon.ico') ;?>"/>
    <meta name="Keywords" content="海外房地产,海外资产配置,地产众筹,众筹,收益权,收益权众筹,固定回报,投资理财,美国,纽约,美国地产,公寓,酒店,独栋,别墅,haitouwanhu,万户,海投万户,海投萬户">
    <meta name="description" content="海投万户、海投萬户是以国内投资者的视角，主要针对海外房地产收益权投资的金融平台。专注海外地产市场的旧屋改造和固定收益类项目。打造国内投资者对全球资产投资的新型众筹平台。">
    <link href="<?php echo base_url("static/plugins/bootstrap-3.3.0/css/bootstrap.min.css");?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php  echo  base_url("static/css/public.css") ;?>" />
    <link rel="stylesheet" href="<?php  echo  base_url("static/css/aboutUs.css") ;?>"/>
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- 页头 START -->
<div id="header">
    <?php require_once("static/include/header.php"); ?>
</div>
<!-- 页头 END -->

<!-- 主体 START -->
<div id="main">
    <div class="container">
        <h1>关于我们 | About Us</h1>
        <!-- 公司简介 -->
        <div class="aboutus_gong">
            <p>海投万户是国内首创对境外房地产投资收益权的金融平台</p>
            <p>专注海外地产市场的旧屋改造及固定收益和风险收益项目</p>
            <p>打造国内普通投资者对全球资产投资配置的新型平台</p>
        </div>
    </div>
    <div style="margin-top:20px;"><img src="<?php  echo base_url('static/images/blue.png');?>" alt="" style="width:100%;"></div>
    <div class="container-fluid" style="background:#333;">
        <div class="container">
            <!-- 联系我们 -->
            <h1>联系我们</h1>
            <div class="row">
                <div class="col-md-4">
                    <div class="aboutus">
                        <h5>中国</h5>
                        <p>成都市高新区天府五街200号菁蓉国际广场4B-9楼</p>
                        <p>contact@haitouwanhu.com</p>
                        <h5>美国</h5>
                        <p  style="c">675 RIDGEWAY WHITE PLAINS,NY</p>
                        <p>info@haitouwanhu.com</p>
                    </div>
                </div>
                <div class="col-md-4 ta">
                    <img src="<?php  echo base_url('static/images/wechat.png');?>" alt="">
                    <img src="<?php  echo base_url('static/images/wechat-botton.png');?>" alt="">
                </div>
                <div class="col-md-4 ta">
                    <img src="<?php  echo base_url('static/images/weibo.png');?>" alt="">
                    <img src="<?php  echo base_url('static/images/weibo_botton.png') ;?>" alt="">
                </div>
            </div>
            <div style="margin:20px 0;"><img src="<?php  echo base_url('static/images/ditu_jia.png') ;?>" alt="" style="width:100%;"></div>
        </div>
    </div>
</div>
<!-- 主体 END -->

<!-- 页脚部分 START -->
<div id="foot" class="visible-md visible-lg">
    <?php require_once("static/include/part.php") ;?>
</div>
<!-- 页脚部分 END -->

<!-- 页脚 START -->
<div id="footer">
    <?php require_once("static/include/footer.php");?>
</div>
<!-- 返回顶部 -->
<a href="javascript:;" id="return_top" class="return_top" title="回到顶部"></a>
<!-- 页脚 END -->
<script src="<?php echo  base_url("static/plugins/jquery-2.1.4.min.js"); ?>"></script>
<script src="<?php echo  base_url('static/plugins/bootstrap-3.3.0/js/bootstrap.min.js') ;?>"></script>
<script type="text/javascript"  src="<?php echo base_url('static/js/public.js') ;?>"></script>
</body>
</html>