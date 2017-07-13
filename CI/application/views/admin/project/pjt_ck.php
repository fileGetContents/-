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
		<!-- <div class="search_row">搜索：<input type="text" id="key"></div> -->
		<div class="menber_title"><a onclick="history.go(-1)">返回列表</a></div>
		<table id="table" class="menber-tab" width="100%">
			<thead>
				<tr>
					<th width="40">编号</th>
					<th width="100">项目名</th>
					<th width="80">档位</th>
					<th width="130">年化</th>
					<th width="70">总份数</th>
					<th width="80">剩余分数</th>
					<th width="80">赎回时间</th>
					<th width="80">赎回到期剩余</th>
					<th width="80">已筹资金</th>
				</tr>
			</thead>
		    <tbody>

			<?php foreach($ck as $ck_value) { ?>
				<tr>
					<td><?php echo  $ck_value['gear_id'] ;?></td>
					<td><?php echo  $ck_value['project_name'] ;  ?></td>
					<td><?php echo  $ck_value["gear_digital"] ; ?></td>
					<td><?php echo  $ck_value['gear_earning'] ; ?></td>
					<td><?php echo  $ck_value['gear_money']/$ck_value['gear_each'];?></td>
					<td><?php echo  $ck_value['gear_copies'];?></td>
					<td><?php echo  $ck_value['project_time_subscribe'] ;?></td>
					<td><?php echo  $ck_value['surplus'];?></td>
					<td><?php echo  $ck_value['num_money'] ;?></td>
				</tr>
			<?php } ?>

			</tbody>
		</table>

		<!-- 分页 -->
<script type="text/javascript" src="<?php echo  base_url('admin/js/jquery-1.12.4.js'); ?>"></script>
<script type="text/javascript" src="<?php echo  base_url('admin/js/public.js'); ?>"></script>
</body>
</html>