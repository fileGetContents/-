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
	<form  action="<?php echo site_url("Wanhuu_message/station_insert");  ?>" method="post">
	<table class="modal_form" cellpadding="0" cellspacing="0">
		<tbody>
			<tr>
				<td class="item_title">发送时间:</td>
				<td class="item_input">
					<input  name="time" type="datetime-local">
				</td>
			</tr>
			<tr>
				<td class="item_title">内容:</td>
				<td class="item_input">
					<textarea name="name"></textarea>
				</td>
			</tr>
			<tr>
				<td class="item_title">发送类型:</td>
				<td class="item_input">
					 <select class="set_val_2" name="way"  onchange="hide_title('set_val_2','close_momal_auo')">
					 	 <option value=1>所有会员</option>
						 <option value="custom">发送自定义</option>
						 <option value="S">S级会员</option>
						 <option value="A">A级会员</option>
						 <option value="B">B级会员</option>
						 <option value="C">C级会员</option>
					 </select>
				</td>
			</tr>
			<tr class="close_momal_auo">
				<td class="item_title">自定义:</td>
				<td class="item_input">
					<textarea name="phone"></textarea>
					<span class="tip_span">用英文分号分隔</span>
				</td>
			</tr>
			<tr>
				<td></td>
				<td class="item_submit item_fanhui">		
					<input type="submit" class="button" value="新增">
					<a href="javascript:history.back(-1)">返回</a>
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