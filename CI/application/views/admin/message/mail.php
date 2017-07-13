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
	<div class="menber_title">邮件</div>
	<div class="member_why">
		<a href="<?php  echo site_url('Wanhuu_message/mail_modal') ;?>">添加</a>
	</div>
	<div class="search_row">搜索：<input type="text" id="key"></div>
	<table id="table" class="menber-tab" width="100%">
		<thead>
			<tr>
				<tr>
				<th width="100">编号</th>
				<th width="150">邮件标题</th>
				<th width="100">发送时间</th>
				<th width="90">发送状态</th>
				<th width="90">发送方式</th>
				<th width="90">操作</th>
			</tr>
			</tr>
		</thead>
	    <tbody>
		<?php foreach($email as $email_value){ ?>
			<tr>
				<td><?php  echo $email_value['email_id'];?></td>
				<td>
					<p class="text_hidden" title="<?php echo $email_value['email_name'] ;?>">
						<?php echo $email_value['email_name'] ;?>
					</p>
				</td>
				<td><?php echo $email_value['email_time'] ?></td>
				<td><?php if($email_value['email_tag']==0){echo  "未发送";}else{echo  "已经发送";} ?></td>
				<td><?php echo  $email_value['email_way']; ?></td>
				<td class="operation">
					<a href="<?php echo site_url('Wanhuu_message/details') ;?>?id=<?php echo $email_value['email_id'] ?>">详情</a>
					<a href="javascript:void(0);" onclick=delect(this)>删除记录</a>
				</td>
			</tr>
		<?php     }  ?>
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
};
//删除记录
function   delect(a){
	var  meail=$(a).parent().siblings().eq(0).html();
	$.ajax({
		type:"get",
		dataType:"json",
		url:"<?php   echo    site_url('Wanhuu_message/ajax_delect'); ?>?id="+meail,
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

	})



}

</script>
</body>
</html>