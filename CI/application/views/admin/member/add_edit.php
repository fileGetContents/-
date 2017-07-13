<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>会员管理</title>
	<link rel="stylesheet" href="<?php echo  base_url('admin/css/public.css') ; ?>">
	<link rel="stylesheet" href="<?php echo  base_url('admin/css/style.css') ; ?>">
</head>
<body>
<div class="modal">
	<form   action="<?php echo site_url('Wanhuu_member/cheng_rank');  ?>" method="post">
	<table class="modal_form" cellpadding="0" cellspacing="0">
		<tbody>
			<tr>
				<td class="item_title">用户名:</td>
				<td class="item_input">
					<input type="text"   readonly="readonly"  name="phone" value="<?php echo $user[0]['user_phone'] ;?>"/>
				</td>
			</tr>
			<tr>
				<td class="item_title">用户邮箱:</td>
				<td class="item_input">
					<?php   echo  $user[0]['user_email'] ;?>
				</td>
			</tr>
			<tr>
				<td class="item_title">用户微信</td>
				<td class="item_input">
					<?php   echo $user[0]['user_wechat']; ?>
				</td>
			</tr>
			<tr>
				<td class="item_title">所属地区:</td>
				<td class="item_input">
					<?php   echo $user[0]['user_city'] . $user[0]['user_town'] ?>
				</td>
			</tr>
			<tr>
				<td class="item_title">会员等级:</td>
				<td class="item_input">
					<select name="rank" id="">
						<option value="">请选择等级</option>
						<option value="A">A</option>
						<option value="B">B</option>
						<option value="C">C</option>
						<option value="S">S</option>
					</select>
				</td>
			</tr>
			<tr>
				<td class="item_title">状态:</td>
				<td class="item_radio">
					<input type="radio" name="1">有效
					<input type="radio" name="1">无效
				</td>
			</tr>
			<tr>
				<td class="item_title">查看银行卡列表:</td>
				<td>
					<table>

						<?php  if(!empty($bank)){
							$num=0;
							foreach($bank as $bank_value){?>

								<tr>
									<td><?php echo $num++ ?></td>
									<td><?php echo $bank_value['bank_bank_name'] ;?></td>
									<td><?php echo $bank_value['bank_name'] ?></td>
									<td><?php echo $bank_value['bank_number'] ;?></td>
									<td>添加时间：<?php  echo $bank_value['bank_time']?></td>
								</tr>
							<?php }
						}else{
					       	echo '没有任何银行卡';
						} ?>
					</table>
				</td>
			</tr>
			<tr>
				<td class="item_title"></td>
				<td class="item_submit item_fanhui">		
					<input type="submit" class="button" value="新增">
					<a onclick="history.go(-1)">返回</a>
				</td>
			</tr>
		</tbody>
	</table>	 
	</form>
	
</div>

<script type="text/javascript" src="<?php echo  base_url('admin/js/jquery-1.12.4.js') ; ?>"></script>
<script type="text/javascript" src="<?php echo  base_url('admin/js/public.js') ; ?>"></script>
</body>
</html>