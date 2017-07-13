$.validator.setDefaults({
    submitHandler: function() {
        var  phone=$("#username").val();      //电话号码
        var   pass=$("#password").val();      //密码
        var  cap=$("#pictureVerification").val();             //验证码
        var  checkbok=$("#checkbok").val();   //记住密码
        if(phone!=""  && pass!=""){
            $.ajax({
                type:"post",
                data:"phone="+phone+"&code="+cap+"&passwork="+pass+"&checkbok="+checkbok,
                dataType:"json",
                url:"http://localhost/CI/User/login_user",
                success:function(obj){
                    if(obj==1){
                        window.location="http://localhost/CI/"
                    }else if(obj==2){
                        $("#cap").focus();
                    }else{
                        alert("账号或者密码错误")
                    }
                },
                error:function(){
                }
            })
        }else{
            $("#username").focus();
        }
    }
});

$().ready(function() {
    $("#signInForm").validate({
        // 指明错误放置的位置
        errorPlacement: function(error, element) {
            $( element ).parents( ".form-group" ).children('.text_vftn').append( error );
        },
        errorElement: "label",
        rules: {
            username: {
                required: true,
                remote:{  //验证账号
                    url:"http://localhost/CI/User/ajax_phone",
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
            pictureVerification: {
                required: true,
                remote:{  //验证
                    url:"http://localhost/CI/User/ajax_cop",
                    type:"post",
                    dataType:'json',
                    data:{
                        'code':function (){
                            return  $("#pictureVerification").val();
                        }
                    }
                }

            },
            agree: "required"
        },
        messages: {
            username: {
                required: "请输入手机",
                remote:"还未注册过哦"
            },
            password: {
                required: "请输入密码"
            },
            pictureVerification: {
                required: "请输入图片验证码",
                remote:"验证码错误"

            }
        }
    });
});


