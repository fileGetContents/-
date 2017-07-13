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
        _html += '<div class="background_dle"></div><div class="delete"><div class="tishi"><span>'+title+'</span><a href="javascript:;"></a></div><div class="queren"><i></i>'+msg+'</div><div class="quxiao"><input type="button" value="确认"><a href="javascript:;">取消</a></div></div>';
        //必须先将_html添加到body，再设置Css样式  
        $("body").append(_html);
        //生成Css  
         GenerateCss();  
    }  
    //生成Css  
    var GenerateCss = function () { 
        console.log("cc");
        $(".background_dle").css({
            width: '100%',
            height: '100%',
            position: 'fixed',
            top: '0',
            left: '0',
            bottom: '0',
            right: '0',
            zIndex: '1001',
            backgroundColor:'#8f9f8f',
            '-moz-opacity': '0.7',
            opacity: '.70',
            filter: 'Alpha(opacity=70)'
        });
        $(".delete").css({ zIndex: '2001', width: '500px',height: '280px', position: 'fixed',  
            backgroundColor: 'White', borderRadius: '5px',color:'#535e66', fontWeight: 'bold' 
        });
        $(".delete .tishi").css({
            padding: '20px'
        });

        $(".delete .tishi span").css({
            fontSize: '16px'
        });
        $(".delete .tishi a").css({
            display: 'inline-block',
            width: '16px',
            height: '16px',
            background: 'url(../images/icons.png)49px -95px',
            float: 'right'
        });
        $(".delete .queren").css({
            position: 'relative',
            height: '160px',
            lineHeight: '160px',
            textAlign: 'center',
            borderBottom: '1px solid #dadada',
            borderTop: '1px solid #dadada'
        });
        $(".delete .queren i").css({ 
            display: 'inline-block',
            width: '48px',
            height: '48px',
            position: 'absolute',
            top:'50px',
            left: '130px',
            background: 'url(../images/icons.png)-48px 0px'
        }); 
        $(".delete .quxiao").css({
            float: 'right',
            marginTop: '10px',
            marginRight: '10px'
        });

        $(".delete .quxiao input,.delete .quxiao a").css({
            borderRadius: '3px',
            color:'#fff',
            fontSize: '12px'
        });  
        $(".delete .quxiao input").css({
            padding:'6px 26px',
            background:'#0095D9',
            cursor: 'pointer',
            border: 'none',
            outline: 'none',
            marginRight: '10px'
        });  
        $(".delete .quxiao a").css({ 
            width: '77px',
            height: '30px',
            textAlign: 'center',
            lineHeight: '29px',
            display: 'inline-block',
            background: '#546A79',
            textDecoration: 'none',
            fontWeight: 'normal'
        });  
        var _widht = document.documentElement.clientWidth;  //屏幕宽  
        var _height = document.documentElement.clientHeight; //屏幕高  
        var boxWidth = $(".delete").width();  
        var boxHeight = $(".delete").height();  
        //让提示框居中  
        $(".delete").css({ top: (_height - boxHeight) / 2 + "px", left: (_widht - boxWidth) / 2 + "px" });  
    }   
    //取消按钮事件  
    var btnNo = function () {
        $(".delete .quxiao a,.delete .tishi a").click(function () {  
            $(".delete,.background_dle").remove();
        });  
    }  
})(); 