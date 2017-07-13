<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- IE 兼容模式 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- 采用高速模式 暂时只支持360浏览器 -->
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>海投万户</title>
    <link rel="shortcut icon" href="<?php  echo base_url("static/images/favicon.ico") ;?>">
    <link href="<?php  echo base_url("static/plugins/bootstrap-3.3.0/css/bootstrap.min.css") ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url("static/plugins/swiper/css/swiper.min.css") ;?>">
    <link rel="stylesheet" href="<?php  echo base_url("static/css/public.css" );?>">
    <link rel="stylesheet" href="<?php  echo base_url("static/css/newDetails.css"); ?>">
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- 页头 START -->
<div id="header">
    <?php require_once ("static/include/header.php")?>
</div>
<!-- 页头 END -->

<!-- 主体 START -->
<div id="main">
    <div class="container dts_list">
        <div class="size_h1">
            <h1><?php echo $project_name; ?></h1>
            <p><?php echo $project_introduce; ?></p>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><img src="<?php  echo base_url($project_images1) ;?>" alt="" class="img-responsive"></div>
                        <div class="swiper-slide"><img src="<?php  echo base_url($project_images2) ;?>" alt="" class="img-responsive"></div>
                        <div class="swiper-slide"><img src="<?php  echo base_url($project_images3) ;?>" alt="" class="img-responsive"></div>
                        <div class="swiper-slide"><img src="<?php  echo base_url($project_images4) ;?>" alt="" class="img-responsive"></div>
                        <div class="swiper-slide"><img src="<?php  echo base_url($project_images5) ;?>" alt="" class="img-responsive"></div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next hidden-xs"></div>
                    <div class="swiper-button-prev hidden-xs"></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dts_table">
                    <p class="price"><i>$</i><?php  echo $project_money_all ;?><sub>/份</sub></p>
                    <div class="pure-g clearfix">
                        <div class="pure-u-1-2">年化收益率<p>23<sub>%</sub></p></div>
                        <div class="pure-u-1-2">投资期限<p><?php echo $project_cycle; ?></p></div>
                    </div>
                    <div class="pure-gn clearfix">
                        <div class="pure-u-1-2">
                            <img src="<?php  echo base_url("static/images/WeChatcustomerservice.png") ;?>" alt="" />
                            <p>微信客服</p>
                        </div>
                        <div class="pure-u-1-2"><img src="<?php echo base_url("static/images/WeChatpublic.png") ;?>" alt="" />
                            <p>微信公众号</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="property-items">
                    <div class="property-title">
                        <span class="title">项目概述</span>
                    </div>
                    <div class="des-content">
                        <div class="table-responsive">
                            <table class="pure-table table table-striped">
                                <tbody>
                                <tr class="pure-table-odd">
                                    <td class="name">项目地址</td>
                                    <td colspan="3"><?php echo $project_introduce; ?></td>
                                </tr>
                                <tr>
                                    <td class="name">项目面积</td>
                                    <td><?php echo $project_introduction; ?></td>
                                    <td class="name">项目总投资</td>
                                    <td>$ <?php  echo $project_money_all2 ;?></td>
                                </tr>

                                <tr class="pure-table-odd">
                                    <td class="name">预期总收益</td>
                                    <td><?php echo $project_data; ?>%</td>
                                    <td class="name">预期利润</td>
                                    <td>$<?php echo $project_subscribe; ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="property-items">
                    <div class="property-title">
                        <span class="title">产品信息</span>
                    </div>
                    <div class="des-content">
                        <div class="table-responsive">
                            <table class="pure-table table table-striped">
                                <tbody>
                                <tr>
                                    <td class="name">项目名称</td>
                                    <td colspan="3"><?php echo $project_name; ?></td>
                                </tr>
                                <tr>
                                    <td class="name">起买金额</td>
                                    <td>$<?php echo  $project_money_all2 ?></td>
                                    <td class="name" >投资期限 </td>
                                    <td><?php echo $project_time_over;  ?></td>
                                </tr>
                                <tr>
                                    <td class="name">年华收益率</td>
                                    <td><?php echo $project_withdrawal;  ?>%</td>
                                    <td class="name">投资收益</td>
                                    <td><?php echo $project_way; ?></td>
                                </tr>
                                <tr>
                                    <td class="name">计息时间</td>
                                    <td>T+3日</td>
                                    <td class="name">到期时间</td>
                                    <td>T+<?php echo  $project_cycle;  ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="property-items">
                    <div class="property-title">
                        <span class="title">项目方</span>
                    </div>
                    <div class="des-content">
                        <p><?php echo $project_party; ?></p>
                    </div>
                </div>
                <div class="property-items">
                    <div class="property-title">
                        <span class="title">地理信息</span>
                    </div>
                    <div class="des-content">
                        <img src="<?php echo base_url($project_logo) ?>" alt="" />
                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="price_pje dts_table">
                    <h4>项目合同</h4>
                    <div>
                        <?php foreach($data_project as $value){
                         echo   $value['data_name'] .'<a href="'.base_url($value['data_src']). '" target="_blank">查看</a><br>';
                        } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 主体 END -->

<!-- 页脚部分 START -->
<div id="foot" class="visible-md visible-lg">
    <?php require_once ("static/include/part.php") ; ?>
</div>
<!-- 页脚部分 END -->

<!-- 页脚 START -->
<div id="footer">
    <?php  require_once ("static/include/footer.php");?>
</div>
<!-- 页脚 END -->



<script src="<?php echo base_url("static/plugins/jquery-2.1.4.min.js"); ?>"></script>
<script src="<?php echo base_url("static/plugins/bootstrap-3.3.0/js/bootstrap.min.js");?>"></script>
<script src="<?php echo base_url("static/plugins/swiper/js/swiper.min.js") ;?>"></script>
<script src="<?php echo base_url("static/js/details.js"); ?>"></script>
<script src="<?php echo base_url("static/js/public.js") ;?>"></script>
</body>
</html>