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
	<form  action="<?php echo site_url('Wanhuu_message/index_sendApi') ;?>"  method="get">
	<table id="table" class="modal_form" cellpadding="0" cellspacing="0">
		<tbody>
			<tr>
				<td class="item_title">发送时间:</td>
				<td class="item_input">
					<input type="datetime-local"  name="time">
				</td>
			</tr>
			<tr>
				<td class="item_title">短信模板:</td>
				<td class="item_input">
					<select class="set_val_1" name="content"  onchange="hide_title('set_val_1','close_momal_lis')">
						<option value="请选择需要编辑的模板">请选择需要编辑的模板</option>
						<option value="短信通知众筹状态">短信通知众筹状态</option>
						<option value="项目成功">项目成功</option>
						<option value="项目失败">项目失败</option>
						<option value="项目回报">项目回报</option>
						<option value="注册成功通知">注册成功通知</option>
						<option value="通知项目发起人成功">通知项目发起人成功</option>
						<option value="通知项目发起人失败">通知项目发起人失败</option>
						<option value="短信验证码发送">短信验证码发送</option>
						<option value="短信通知用户通过投资人审核">短信通知用户通过投资人审核</option>
						<option value="短信通知用户投资申请通过-允许付款">短信通知用户投资申请通过-允许付款</option>
						<option value="短信通知用户付款后">短信通知用户付款后</option>
						<option value="易宝投资通短信验证码发送">易宝投资通短信验证码发送</option>
						<option value="路演申请参会的审核状态发送">路演申请参会的审核状态发送</option>
					</select>
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
				 	<span class="tip_span">用分号分隔</span>
				</td>
			</tr>
			<tr>
				<td></td>
				<td class="item_submit item_fanhui">		
					<input type="submit" class="button" value="发送">
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