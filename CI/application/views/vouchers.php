<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<!-- IE 兼容模式 -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- 采用高速模式 暂时只支持360浏览器 -->
		<meta name="renderer" content="webkit">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
		<title>海投万户</title>
		<link rel="shortcut icon" href="<?php  echo base_url("static/images/favicon.ico") ?>">
		<link href="<?php  echo base_url("static/plugins/bootstrap-3.3.0/css/bootstrap.min.css") ?>" rel="stylesheet">
		<link rel="stylesheet" href="<?php  echo base_url("static/css/public.css") ?>">
		<style type="text/css">
			#main img {
				width: 100%;
			}
		</style>
		<!--[if lt IE 9]>
    	<script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    	<script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	</head>
	<body>
		<!-- 页头 START -->
		<div id="header">
			<!--#include file="include/header.php" -->
			<?php  require_once("static/include/header.php") ;?>
		</div>
		<!-- 页头 END -->
		<!-- 主体 START -->
		<div id="main">
			<div class="container-fluid">
				<img src="<?php  echo base_url("static/images/vouchers.png"); ?>" alt="" class="img-responsive"/>
			</div>
		</div>
		<!-- 主体 END -->
		<!-- 页脚部分 START -->
		<div id="foot" class="visible-md visible-lg">
			<!--#include file="" -->
			<?php  require_once("static/include/part.php") ;?>
		</div>
		<!-- 页脚部分 END -->
		<!-- 页脚 START -->
		<div id="footer">
			<!--#include file="" -->
			re  <?php  require_once("static/include/footer.php") ;?>
		</div>
		<!-- 页脚 END -->
		<!-- 返回顶部 -->
		<a href="javascript:;" id="return_top" class="return_top" title="回到顶部"></a>
		<script src="<?php  echo base_url("static/plugins/jquery-2.1.4.min.js") ?>"></script>
		<script src="<?php  echo base_url("static/plugins/bootstrap-3.3.0/js/bootstrap.min.js") ?>"></script>
		<script src="<?php echo base_url("static/js/public.js") ;?>"></script>
	</body>
</html>
