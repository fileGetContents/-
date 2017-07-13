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
	<form>
	<table class="modal_form" cellpadding="0" cellspacing="0">
		<tbody>
			<tr>
				<th width="100">
					<input type="checkbox" onchange="add_list(this)">
				</th>
				<th>属性名称</th>
			</tr>
			<tr>
				<td><input type="checkbox"></td>
				<td>超级管理员</td>
			</tr>
			<tr>
				<td><input type="checkbox"></td>
				<td>超级管理员</td>
			</tr>
			<tr>
				<td></td>
				<td class="item_submit item_fanhui">		
					<input type="submit" class="button" value="新增">
					<a href="index.html">返回</a>
				</td>
			</tr>
		</tbody>
	</table>	 
	</form>
</div>

<script type="text/javascript" src="<?php echo  base_url('admin/js/jquery-1.12.4.js'); ?>"></script>
<script type="text/javascript" src="<?php echo  base_url('admin/js/public.js'); ?>"></script>
</body>
</html>