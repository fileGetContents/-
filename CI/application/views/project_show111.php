<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- IE 兼容模式 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- 采用高速模式 暂时只支持360浏览器 -->
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>海投万户-<?php echo $project_name; ?></title>
    <meta name="Keywords" content="海外房地产,海外资产配置,地产众筹,众筹,收益权,收益权众筹,固定回报,投资理财,美国,纽约,美国地产,公寓,酒店,独栋,别墅,haitouwanhu,万户,海投万户,海投萬户">
    <meta name="description" content="海投万户、海投萬户是以国内投资者的视角，主要针对海外房地产收益权投资的金融平台。专注海外地产市场的旧屋改造和固定收益类项目。打造国内投资者对全球资产投资的新型众筹平台。">
    <link rel="shortcut icon" href="<?php echo   base_url('static/images/favicon.ico') ;?>"/>
    <link href="<?php echo base_url("static/plugins/bootstrap-3.3.0/css/bootstrap.min.css");?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url("static/plugins/swiper/css/swiper.min.css") ;?>">
    <link rel="stylesheet" href="<?php echo base_url("static/css/public.css") ;?>">
    <link rel="stylesheet" href="<?php echo base_url("static/css/details.css");?>">
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- 页头 START -->
<div id="header">
    <!--#include file="include/header.php" -->
    <?php require_once ("static/include/header.php")?>
</div>
<!-- 页头 END -->

<!-- 主体 START -->
<div id="main">
    <div class="container-fluid">
        <div class="container dts_list">
            <div class="size_h1"><?php echo $project_name;?></div>
            <div class="row">
                <div class="col-md-8">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><img src="<?php  echo base_url($project_images1);?>" alt="" class="img-responsive"></div>
                            <div class="swiper-slide"><img src="<?php  echo base_url($project_images2);?>" alt="" class="img-responsive"></div>
                            <div class="swiper-slide"><img src="<?php  echo base_url($project_images3);?>" alt="" class="img-responsive"></div>
                            <div class="swiper-slide"><img src="<?php  echo base_url($project_images4);?>" alt="" class="img-responsive"></div>
                            <div class="swiper-slide"><img src="<?php  echo base_url($project_images5);?>" alt="" class="img-responsive"></div>
                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next hidden-xs"></div>
                        <div class="swiper-button-prev hidden-xs"></div>
                    </div>
                </div>
                <div class="col-md-4 dts_table">
                    <div class="row">
                        <div class="col-md-2">投资项目</div>
                        <div class="col-md-10">
                            <?php foreach($earning as $value){   ?>
                            <div class="he_sle">
                                <span><?php   echo   $value['gear_cycle'];  ?>个月期，年化<?php echo $value['gear_earning'] ; ?></span>
                                剩余<i><?php echo  $value['gear_copies']; ?></i>份</div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="dts_profit">
                        <div class="pft_1">收益方式 到期还本付息 | 固定收益</div>
                        <div>


                            <?php
                            if($project_tag==1){
                                echo  "正在进行";
                            }elseif($project_tag==0){
                                echo  "结束时间";
                            }elseif($project_tag==2){
                                echo   "即将开始";
                            }
                            ?>

                            <?php
                            if($project_tag==0){
                                echo $project_time_over;
                            }elseif($project_tag==1){
                                echo $project_time_over;
                            }elseif($project_tag==2){
                                echo $project_time_start;
                            }
                            ?>


                        </div>
                        <div>&yen;<?php echo $V_num; ?> / &yen;<?php   echo $project_money_all ; ?>

                            <?php
                            if($project_tag==1){
                                echo  "正在进行";
                            }elseif($project_tag==0){
                                echo  "已经结束";
                            }elseif($project_tag==2){
                                echo   "即将开始";
                            }
                            ?>
                        </div>
                    </div>
                    <?php  if(isset($_SESSION['user_phone'])){
                     echo  '<div class="dts_button  visible-lg   visible-md">'.$m .'</div>';
                    }else{?>
                            <div class="snInRgr">请&nbsp;<a href="<?php echo site_url('User/index') ; ?>">登录</a>&nbsp;或&nbsp;<a href="<?php echo site_url('Registered/index') ?>">注册</a>&nbsp;后进行购买</div>
                    <?php  }  ?>
                </div>
            </div>
        </div>
        <!-- 进度条 -->
        <div class="pgss">
            <div class="pgss_bar" style="width:<?php echo $V_progress; ?>%;">
                <span><?php echo $V_progress ;?>%</span>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="background:#000;">
        <!-- 二级菜单 -->
        <div class="container">
            <div class="subnav">
                <a href="#" class="active">简介</a>/
                <a href="#">项目方</a>/
                <a href="#">支持记录</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 subnav_list">
                <!-- 简介 -->
                <div class=" brief_introduction">
                    <?php  echo $project_introduce;?>
                </div>
                <!-- 项目方 -->
                <div class="brief_introduction">
                      <?php if(isset($_SESSION['user_phone'])){
                          echo $project_party;
                      }else{?>
                          <div class="snInRgr">请&nbsp;<a href="<?php echo site_url('User/index') ; ?>">登录</a>&nbsp;或&nbsp;<a href="<?php echo site_url('Registered/index') ?>">注册</a>&nbsp;后进行查看</div>
                      <?php }  ?>
                </div>
                <!-- 支持记录 -->
                <div class="support_record">
                    <div class="table-responsive">
                        <table class="table tbe_payment">
                            <thead>
                            <tr>
                                <th>用户名</th>
                                <th>金额</th>
                                <th>时间</th>
                                <th>状态</th>
                            </tr>
                            </thead>
                            <tbody>


                            <?php
                            if(isset($_SESSION['user_phone'])){
                                if(!empty($ass)){
                                    foreach($ass  as $value){
                                        ?>
                                        <tr>
                                            <td><?php echo $value["phone"];?></td>
                                            <td><?php echo $value["meny"] ;?></td>
                                            <td><?php echo $value["associated_time"];?></td>
                                            <td><?php echo $value["tag"];?></td>
                                        </tr>
                                        <?php
                                    }
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- 分页 -->
                    <?php if(!isset($_SESSION['user_phone'])){ ?>
                        <div class="snInRgr">请&nbsp;<a href="<?php echo site_url('User/index') ; ?>">登录</a>&nbsp;或&nbsp;<a href="<?php echo site_url('Registered/index'); ?>">注册</a>&nbsp;后进行查看</div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 主体 END -->

<!-- 页脚部分 START -->
<div id="foot" class="visible-md visible-lg">
    <!--#include file="include/part.php" -->
    <?php require_once ("static/include/part.php");  ?>
</div>
<!-- 页脚部分 END -->

<!-- 页脚 START -->
<div id="footer">
    <!--#include file="include/footer.php" -->
    <?php  require_once ("static/include/footer.php");?>
</div>
<!-- 页脚 END -->
<!-- 返回顶部 -->
<a href="javascript:;" id="return_top" class="return_top" title="回到顶部"></a>


<script src="<?php  echo base_url("static/plugins/jquery-2.1.4.min.js"); ?>"></script>
<script src="<?php  echo base_url("static/plugins/bootstrap-3.3.0/js/bootstrap.min.js") ;?>"></script>
<script src="<?php  echo base_url("static/plugins/swiper/js/swiper.min.js");?>"></script>
<script  src="<?php  echo base_url('static/js/public.js') ;?>" ></script>
<script src="<?php  echo base_url("static/js/details.js") ; ?>"></script>
</body>
</html>