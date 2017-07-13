$.validator.setDefaults({
    submitHandler: function() {
        var phone= $("#username").val();
        var passwork=$("#password").val();
        $.ajax({
            type:"post",
            data:"phone="+phone+"&passwork="+passwork,
            dataType:"json",
            url:"http://www.haitouwanhu.com/User/up",
            success:function(obj){
                if(obj==1){
                    alert("重置密码成功");
                    window.location.href="http://www.haitouwanhu.com/User/index"
                }else{
                    alert("重置密码失败")
                }
            },
            error:function(){
            }
        })


    }
});
// 密码验证
jQuery.validator.addMethod("password", function(value, element) {   
    var tel = /^[A-Za-z0-9]{6,16}$/;
    return this.optional(element) || (tel.test(value));
},"密码必须6~16字母或数字组成");
$().ready(function() {
  $("#confirmPassword").validate({
        // 指明错误放置的位置
        errorPlacement: function(error, element) {
            $( element ).parents( ".form-group" ).children('.text_vftn').append( error );
        },
        errorElement: "label",
        rules: {
            username: {
                required: true,
                remote:{
                    url:"http://www.haitouwanhu.com/User/presence",
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
                required: true,
                minlength: 6
            },
            confirm_password: {
                required: true,
                minlength: 6,
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
                agree: "required"
            },
            messages: {
              username: {
                required: "请输入用户名",
                  remote:"未注册过哦"
              },
            password: {
                required: "请输入密码",
                minlength: "密码长度不能小于 6 "
              },
            confirm_password: {
                required: "请输入密码",
                minlength: "密码长度不能小于 6",
                equalTo: "两次密码输入不一致"
            },
            pictureVerification: {
                required: "请输入图片验证码",
                remote:"验证码不正确"
            },
            textVerification: {
                required: "请输入短信验证码",
                remote:"短信验证码不正确"
            }
        }
    });
});

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
        url:"http://www.haitouwanhu.com/User/send",
        success:function(obj){
            if(obj>1){
                time()
            }
        },
        error: function (obj) {
        }
    })

}