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
	<div class="menber_title">短信列表</div>
	<div class="member_why">
		<a href="<?php echo site_url('Wanhuu_message/index_modal'); ?>">添加</a>
	</div>
	<div class="search_row">搜索：<input type="text" id="key"></div>
	<table id="table" class="menber-tab" width="100%">
		<thead>
			<tr>
				<th width="100">编号</th>
				<th width="60">短信内容</th>
				<th width="150">发送时间</th>
				<th width="100">发送状态</th>
				<th width="100">发送方式</th>
				<th width="100">操作</th>
			</tr>
		</thead>
	    <tbody>
			<tr>
				<?php foreach($mobile as $value){?>
				<td><?php  echo $value['mobile_id'] ;?></td>
				<td>
					<p class="text_hidden" title="<?php echo $value['mobile_content'] ?>">
						<?php echo $value['mobile_content'] ;?>
					</p>
				</td>
				<td><?php  echo $value['mobile_time'] ;?></td>
				<td>已经发送</td>
				<td><?php echo $value['mobile_way']; ?></td>
				<td class="operation">
					<a href="javascript:vio(0); card_romve(this)">删除记录</a>
				</td>
			</tr>
			<?php }  ?>
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




</script>
</body>
</html>