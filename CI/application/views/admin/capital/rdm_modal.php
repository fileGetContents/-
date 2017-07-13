<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo  base_url('admin/css/public.css'); ?>">
	<link rel="stylesheet" href="<?php echo  base_url('admin/css/style.css'); ?>">
</head>
<body>
<div class="menber-content">
	<div class="menber_title"><a href="javascript:history.back(-1)">还回列表</a>
			<a href="<?php echo site_url('Wanhuu_capital/rdm_bianji')."/$id" ?>">编辑</a></div>
	<table id="table" class="menber-tab" width="100%">
		<thead>
			<tr>
				<th width="40">编号</th>
				<th width="40">用户名</th>
				<th width="100">购买份数</th>
				<th width="80">投资金额</th>
				<th width="80">赎回金额</th>
			</tr>
		</thead>
	    <tbody>
		<?php foreach($modal  as $modal_value){ ?>
			<tr>
				<td><?php echo $modal_value['user_id'] ;?></td>
				<td><?php echo $modal_value['user_phone'] ; ?></td>
				<td><?php echo $modal_value['associated_score'] ;?></td>
				<td><?php echo $modal_value['all'] ; ?></td>
				<td>???</td>
			</tr>
		<?php	} ?>
		</tbody>
	</table>
</div>
</body>
</html>