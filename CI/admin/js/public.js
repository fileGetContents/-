$(document).ready(function(){
    var $tab_li = $(".dropdown>ul>li>a");
    $tab_li.click(function(){
        $(this).parent().addClass('active').siblings('.active').removeClass('active');
    })
})
// 模态框
function showModal(div_id) { 
	// 获取传入的DIV 
	var $div_obj = $("." + div_id); 
	// 添加并显示遮罩层 
	$("<div class='background'></div>").click(function() { 
		// hideDiv(div_id); 
	}).appendTo("body").fadeIn(200);
	// 显示弹出的DIV 
	$div_obj.animate({
		opacity : "show" 
	}, "slow"); 
};
// 隐藏弹出DIV
function hideModal(div_id) {
	$("." + div_id).animate({ 
		opacity : "hide" 
	}, "slow");
	$(".background").remove();
}


// table 搜索
$('#key').keyup(function(){
	$('#table tbody tr').hide().filter(":contains('" +($(this).val()) + "')").show();
}).keyup();//DOM加载完时，绑定事件完成之后立即触发

/*// table 全选
$("#table input[name='select']").click(function(){
	//判断当前点击的复选框处于什么状态$(this).is(":checked") 返回的是布尔类型
	if($(this).is(":checked")){
		$("#table input[name='option']").prop("checked",true);
		$("#table tr").css({
			background:'#FDF3D2'
		})
	}else{
		$("#table input[name='option']").prop("checked",false);
		$("#table tr").css({
			background:'#fff'
		})
	}
});
$("#table input[name='option']").click(function(){
	if($(this).is(":checked")){
		$("#table tr").css({
			background:'#FDF3D2'
		})
	}else{
		$("#table tr").css({
			background:'#fff'
		})
	}
})*/


// tr显示
function hide_title(this_value,class_tr){
	var checkValue = $("."+ this_value).val();
	if(checkValue == "custom") {
		$("."+ class_tr).show();
	}
	if(checkValue != "custom") {
		$("."+ class_tr).hide();
	}
}

// 全选
function add_list(can){
	var add = $(".modal_form input[type='checkbox'],.menber-tab input[type='checkbox']");
	if($(can).is(":checked")){
		add.prop("checked",true);
	}else{
		add.prop("checked",false);
	}
}
function add_edit(jhg,jdd){
	var dd = $(".modal_form tr td input[name="+jdd+"]");
	if($(jhg).is(":checked")){
		dd.prop("checked",true);
	}else{
		dd.prop("checked",false);
	}
}