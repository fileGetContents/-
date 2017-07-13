// 轮播图
var swiper = new Swiper('.swiper-container', {
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev',
    pagination: '.swiper-pagination',
    paginationType: 'fraction'
});
// 取消
function cancel(ts){
    $(ts).parent().addClass('hide');
    $(ts).parent().siblings('.data_yes').removeClass('hide');
    $(ts).parent().siblings('.data_hello').removeClass('hide');
    $(ts).siblings('.txt_cancel').val("");
    $(ts).siblings('.real_status').text("");

}
// 修改
function modify(tc){
    $(tc).parent().addClass('hide');
    $(tc).parent().siblings('.data_yes').addClass('hide');
    $(tc).parent().siblings('.data_no').removeClass('hide');
    $(tc).parent().siblings('.real_yes').addClass('hide');
}
// 邮箱验证
function vcn_email(cc){
    var regtitle_b = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var $user_email= $(".txt_email").val();
    if($user_email == "") {
        $(".txt_email").focus();
        return;
    }
    if(!regtitle_b.test($user_email)) {
        alert("请填写有效的邮箱");
        $(".txt_email").focus();
        return;
    }
    //提交事件
    $.ajax({
        type:"post",
        data:"email="+$user_email,
        dataType:"json",
        url:"http://www.haitouwanhu.com/Personal/ajax_email",
        success:function(obj){
            if(obj==1){
                $(cc).parent().siblings('.real_yes').children("div").html($user_email);
                $(cc).parent().siblings('.data_hello').children("a").html("修改邮箱");
                add_this(cc);
                window.location.href="http://www.haitouwanhu.com/Personal/index"
            }else{
                alert("修改失败");
                window.location.href="http://www.haitouwanhu.com/Personal/index"
            }
        },
        error:function(){
             alert("服务器繁忙");
        }

    });



}
// 密码验证
function vcn_password(cc){
    var regtitle =  /^[A-Za-z0-9]{6,16}$/;
    var $user_pwd = $(".txt_pwd_new").val();
    var $user_pwds = $(".txt_pwd_news").val();
    if($user_pwd == "") {
        $(".txt_pwd_new").focus();
        return;

    }
    if($user_pwds == "") {
        $(".txt_pwd_news").focus();
        return;

    }
    if ($user_pwd.length < 6 || $user_pwd.length > 16) {
        alert("密码有效长度6-16位");
        $(".txt_pwd_new").focus();
        return;
    }
    if ($user_pwds !== $user_pwd) {
        alert("两次输入的密码不一致");
        $(".txt_pwd_news").focus();
        return;
    }
    if (!regtitle.test($user_pwd)) {
        alert('密码必须是数字或字母组成');
        $(".txt_pwd_new").focus();
        return;
    }


    $.ajax({
        type:"post",
        data:"passwork="+$user_pwds,
        dataType:"json",
        url:"http://www.haitouwanhu.com/Personal/ajax_pass_work",
        success:function(obj){
            if(obj==1){
                alert("修改成功");
                cancel(cc);
            }else if(obj==2){
                alert("修改失败");
            }else{
                alert("修改失败")
            }
        },
        error:function(){
            alert("服务器繁忙");
        }
    })

}
// 住址
function vcn_address(cc){
    var address = $(".txt_address").val();
    if(address == "") {
        $(".txt_address").focus();
        return;
    }


    $.ajax({
        type:"post",
        data:"address="+address,
        dataType:"json",
        url:"http://www.haitouwanhu.com/Personal/ajax_address",
        success:function(obj){
            if(obj==1){
                $(cc).parent().siblings('.real_yes').children("div").html(address);
                add_this(cc);
             }else{
                alert("修改失败")
            }
        },
        error:function(){
            alert("服务器繁忙");
        }
    });



}
// 微信
function vcn_wechat(cc){
    var reg =/^[a-zA-Z][a-zA-Z0-9_-]{5,19}$/; 
    var wechat = $(".txt_wechat").val();
    if(wechat == "") {
        $(".txt_wechat").focus();
        return;
    }
    if(!reg.test(wechat)){
        alert('微信账号仅支持6-20个字母、数字、下划线或减号,以字母开头');
        $(".txt_wechat").focus();
        return;
    }

    $.ajax({
        type:"post",
        data:"wechat="+wechat,
        dataType:"json",
        url:"http://www.haitouwanhu.com/Personal/ajax_wechat",
        success:function(obj){
            if(obj==1){
                $(cc).parent().siblings('.real_yes').children("div").html(wechat);
                $(cc).parent().siblings('.data_hello').children("a").html("修改");
                add_this(cc);
                window.location.href="http://www.haitouwanhu.com/Personal/index"
            }else if(obj==2){
                alert("微信号已被绑定过了");
                window.location.href="http://www.haitouwanhu.com/Personal/index"
            }else{
                alert("修改失败");
                window.location.href="http://www.haitouwanhu.com/Personal/index"
            }
        },
        error:function(){
            alert("服务器繁忙");
        }
    });






}
// 实名认证
function vcn_realname(ff){
    var reg = /^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}([0-9]|X)$/;
    var realname = $(".txt_realname").val();
    var realnames = $(".txt_realnames").val();
    if (realname == "") {
        $(".txt_realname").focus();
        $('.real_status').text("请输入真实姓名");
        return;
    }
    if (realnames == "") {
        $(".txt_realnames").focus();
        $('.real_status').text("请输入身份证号");
        return;
    }
    if (!reg.test(realnames)) {
        $(".txt_realnames").focus();
        $('.real_status').text("请输入有效的身份证号");
        return;
    }else {
        $('.real_status').text("");
    }
    $.ajax({
        type:"post",
        data:"name="+realname+"&IDcard="+realnames,
        dataType:"json",
        url:"http://www.haitouwanhu.com/Personal/ajax_IDcard",
        success:function(obj){
            if(obj==1) {
                add_this(ff);
                $(ff).parent().siblings('.data_realname').children("a").addClass('hide');
                $(".data_realname span").html("已认证");
                $(ff).parent().siblings('.real_yes').children("div.yes_one").children().html(realname);
                $(ff).parent().siblings('.real_yes').children("div.yes_ywo").children().html(realnames);
                var tel = $(".real_yes div.yes_ywo span").html();
                var reg = /^(\d{6})\d{8}(\d{4})$/;
                tel = tel.replace(reg, "$1****$2");
                $(".real_yes div.yes_ywo span").html(tel);
            }else{
                alert("认证失败")
                window.location.href="http://www.haitouwanhu.com/Personal/index"
            }
        },
        error:function(){
            alert("服务器繁忙");
        }
    });




    add_this(ff);
    $(ff).parent().siblings('.data_realname').children("a").addClass('hide');
    $(".data_realname span").html("已认证");
    $(ff).parent().siblings('.real_yes').children("div.yes_one").children().html(realname);
    $(ff).parent().siblings('.real_yes').children("div.yes_ywo").children().html(realnames);


    var tel= $(".real_yes div.yes_ywo span").html();
    var reg = /^(\d{6})\d{8}(\d{4})$/;
    tel = tel.replace(reg, "$1****$2");
    $(".real_yes div.yes_ywo span").html(tel);
}
// 修改成功
function add_this(ff){
    $(ff).parent().addClass('hide');
    $(ff).parent().siblings('.real_yes').removeClass('hide');
    $(ff).parent().siblings('.data_yes').addClass('hide');
    $(ff).parent().siblings('.data_hello').removeClass('hide');
    
}
// 我的资金 切换背景
var money1 = $("#main .my_capital .no_money.n_m_1 span").html();
var money2 = $("#main .my_capital .no_money.n_m_2 span").html();
var money3 = $("#main .my_capital .no_money.n_m_3 span").html();
if(money1 !=='0.00元'){
    $("#main .my_capital .no_money.n_m_1").addClass('money');
}
if(money2 !=='0.00元'){
    $("#main .my_capital .no_money.n_m_2").addClass('money');
}
if(money3 !=='0.00元'){
    $("#main .my_capital .no_money.n_m_3").addClass('money');
}

/*最新消息 模态框 START*/
function showNews(ns){
    var news = $(ns).html();
    $("#modal").removeClass('hide');
    $("#background").removeClass('hide');
    $("#modal .mdl_text").html(news);
}
$(function(){
    $("#mdl_hide").click(function(){
        $("#modal").addClass('hide');
        $("#background").addClass('hide');
    })
})
/*最新消息 模态框 END*/

/*申请退款 START*/
var  a;
function showRefund(as){
    a=$(as).parent().siblings().eq(0).children().eq(0).html();
    $(".apply_refund").removeClass('hide');
    $("#background").removeClass('hide');
    var money = $(as).parent().siblings('.money').html();
    $(".apply_refund .apy_body input").val(money);

}
$(function(){
  $("#refund").click(function(){

      var  whu=$("#whyRefund").val();
      var mon=$("#money1").val();
      if(whu!=""){
          $.ajax({
              type:"post",
              data:"whu="+whu+"&mon="+mon+"&order="+a,
              dataType:"json",
              url:"http://www.haitouwanhu.com/Personal/ajax_refund",
              success:function(obj){
                  if(obj==1){
                      alert('退款成功');
                      window.location="http://www.haitouwanhu.com/Personal/index"
                  }else if(obj==3){
                      alert('退款中');
                      window.location="http://www.haitouwanhu.com/Personal/index"
                  }else{
                      alert('退款失败')
                  }
              },

              error:function(){
                  alert('网络故障')
              }
          })
      }else{
          alert('请选择退款理由')
      }
  })

})


$(function(){
    $("#apy_hide").click(function(){
        $(".apply_refund").addClass('hide');
        $("#background").addClass('hide');
    });

})
/*申请退款 END*/
