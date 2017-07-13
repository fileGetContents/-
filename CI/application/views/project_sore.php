
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- IE 兼容模式 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- 采用高速模式 暂时只支持360浏览器 -->
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>海投万户-方案</title>
    <meta name="Keywords" content="海外房地产,海外资产配置,地产众筹,众筹,收益权,收益权众筹,固定回报,投资理财,美国,纽约,美国地产,公寓,酒店,独栋,别墅,haitouwanhu,万户,海投万户,海投萬户">
    <meta name="description" content="海投万户、海投萬户是以国内投资者的视角，主要针对海外房地产收益权投资的金融平台。专注海外地产市场的旧屋改造和固定收益类项目。打造国内投资者对全球资产投资的新型众筹平台。">
    <link rel="shortcut icon" href="<?php echo   base_url('static/images/favicon.ico') ;?>"/>
    <link href="<?php echo base_url("static/plugins/bootstrap-3.3.0/css/bootstrap.min.css") ;?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url("static/css/public.css") ;?>">
    <link rel="stylesheet" href="<?php echo base_url("static/css/payment.css"); ?>">
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- 页头 START -->
<div id="header">
    <!--#include file="include/header.php" -->
    <?php  require_once ("static/include/header.php")?>
</div>
<!-- 页头 END -->
<form action="<?php echo  site_url('Pay/buy_update') ;?>"  method="get">
<!-- 主体 START -->
<div id="main" class="mt-50 mb-30">
    <div class="container">
        <div class="explain">
            <dl class="dl-horizontal">
                <dt>付款信息</dt>
                <dd>为促成众筹项目成功，预约用户需支付一定比例的定金。</dd>
            </dl>
            <dl class="eln_hztl">
                <dt>风险提示</dt>
                <dd>为了维护您的合法权益，请您认购前仔细阅读此条款，知晓私募权及收益权投资风险（海投不保证本金、不承诺投资收益），并且能够完全理解投资此类公司可 能会带来的风险</dd>
                <dd>1.预约需支付预约总额的1%作为定金。</dd>
                <dd>2.项目开放认购时您将享有认购的权利。</dd>
                <dd>3.定金在项目认购支付时予以扣除，您只需要支付扣除定金后的剩余金额。</dd>
            </dl>
        </div>
        <div class="table-responsive projectMoney mt-50">
            <table class="table">
                <tr>
                    <th>项目名称</th>
                    <th>已选方案</th>
                    <th>方案单价</th>
                    <th>认购份数</th>
                    <th>已付定金</th>
                    <th>项目余款</th>
                    <th>总计</th>
                </tr>
                <tr>
                    <td><?php  echo  $names     ; ?></td>
                    <td><?php  echo  $gear_cycle ."个月,"."年化".$gear_earning ; ?></td>
                    <td><?php  echo  $price     ; ?></td>
                    <td><?php  echo  $test_box  ; ?>份</td>
                    <td><?php  echo  $proce_d   ; ?></td>
                    <td><?php  echo  $proce_y; ?></td>
                    <td><?php  echo  $proce_all; ?></td>
                </tr>
            </table>
        </div>
        <div class="clearfix">
            <div class="fl">
                <dl>
                    <dt>支付方式</dt>
                    <dd>畅捷支付</dd>
                </dl>
                <dl>
                    <dt>投资服务协议</dt>
                    <dd class="service"><input type="checkbox" name="agreement" id="checkbox"><a href="<?php echo base_url('Aboutus/block') ; ?>">《投资风险提示书》</a></dd>
                </dl>
            </div>
            <div class="fr">
                <ul class="list-style order_my">
                    <li>方案总价：&yen;<span><?php echo $proce_all; ?></span></li>
                    <li>已付定金：&yen;
                        <span>
                                  <?php if($proce_d==0){
                                      echo  0;
                                  }elseif($m==3){
                                      echo  $proce_d;
                                  }else {
                                      echo 0;
                                  }
                                  ; ?>
                        </span></li>

                   <?php if($envelope==0){?>

                       <li style="display: none">
                           <select name="envelope" class="select_ord" >
                                   <option value="0">哈哈&yen;0</option>
                           </select>
                           <span class="select_span">-&yen;0</span>
                       </li>

                  <?php }else{ ?>

                       <li>
                           <select name="envelope" class="select_ord" >
                               <?php foreach($envelope as $value){  ?>
                                   <option value="<?php echo $value['envelope_money']; ?>"><?php   echo  $value['envelope_source'] ; ?>&yen;<?php echo $value['envelope_money'] ?></option>
                               <?php }  ?>
                           </select>
                           <span class="select_span">-&yen;<?php  echo $envelope[0]['envelope_money'];?></span>
                       </li>
                 <?php   } ?>


                    <li>应付总额：&yen;<span>
                            <?php if($proce_d==0)
                            {
                                echo $proce_all;

                            }elseif($m==3){
                                echo  $proce_y;
                            }
                            else{
                                echo $proce_d;
                            };
                            ?></span></li>
                </ul>
            </div>
        </div>

            <input hidden="hidden"  name="id"       type="text" value="<?php echo $id;      // 项目id ?>"/>
            <input hidden="hidden"  name="test_box" type="text" value="<?php echo $test_box;// 购买份数 ?>">
            <input hidden="hidden"  name="tag"      type="text" value="<?php echo $tag;     // 购买方案 ?>" />
            <input hidden="hidden"  name="names"    type="text" value="<?php echo $names;   // 项目名字 ?>"/>
            <?php
            if($proce_d==0){
                echo  '<input hidden="hidden"  name="price"  type="text"  value="'.$proce_all.'"/>';
            }elseif($m==3){
                echo   '<input hidden="hidden"  name="price"  type="text"  value="'.$proce_y.'"/>';
            }else{
                echo   '<input hidden="hidden"  name="price"  type="text"  value="'.$proce_d.'"/>';
            }
            ?>

        <div class="sut_prt clearfix">
            <a href="javascript:history.back(-1)">返回上一页</a>
             <input type="submit" value="提交" class="fr" disabled="disabled">
        </div>

    </div>
</div>
<!-- 主体 END -->
</form>
<!-- 页脚部分 START -->
<div id="foot" class="visible-md visible-lg">
    <!--#include file="include/part.php" -->
    <?php require_once ("static/include/part.php");?>
</div>
<!-- 页脚部分 END -->

<!-- 页脚 START -->
<div id="footer">
    <!--#include file="include/footer.php" -->
    <?php  require_once ("static/include/footer.php");?>
</div>
<!-- 页脚 END -->
<!-- 返回顶部 -->
<a href="javascript:;" id="return_top" class="return_top" title="回到顶部"></a>


<script src="<?php echo base_url("static/plugins/jquery-2.1.4.min.js") ;?>"></script>
<script src="<?php echo base_url("static/plugins/bootstrap-3.3.0/js/bootstrap.min.js") ;?>"></script>
<script src="<?php echo base_url("static/js/payment.js");?>" type="text/javascript"></script>
<script type="text/javascript"  src="<?php echo base_url('static/js/public.js') ;?>"></script>
  <script type="text/javascript" >
      <?php if($proce_d==0)
      {?>
      $(".select_ord").change(function(){
          select_ord();
      });
      select_ord();
      function select_ord(){
          var bank = $(".select_ord").find("option:selected").text();
          var add = bank.split('¥');
          $('.select_span').html('-&yen;'+add[1]);
          var li1 = parseInt($(".order_my li:nth-child(1) span").text());
          var li2 = parseInt($(".order_my li:nth-child(2) span").text());
          var li3 = parseInt(add[1]);
          $(".order_my li:nth-child(4) span").text(li1-li2-li3);
          $('input[name=price]').val(li1-li2-li3);
      }

    <?php  }elseif($m==3){ ?>
      $(".select_ord").change(function(){
          select_ord();
      });
      select_ord();
      function select_ord(){
          var bank = $(".select_ord").find("option:selected").text();
          var add = bank.split('¥');
          $('.select_span').html('-&yen;'+add[1]);
          var li1 = parseInt($(".order_my li:nth-child(1) span").text());
          var li2 = parseInt($(".order_my li:nth-child(2) span").text());
          var li3 = parseInt(add[1]);
          $(".order_my li:nth-child(4) span").text(li1-li2-li3);
          $('input[name=price]').val(li1-li2-li3);
      }
     <?php }
      else{

      };
      ?>


  </script>
</body>
</html>