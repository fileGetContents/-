<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- IE 兼容模式 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- 采用高速模式 暂时只支持360浏览器 -->
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>海投万户-提现</title>
    <meta name="Keywords" content="海外房地产,海外资产配置,地产众筹,众筹,收益权,收益权众筹,固定回报,投资理财,美国,纽约,美国地产,公寓,酒店,独栋,别墅,haitouwanhu,万户,海投万户,海投萬户">
    <meta name="description" content="海投万户、海投萬户是以国内投资者的视角，主要针对海外房地产收益权投资的金融平台。专注海外地产市场的旧屋改造和固定收益类项目。打造国内投资者对全球资产投资的新型众筹平台。">
    <link rel="shortcut icon" href="<?php echo   base_url('static/images/favicon.ico') ;?>"/>
    <link href="<?php echo base_url('static/plugins/bootstrap-3.3.0/css/bootstrap.min.css') ;?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('static/css/public.css') ;?>">
    <link rel="stylesheet" href="<?php echo base_url('static/css/applyWithdrawals.css') ;?>">
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- 页头 START -->
<div id="header">
    <!--#include file="include/header.php" -->
    <?php  require_once ("static/include/header.php") ; ?>
</div>
<!-- 页头 END -->
<!-- 主体 START -->
<div id="main">
    <div class="container">
        <input  hidden="hidden" type="text" id="token"  value="<?php echo $_SESSION['token']; ?>"/>
        <div class="row">
            <div class="col-md-offset-2 col-md-8">
                <h3 style="text-align: center;">申请提现</h3>
                <ul class="apply">
                    <li class="clearfix">
                        <div class="fl apy_text">提现方式：</div>
                        <div class="fl ml-30">
                            <label class="radio-inline">
                                <input type="radio" name="" value="" checked/>银行转账
                            </label>
                            <span style="color:red;" class="ml-20">温馨提示：您的提现金额将于7-15个工作日左右到账</span>
                        </div>
                    </li>
                    <li class="clearfix">
                        <div class="fl apy_text">选择银行卡：</div>
                        <div class="fl ml-30">
                            <div class="yellow  <?php if(!empty($bank)){echo "hide";}else{echo "";} ?>">无提现银行卡，请点击 <a href="javascript:void(0)" onclick="add_bank_open()">+添加银行卡</a></div>
                            <div class="apy_bank  <?php if(!empty($bank)){echo "";}else{echo "hide";} ?>">
                               <?php
                               $num=0;
                               foreach($bank as $value){ ?>
                                <div>
                                    <label class="radio-inline">
                                        <div class="fl"><input type="radio" name="bank" value="<?php  echo $value['bank_number'] ;?>"></div>
                                        <div class="fl"><?php echo $value['bank_bank_name'] ; ?></div>
                                        <div class="fl ml-20">卡号：<span><?php echo $value['bank_number'] ;?></span></div>
                                    </label>
                                </div>
                               <?php
                               $num++;
                               } ?>
                            </div>
                        </div>
                    </li>
<!--                    <li class="clearfix">-->
<!--                        <div class="fl apy_text">申请人姓名：</div>-->
<!--                        <div class="fl ml-30 form_input">-->
<!--                            <input type="text" placeholder="">-->
<!--                        </div>-->
<!--                    </li>-->
                    <li class="clearfix">
                        <div class="fl apy_text">账户总金额：</div>
                        <div class="fl ml-30 form_input">
                            <input type="text" value="<?php  echo $user_money; ?>" disabled>
                        </div>
                    </li>
                    <li class="clearfix">
                        <div class="fl apy_text">可提现金额：</div>
                        <div class="fl ml-30 form_input">
                            <input type="text" value="<?php echo $user_money; ?>" disabled>
                        </div>
                    </li>
                    <li class="clearfix">
                        <div class="fl apy_text">提现金额：</div>
                        <div class="fl ml-30 form_input">
                            <input type="text"  readonly="readonly" id="money" placeholder=""  value="<?php  if($user_money==0){echo 0;}else{echo  $user_money-2; }; ?>">
                        </div>
                    </li>
                    <li class="clearfix">
                        <div class="fl apy_text">验证码：</div>
                        <div class="fl ml-30 form_input vcn_code">
                            <input  id="Captcha" type="text" placeholder="">
                            <img  onclick="this.src='<?php echo site_url("User/Verify")."?id=".rand(1000,9999);  ?>'"  src="<?php echo site_url("User/Verify")."?id=".rand(1000,9999);  ?>" alt="" class="ml-30">
                        </div>
                    </li>
                    <li class="clearfix">
                        <div class="fl apy_text">手机验证：</div>
                        <div class="fl ml-30 form_input vcn_code">
                            <input type="text"  id="num" placeholder="">
                            <input type="button" id="ml-30" class="ml-30" onclick="time()" value="获取验证码">
                        </div>
                        <div class="fl ml-30 number_phone">
                            已绑定手机号：<span><?php  echo $_SESSION['user_phone'] ;?></span>
                        </div>
                    </li>
                    <li class="clearfix">
                        <div class="ml-30">
                            <ul>
                                <li>根据与监管银行协议将对提现政策做出如下调整：</li>
                                <li>1、单笔提现金额，收取定额手续费2元</li>
                                <li>2、预计7-15个工作日到账</li>
                                <li style="color:red;">提现申请：把账户中的金额提现到你的银行卡中，每天最多可提现3次</li>
                            </ul>
                        </div>
                    </li>
                    <li class="clearfix">
                        <div class="apy_submit"><input type="submit"  onclick="sub()" id="sub" value="申请提现"></div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-md-offset-2 col-md-8 tube_bank">
                <ul class="list-inline">
                    <li>管理我的银行卡</li>
                    <li class="ml-30">已添加 <span  id="span_num" stlye="color:#c69c6d;"> <?php echo $num; ?> </span> 张银行卡</li>
                    <li class="ml-30 yellow"><a href="javascript:void(0)" onclick="add_bank_open()">+添加银行卡</a></li>
                </ul>
                <div class="table-responsive">
                    <table class="table">
                        <?php foreach($bank as $value){  ?>
                        <tr>
                            <td class="bank"><?php echo  explode("行",$value['bank_bank_name'])[0]."行";?></td>
                            <td><?php echo $value['bank_user_name'] ;?></td>
                            <td class="account">
                                <?php echo $value['bank_province']."省".$value['bank_city']."市".$value['bank_address'] ;?><br>
                                <span><?php echo $value['bank_number']; ?></span>
                            </td>
                            <td>添加时间<br><?php echo explode(" ",$value['bank_time'])[0] ; ?></td>
                            <td class="delete"><a href="javascript:void(0)" onclick="add_delete(this)">删除</a></td>
                        </tr>
                        <?php } ?>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="border:none;padding:12px;background: #c69c6d;">
        <div class="return">
            <a href="javascript:history.back(-1)">返回个人中心</a>
        </div>
    </div>
</div>
<!-- 主体 END -->

<!-- 页脚部分 START -->
<div id="foot">
    <?php require_once ("static/include/part.php") ;?>
</div>
<!-- 页脚部分 END -->
<!-- 页脚 START -->
<div id="footer">
    <?php require_once ("static/include/footer.php")?>
</div>
<!-- 页脚 END -->
<!-- 添加银行卡 START -->
<div id="add_bank" class="hide">
    <div class="add_head">
        添加银行卡
        <a href="javascript:void(0)" onclick="add_bank_shut()">x</a>
    </div>
    <form name="form1" action="<?php echo site_url('Personal/personal_bank') ?>" enctype="multipart/form-data" method="post" onkeydown="if(event.keyCode==13)return false;">
    <div class="add_body">
        <ul>
            <li class="clearfix">
                <div class="fl add_text">银行卡号：</div>
                <div class="fl ml-30 add_input">
                    <input type="text"  name="number" placeholder="" style="width:240px;">
                </div>
            </li>
            <li class="clearfix">
                <div class="fl add_text">持卡人姓名：</div>
                <div class="fl ml-30 add_input">
                    <input  name="user_name"  type="text" placeholder="">
                </div>
            </li>
            <li class="clearfix">
                <div class="fl add_text">银行名称：</div>
                <div class="fl ml-30 add_input">
                    <select name="bank_name" id="">
                        <option value="">-请选择银行卡-</option>
                        <option value="中国工商银行ICBC">中国工商银行ICBC</option>
                        <option value="中国农业银行ABC">中国农业银行ABC</option>
                        <option value="中国农业银行ABC">中国银行BOC</option>
                        <option value="中国建设银行CCB">中国建设银行CCB</option>
                        <option value="交通银行COMM">交通银行COMM</option>
                        <option value="招商银行CMB">招商银行CMB</option>
                        <option value="中国民生银行CMBC">中国民生银行CMBC</option>
                        <option value="中国光大银行CEB">中国光大银行CEB</option>
                        <option value="兴业银行CIB">兴业银行CIB</option>
                        <option value="中国邮政储蓄银行PSBC">中国邮政储蓄银行PSBC</option>
                        <option value="广发银行GDB">广发银行GDB</option>
                        <option value="上海浦东发展银行SPDB">上海浦东发展银行/浦发银行SPDB</option>
                        <option value="华夏银行HXB">华夏银行HXB</option>
                    </select>
                </div>
            </li>
            <li class="clearfix">
                <div class="fl add_text">开户所在地：</div>
                <div class="fl ml-30 add_input">
                    <input type="text"  name="province" placeholder="">省
                    <input type="text"  name="city"     placeholder="" class="ml-20">市
                </div>
            </li>
            <li class="clearfix">
                <div class="fl add_text">开户支行：</div>
                <div class="fl ml-30 add_input">
                    <input  name="address" type="text" placeholder="" style="width:240px;">
                </div>
            </li>
            <li class="clearfix">
                <div class="fl add_text">卡类型：</div>
                <label class="radio-inline ml-30">
                    <input type="radio" name="type" value="DEBIT" checked />借记
                </label>
                <label class="radio-inline ml-30">
                    <input type="radio" name="type" value="CREDIT">贷记
                </label>
            </li>
            <li class="clearfix">
                <div class="fl add_text">卡属性：</div>
                <label class="radio-inline ml-30">
                    <input type="radio"  name="attribute" value="C" checked  />对私
                </label>
                <label class="radio-inline ml-30">
                    <input type="radio"  name="attribute" value="B"/>对公
                </label>
            </li>
            <li class="clearfix">
                <div class="add_submit"><input type="submit" value="确认添加"></div>
            </li>
        </ul>
    </div>
    </form>
</div>
<div class="background hide"></div>
<!-- 添加银行卡 END -->
<!-- 返回顶部 -->
<a href="javascript:;" id="return_top" class="return_top" title="回到顶部"></a>
<script src="<?php echo base_url('static/plugins/jquery-2.1.4.min.js') ; ?>"></script>
<script src="<?php echo base_url("static/plugins/bootstrap-3.3.0/js/bootstrap.min.js") ;?>"></script>
<script src="<?php echo base_url('static/js/add_delete.js') ;?>"></script>
<script src="<?php echo base_url('static/js/applyWithdrawals.js');?>"></script>
<script type="text/javascript" >


</script>
<script type="text/javascript"  src="<?php echo base_url('static/js/public.js') ;?>"></script>
</body>
</html>