// 删除银行卡
var account="";
function add_delete(name) {
    var bank = $(name).parent().siblings('.bank').html();
    account = $(name).parent().siblings('.account').children('span').html();
    var add = bank.split('行');
    var text = account.substr(account.length-4);
    $.MsgBox.Confirm("温馨提示", "你是否确认解除和"+ add[0] +"行[尾号"+ text +"]的绑定关系");
}
// 短信
var wait=60;
var Num="";
function time2(){
        if (wait == 0){
            document.getElementById("ml-30").removeAttribute("disabled");
            document.getElementById("ml-30").value="获取验证码";
            wait = 60;
        } else {
            document.getElementById("ml-30").setAttribute("disabled", true);
            document.getElementById("ml-30").value="重新发送(" + wait + ")";
            wait--;
            setTimeout(function() {
                time2()
            },1000);
        }
}

function time() {
   Num="";
    var  captcha=$("#Captcha").val();
    for(var i=0;i<6;i++)
    {
        Num+=Math.floor(Math.random()*10);
    }
    if(captcha==""){
        $("#Captcha").focus();
        return;
    }else{
//验证码提交
        $.ajax({
            type:"post",
            data:"code="+captcha+"&num="+Num,
            dataType:"json",
            url:"http://www.haitouwanhu.com/User/captcha2",
            success:function(obj){
                if(obj==1){
                    time2();
                }else{
                    $("#Captcha").focus();
                }
            },
            error:function(){
                alert("服务器繁忙");
            }
        });
    }
}

// 打开银行卡
function add_bank_open(){
    var  num=$("#span_num").html();
    if(num<3){
    $("#add_bank").removeClass('hide');
    $(".background").removeClass('hide');
    }else{
        alert("最多支持绑定三张");
    }
}
// 关闭银行卡
function add_bank_shut(){

        $("#add_bank").addClass('hide');
        $(".background").addClass('hide');

}
$(function(){
	// 手机号 隐藏4位
    var tel= $("#main .apply .number_phone span").html();
    var reg = /^(\d{3})\d{4}(\d{4})$/;
    tel = tel.replace(reg, "$1****$2");
    $("#main .apply .number_phone span").html(tel);
});




function  sub(){
    var token=$("#token").val();
    var bank=$("input[name=bank]").val();//提现账号
    var money=parseFloat($("#money").val())+2;//提现金额
    var num=$("#num").val();
    if(num!="" && num==Num){
        $.ajax(
            {
                type:"post",
                data:"bank="+bank+"&money="+money+"&token="+token,
                dataType:"json",
                url:"http://www.haitouwanhu.com/Personal/ajax_withdraw",
                cache:false,
                async: false,
                beforeSend:function()   //开始执行的的时间
                {   //触发ajax请求开始时执行
                    $('#sub').val('提交订单中...');
                    $('#sub').attr('onclick','javascript:void();');//改变提交按钮上的文字并将按钮设置为不可点击
                },
                success: function (obj)  //成功提交
                {
                    if(obj==1)
                    {
                        window.location.href="http://www.haitouwanhu.com/Personal/withdraw";
                    }
                    else
                    {
                        alert("提现失败");
                        window.location.href="http://www.haitouwanhu.com/Personal/withdraw";
                    }
                },
                error: function ()  //网络故障
                {
                 alert('网络故障')
                }


            });
    }



}




