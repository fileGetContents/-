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
	<form  action="<?php  echo  site_url('Wanhuu_administeation/model_from') ;?>" method="get">
	<table class="modal_form" cellpadding="0" cellspacing="0">
		<tbody>
			<tr>
				<td class="item_title">用户名:</td>
				<td class="item_input">
					<input type="text"   name='admin' >
				</td>
			</tr>
			<tr>
				<td class="item_title">密码:</td>
				<td class="item_input">
					<input type="text" name="password">
				</td>
			</tr>
			<tr>
				<td class="item_title">确认密码:</td>
				<td class="item_input">
					<input type="text" name="password1">
				</td>
			</tr>
			<tr>
				<td  class="item_title">角色:</td>
				<td>
					<input type="text" name="persona" >
				</td>
			</tr>
		   <tr>
			   <td class="item_title">权限:</td>
			   <td>
				   <table>
					   <tr>
						   <td>会员管理</td>
						   <td><input type="checkbox"  name="member" value="member">个人会员</td>
						   <td>
							   <input type="checkbox"  name="member_export"  value="member_export" />导出
							   <input type="checkbox"  name="member_compile" value="member_compile"/>编辑
							   <input type="checkbox"  name="member_delete"  value="member_delete"/>删除
							   <input type="checkbox"  name="member_list"    value="member_list"/>查看购买列表
						   </td>
					   </tr>
					   <tr>
						   <td>项目管理</td>
						   <td><input type="checkbox"  name="project" value="project">众筹项目</td>
						   <td>
							   <input type="checkbox" name="project_export"  value="project_export"  />导出
							   <input type="checkbox" name="project_update"  value="project_update"  />更新会员
							   <input type="checkbox" name="project_compile" value="project_compile" />编辑
							   <input type="checkbox" name="project_delete"  value="project_delete"  />删除
							   <input type="checkbox" name="project_list"    value="project_list"    />购买项目列表
						   </td>
					   </tr>
					   <tr>
						   <td>资金管理</td>
						   <td>
							   <table>
								   <tr>
									   <td><input type="checkbox" name="cash" value="cash" />提现记录</td>

								   </tr>
								   <tr>
									   <td><input type="checkbox" name="refund" value="refund"/>退款记录</td>

								   </tr>
								   <tr>
									   <td><input type="checkbox" name="redeem" value="redeem"/>资金赎回</td>
								   </tr>
								   <tr>
									   <td><input type="checkbox" name="rebate"  value="rebate"/>活动返利</td>
								   </tr>
							   </table>
						   </td>

						   <td>
							   <table>
								   <tr>
									   <td>
										   <input type="checkbox" name="cash_export" value="cash_export"/>导出
										   <input type="checkbox" name="cash_operation" value="cash_operation"/>操作
									   </td>
								   </tr>
								   <tr>
									   <td>
										   <input type="checkbox" name="refund_export" value="refund_export"/>导出
										   <input type="checkbox" name="refund_operation" value="refund_operation"/>操作
									   </td>
								   </tr>
								   <tr>
									   <td>
										   <input type="checkbox" name="redeem_export" value="redeem_export"/>导出
										   <input type="checkbox" name="redeem_operation" value="redeem_operation"/>操作
									   </td>
								   </tr>
								   <tr>
									   <td>
										   <input type="checkbox" name="rebate_export" value="rebate_export"/>导出
										   <input type="checkbox" name="rebate_operation" value="rebate_operation"/>操作
									   </td>
								   </tr>
							   </table>
						   </td>
					   </tr>
                       <tr>
						   <td>短信</td>
						   <td>
							   <table>
								   <tr>
									   <td><input type="checkbox"  name="email" value="email">邮件</td>
								   </tr>
								   <tr>
									   <td><input type="checkbox"  name="note" value="note">短信</td>
								   </tr>
								   <tr>
									   <td><input type="checkbox"  name="station"  value="station">站内信息</td>
								   </tr>
							   </table>
						   </td>
						   <td>
							   <table>
								   <tr>
									   <td><input type="checkbox" name="email_send"    value="email_send">发送</td>
									   <td><input type="checkbox" name="email_delete"   value="email_delete">删除</td>
								   </tr>
								   <tr>
									   <td><input type="checkbox" name="note_send"  value="note_send">发送</td>
									   <td><input type="checkbox" name="note_delete" value="note_delete">删除</td>
								   </tr>
								   <tr>
									   <td><input type="checkbox" name="station_send"  value="station_send">发送</td>
									   <td><input type="checkbox" name="station_delete" value="station_delete">删除</td>
								   </tr>
							   </table>
						   </td>
					   </tr>
				   </table>
			   </td>
		   </tr>

			<tr>
				<td class="item_title">管理员管理</td>
				 <td>
					 <table>
						 <tr>
						      <td>管理员列表</td>
							  <td>
								  <input type="checkbox"  name="admin_see"  value="admin_see" />查看
								  <input type="checkbox"  name="admin_do"   value="admin_do" />操作
							  </td>
						 </tr>
					 </table>
				 </td>
			</tr>

			<tr>
				<td class="item_title"></td>
				<td class="item_submit item_fanhui">
					<input type="submit"   class="button" value="新增">
					<a href="javascript:history.back(-1)">返回</a>
				</td>
			</tr>
		</tbody>
	</table>
	</form>
</div>

<script type="text/javascript" src="<?php echo  base_url('admin/js/jquery-1.12.4.js'); ?>"></script>
<script type="text/javascript" src="<?php echo  base_url('admin/js/public.js'); ?>"></script>
<script type="text/javascript">

//	function admin(){
//
//		var admin=$("input[name=admin]").val();
//        var  pass=$("input[name=password]").val();
//		var pass1=$("input[name=password1]").val();
//
//      if(pass1== pass ){
//		  $.ajax({
//			  type: "post",
//			  url: "<?php // echo  site_url('Wanhuu_administeation/model_ajax') ;?>//",
//			  dataType: "json",
//			  data: "admin="+admin+"&pass="+pass,
//			  success:function(obj){
//                 if(obj==1){
//					 alert('添加成功')
//				 }else{
//					 alert('添加失败')
//				 }
//			  },
//			  error:function(){
//				  alert('网络故障')
//			  }
//
//		  })
//	  }else {
//		  alert('两次密码不一样')
//	  }
//	}



</script>
</body>
</html>