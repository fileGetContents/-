<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo  base_url('admin/css/public.css'); ?>">
	<link rel="stylesheet" href="<?php echo  base_url('admin/css/style.css'); ?>">
</head>
<body>
<div class="modal">
	<form action="<?php echo site_url("Wanhuu_capital/bianji")."/$id" ;?>" method="get">
	<table class="modal_form" cellpadding="0" cellspacing="0">
		<tbody>
			<tr>
				<td class="item_title">投资金额:</td>
				<td class="item_input">
					<input type="text"  id="each"  readonly="readonly"  value="<?php echo $gear_each; ?>">
				</td>
			</tr>
			<tr>
				<td class="item_title">汇率变动:</td>
				<td class="item_input">
					<input   name="change"  type="text"   id="change">
				</td>
			</tr>
			<tr>
				<td class="item_title">总额:</td>
				<td class="item_input">
					<input type="text"  id="all">
				</td>
			</tr>
			<tr>
				<td class="item_title"></td>
				<td class="item_submit item_fanhui">		
					<input type="submit" class="button" value="提交">
					<a href="javascript:history.back(-1)">返回</a>
				</td>
			</tr>
		</tbody>
	</table>

	</form>
</div>


<script type="text/javascript" src="<?php  echo base_url('static/plugins/jquery-3.1.0.min.js');?>"></script>
<script>

	$("#change").blur(function(){
	var   a=$("#change").val();
	var   b=$("#each").val();
    var   c=a*b;
	$("#all").val(c);
	})

</script>

</body>
</html>

