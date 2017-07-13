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
				<th width="100"><input type="checkbox" name="1" onchange="add_list(this)"></th>
				<th>属性名称</th>
			</tr>
			<tr>
				<td><input type="checkbox" name="2" onchange="add_edit(this,'2')"></td>
				<td  class="p_l_50">查询管理</td>
			</tr>
			<tr>
				<td><input type="checkbox" name="2"></td>
				<td class="p_l_100">查询管理</td>
			</tr>
			<tr>
				<td><input type="checkbox" name="2"></td>
				<td class="p_l_100">查询管理</td>
			</tr>
			<tr>
				<td><input type="checkbox" name="3" onchange="add_edit(this,'3')"></td>
				<td  class="p_l_50">查询管理</td>
			</tr>
			<tr>
				<td><input type="checkbox" name="3"></td>
				<td class="p_l_100">查询管理</td>
			</tr>
			<tr>
				<td><input type="checkbox" name="3"></td>
				<td class="p_l_100">查询管理</td>
			</tr>
			<tr>
				<td><input type="checkbox" name="4" onchange="add_edit(this,'4')"></td>
				<td  class="p_l_50">查询管理</td>
			</tr>
			<tr>
				<td><input type="checkbox" name="4"></td>
				<td class="p_l_100">查询管理</td>
			</tr>
			<tr>
				<td><input type="checkbox" name="4"></td>
				<td class="p_l_100">查询管理</td>
			</tr>
			<tr>
				<td><input type="checkbox" name="5" onchange="add_edit(this,'5')"></td>
				<td  class="p_l_50">查询管理</td>
			</tr>
			<tr>
				<td><input type="checkbox" name="5"></td>
				<td class="p_l_100">查询管理</td>
			</tr>
			<tr>
				<td><input type="checkbox" name="5"></td>
				<td class="p_l_100">查询管理</td>
			</tr>
			<tr>
				<td></td>
				<td class="item_submit item_fanhui">		
					<input type="submit" class="button" value="提交">
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