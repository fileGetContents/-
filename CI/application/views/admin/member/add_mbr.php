<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo  base_url('admin/css/public.css') ; ?>">
	<link rel="stylesheet" href="<?php echo  base_url('admin/css/style.css') ; ?>">
</head>
<body>
<div class="modal">
	<div class="menber_title"><a  onclick="history.go(-1)">返回列表</a></div>
	<table id="table" class="menber-tab" width="100%">
		<thead>
			<tr>
				<th>项目名称</th>
				<th>投资情况</th>
				<th>购买时间</th>
			</tr>
		</thead>
	    <tbody>

		<?php if(!empty($ass)){
			foreach($ass  as $ass_value){
			?>
			<tr>
				<td><?php echo $ass_value['project_name'] ?></td>
				<td><?php echo $ass_value['tag'] ;?></td>
				<td><?php echo $ass_value['associated_time'] ;?></td>
			</tr>
      	<?php	}
		} ?>

		</tbody>
	</table>
</div>

<script type="text/javascript" src="<?php echo  base_url('admin/js/jquery-1.12.4.js') ; ?>"></script>
<script type="text/javascript" src="<?php echo  base_url('admin/js/public.js') ; ?>"></script>
</body>
</html>