(function () {  
    $.MsgBox = { 
        Confirm: function (title, msg) {  
            GenerateHtml(title, msg);  
            btnOk();  
            btnNo();  
        }  
    }  
    //生成Html  
    var GenerateHtml = function (title,msg) {  
        var _html = "";  
        _html += '<div class="mb_box"></div><div class="mb_con"><span class="mb_tit">' + title + '</span>';  
        _html += '<a class="mb_ico">x</a><div class="mb_msg">' + msg + '</div><div class="mb_btnbox">';     
        _html += '<input class="mb_btn_ok" type="button" value="确定" />';  
        _html += '<input class="mb_btn_no" type="button" value="取消" />'; 
        _html += '</div></div>'; 
        //必须先将_html添加到body，再设置Css样式  
        $("body").append(_html);   
        //生成Css  
         GenerateCss();
         phoneCss(); 
    }  
    //生成Css  
    var GenerateCss = function () {  
        $(".mb_box").css({ width: '100%', height: '100%', zIndex: '1002', position: 'fixed',  
            filter: 'Alpha(opacity=60)', backgroundColor: 'black', top: '0', left: '0', opacity: '0.6',marginTop:'70px'  
        });  
        $(".mb_con").css({ zIndex: '1003', width: '30%', position: 'fixed',  
            backgroundColor: 'White', borderRadius: '3px'  
        });  
        $(".mb_tit").css({ display: 'block', fontSize: '14px', color: '#444', padding: '10px 15px',  
            backgroundColor: '#C69C6D', borderRadius: '3px 3px 0 0',fontWeight: 'bold'  
        });  
        $(".mb_msg").css({ padding: '20px', lineHeight: '20px',  
            borderBottom: '1px dashed #DDD', fontSize: '13px'  
        });  
        $(".mb_ico").css({ display: 'block', position: 'absolute', right: '10px', top: '10px', width: '20px', height: '20px', textAlign: 'center',  
            lineHeight: '18px', cursor: 'pointer', borderRadius: '50%',backgroundColor:'white'  
        });  
        $(".mb_btnbox").css({ margin: '15px 0 10px 0', textAlign: 'center' });  
        $(".mb_btn_ok,.mb_btn_no").css({ width: '85px', height: '30px', color: 'white', border: 'none',outline:'none',cursor: 'pointer',borderRadius: '3px' });  
        $(".mb_btn_ok").css({ backgroundColor: '#C69C6D'});  
        $(".mb_btn_no").css({ backgroundColor: 'gray', marginLeft: '20px' }); 
        $(".mb_ico").css({textDecoration:'none'}); 
        var _widht = document.documentElement.clientWidth;  //屏幕宽  
        var _height = document.documentElement.clientHeight; //屏幕高  
        var boxWidth = $(".mb_con").width();  
        var boxHeight = $(".mb_con").height();  
        //让提示框居中  
        $(".mb_con").css({ top: (_height - boxHeight) / 2 + "px", left: (_widht - boxWidth) / 2 + "px" });  
    }  
    //确定按钮事件  
    var btnOk = function () {  
        $(".mb_btn_ok").click(function () {  
            $(".mb_box,.mb_con").remove();
            window.location.href="http://www.haitouwanhu.com/Personal/cancel?id="+account;
        });  
    }  
    //取消按钮事件  
    var btnNo = function () {  
        $(".mb_btn_no,.mb_ico").click(function () {  
            $(".mb_box,.mb_con").remove();
        });  
    }


var phoneCss = function () {
    var winh = $(window).width();
    console.log(winh);
    if(winh < 768){
        $(".mb_con").css({width:'100%',left:'0px',top:'70px'});
    }
};
})(); 