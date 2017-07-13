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
	<div class="menber_title">站内消息列表</div>
	<div class="member_why">
		<a href="<?php  echo  site_url('Wanhuu_message/station_modal') ;?>">添加</a>
	</div>
	<div class="search_row">搜索：<input type="text" id="key"></div>
	<table id="table" class="menber-tab" width="100%">
		<thead>
		<tr>
				<th width="100">编号</th>
				<th width="150">内容</th>
				<th width="100">发送时间</th>
				<th width="90">发送状态</th>
				<th width="90">发送方式</th>
				<th width="90">操作</th>
			</tr>
		</thead>
	    <tbody>

		<?php foreach($message as $message_value){?>

			<tr>
				<td><?php echo $message_value['message_id'] ?></td>
				<td>
					<p class="text_hidden" title="<?php echo $message_value['message_name'] ; ?>">
						<?php echo $message_value['message_name']; ?>
					</p>
				</td>
				<td><?php echo $message_value['message_time'];?></td>
				<td><?php if($message_value['message_tag']==0)
					{echo  "已经发送";}
					elseif($message_value["message_tag"]==1)
					{echo  "已经查看";}
					?></td>
				<td><?php echo $message_value['message_way'] ; ?></td>
				<td class="operation">
					<a href="javascript:void(0)"  onclick="station_delect(this)">删除记录</a>
				</td>
			</tr>
		<?php	} ?>

		</tbody>
	</table>

	<!-- 分页 -->
	<div class="page">
		<ul class="pagination">
			<?php  echo  $this->pagination->create_links(); ?>
		</ul>
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
	function  station_delect(a){
	  var station=$(a).parent().siblings().eq(0).html();
		$.ajax({
			type:"get",
			dataType:"json",
			url:"<?php   echo    site_url('Wanhuu_message/station_delect'); ?>?station="+station,
			success:function(obj){
				if(obj==1){
					alert('删除成功')
				}else{
					alert('删除失败')
				}
			},
			error:function (){
               alert('网络故障')
			}
		})

	}
</script>
</body>
</html>