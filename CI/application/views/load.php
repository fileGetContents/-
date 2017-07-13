<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- IE 兼容模式 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- 采用高速模式 暂时只支持360浏览器 -->
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>海投万户-签约</title>
    <meta name="Keywords" content="海外房地产,海外资产配置,地产众筹,众筹,收益权,收益权众筹,固定回报,投资理财,美国,纽约,美国地产,公寓,酒店,独栋,别墅,haitouwanhu,万户,海投万户,海投萬户">
    <meta name="description" content="海投万户、海投萬户是以国内投资者的视角，主要针对海外房地产收益权投资的金融平台。专注海外地产市场的旧屋改造和固定收益类项目。打造国内投资者对全球资产投资的新型众筹平台。">
    <link rel="shortcut icon" href="<?php echo base_url("static/images/favicon.ico");?>">
    <link href="<?php echo base_url("static/plugins/bootstrap-3.3.0/css/bootstrap.min.css"); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url("static/css/public.css") ;?>">
    <link rel="stylesheet" href="<?php echo base_url("static/css/sign.css") ;?>">
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>

    </style>
</head>
<body>
<!--签署合同方式-->
<form   action="<?php   echo  site_url('Pay/signWay') ; ?>"   method="post">
<div class="container">
    <iframe  id="iframeId" name="iframeId" marginwidth="0" marginheight="0" frameborder="0" scrolling="auto"  width="100%" height="500px" src="<?php echo base_url().$con; ?>"></iframe>
    <div class="clearfix" style="background:#BCD7E6;">
        <div class="fl signing_input">
            <span class="signing_input_span" >状态：<i id="ding">订单正在处理中...</i></span>
        </div>
        <div class="fr signing_input">
                <input type="submit" value="自动签署" onclick="return  sign()" class="sub"/>
                <input type="text"   name="pag"  hidden="hidden" value="1"/>
        </div>
    </div>
</div>
</form>
<script src="<?php echo base_url("static/plugins/jquery-2.1.4.min.js");?>"></script>
<script src="<?php  echo base_url("static/js/sign.js") ;?>"></script>
<script type="text/javascript">
    function ajax_biao(){
        var span_text = $("#input_span").html();
        var input_color = $(".sub");
        if(span_text!='已完成'){
            $.ajax({
                type : "post",
                url :"<?php echo  site_url('pay/sign_ok') ?>",
                data : "digital=<?php echo $digital;  ?>&projcet_id=<?php echo $project_id; ?>",
                dataType:'json',
                success:function(dates){
                    if(dates==1){
                        span_text = $(".signing_input > span.signing_input_span > i").html("已经完成");
                        $(".signing_input > input").css({
                            cursor:'pointer',
                            background: '#FFA61E'
                        });
                        clearInterval(a);  //停止循环
                    }else{
                    }

                },
                error: function() {
                }
            });
        }
    }
    var a=setInterval(function(){ajax_biao()},1000);
    function sign(){
        var  ding=$("#ding").html();
        if(ding=="已经完成"){
            return true
        }else{
            return false
        }
    }
</script>
<!-- 返回顶部 -->
<a href="javascript:;" id="return_top" class="return_top" title="回到顶部"></a>
<script type="text/javascript"  src="<?php echo base_url('static/js/public.js') ;?>"></script>
</body>
</html>