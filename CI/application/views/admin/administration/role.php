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
	<div class="menber_title">管理列表</div>
	<div class="member_why">
		<a href="<?php  echo  site_url("Wanhuu_administeation/role_modal") ;?>" target="menuFrame">添加角色</a>
	</div>
	<table id="table" class="menber-tab" width="100%">
		<thead>
			<tr>
				<th width="100">编号</th>
				<th width="150">角色名</th>
				<th width="90">操作</th>
			</tr>
		</thead>
	    <tbody>
			<tr>
				<td>1</td>
				<td>name</td>
				<td class="operation">
					<a href="<?php  echo base_url("Wanhuu_administeation/role_edit");?>">编辑</a>
					<a href="javascript:void(0)" onclick="card_romve()">删除</a>
					<a href="<?php  echo base_url('Wanhuu_administeation/role_add') ;?>">添加</a>
				</td>
			</tr>
		</tbody>
	</table>
	<!-- 分页 -->
	<div class="page">
		<q>52 条记录 2/2 页</q>
		<a href="#">上一页</a>
		<a href="#">1</a>
		<span>2</span>
		<a href="#">3</a>
		<a href="#">下一页</a>
	</div>
</div>
<script type="text/javascript" src="<?php echo  base_url('admin/js/jquery-1.12.4.js'); ?>"></script>
<script type="text/javascript" src="<?php echo  base_url('admin/js/public.js'); ?>"></script>
<script type="text/javascript" src="<?php echo  base_url('admin/js/add_delete.js'); ?>"></script>
<!-- 删除 -->
<script>   
function card_romve() {
    $.MsgBox.Confirm("温馨提示","确认解除"); 
}
//确定删除按钮事件  
var btnOk = function () {  
    $(".delete .quxiao input").click(function () {  
        $(".delete,.background_dle").remove();  
    });
}
</script>
</body>
</html>