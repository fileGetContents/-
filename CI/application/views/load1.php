<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="shortcut icon" href="<?php  echo base_url("static/favicon.ico") ;?>">
    <style>
        *{ margin:0; padding:0; }
        body { background:#f7f7f7; color:#333; font-size:14px; font-family:"Microsoft YaHei","微软雅黑","SimSun","宋体";}
        .work_look {
            width:1170px;
            margin: 100px auto 0;
            background: #e5f5ee;
            height:64px;
            border:1px solid #cbd7e3;
            padding: 10px 15px;
        }
        .work_look img {
            float: left;
        }
        .work_look p{
            font-size: 18px;
            line-height: 64px;
            margin-left:80px;
        }
        .contract_signing {
            width:500px;
            height: 300px;
            position: absolute;
            top:50%;
            left:50%;
            margin-left: -250px;
            margin-top: -150px;
            background: #fff;
            border-radius: 3px;
        }
        .contract_signing>p{
           font-size: 24px;
            margin-top: 50px;
            text-align: center;
        }
        .signing_input {
            width:220px;
            margin:50px auto;
        }
        .signing_input input {
            vertical-align: middle;
            margin-right: 3px;
        }
        .signing_checkbox {
            margin-bottom: 15px;
            margin-left: 145px;
        }
        .signing_checkbox input{
            vertical-align: middle;
            margin-right: 3px;
        }
        .signing_button {
            width:150px;
            margin:0 auto;
        }
        .signing_button input {
            width:180px;
            height: 40px;
            color:#fff;
            font-size: 16px;
            background: #333;
            border: none;
            border-radius: 3px;
            outline: auto;
        }
    </style>
</head>
<body>
<div class="work_look"  style="display: none;">
    <img src="images/dt." alt="">
<!--   // <p>支付正在进行中，请稍候.....</p>-->
</div>

<!--签署合同方式-->
<div class="contract_signing">
    <p>请选择合同签署方式</p>
   <form action="<?php echo  site_url('Pay/signWay') ;?>"  method="post">
    <div class="signing_input">
        <input type="radio" name="pag" value="1" checked>自动签署
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" name="pag" value="2">手动签署
    </div>
    <div class="signing_checkbox">
        <input type="checkbox">同意并签署
    </div>
    <div class="signing_button">
        <input type="submit" value="立即签署">
    </div>
   </form>
</div>

<script src="<?php  echo base_url('static/plugins/jquery-3.1.0.min.js');?> "></script>
<script>
    $(function(){
        var sig_chx = $(".signing_checkbox>input[type='checkbox']");
        var sig_sbt = $(".signing_button>input[type='submit']");
        sig_sbt.attr({"disabled":"disabled"});
        sig_chx.change(function(){
            if(this.checked){
                sig_sbt.css({"background":"#ffa61e",'cursor':'pointer'});
                sig_sbt.removeAttr("disabled");
            }else{
                sig_sbt.css({"background":"#333",'cursor':'default'});
                sig_sbt.attr({"disabled":"disabled"});
            }
        })
    })
</script>
</body>
</html>