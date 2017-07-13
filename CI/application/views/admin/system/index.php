<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="<?php echo  base_url('admin/css/public.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo  base_url('admin/css/style.css'); ?>">
</head>
<body>
	<div id="system_total">
		<p class="clearfix total_p"><span style="float: left;">你好，<?php echo $_SESSION['admin'] ;?></span><span style="float: right;">你最后登录时间：<?php echo $admin_time; ?></span></p>
		<div class="clearfix" style="margin-top:20px;">
			<div class="systen_list">
				<p>会员</p>
				<ul>
					<li><span>会员认证：</span><b><?php echo $user_certification; ?></b></li>
					<li><span>会员未认证：</span><b><?php  echo $user_no_certification ;?></b></li>
					<li><span>投资用户：</span><b><?php echo $user_investment ;?></b></li>
					<li><span>会员总数：</span><b><?php echo $user_certification+$user_no_certification; ?></b></li>
				</ul>
			</div>
			<div class="systen_list">
				<p>项目统计</p>
				<ul>
					<li><span>上线项目数：</span><b><?php echo $pro_num;  ?></b></li>
					<li><span>成功项目数：</span><b><?php echo $pro_num_success; ;?></b></li>
					<li><span>项目总金额：</span><b><?php echo $pro_money; ?></b></li>
					<li><span>赎回项目天数：</span><b>剩余<?php echo $project_time; ?>天</b></li>
				</ul>
			</div>
			<div class="systen_list">
				<p>现金提现</p>
				<ul>
					<li><span>提现待审核：</span><b><?php echo   $cash_no ;?></b></li>
					<li><span>提现待确认：</span><b><?php echo   $cash_ok ;?></b></li>
				</ul>
			</div>
		</div>
		<p style="text-align: center;background: #BDDBEF;height:50px;line-height: 50px;margin-top:20px;"><?php echo   date("Y-m-d H:i:s");  ?>数据实时指标</p>
		<div class="clearfix" style="margin-top:20px;">
			<div class="systen_list">
				<p>昨日统计</p>
				<ul>
					<li><span>会员认证：</span><b><?php echo $user_certification; ?></b></li>
					<li><span>会员未认证：</span><b><?php  echo $user_no_certification ;?></b></li>
					<li><span>投资用户：</span><b><?php echo $yes_a_a;  ?></b></li>
					<li><span>会员总数：</span><b><?php echo $yes_member; ?></b></li>
				</ul>
			</div>
			<div class="systen_list">
				<p>项目统计</p>
				<ul>
					<li><span>上线项目数：</span><b><?php echo $yes_p_s; ?></b></li>
					<li><span>成功项目数：</span><b><?php echo $yes_p_e;?></b></li>
				</ul>
			</div>
			<div class="systen_list">
				<p>现金提现</p>
				<ul>
					<li><span>提现待审核：</span><b><?php echo $yes_cash_no; ?></b></li>
					<li><span>提现待确认：</span><b><?php echo $yes_cash_ok; ?></b></li>
				</ul>
			</div>
		</div>
	</div>
<script src="<?php echo  base_url('admin/js/jquery-1.12.4.js'); ?>"></script>
</body>
</html>