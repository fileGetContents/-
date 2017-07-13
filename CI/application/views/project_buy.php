<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- IE 兼容模式 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- 采用高速模式 暂时只支持360浏览器 -->
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>海投万户-购买</title>
    <meta name="Keywords" content="海外房地产,海外资产配置,地产众筹,众筹,收益权,收益权众筹,固定回报,投资理财,美国,纽约,美国地产,公寓,酒店,独栋,别墅,haitouwanhu,万户,海投万户,海投萬户">
    <meta name="description" content="海投万户、海投萬户是以国内投资者的视角，主要针对海外房地产收益权投资的金融平台。专注海外地产市场的旧屋改造和固定收益类项目。打造国内投资者对全球资产投资的新型众筹平台。">
    <link rel="shortcut icon" href="<?php echo   base_url('static/images/favicon.ico') ;?>"/>
    <link href="<?php echo base_url("static/plugins/bootstrap-3.3.0/css/bootstrap.min.css");?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url("static/css/public.css");?>">
    <link rel="stylesheet" href="<?php echo base_url("static/css/choose.css") ; ?>">
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- 页头 START -->
<div id="header">
    <!--#include file="include/header.php" -->
    <?php require_once ("static/include/header.php");?>
</div>
<!-- 页头 END -->

<!-- 主体 START -->
<div id="main" class="mt-50 mb-30">
    <div class="container">
        <div class="explain  <?php  if($tag==1){echo  "hide";}else{echo "";}  ?>">
            <dl class="dl-horizontal">
                <dt>项目预约</dt>
                <dd>为促成众筹项目成功，预约用户需支付一定比例的预约金。</dd>
            </dl>
            <dl class="eln_hztl">
                <dt>预约金说明</dt>
                <dd>为了维护您的合法权益，请您认购前仔细阅读此条款，知晓收益权众筹投资的风险（平台不保证本金、不承诺投资收益），并且能够完全理解投资此类项目可能会带来的风险。</dd>
                <dd>1.预约需支付预约总额的10%作为定金。</dd>
                <dd>2.项目开放认购时您将享有优先认购的权利。</dd>
                <dd>3.预约金在项目认购支付时予以扣除，您只需支付扣除预约金后的剩余金额。</dd>
            </dl>
        </div>
        <div class="explain <?php  if($tag==1){echo  "";}else{echo "hide";}  ?>">
            <dl class="dl-horizontal">
                <dt  style="display: none" id="project_id"><?php echo $id; ?></dt>
                <dt>项目购买</dt>
                <dd>为促成众筹项目成功，用户需支付所认购份数的全额资金。</dd>
            </dl>
            <dl class="eln_hztl">
                <dt>认购说明</dt>
                <dd>为了维护您的合法权益，请您认购前仔细阅读此条款，知晓收益权众筹投资的风险（平台不保证本金、不承诺投资收益），并且能够完全理解投资此类项目可能会带来的风险。</dd>
                <dd>1.用户需支付所认购份数的全额资金。</dd>
                <dd>2.预约用户则只需支付扣除预约金后的剩余金额。</dd>
            </dl>
        </div>
        <div class="table-responsive projectMoney mt-50">
            <table class="table">
                <tr>
                    <th>项目名称</th>
                    <th width="220">请选择方案</th>
                    <th>方案单价</th>
                    <th width="250">认购份数</th>
                    <th width="160">总计</th>
                </tr>
                <tr>
                    <td id="name"><?php echo $name; ?></td>
                    <td>
                        <select name="" id="programme">
                            <?php  foreach($project as $value){ ?>
                                <?php echo '<option value ='.$value["gear_digital"].'>'.$value["gear_cycle"] ."个月,年化".$value['gear_earning'] .'</option>'; ?>
                            <?php   } ?>
                        </select>
                    </td>
                    <td class="price" id="price"> <?php echo $project[0]["gear_each"]; ?></td>
                    <td>
                        <a href="javascript:void(0)" class="reduce"></a><input type="text" value="1" id="text_box" class="share"><a href="javascript:void(0)" class="plus"></a>
                        <div class="surplus" >还可以认购 <span  id="surplus" style="color:#c69c6d;"></span> 份</div>
                        <span class="hide copies" id="total"><?php echo $project[0]["gear_copies"];?></span>
                    </td>
                    <td class="total" id="pace_all"></td>
                </tr>
            </table>
        </div>
        <div class="mt-50 orofit">
            <ul>
                <?php foreach($project  as  $value_image){
                    echo  '<li class="image"><img  src=" '.base_url($value_image['gear_images']).'" alt=""></li>';
                }
                ?>
            </ul>
        </div>
        <div class="sut_prt clearfix">
            <a href="javascript:history.back(-1)">返回上一页</a>
            <input type="button" id="yu_buy" value="提交" class="fr">
        </div>
    </div>
</div>
<!-- 主体 END -->

<!-- 页脚部分 START -->
<div id="foot" class="visible-md visible-lg">
    <?php require_once ("static/include/part.php");?>
</div>
<!-- 页脚部分 END -->

<!-- 页脚 START -->
<div id="footer">
    <?php  require_once ("static/include/footer.php");?>
</div>
<!-- 页脚 END -->
<!-- 返回顶部 -->
<a href="javascript:;" id="return_top" class="return_top" title="回到顶部"></a>


<script src="<?php  echo base_url("static/plugins/jquery-2.1.4.min.js") ;?>"></script>
<script src="<?php  echo base_url("static/plugins/bootstrap-3.3.0/js/bootstrap.min.js") ;?>"></script>
<script src="<?php  echo base_url("static/js/choose.js"); ?>"></script>
<script type="text/javascript">




    var  project=new Array();
    project[1]=<?php if(isset($project[0]["gear_each"])){ echo   $project[0]["gear_copies"]; }else{ echo 0 ;};  ?>;
    project[2]=<?php if(isset($project[1]["gear_each"])){ echo   $project[1]["gear_copies"]; }else{ echo 0 ;};  ?>;
    project[3]=<?php if(isset($project[2]["gear_each"])){ echo   $project[2]["gear_copies"]; }else{ echo 0 ;};  ?>;
    project[4]=<?php if(isset($project[3]["gear_each"])){ echo   $project[3]["gear_copies"]; }else{ echo 0 ;};  ?>;
    project[5]=<?php if(isset($project[4]["gear_each"])){ echo   $project[4]["gear_copies"]; }else{ echo 0 ;};  ?>;
    project[6]=<?php if(isset($project[5]["gear_each"])){ echo   $project[5]["gear_copies"]; }else{ echo 0 ;};  ?>;


    var  option=0;
    $("#programme").change(function () {
        option = $(this).val();
        <?php
        if(isset($project[0]["gear_each"])){  ?>
        if (option == 1) {
            $("#text_box").val(1);
            $("#price").html(<?php   echo    $project[0]["gear_each"] ;    ?>);
            $("#surplus").html(<?php echo    $project[0]["gear_copies"]-1; ?>);
            $("#total").html(<?php   echo    $project[0]["gear_copies"]-1;?>);
            $("#hide").html(project[1]);
            for(var i=0;i<7;i++){
                if( i == 0){
                    document.getElementsByClassName('image')[0].style.display="block";
                }else{
                    document.getElementsByClassName('image')[i].style.display="none";
                }
            }
        }
        <?php } ?>
        <?php
        if(isset($project[1]["gear_each"])){?>
        if (option == 2) {
            $("#text_box").val(1);
            $("#price").html(<?php   echo     $project[1]["gear_each"] ;    ?>);
            $("#surplus").html(<?php echo     $project[1]["gear_copies"]-1; ?>);
            $("#total").html(<?php   echo     $project[1]["gear_copies"]-1; ?>);
            $("#hide").html(project[2]);

            for(var i=0;i<7;i++){
                if( i == 1){
                    document.getElementsByClassName('image')[i].style.display="block";
                }else{
                    document.getElementsByClassName('image')[i].style.display="none";
                }
            }

        }
        <?php } ?>
        <?php
        if(isset($project[2]["gear_each"])){?>
        if (option == 3) {
            $("#text_box").val(1);
            $("#price").html(<?php   echo   $project[2]["gear_each"] ;    ?>);
            $("#surplus").html(<?php echo $project[2]["gear_copies"]-1; ?>);
            $("#total").html(<?php   echo  $project[2]["gear_copies"]-1;     ?>);
            $("#hide").html(project[3]);

            for(var i=0;i<7;i++){
                if( i==2){
                    document.getElementsByClassName('image')[i].style.display="block";
                }else{
                    document.getElementsByClassName('image')[i].style.display="none";
                }
            }
        }
        <?php } ?>
        <?php
        if(isset($project[3]["gear_each"])){?>
        if (option == 4) {
            $("#text_box").val(1);
            $("#price").html(<?php    echo   $project[3]["gear_each"] ;    ?>);
            $("#surplus").html(<?php  echo   $project[3]["gear_copies"]-1; ?>);
            $("#total").html(<?php    echo   $project[3]["gear_copies"]-1;     ?>);
            $("#hide").html(project[4]);

            for(var i=0;i<7;i++){
                if( i== 3){
                    document.getElementsByClassName('image')[i].style.display="block";
                }else{
                    document.getElementsByClassName('image')[i].style.display="none";
                }
            }

        }
        <?php } ?>
        <?php
        if(isset($project[4]["gear_each"])){?>
        if (option == 5) {
            $("#text_box").val(1);
            $("#price").html(<?php    echo    $project[4]["gear_each"] ;    ?>);
            $("#surplus").html(<?php  echo    $project[4]["gear_copies"]-1; ?>);
            $("#total").html(<?php    echo    $project[4]["gear_copies"]-1; ?>);
            $("#hide").html(project[5]);

            for(var i=0;i<7;i++){
                if( i == 4){
                    document.getElementsByClassName('image')[i].style.display="block";
                }else{
                    document.getElementsByClassName('image')[i].style.display="none";
                }
            }
        }
        <?php } ?>
        <?php
        if(isset($project[5]["gear_each"])){?>
        if (option == 6) {
            $("#text_box").val(1);
            $("#price").html(  <?php   echo   $project[5]["gear_each"] ;    ?>);
            $("#surplus").html(<?php   echo   $project[5]["gear_copies"]-1; ?>);
            $("#total").html(  <?php   echo   $project[5]["gear_copies"]-1;     ?>);
            $("#hide").html(project6);
            for(var i=0;i<7;i++){
                if( i== 5){
                    document.getElementsByClassName('image')[i].style.display="block";
                }else{
                    document.getElementsByClassName('image')[i].style.display="none";
                }
            }
        }
        <?php } ?>
    });


    setInterval(time(),5000);


    function   time(){
        $.ajax({
            url: "http://localhost/CI/Project/ajax_buy",
            data: "project=<?php echo  $id;  ?>",
            dataType: "json",
            type: "post",
            success: function (obj) {
                if(obj==1){
                    alert('已经完成');
                    window.location.href = 'http://www.wanhuu.cn';
                }else{
                    //修改全部的剩余份数
                    for(var  i=1;i<6;i++){
                        if(obj[i]["gear_digital"]==i){
                            project[i]=obj[i]["gear_digital"];
                        }
                        //修改这个当前的方法
                        if($("#option").val()==i){
                            var  c=project[i]-$("#text_box");
                            $("#hide").html(c);
                        }

                    }
                }
            },
            error: function () {
            }
        })
    }

</script>
<script type="text/javascript"  src="<?php echo base_url('static/js/public.js') ;?>"></script>
</body>
</html>