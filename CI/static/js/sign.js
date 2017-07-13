$(function(){
    var span_text = $(".signing_input > span.signing_input_span > i").html();
    var input_color = $(".signing_input > input");
    if(span_text == "订单正在处理中..."){
        input_color.css({
            cursor:'Default',
            background: '#333333'
        })
    }
    if(span_text == "已完成"){
        input_color.css({
            cursor:'pointer',
            background: '#FFA61E'
        })
    }
    var dct_height = $(window).height();
    var input_height = $(".container>div").height();
    $("#iframeId").css({
        "height": dct_height - input_height - 35
    });
})