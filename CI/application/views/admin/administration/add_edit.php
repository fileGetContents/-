<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="<?php  echo  base_url("admin/css/public.css") ; ?>">

	<link rel="stylesheet" href="<?php echo  base_url('admin/css/style.css'); ?>">
</head>
<body>
<div class="modal">
	<table class="modal_form" cellpadding="0" cellspacing="0">
		<tbody>
		<tr>
			<td class="item_title">编号:</td>
			<td class="item_input">
				<input type="text"  value="<?php echo $admin_id; ?>">
			</td>
		</tr>
			<tr>
				<td class="item_title">用户名:</td>
				<td class="item_input">
					<input type="text"  value="<?php echo $admin[0]['admin'] ;?>"  id="admin">
				</td>
			</tr>
			<tr>
				<td class="item_title">密码:</td>
				<td class="item_input">
					<input type="text" id="pass">
				</td>
			</tr>
			<tr>
				<td class="item_title">确认密码:</td>
				<td class="item_input">
					<input type="text"  id="pass1">
				</td>
			</tr>
			<tr>
				<td class="item_title"></td>
				<td class="item_submit item_fanhui">		
					<input type="submit" class="button" value="保存">
					<a href="javascript:history.back(-1) " >返回</a>
				</td>
			</tr>
		</tbody>
	</table>
</div>

<script type="text/javascript" src="<?php echo  base_url('admin/js/jquery-1.12.4.js'); ?>"></script>
<script type="text/javascript" src="<?php echo  base_url('admin/js/public.js'); ?>"></script>
<script type="text/javascript" >

	$("input[type=submit]").click(function(){
		var  id=<?php echo $admin_id; ?>;
		var  name=$("#admin").val();
		var  pass=$("#pass").val();
		var  pass1=$("#pass1").val();

		$.ajax({
			type: "post",
			url: "<?php  echo  site_url('Wanhuu_administeation/edit_ajax') ;?>",
			dataType: "json",
			data: "name="+name+"&pass="+pass+"&id="+id,
			success:function (obj){
                 if(obj==1){
					 alert('修改成功')
				 }else{
					 alert('修改失败')
				 }
			},
			error:function (){
                     alert('网络故障')
			}
		})
	})


</script>
</body>
</html>