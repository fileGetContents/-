<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo  base_url('admin/css/public.css') ; ?>">
	<link rel="stylesheet" href="<?php echo  base_url('admin/css/style.css') ; ?>">
	<style type="text/css">
		#table tbody tr td:nth-child(7),#table thead tr th:nth-child(7) {
			display: none;
		}
	</style>
</head>
<body>
	<div class="menber-content">
		<div class="menber_title">会员管理</div>
		<div class="member_why">
			<a href="<?php  echo site_url('Wanhuu_member/Excel') ;?>"><input type="button"  value="导出"></a>
			<a href="<?php  echo site_url('Wanhuu_member/update'); ?>"><input type="button"  value="更新会员"/></a>
		</div>
		<div class="search_row">搜索：<input type="text" id="key"></div>

		<table id="table" class="menber-tab" width="100%">
			<thead class="menber_thead">
				<tr  id="href">
					<th width="40"><input type="checkbox" name="select"></th>
					<th width="80">编号 <a  id="user_id" href="<?php  echo site_url('Wanhuu_member/index/user_id/DESC');?>"><i></i></a></th>
					<th width="100">用户名</th>
					<th width="80">用户邮箱</th>
					<th width="80">用户微信</th>
					<th width="150">账户余额  <a id="user_money" href="<?php echo site_url('Wanhuu_member/index/user_money/DESC');?>"><i></i></a></th>
					<th width="150">最后登录IP</th>
					<th width="130">最后登录时间</th>
					<th width="70" >会员等级  <a  id="user_grade" href="<?php echo site_url('Wanhuu_member/index/user_grade/DESC');?>"><i></i></a></th>
					<th width="70">购买项目数 <a  id="buy_num"  href="<?php echo site_url('Wanhuu_member/index/buy_num/DESC');?>"><i></i></a></th>
					<th width="70">购买总金额 <a  id="buy_money" href="<?php echo site_url('Wanhuu_member/index/buy_money/DESC');?>"><i></i></a></th>
					<th width="100">身份证号</th>
					<th width="100">城市/地区</th>
					<th width="80">注册时间</th>
					<th width="100">推荐账号</th>
					<th width="40">状态</th>
					<th width="80">操作</th>
				</tr>
			</thead>
		    <tbody>
			<?php  foreach($user  as  $user_value){  ?>
				<tr>
					<td><input type="checkbox" name="option"></td>
					<td><?php echo $user_value['user_id'] ;?></td>
					<td><?php echo $user_value['user_phone'] ;?></td>
					<td><?php echo $user_value['user_email'] ;?></td>
					<td><?php echo $user_value['user_wechat'];?></td>
					<td><?php echo $user_value['user_money'] ;?></td>
					<td><?php echo $user_value['record_ip'];?></td>
					<td><?php echo $user_value['record_time'];?></td>
					<td><?php echo $user_value['user_grade'];?></td>
					<td><?php echo $user_value['project_num'];?></td>
					<td><?php echo $user_value['project_buy_money'];?></td>
				    <td><?php echo $user_value['user_IDcard'] ;?></td>
					<td><?php echo $user_value['user_city']."/".$user_value['user_town']; ?></td>
					<td><?php echo $user_value['user_time']  ;?></td>
					<td>
						<?php  if($user_value['recommend_oldUser']==null){
						 	echo  '';
						}else{
							echo  $user_value['recommend_oldUser'];
						}   ;?>
					</td>
					<td><a href="javascript:void(0)" onclick="youxiao(this)">有效</a></td>
					<td class="operation">
						<a href="javascript:void(0)" onclick="caozuo(this)">操作</a>
					</td>
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

<script type="text/javascript" src="<?php echo  base_url('admin/js/jquery-1.12.4.js') ; ?>"></script>
<script type="text/javascript" src="<?php echo  base_url('admin/js/public.js') ; ?>"></script>
<script type="text/javascript" src="<?php echo  base_url('admin/js/add_delete.js') ; ?>"></script>
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
		//顺序
		$(".bianhao").click(function(){




		});





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

		//获取兄弟节点
       var user_id=$(a).parent().siblings().eq(1).html();

        _html += '<tr class="viewopbox"><td colspan="13"><a href="<?php echo site_url('Wanhuu_member/add_edit') ;?>?id='+user_id+'">编辑</a><a href="javascript:void(0)" onclick="card_romve()">删除</a><a href="<?php echo site_url('Wanhuu_member/add_mbr') ;?>?id='+user_id+'">购买项目列表</a></td></tr>';
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
	function youxiao(a){
		var name = $(a).html();
		if(name=="有效") {
			$(a).html('无效');
		}
		if(name=="无效") {
			$(a).html('有效');
		}
	}
	$(".menber-tab .menber_thead tr th").click(function(){
		$(this).children('i').toggleClass('upper');
	})

   //排序方式


	//加载完成后获取相应的url 修改相应的连接地址
	//http://www.haitouwanhu.com/Wanhuu_member/index/user_id/ASC
	window.onload = function() {
      var	url=window.location.href;
      var  arr=url.split('/');
//		alert(arr[5]);  方式
//		alert(arr[6]);  顺序
     var  a;
	 var  b="url(../images/lower.png) no-repeat";
		if(arr[6]=="DESC"){
			 a="ASC";
		     b=""
		}else{
			 a="DESC";
		     b="upper";
		}

     if(arr[5]=="user_id"){
       c="http://www.haitouwanhu.com/Wanhuu_member/index/user_id/"+a;
	   document.getElementById("user_id").href=c;
		 $("#user_id").children().attr("class",b)

     }else if(arr[5]=="user_money"){
		 c="http://www.haitouwanhu.com/Wanhuu_member/index/user_money/"+a;
		 document.getElementById("user_money").href=c;
		 $("#user_money").children().attr("class",b)
	 }else if(arr[5]=="user_grade"){
		 c="http://www.haitouwanhu.com/Wanhuu_member/index/user_grade/"+a;
		 document.getElementById("user_grade").href=c;
		 $("#user_grade").children().attr("class",b)
	 }else if(arr[5]=="buy_num"){
		 c="http://www.haitouwanhu.com/Wanhuu_member/index/buy_num/"+a;
		 document.getElementById("buy_num").href=c;
		 $("#buy_num").children().attr("class",b)
	 }else  if(arr[5]=="buy_money"){
		 c="http://www.haitouwanhu.com/Wanhuu_member/index/buy_money/"+a;
		 document.getElementById("buy_money").href=c;
		 $("#buy_money").children().attr("class",b)
	 }



	};






</script>
</body>
</html>