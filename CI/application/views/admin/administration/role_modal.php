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
					<td class="item_title">角色名:</td>
					<td class="item_input">
						<input type="text" value="" >	
					</td>
				</tr>
				<tr>
					<td class="item_title"></td>
					<td class="item_submit item_fanhui">		
						<input type="submit" class="button" value="保存">
						<a href="javascript:history.back(-1);">返回</a>
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