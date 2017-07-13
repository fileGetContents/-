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
		<div id="new_table">
			<table class="modal_form" cellpadding="0" cellspacing="0">
				<tbody>
					<tr>
						<td class="item_title">推荐人账号:</td>
						<td  id="phone"><?php echo  $oldUser; ?></td>
                    </tr>
                    <tr>
                        <td class="item_title">推荐用户:</td>
                        <td><?php
                            foreach($people  as $value){
                                echo  $value['recommend_newUser']."&nbsp;&nbsp|    ";
                            }
                            ?></td>
                    <tr>
                         <td class="item_title">购买总金额:</td>
                         <td><?php echo $rebate2; ?></td>
                    </tr>
                    <tr>
                        <td class="item_title">返利金额:</td>
                       <td><input  id="money" type="text"/></td>
                    </tr>
                    <tr>
                     <td class="item_title"></td>
                         <td class="item_submit item_fanhui">
                             <input type="submit" class="button" value="确认返利">
                             <a href="javascript:history.back(-1)" target="menuFrame">返回列表</a>
                          </td>
                    </tr>
</tbody>
</table>
</div>
</div>
<script type="text/javascript" src="<?php echo  base_url('admin/js/jquery-1.12.4.js'); ?>"></script>
<script type="text/javascript" src="<?php echo  base_url('admin/js/public.js'); ?>"></script>
<script type="text/javascript">
    $(function(){

        $("input[type=submit]").click(function(){
            var  phone=$("#phone").html();
            var  money=$("#money").val();
            $.ajax({
                type:"post",
                data:"phone="+phone+"&money="+money,
                dataType:"json",
                url:"http://www.haitouwanhu.com/Wanhuu_capital/ajax_rebate",
                success:function(obj){
                    if(obj==1){
                        alert('返利成功');
                     $("#money").val('');
                    }else{
                        alert('返利失败')
                    }
                },
                error:function(){
                    alert('网络故障')
                }
            })

        });

    })
</script>
</body>
</html>