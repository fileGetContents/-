<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo  base_url('admin/css/public.css'); ?>">
	<link rel="stylesheet" href="<?php echo  base_url('admin/css/style.cs'); ?>s">
</head>
<body>
<div class="menber-content">
	<div class="menber_title"><a onclick="history.go(-1)">返回列表</a></div>
	<table id="table" class="menber-tab" width="100%">
		<thead>
			<tr>
				<th width="40">用户名</th>
				<th width="100">购买份数</th>
				<th width="80">投资金额</th>
			</tr>
		</thead>
	    <tbody>

		<?php foreach($ass  as $yg_value){  ?>
			<tr>
				<td><?php echo $yg_value['user_phone'] ;?></td>
				<td><?php echo $yg_value['associated_score'] ;?></td>
				<td><?php echo $yg_value['user_money'] ;?></td>
			</tr>
		<?php } ?>

		</tbody>
	</table>

</div>
</body>
</html>