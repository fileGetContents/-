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
		<div class="menber_title">资金赎回</div>
		<div class="member_why">
			<input type="button" value="导出">
		</div>
		<div class="search_row">搜索：<input type="text" id="key"></div>
		<table id="table" class="menber-tab" width="100%">
			<thead>
				<tr>
					<th width="40">编号</th>
					<th width="100">项目名称</th>
					<th width="80">赎回年化</th>
					<th width="90">总金额</th>
					<th width="200">所持用户数</th>
					<th width="40">操作</th>
				</tr>
			</thead>
		    <tbody>
			<?php foreach($redeem as  $redeem_value){  ?>
				<tr>
					<td><?php  echo $redeem_value['gear_id'] ;?></td>
					<td><?php  echo $redeem_value['project_name'] ?></td>
					<td><?php  echo $redeem_value['gear_earning'] ;?></td>
					<td><?php  echo $redeem_value['gear_money'];?></td>
					<td><?php  echo $redeem_value['user_num'] ;?></td>
					<td class="operation"><a href="javascript:void(0)" onclick="caozuo(this)">操作</a></td>
				</tr>
			<?php  } ?>
			</tbody>
		</table>
		<!-- 分页 -->
	</div>

<script type="text/javascript" src="<?php echo  base_url('admin/js/jquery-1.12.4.js'); ?>"></script>
<script type="text/javascript" src="<?php echo  base_url('admin/s/public.js'); ?>j"></script>
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
		var  id=$(a).parent().siblings().eq(0).html();
        _html += '<tr class="viewopbox"><td colspan="11"><a href="<?php  echo site_url('Wanhuu_capital/rdm_modal') ;?>/'+id+'">查看</a></td></tr>';
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

	
</script>
</body>
</html>