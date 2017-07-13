<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- IE 兼容模式 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- 采用高速模式 暂时只支持360浏览器 -->
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>海投万户-投资项目</title>
    <meta name="Keywords" content="海外房地产,海外资产配置,地产众筹,众筹,收益权,收益权众筹,固定回报,投资理财,美国,纽约,美国地产,公寓,酒店,独栋,别墅,haitouwanhu,万户,海投万户,海投萬户">
    <meta name="description" content="海投万户、海投萬户是以国内投资者的视角，主要针对海外房地产收益权投资的金融平台。专注海外地产市场的旧屋改造和固定收益类项目。打造国内投资者对全球资产投资的新型众筹平台。">
    <link rel="shortcut icon" href="<?php echo   base_url('static/images/favicon.ico') ;?>"/>
    <link href="<?php  echo  base_url('static/plugins/bootstrap-3.3.0/css/bootstrap.min.css') ;?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('static/css/public.css') ;?>">
    <link rel="stylesheet" href="<?php echo base_url('static/css/project-list.css') ;?>">
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- 页头 START -->
<div id="header">
    <?php   include_once("static/include/header.php") ;?>
</div>
<!-- 页头 END -->

<!-- 主体 START -->
<div id="main">
    <div class="container-fluid ctr_bgd">
        <div class="ist_product">
            <h2>众筹项目</h2>
        </div>
        <div class="nav_product">
            <a href="<?php echo site_url('Dome/index');?>">全部项目</a><a href="<?php echo site_url('Dome/domeo');?>">筹集中</a><a href="<?php echo site_url('Dome/domew');?>">已完成</a><a href="<?php echo site_url('Dome/domef');?>"  class="active">预约中</a>
        </div>
    </div>
    <div class="container product">
        <div class="row">
            <?php
            foreach ($complete as $value){  ?>
                <div class="col-md-4">
                    <div class="thumbnail">
                        <a href="<?php echo  site_url('Project/index') ?>?id=<?php echo  $value['project_id'];?>">
                            <img class="img-responsive" src="<?php echo base_url($value['project_images']) ;?>" alt="">
                        </a>
                        <div class="pgss_time">
                            <?php
                            if($value['project_tag']==0){
                                echo  ' <div class="pgss_time pgss_yellow">众筹成功</div>';
                            }elseif($value['project_tag']==1){
                                echo  '结束时间：<span>'.$value['project_time_over'].'</span>';
                            }else{
                                echo  '开始时间：<span>'.$value['project_time_start'].'</span>';
                            }
                            ?>

                        </div>
                        <div class="pgss">
                            <div class="pgss_bar" style="width:<?php  echo $value['progress']; ?>%;">
                                <span><?php  echo $value['progress']; ?>%</span>
                            </div>
                        </div>
                        <div class="pgss_name"><a href="<?php echo  site_url('Project/index') ?>?id=<?php echo  $value['project_id'];?>"> <?php  echo  $value['project_name'];?></a></div>
                        <div class="caption_host clearfix">
                            <ul>
                                <li>
                                    <p>目标金额</p>
                                    <p>&yen;<?php echo $value['project_money_all'] ;?></p>
                                </li>
                                <li>
                                    <?php if($value['project_tag']==0){
                                        echo   "<p>最高年化</p>";
                                        echo   "<p>".$value["gear_earning"]."</p>";
                                    }else{
                                        echo    "<p>剩余天数</p>";
                                        echo     "<p>".$value["time"]."天</p>";
                                    }
                                    ?>
                                </li>
                                <li>
                                    <p>收益周期</p>
                                    <p><?php echo $value["project_cycle"]; ?></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php   }?>



            <!-- 分页 -->

        </div>
        <div class="paging_tion">
            <?php  echo    $this->pagination->create_links(); ?>
        </div>
    </div>
    <!-- 主体 END -->
</div>
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


    <script src="<?php echo base_url('static/plugins/jquery-2.1.4.min.js') ;?>"></script>
    <script src="<?php echo base_url('static/plugins/bootstrap-3.3.0/js/bootstrap.min.js'); ?>"></script>
    <script  src="<?php  echo base_url('static/js/public.js') ;?>" ></script>
</body>
</html>