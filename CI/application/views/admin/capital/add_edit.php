<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo  base_url('admin/css/public.css'); ?>">
	<link rel="stylesheet" href="<?php echo  base_url('admin/css/style.css'); ?>">
</head>
<body>
<form action="<?php echo site_url('Wanhuu_capital/payment') ;?>"  method="post">
	<div class="menber-content">
		<div id="new_table">
			<table class="modal_form" cellpadding="0" cellspacing="0">
				<tbody>
					<tr>
						<td class="item_title">用户名:</td>
						<td><?php echo $cash_user_phone ; ?></td>
					</tr>
					<tr>
						<td class="item_title">提现金额:</td>
						<td><?php  echo $cash_money;?></td>
					</tr>
					<tr>
						<td class="item_title">申请时间:</td>
						<td><?php echo $cash_time ;?></td>
					</tr>
					<tr>
						<td class="item_title">开户名:</td>
						<td><?php echo $bank_user_name; ?></td>
					</tr>
					<tr>
						<td class="item_title">卡号:</td>
						<td><?php echo $cash_bank_number; ?></td>
					</tr>
					<tr>
						<td class="item_title">开户地:</td>
						<td><?php echo $bank_province.$bank_city.$bank_address;  ?></td>
					</tr>
					<tr>
						<td class="item_title">确认提现时间:</td>
						<td><?php echo  date("Y-m-d H:i:s"); ?></td>
					</tr>
					<tr>
						<td class="item_title">订单号</td>
						<td><input  type="text"  name="cash_order" value="<?php echo $cash_order; ?>" readonly="readonly"  ></td>
					</tr>
					<tr>
						<td class="item_title"></td>
						<td class="item_submit item_fanhui">		
							<input type="submit" class="button" value="确认提现">
							<a href="javascript:history.back(-1)" target="menuFrame">返回列表</a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</form>
<script type="text/javascript" src="<?php echo  base_url('admin/js/jquery-1.12.4.js'); ?>"></script>
<script type="text/javascript" src="<?php echo  base_url('admin/js/public.js'); ?>"></script>
</body>
</html>