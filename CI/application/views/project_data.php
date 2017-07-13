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
    <link rel="shortcut icon" href="<?php  echo  base_url('static/images/favicon.ico');?>">
    <link href="<?php  echo   base_url('static/plugins/bootstrap-3.3.0/css/bootstrap.min.css')  ;?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php  echo   base_url('static/css/public.css');?> ">
    <style type="text/css">
        body{
            padding: 0;
        }
    </style>
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>

    </style>
</head>
<body>
<!--签署合同方式-->
<div class="container-fluid">
    <iframe  id="iframeId" name="iframeId" marginwidth="0" marginheight="0" frameborder="0" scrolling="auto"  width="100%" height="500px" src="<?php echo $data ?>"></iframe>
</div>

<script src="<?php  echo   base_url('static/plugins/jquery-2.1.4.min.js');?>"></script>
<script src="<?php  echo   base_url('static/js/public.js') ;?>"></script>
<script>
    var dct_height = $(window).height();
    $("#iframeId").css({
        "height": dct_height-5
    });
</script>
</body>
</html>