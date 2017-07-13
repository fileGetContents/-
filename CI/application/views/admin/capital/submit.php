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
		<div class="menber_title">退款记录</div>
		<div class="member_why">
			<a href="<?php echo site_url('Wanhuu_capital/Excel2'); ?>"><input type="button" value="导出"></a>
		</div>
		<div class="search_row">搜索：<input type="text" id="key"></div>
		<table id="table" class="menber-tab" width="100%">
			<thead>
				<tr>
					<th width="40"><input type="checkbox" name="select"></th>
					<th width="40">编号</th>
					<th width="100">用户名</th>
					<th width="80">退款金额</th>
					<th width="90">申请时间</th>
					<th width="200">退款理由</th>
					<th width="100">是否审核</th>
					<th width="100">确认退款时间</th>
					<th width="40">操作</th>
				</tr>
			</thead>
		    <tbody>
			<?php foreach($refund as  $refund_value){  ?>
				<tr>
					<td><input type="checkbox" name="option"></td>
					<td><?php   echo $refund_value['refund_id'] ;?></td>
					<td><?php   echo $refund_value['refund_user_phone'] ;?></td>
					<td>￥<?php echo $refund_value['refund_money']; ?></td>
					<td><?php   echo $refund_value['refund_time'] ;?></td>
					<td><?php   echo $refund_value['refund_why'] ?></td>
					<td><?php   echo $refund_value['why']  ;?></td>
					<td><?php   echo $refund_value['refund_refund_time']?></td>
					<td class="operation"><a href="javascript:void(0)" onclick="caozuo(this)">操作</a></td>
				</tr>
				<?php } ?>
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
    $.MsgBox.Confirm("温馨提示","确认删除"); 
}
//确定删除按钮事件  
var btnOk = function () {  
    $(".delete .quxiao input").click(function () {  
        $(".delete,.background_dle").remove();  
    });
}
</script>
<script>
	$(function(){

		// table 搜索
		$('#key').keyup(function(){
			$('#table tbody tr').hide().filter(":contains('" +($(this).val()) + "')").show();
		}).keyup();//DOM加载完时，绑定事件完成之后立即触发

		// table 全选
		$("#table input[name='select']").click(function(){
			//判断当前点击的复选框处于什么状态$(this).is(":checked") 返回的是布尔类型
			if($(this).is(":checked")){
				$("#table input[name='option']").prop("checked",true);
			}else{
				$("#table input[name='option']").prop("checked",false);
			}
		});
	});
	function caozuo(a){
		var user_name = $(a).parent().parent('tr');
		var _html = "";  
        _html += '<tr class="viewopbox"><td colspan="11"><a onclick="pass(this)" href="javascript:void(0)">通过</a><a href="javascript:void(0)">不通过</a></td></tr>';
        $(user_name).after(_html);
        $(a).parent().parent('tr').next('.viewopbox').siblings('.viewopbox').remove('.viewopbox');
        $(".viewopbox").css({
            background:'#2191C3',
            textAlign: 'right'
        });
        $(".viewopbox a").css({
            margin:'0 5px',
            color:'#fff',
            fontWeight: 'normal'
        });
	}

//通过后余额打到相应的位置

	function   pass(p){

       var  id=parseInt($(p).parent().parent().prev().children().eq(1).html());//获取编好
		$.ajax({
			type: "post",
			url: "<?php  echo  site_url('Wanhuu_capital/sub_user') ;?>",
			dataType: "json",
			data: "id="+id,
			success: function (obj) {
				if (obj == 1) {
				     alert("成功退回")
				} else {
					alert("退回失败");
				}
			},
			error: function () {
				alert("服务器繁忙,请稍后再试")
			}
		})

	}
	
</script>
</body>
</html>