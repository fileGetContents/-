$.validator.setDefaults({
    submitHandler: function() {

     var  username=$("#username").val();
     var  password=$("#password").val();
     var recommended=$("#recommended").val();
        $.ajax({
            type:"post",
            data:"phone="+username+"&password="+password+"&recommended="+recommended,
            dataType:"json",
            url:"http://www.haitouwanhu.com/Registered/insert",
            success:function(obj){
              if(obj==1){
                  window.location.href="http://www.haitouwanhu.com/"
              }else{
                  alert("注册失败")
              }
            },
            error: function () {
             alert("网络错误,请稍后在试");
            }
        })
    }
});
// 手机号验证
jQuery.validator.addMethod("userihone", function(value, element) {
    var tel = /^1[34578]\d{9}$/;
    return this.optional(element) || (tel.test(value));
},"请输入11位正确手机号码");
// 密码验证
jQuery.validator.addMethod("password", function(value, element) {
    var tel = /^[A-Za-z0-9]{6,16}$/;
    return this.optional(element) || (tel.test(value));
},"密码必须6~16字母或数字组成");

$().ready(function() {
    $("#registerForm").validate({
        // 指明错误放置的位置
        errorPlacement: function(error, element) {
            $( element ).parents( ".form-group" ).children('.text_vftn').append( error );
        },
        errorElement: "label",
        rules: {
            username: {
                required: true,
                remote:{
                    url:"http://www.haitouwanhu.com/Registered/in",
                    type:"post",
                    dataType:'json',
                    data:{
                        'phone':function (){
                            return  $("#username").val();
                        }
                    }
                }
            },
            password: {
                required: true
            },
            confirm_password: {
                required: true,
                password: true,
                equalTo: "#password"
            },
            pictureVerification: {
                required: true,
                remote:{
                    url:"http://www.haitouwanhu.com/User/captcha3",
                    type:"post",
                    dataType:'json',
                    data:{
                        'code':function (){
                            return  $("#pictureVerification").val();
                        }
                    }
                }
            },
            textVerification: {
                required: true,
                remote:{
                    url:"http://www.haitouwanhu.com/Registered/cap_num",
                    type:"post",
                    dataType:'json',
                    data:{
                        'num':function (){
                            return  $("#textVerification").val();
                        }
                    }
                }
            },
            "topic[]": {
                required: "#newsletter:checked",
                minlength: 2
            },
            agree: "required"
        },
        messages: {
            username: {
                required: "请输入用户名",
                  remote: "已经注册过了"
            },
            password: {
                required: "请输入密码"
            },
            confirm_password: {
                required: "请输入密码",
                equalTo: "两次密码输入不一致"
            },
            pictureVerification: {
                required: "请输入图片验证码",
                remote:"验证码不正确"
            },
            textVerification: {
                required: "请输入短信验证码",
                remote:"验证码错误",
            },
            agree: "请接受我们的声明"
        }
    });
});



function  cap(){

    var    cap=$("#pictureVerification").val();
    var  phone=$("#username").val();
    if(phone==""){
        $("#username").focus();
        return;
    }
    if(cap==""){
        $("#pictureVerification").focus();
        return;
    }

    $.ajax({
        type:"post",
        data:"code="+cap+"&phone="+phone,
        dataType:"json",
        url:"http://www.haitouwanhu.com/Registered/send",
        success:function(obj){
            time()
        },
        error: function (obj) {

        }
    })


}




// 短信
var wait=60;
function time() {
    if (wait == 0) {
        document.getElementById("cappp").removeAttribute("disabled");
        document.getElementById("cappp").value="获取验证码";
        wait = 60;
    } else {
        document.getElementById("cappp").setAttribute("disabled", true);
        document.getElementById("cappp").value="重新发送(" + wait + ")";
        wait--;
        setTimeout(function() {
            time()
        },1000);
    }
}