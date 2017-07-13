<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="http://www.haitouwanhu.com/">
				<img src="<?php  echo base_url('static/images/logo.png')  ;?>" alt="">
			</a>


		<ul class=" <?php  if(isset($_SESSION['user_phone'])){echo  "hide";} ?> signin  visible-xs">
			<li><a href="<?php echo site_url('User/index');?>">登录</a></li>
			<li><a href="<?php echo site_url('Registered/index') ;?>">注册</a></li>
		</ul>


		<div class="<?php  if(!isset($_SESSION['user_phone'])){echo  "hide";} ?>  signin visible-xs gr_zx">
			<a href="<?php echo  site_url('Personal/index') ;?>" class="<?php  if(isset($_SESSION['message'])){echo 1111;}?>"><?php  if(isset($_SESSION['user_phone'])){echo  $_SESSION['user_phone'];} ?> </a>
			<a href="<?php echo site_url("User/sessionD") ?>">注销</a>
		</div>
	</div>




	<ul class=" <?php  if(isset($_SESSION['user_phone'])){echo  "hide";} ?> signin visible-lg visible-md visible-sm">
		<li><a href="<?php echo site_url('User/index') ;?>">登录</a></li>
		<li><a href="<?php echo site_url('Registered/index') ;?>">注册</a></li>
	</ul>
	<div class="<?php  if(!isset($_SESSION['user_phone'])){echo  "hide";} ?> signin gr_zx visible-lg visible-md visible-sm">
		<a href="<?php echo  site_url('Personal/index') ;?>" class="<?php  if(isset($_SESSION['message'])){echo $_SESSION['message'];}?>"><?php  if(isset($_SESSION['user_phone'])){echo  $_SESSION['user_phone'];} ?></a>
		<a href="<?php echo  site_url("User/sessionD") ; ?>">注销</a>
	</div>
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<div class="col-md-offset-4">
				<ul class="nav_host capsule">
					<li><a href="<?php  echo site_url();?>">首页</a></li>
					<li><a href="<?php  echo site_url('Dome/index');?>">众筹项目</a></li>
					<li><a href="<?php  echo site_url('Dome/investment') ;?>">投资项目</a></li>
					<li  class="visible-lg visible-md" ><a href="<?php  echo site_url('Aboutus/initiator') ;?>">发起众筹</a></li>
					<li  class="visible-lg visible-md"><a href="<?php  echo site_url('User/userGuide');?>">用户指南</a></li>
					<li><a href="<?php  echo site_url('Aboutus/index');?>">关于我们</a></li>
				</ul>
			</div>
		</div>
	</div>
</nav>
