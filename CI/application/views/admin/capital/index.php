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
		<div class="menber_title">提现记录</div>
		<div class="member_why">
			<a href="<?php echo site_url('Wanhuu_capital/Excel1'); ?>"><input type="button" value="导出"></a>
		</div>
		<div class="search_row">搜索：<input type="text" id="key"></div>
		<table id="table" class="menber-tab" width="100%">
			<thead>
				<tr>
					<th width="40"><input type="checkbox" name="option" onchange="add_list(this)"></th>
					<th width="40">编号</th>
					<th width="100">用户名</th>
					<th width="80">提现金额</th>
					<th width="90">申请时间</th>
					<th width="200">提现信息</th>
					<th width="100">是否提现</th>
					<th width="100">确认提现时间</th>
					<th width="40">操作</th>
				</tr>
			</thead>
		    <tbody>
			<?php foreach($cash  as  $value){?>
				<tr>
					<td><input type="checkbox" name="option"></td>
					<td>  <?php echo $value['cash_id'] ; ?></td>
					<td>  <?php echo $value['cash_user_phone'] ;?></td>
					<td>￥<?php echo $value['cash_money'];  ?></td>
					<td>  <?php echo $value['cash_time'] ?></td>
					<td>  <?php echo $value['infro']  ?></td>
					<td><a href="javascript:void(0)"><?php echo $value['work'] ;?></a></td>
					<td>  <?php echo $value['cash_cash_time'] ;?></td>
					<td class="operation"><a href="javascript:void(0)" onclick="caozuo(this)">操作</a></td>
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
</script>
<script>
	$(function(){

		// table 搜索
		$('#key').keyup(function(){
			$('#table tbody tr').hide().filter(":contains('" +($(this).val()) + "')").show();
		}).keyup();//DOM加载完时，绑定事件完成之后立即触发
	});
	function caozuo(a){
		var user_name = $(a).parent().parent('tr');
		var  id=parseInt($(a).parent().siblings().eq(1).html());
		var _html = "";  
        _html += '<tr class="viewopbox"><td colspan="11"><a href="<?php echo site_url("Wanhuu_capital/add_edit") ;?>/'+id+'">通过</a><a href="javascript:void(0)"  onclick="no(this)">不通过</a></td></tr>';
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
//	function youxiao(a){
//		var name = $(a).html();
//		if(name=="是") {
//			$(a).html('否');
//		}
//		if(name=="否") {
//			$(a).html('是');
//		}
//	}

   function no(a){
    var  num= a.parent().

   }


</script>
</body>
</html>