<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- IE 兼容模式 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- 采用高速模式 暂时只支持360浏览器 -->
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>海投万户-发起众筹</title>
    <meta name="Keywords" content="海外房地产,海外资产配置,地产众筹,众筹,收益权,收益权众筹,固定回报,投资理财,美国,纽约,美国地产,公寓,酒店,独栋,别墅,haitouwanhu,万户,海投万户,海投萬户">
    <meta name="description" content="海投万户、海投萬户是以国内投资者的视角，主要针对海外房地产收益权投资的金融平台。专注海外地产市场的旧屋改造和固定收益类项目。打造国内投资者对全球资产投资的新型众筹平台。">
    <link rel="shortcut icon" href="<?php echo base_url('static/images/favicon.ico') ;?>">
    <link href="<?php echo   base_url('static/plugins/bootstrap-3.3.0/css/bootstrap.min.css') ;?>" rel="stylesheet">
    <!-- 下面上传插件 -->
    <link rel="stylesheet" href="<?php  echo base_url("static/css/public.css"); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/plugins/jiaoben/diyUpload/css/webuploader.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/plugins/jiaoben/diyUpload/css/diyUpload.css');?>">

    <link rel="stylesheet" href="<?php echo base_url("static/css/hair_crowdfunding.css") ;?>">
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- 页头 START -->
<div id="header">
    <?php  require_once("static/include/header.php") ;?>
</div>
<!-- 页头 END -->
<form  action="<?php  echo  site_url("Aboutus/user_pro") ;?>" method="post">
<!-- 主体 START -->
<div id="main">
    <div class="container-fluid">
        <div class="ist_product">
            <h3>发起众筹</h3>
            <p>WE INSURE THE BEST SERVICE & FULL HELP</p>
            <span>我们为您提供最好的服务和帮助</span>
        </div>
    </div>
    <div class="container form_name">
        <div class="form_head">
            <h1>建立您的项目信息</h1>
        </div>
        <div class="col-md-7 col-md-offset-2">
            <div class="form_group">
                <label for="" class="col-md-4 form_label">项目名称：</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" placeholder="项目名称" name="pro_name">
                </div>
            </div>
            <div class="form_group">
                <label for="" class="col-md-4 form_label">项目方公司名称：</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" placeholder="项目方公司名称" name="pro_corporation">
                </div>
            </div>
            <div class="form_group">
                <label for="" class="col-md-4 form_label">联系人姓名：</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" placeholder="联系人姓名" name="pro_userName">
                </div>
            </div>
            <div class="form_group">
                <label for="" class="col-md-4 form_label">联系人电话：</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" placeholder="联系人电话" name="pro_userPhone">
                </div>
            </div>
            <div class="form_group">
                <label for="" class="col-md-4 form_label">联系人Email：</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" placeholder="联系人Email" name="pro_userEmail">
                </div>
            </div>
            <div class="form_group">
                <label for="" class="col-md-4 form_label">项目地址：</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" placeholder="项目地址" name="pro_userAddress">
                </div>
            </div>
            <div class="form_group">
                <label for="" class="col-md-4 form_label">项目形态：</label>
                <div class="col-md-8">
                    <select name="pro_configuration">
                        <option>集中式</option>
                        <option>分散式公寓</option>
                        <option>咖啡店</option>
                        <option>其他</option>
                    </select>
                </div>
            </div>
            <div class="form_group">
                <label for="" class="col-md-4 form_label">建筑面积：</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" placeholder="建筑面积" name="pro_area">
                </div>
            </div>
            <div class="form_group">
                <label for="" class="col-md-4 form_label">总改造成本：</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" placeholder="总改造成本" name="pro_homeDegression">
                </div>
            </div>
            <div class="form_group">
                <label for="" class="col-md-4 form_label">房源租入金(月)：</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" placeholder="房源租入金(月)" name="pro_homeRent">
                </div>
            </div>
            <div class="form_group">
                <label for="" class="col-md-4 form_label">房源租约开始日期：</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" placeholder="房源租约开始日期" name="pro_rentStart">
                </div>
            </div>
            <div class="form_group">
                <label for="" class="col-md-4 form_label">房源租约结束日期：</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" placeholder="房源租约结束日期" name="pro_rentOver">
                </div>
            </div>
            <div class="form_group">
                <label for="" class="col-md-4 form_label">物业费(月)：</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" placeholder="物业费(月)" name="pro_utilities">
                </div>
            </div>
            <div class="form_group">
                <label for="" class="col-md-4 form_label">运营成本(月)：</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" placeholder="运营成本(月)" name="pro_opex">
                </div>
            </div>
            <div class="form_group">
                <label for="" class="col-md-4 form_label">其他支出(月)：</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" placeholder="其他支出(月)" name="pro_otherSpending">
                </div>
            </div>
            <div class="form_group">
                <label for="" class="col-md-4 form_label">预计项目收入(月)：</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" placeholder="预计项目收入(月)" name="pro_income">
                </div>
            </div>
            <div class="form_group">
                <label for="" class="col-md-4 form_label">收入形式：</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" placeholder="收入形式" name="pro_incomeTag">
                </div>
            </div>
            <div class="form_group">
                <label for="" class="col-md-4 form_label">开始运营时间：</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" placeholder="开始运营时间" name="pro_renStart">
                </div>
            </div>
            <div class="form_group">
                <label for="" class="col-md-4 form_label">目标众筹金额：</label>
                <div class="col-md-8">
                    <input type="text" class="form-control" placeholder="目标众筹金额" name="pro_moneyAll">
                </div>
            </div>
            <div class="form_group">
                <label for="" class="col-md-4 form_label">项目简介：</label>
                <div class="col-md-8">
                    <textarea name="pro_introduce" id="" cols="50" rows="50" class="form-control"></textarea>
                </div>
            </div>
            <div class="form_group">
                <label for="" class="col-md-4 form_label">上传图片：</label>
                <div class="col-md-8">
                    <!-- 上传图片 -->
                    <div style="margin-bottom:10px;">图片大小不超过2MB，支持png/jpg格式</div>
                    <div id="box">
                        <div id="test" ></div>
                    </div>
                </div>
            </div>
            <div class="form_group">
                <div class="col-md-4 col-md-offset-4">
                    <input type="button" value="提交">
                </div>
            </div>
        </div>
    </div>
</div>

</form>
<!-- 主体 END -->

<!-- 页脚部分 START -->
<div id="foot"  class="visible-md visible-lg">
    <?php require_once('static/include/part.php'); ?>
</div>
<!-- 页脚部分 END -->

<!-- 页脚 START -->
<div id="footer">
    <?php require_once('static/include/footer.php'); ?>
</div>
<!-- 页脚 END -->

<script src="<?php  echo base_url('static/plugins/jquery-2.1.4.min.js')  ;?>"></script>
<script src="<?php  echo base_url('static/plugins/bootstrap-3.3.0/js/bootstrap.min.js'); ?>"></script>
<!-- 上传图片 -->
<script type="text/javascript" src="<?php echo base_url('static/plugins/jiaoben/diyUpload/js/webuploader.html5only.min.js') ;?>"></script>
<script type="text/javascript" src="<?php echo base_url('static/plugins/jiaoben/diyUpload/js/diyUpload.js'); ?>"></script>
<script src="<?php echo base_url('static/js/hairCrowdfunding.js') ;?>"></script>
<script type="text/javascript"  src="<?php echo base_url('static/js/public.js') ;?>"></script>
<!-- 返回顶部 -->
<a href="javascript:;" id="return_top" class="return_top" title="回到顶部"></a>
<script type="text/javascript">

    $("input[type=button]").click(function(){
        var pro_name=$("input[name=pro_name]").val();
        var pro_corporation=$("input[name=pro_corporation]").val();
        var pro_userName=$("input[name=pro_userName]").val();
        var pro_userPhone=$("input[name=pro_userPhone]").val();
        var pro_userEmail=$("input[name=pro_userEmail]").val();
        var pro_userAddress=$("input[name=pro_userAddress]").val();
        var pro_configuration=$("select[name=pro_configuration]").val();
        var pro_area=$("input[name=pro_area]").val();
        var pro_homeDegression=$("input[name=pro_homeDegression]").val();
        var pro_homeRent=$("input[name=pro_homeRent]").val();
        var pro_rentStart=$("input[name=pro_rentStart]").val();
        var pro_rentOver=$("input[name=pro_rentOver]").val();
        var pro_utilities=$("input[name=pro_utilities]").val();
        var pro_opex=$("input[name=pro_opex]").val();
        var pro_otherSpending=$("input[name=pro_otherSpending]").val();
        var pro_income=$("input[name=pro_income]").val();
        var pro_incomeTag=$("input[name=pro_incomeTag]").val();
        var pro_renStart=$("input[name=pro_renStart]").val();
        var pro_moneyAll=$("input[name=pro_moneyAll]").val();
        var pro_introduce=$("textarea[name=pro_introduce]").val();
        var a=document.getElementsByClassName("diyFileName");
        var pro_images="";
         for (var i=0;i< a.length;i++){
             pro_images=pro_images+"{}"+ a[i].innerHTML
         }
        $.ajax({
            type:"post",
            data:"pro_name="+pro_name+"&pro_corporation="+pro_corporation+"&pro_userName="+pro_userName+"&pro_userPhone="+pro_userPhone+"&pro_userEmail="+pro_userEmail+"&pro_userAddress="+pro_userAddress+"&pro_configuration="+pro_configuration+"&pro_area="+pro_area+"&pro_homeDegression="+pro_homeDegression+"&pro_homeRent="+pro_homeRent+"&pro_rentStart="+pro_rentStart+"&pro_rentOver="+pro_rentOver+"&pro_utilities="+"&pro_opex="+pro_opex+"&pro_otherSpending="+pro_otherSpending+"&pro_income="+pro_income+"&pro_incomeTag="+pro_incomeTag+"&pro_renStart="+pro_renStart+"&pro_moneyAll="+pro_moneyAll+"&pro_introduce="+pro_introduce+"&pro_images="+pro_images,
            dataType:"json",
            url:"<?php  echo site_url("Aboutus/user_pro") ;?>",
            success:function(){
                window.location.href="http://www.haitouwanhu.com/Aboutus/initiator"
            },
            error:function(){

            }

        })
    })

</script>
</body>
</html>