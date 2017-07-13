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
    <link rel="shortcut icon" href="<?php echo  base_url("static/images/favicon.ico") ;?>">
    <link href="<?php  echo base_url("static/plugins/bootstrap-3.3.0/css/bootstrap.min.css") ;?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url("static/css/public.css") ;?>">
    <link rel="stylesheet" href="<?php echo base_url("static/css/newProject.css") ;?>">
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
    <div class="container product">
        <div class="row">

            <?php      foreach($data as $value){    ?>
            <div class="col-md-4">
                <div class="thumbnail">
                    <a href="newDetails.shtml"><img class="img-responsive" src="<?php echo base_url($value['project_images']) ; ?>" alt=""> </a>
                    <div class="cmd_touzi">
                        <h1><?php echo $value['project_withdrawal']  ;?>%</h1>
                       <p><?php echo  $value['project_introduce']; ?></p>
                        <p class="font_size"><a href="newDetails.shtml"><?php echo $value['project_name'] ;?></a></p>
                    </div>
                </div>
            </div>
            <?php  }  ?>

        </div>
        <!-- 分页 -->
        <div class="paging_tion">
            <?php  echo    $this->pagination->create_links(); ?>
        </div>
    </div>
</div>
<!-- 主体 END -->

<!-- 页脚部分 START -->
<div id="foot" class="visible-md visible-lg">
    <?php require_once ("static/include/part.php");?>
</div>
<!-- 页脚部分 END -->

<!-- 页脚 START -->
<div id="footer">
    <?php  require_once ("static/include/footer.php");?>
</div>
<!-- 页脚 END -->



<script src="<?php  echo base_url("static/plugins/jquery-2.1.4.min.js") ;?>"></script>
<script src="<?php  echo base_url("static/plugins/bootstrap-3.3.0/js/bootstrap.min.js") ;?>"></script>
<script src="<?php  echo base_url("static/js/public.js") ;?>"></script>
</body>
</html>
