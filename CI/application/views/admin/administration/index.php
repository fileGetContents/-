
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
		<a href="<?php  echo  site_url('Wanhuu_administeation/add_modal'); ?>" target="menuFrame">添加管理员</a>
	</div>
	<table id="table" class="menber-tab" width="100%">
		<thead>
		<tr>
			<th width="100">用户编号</th>
			<th width="150">用户名</th>
			<th width="90">操作</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach($admin as $admin_value){  ?>
		<tr>
			<td><?php echo $admin_value['admin_id'] ?></td>
			<td><?php echo $admin_value['admin'] ?></td>
			<td class="operation">
				<a href="<?php  echo   site_url('Wanhuu_administeation/add_edit')."/".$admin_value['admin_id'];?>">编辑</a>
				<a href="javascript:void(0)" onclick="card_romve(this)">删除</a>
				<a href="<?php  echo   site_url('Wanhuu_administeation/add_to')."/".$admin_value['admin_id']  ;?>">添加</a>
			</td>
		</tr>
		<?php 	} ?>
		</tbody>
	</table>
</div>
<script type="text/javascript" src="<?php echo  base_url('admin/js/jquery-1.12.4.js'); ?>"></script>
<script type="text/javascript" src="<?php echo  base_url('admin/js/public.js'); ?>"></script>
<script type="text/javascript" src="<?php echo  base_url('admin/js/add_delete.js'); ?>"></script>
<!-- 删除 -->
<script>
	var id="";
	function card_romve(a) {
		$.MsgBox.Confirm("温馨提示","确认解除");
		id=$(a).parent().siblings().eq(0).html();
	}
	//确定删除按钮事件
	var btnOk = function () {
		$(".delete .quxiao input").click(function () {
			$(".delete,.background_dle").remove();
			$.ajax({
				type: "post",
				url: "<?php  echo  site_url('Wanhuu_administeation/index_ajax_delect') ;?>",
				dataType: "json",
				data: "id="+id,
                success:function (obj){
                   if(obj==1){
					   alert('删除成功')
				   }else{
					   alert('删除失败')
				   }
				},
				error:function (){
					alert('网络故障')
				}
			});
		});
	}
</script>
</body>
</html>