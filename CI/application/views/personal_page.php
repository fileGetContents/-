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
    <meta name="Keywords" content="海外房地产,海外资产配置,地产众筹,众筹,收益权,收益权众筹,固定回报,投资理财,美国,纽约,美国地产,公寓,酒店,独栋,别墅,haitouwanhu,万户,海投万户,海投萬户">
    <meta name="description" content="海投万户、海投萬户是以国内投资者的视角，主要针对海外房地产收益权投资的金融平台。专注海外地产市场的旧屋改造和固定收益类项目。打造国内投资者对全球资产投资的新型众筹平台。">
    <link rel="shortcut icon" href="<?php echo   base_url('static/images/favicon.ico') ;?>"/>
    <link href="<?php  echo base_url('static/plugins/bootstrap-3.3.0/css/bootstrap.min.css') ;?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('static/plugins/swiper/css/swiper.min.css') ;?>"/>
    <link rel="stylesheet" href="<?php echo base_url('static/css/public.css') ;?>"/>
    <link rel="stylesheet" href="<?php echo base_url('static/css/userCore.css');?>"/>
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body style="padding:0;">
<div  id="main">
<!-- 已支付 -->
    <div class="no_payment my_tab" style="margin-top: 0;">
        <h3>已支付项目</h3>
        <div class="table-responsive">
            <table class="table tbe_payment">
                <thead>
                    <tr>
                        <th>项目名称</th>
                        <th>投资时间</th>
                        <th>投资金额</th>
                        <th>合同</th>
                        <th>状态</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($page as $value){ ?>

                    <tr>
                        <td><?php echo $value['project_name'] ; ?><span  style="display: none;"><?php echo $value['associated_order'] ?></span></td>
                        <td><?php echo $value['associated_time']; ?></td>
                        <td class="money">&yen;<?php echo $value['money'] ; ?>.00</td>


                        <?php  if($value['project_id']==1484793659)  {?>
                            <td>完成</td>
                            <td>完成</td>
                       <?php  }else{?>
                            <td><?php echo $value['contract'] ;?></td>
                            <td><?php echo $value['condition'] ;?></td>
                      <?php  } ?>




                    </tr>
                    <?php }  ?>
                </tbody>
            </table>
        </div>
        <!-- 分页 -->
        <div class="paging_tion">
            <?php  echo    $this->pagination->create_links(); ?>
        </div>
    </div>
</div>
<!-- 返回顶部 -->
<a href="javascript:;" id="return_top" class="return_top" title="回到顶部"></a>
<script src="<?php echo base_url('static/plugins/jquery-2.1.4.min.js') ; ?>"></script>
<script>
    $(function(){
        var h = $("#main").height()+20;
        $('#iframe',parent.document).height(h);
    });
</script>
</body>
</html>