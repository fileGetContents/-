$(function(){
    // 加
    $(".plus").click(function(){
        var n=$(".share").val();
        var s=$(".surplus span").html();
        var num = parseInt(n)+1;
        var a = parseInt($(".copies").text())+1;
        if(num==a){return}
        $(".share").val(num);
        surplus();
        setTotal();
    })
    // 减
    $(".reduce").click(function(){
        var n=$(".share").val();
        var num = parseInt(n)-1;
        if(num==0){return};
        $(".share").val(num);
        surplus();
        setTotal();
    })
    // 认购剩余分数
    function surplus(){
        var s=parseFloat($(".copies").text());
        var a= s-parseFloat($(".share").val());
        $(".surplus span").html(a);
    }
    // 总和
    function setTotal(){
         var amount = (parseFloat($(".share").val()) * parseFloat($('.price').html().replace(',',''))).toFixed(2);
        $('.total').text('￥'+amount + '元');
        // 默认剩余份数
        var score = parseInt($(".copies").text())-parseInt($(".share").val());
        $(".surplus span").html(score);
    }


    // 回车执行
    function buttons(){
        var a = $(".share").val();
        var c = $(".surplus span").html();
        var b =parseInt($(".copies").text());
        if(a>b || a<=0 || !(/^\d+$/).test(a)){
            $(".share").val(b);
        }
    }
    // 失去焦点执行
    $(".share").blur(function(){
        buttons();
        surplus();
        setTotal(); 
    })
    // 回车事件
    $(".share").bind('keypress',function(event){
        if(event.keyCode == 13){
            buttons();
            surplus();
            setTotal();  
        }
    });
    setTotal();

    // 图片方案
    $("#programme").change(function(){
        var index = $(this).val()-1;
        $('.orofit ul li').eq(index).show().siblings().hide();
    });


    //提交方案
    $("#yu_buy").click(function(){

        var         id=$("#project_id").html();                //项目id
        var      names=$("#name").html();                      //项目名字
        var        tag=$("#programme").val();                     //方式
        var      price=$("#price").html();                     //单价
        var   test_box=$("#text_box").val();                   //份数
        var  proce_all=$("#pace_all").html();           //支付总价,
        var  proce=proce_all.length;
        var  a=parseFloat(proce_all.substring(1,proce-1));
        $.ajax({
            url:"http://localhost/CI/Project/buy_ajax",
            data:"id="+id+"&names="+names+"&tag="+tag+"&price="+price+"&test_box="+test_box+"&proce_all="+a,
            dataType:"json",
            type:"post",
            success:function(obj){
                // alert(obj);
                if(obj==1){
                    window.location="http://localhost/CI/Project/buy_sore"
                }else{
                    alert("你还未通过实名认证,请通过实名认证后购买");
                    window.location="http://localhost/CI/Personal/index"
                }
            },
            error:function(){
                alert("系统繁忙,请稍后再试")
            }
        })
    });



});