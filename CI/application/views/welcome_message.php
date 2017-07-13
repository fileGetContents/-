<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- IE 兼容模式 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- 采用高速模式 暂时只支持360浏览器 -->
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>海投万户-最佳的境外投资选择</title>
    <meta name="Keywords" content="海外房地产,海外资产配置,地产众筹,众筹,收益权,收益权众筹,固定回报,投资理财,美国,纽约,美国地产,公寓,酒店,独栋,别墅,haitouwanhu,万户,海投万户,海投萬户">
    <meta name="description" content="海投万户、海投萬户是以国内投资者的视角，主要针对海外房地产收益权投资的金融平台。专注海外地产市场的旧屋改造和固定收益类项目。打造国内投资者对全球资产投资的新型众筹平台。">
    <link rel="shortcut icon" href="static/images/favicon.ico"/>
    <link href="static/plugins/bootstrap-3.3.0/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="static/css/public.css"/>
    <link rel="stylesheet" href="static/css/index.css"/>
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- 页头 START -->
<div id="header">
    <?php   require_once("static/include/header.php") ;?>
</div>
<!-- 页头 END -->

<!-- 主体 START -->
<div id="main">
    <div class="container-fluid">
        <div class="banner_chart">
            <a href="#"><img src="static/images/banner.png" class="img-responsive" alt=""></a>
        </div>
        <div class="banner_text hidden-xs">
            <div class="container now_purchase">
                <div class="pull-left">
                    <span>WE INSURE THE BEST SERVICE & FULL HELP</span>
                    <p>我们为你提供最好的服务和帮助</p>
                </div>
                <a href="http://www.haitouwanhu.com/Dome/index" class="pull-right">现在购买</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="ist_product">
            <h2>投资产品</h2>
            <span>这是一个开启你财富之门的网站<br>海投万户房产投资众筹平台</span>
        </div>
        <div class="row product">
            <?php  if(!empty($complete)) {
                foreach($complete as $value){?>
            <div class="col-md-4">
                <div class="thumbnail">
                    <a href="<?php echo  site_url('Project/index') ?>?id=<?php echo  $value['project_id'];?>">
                        <img class="img-responsive" src="<?php    echo $value['project_images'];?>" alt="">
                    </a>
                    <div class="pgss_time">结束时间：<span><?php  echo  $value['project_time_over'] ;?></span></div>
                    <div class="pgss">
                        <div class="pgss_bar" style="width:<?php  echo $value['progress']; ?>%;">
                            <span> <?php  echo $value['progress']; ?>%</span>
                        </div>
                    </div>
                    <div class="pgss_name"><a href="<?php echo  site_url('Project/index') ?>?id=<?php echo  $value['project_id'];?>"><?php  echo  $value['project_name'];?></a></div>
                    <div class="caption_host clearfix">
                        <ul>
                            <li>
                                <p>目标金额</p>
                                <p>&yen;<?php echo $value['project_money_all'] ;?></p>
                            </li>
                            <li>
                                <p>剩余天数</p>
                                <p><?php  echo  $value["time"]; ?>天</p>
                            </li>
                            <li>
                                <p>收益周期</p>
                                <p><?php  echo $value["project_cycle"];?></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php }
            }
            ?>

        </div>
        <div class="ist_product">
            <a href="<?php echo base_url('Dome/index') ;?>">查看更多</a>
        </div>
    </div>
    <div class="container-fluid success">
        <div class="container">
            <div class="ist_product">
                <h3>成功案例</h3>
                <span>未来投资谁才是财富家，海外房产投资众筹平台</span>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="scs_case faangzi">
                        <span><?php echo $project_all ; ?></span>
                        <p>项目数</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="scs_case">
                        <span><?php  echo  $project_meny; ?></span>
                        <p>项目总额</p>
                    </div>
                </div>
            </div>
            <div class="project visible-lg">
                <span>选择项目</span>
                <span>预约项目</span>
                <span>进行购买</span>
                <span>签署协议</span>
                <span>实现收益</span>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="ist_product">
            <h2>成功项目展示</h2>
        </div>
        <div class="row product">



            <?php  foreach($unfinished as $value_a){  ?>
            <div class="col-md-4">
                <div class="thumbnail">
                    <a href="<?php echo  site_url('Project/index') ?>?id=<?php echo  $value_a['project_id'];?>">
                        <img class="img-responsive" src="<?php   echo $value_a['project_images'];?>" alt="">
                    </a>
                    <div class="pgss_time">结束时间：<span><?php echo  $value_a['project_time_over'] ;?></span></div>
                    <div class="pgss">
                        <div class="pgss_bar" style="width:100%;">
                            <span>100%</span>
                        </div>
                    </div>
                    <div class="pgss_name"><a href="<?php echo  site_url('Project/index') ?>?id=<?php echo  $value_a['project_id'];?>"><?php  echo  $value_a['project_name'];?></a></div>
                    <div class="caption_host clearfix">
                        <ul>
                            <li>
                                <p>目标金额</p>
                                <p>&yen;<?php  echo  $value_a['project_money_all']; ?></p>
                            </li>
                            <li>
                                <p>年化收益</p>
                                <p>最高<?php echo $value_a['gear_earning']; ?></p>
                            </li>
                            <li>
                                <p>收益周期</p>
                                <p><?php   echo   $value_a["project_cycle"];?></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="ist_product">
            <a href="<?php echo site_url('Dome/index') ;?>">查看更多</a>
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
   <?php include_once("static/include/footer.php")  ;?>
</div>
<!-- 页脚 END -->
<!-- 返回顶部 -->
<a href="javascript:;" id="return_top" class="return_top" title="回到顶部"></a>
<script src="static/plugins/jquery-2.1.4.min.js"></script>
<script src="static/plugins/bootstrap-3.3.0/js/bootstrap.min.js"></script>
<script  src="static/js/public.js" ></script>
</body>
</html>