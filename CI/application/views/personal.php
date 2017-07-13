<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- IE 兼容模式 -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- 采用高速模式 暂时只支持360浏览器 -->
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>海投万户-个人中心</title>
    <meta name="Keywords"
          content="海外房地产,海外资产配置,地产众筹,众筹,收益权,收益权众筹,固定回报,投资理财,美国,纽约,美国地产,公寓,酒店,独栋,别墅,haitouwanhu,万户,海投万户,海投萬户">
    <meta name="description"
          content="海投万户、海投萬户是以国内投资者的视角，主要针对海外房地产收益权投资的金融平台。专注海外地产市场的旧屋改造和固定收益类项目。打造国内投资者对全球资产投资的新型众筹平台。">
    <link rel="shortcut icon" href="<?php echo base_url('static/images/favicon.ico'); ?>"/>
    <link href="<?php echo base_url('static/plugins/bootstrap-3.3.0/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('static/plugins/swiper/css/swiper.min.css'); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('static/css/public.css'); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('static/css/userCore.css'); ?>"/>
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- 页头 START -->
<div id="header">
    <?php require_once("static/include/header.php"); ?>
</div>
<!-- 页头 END -->

<!-- 主体 START -->
<div id="main">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="user_name">
                    <ul class="media-list">
                        <li class="media">
                            <div class="media-left"><img src="<?php echo base_url("static/images/head.png"); ?>" alt="">
                            </div>
                            <div class="media-body" style="font-size:14px;">你的推荐码:<br><span
                                    style="color:#C69C6D;margin-top: 10px;"><?php echo $_SESSION['user_phone']; ?></span>
                            </div>
                        </li>
                        <li class="media user_mide">
                            <div class="media-left">已投资项目：</div>
                            <div class="media-body"><?php echo $user_num; ?>个</div>
                        </li>
                        <li class="media user_mide">
                            <div class="media-left">已投资金额：</div>
                            <div class="media-body"><?php echo $user_money; ?>.00元</div>
                        </li>
                    </ul>
                </div>
                <!-- 消息轮播图 -->
                <div class="new_news">
                    <h3>最新消息</h3>
                    <div class="swiper-container">
                        <div class="swiper-wrapper">

                            <?php
                            $num = 0;
                            foreach ($message as $value) {
                                $num++;
                            }
                            if ($num == 1) {
                                foreach ($message as $value) {
                                    echo ' <div class="swiper-slide">
                                <ul class="news_name"><li class="clearfix"><div class="pull-left"><a href="javascript:void(0)" onclick="showNews(this)">' . $value['message_name'] . '</a></div><span class="pull-right">' . substr($value["message_time"], 0, 10) . '</span></li>';
                                    echo '</ul></div>';
                                }

                            } elseif ($num == 5) {
                                $i = 0;
                                foreach ($message as $value) {
                                    $i++;
                                    if ($i == 5) {
                                        echo ' <div class="swiper-slide">
                                <ul class="news_name"><li class="clearfix"><div class="pull-left"><a href="javascript:void(0)" onclick="showNews(this)">' . $value['message_name'] . '</a></div><span class="pull-right">' . substr($value["message_time"], 0, 10) . '</span></li>';
                                        echo '</ul></div>';
                                    } elseif ($i == 1) {
                                        echo ' <div class="swiper-slide">
                                <ul class="news_name"><li class="clearfix"><div class="pull-left"><a href="javascript:void(0)" onclick="showNews(this)">' . $value['message_name'] . '</a></div><span class="pull-right">' . substr($value["message_time"], 0, 10) . '</span></li>';
                                    } elseif ($i == 4) {
                                        echo ' <li class="clearfix"><div class="pull-left"><a href="javascript:void(0)" onclick="showNews(this)">' . $value['message_name'] . '</a></div><span class="pull-right">' . substr($value["message_time"], 0, 10) . '</span></li>
                                </ul>
                                </div>';
                                    } else {
                                        echo '<li class="clearfix"><div class="pull-left"><a href="javascript:void(0)" onclick="showNews(this)">' . $value['message_name'] . '</a></div><span class="pull-right">' . substr($value["message_time"], 0, 10) . '</span></li>';
                                    }
                                }
                            } elseif ($num == 9) {
                                $i = 0;
                                foreach ($message as $value) {
                                    $i++;
                                    if ($i == 1 || $i == 5) {
                                        echo ' <div class="swiper-slide">
                                <ul class="news_name"><li class="clearfix"><div class="pull-left"><a href="javascript:void(0)" onclick="showNews(this)">' . $value['message_name'] . '</a></div><span class="pull-right">' . substr($value["message_time"], 0, 10) . '</span></li>';
                                    } elseif ($i == 4 || $i == 8) {
                                        echo ' <li class="clearfix"><div class="pull-left"><a href="javascript:void(0)" onclick="showNews(this)">' . $value['message_name'] . '</a></div><span class="pull-right">' . substr($value["message_time"], 0, 10) . '</span></li>
                                </ul>
                                </div>';
                                    } elseif ($i == 9) {
                                        echo ' <div class="swiper-slide">
                                <ul class="news_name"><li class="clearfix"><div class="pull-left"><a href="javascript:void(0)" onclick="showNews(this)">' . $value['message_name'] . '</a></div><span class="pull-right">' . substr($value["message_time"], 0, 10) . '</span></li>';
                                        echo '
                                </ul>
                                </div>';
                                    } else {
                                        echo '<li class="clearfix"><div class="pull-left"><a href="javascript:void(0)" onclick="showNews(this)">' . $value['message_name'] . '</a></div><span class="pull-right">' . substr($value["message_time"], 0, 10) . '</span></li>';
                                    }
                                }
                            } else {

                                $i = 0;
                                foreach ($message as $value) {
                                    $i++;
                                    if ($i == 1) {
                                        echo ' <div class="swiper-slide">
                                <ul class="news_name"><li class="clearfix"><div class="pull-left"><a href="javascript:void(0)" onclick="showNews(this)">' . $value['message_name'] . '</a></div><span class="pull-right">' . substr($value["message_time"], 0, 10) . '</span></li>';
                                    } elseif ($i == $num) {
                                        echo ' <li class="clearfix"><div class="pull-left"><a href="javascript:void(0)" onclick="showNews(this)">' . $value['message_name'] . '</a></div><span class="pull-right">' . substr($value["message_time"], 0, 10) . '</span></li>
                                </ul>
                                </div>';
                                    } elseif ($i == 5) {
                                        echo ' <div class="swiper-slide">
                                <ul class="news_name"><li class="clearfix"><div class="pull-left"><a href="javascript:void(0)" onclick="showNews(this)">' . $value['message_name'] . '</a></div><span class="pull-right">' . substr($value["message_time"], 0, 10) . '</span></li>';
                                    } elseif ($i == 8) {
                                        echo ' <li class="clearfix"><div class="pull-left"><a href="javascript:void(0)" onclick="showNews(this)">' . $value['message_name'] . '</a></div><span class="pull-right">' . substr($value["message_time"], 0, 10) . '</span></li>
                                </ul>
                                </div>';
                                    } elseif ($i == 9) {
                                        echo ' <div class="swiper-slide">
                                <ul class="news_name"><li class="clearfix"><div class="pull-left"><a href="javascript:void(0)" onclick="showNews(this)">' . $value['message_name'] . '</a></div><span class="pull-right">' . substr($value["message_time"], 0, 10) . '</span></li>';
                                    } elseif ($i == 4) {
                                        echo ' <li class="clearfix"><div class="pull-left"><a href="javascript:void(0)" onclick="showNews(this)">' . $value['message_name'] . '</a></div><span class="pull-right">' . substr($value["message_time"], 0, 10) . '</span></li>
                                </ul>
                                </div>';
                                    } else {
                                        echo '<li class="clearfix"><div class="pull-left"><a href="javascript:void(0)" onclick="showNews(this)">' . $value['message_name'] . '</a></div><span class="pull-right">' . substr($value["message_time"], 0, 10) . '</span></li>';
                                    }


                                }

                            }

                            ?>


                        </div>
                        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="user_data">
                    <h3>个人资料</h3>
                    <ul>
                        <li class="clearfix">
                            <div class="fl data_name">用户名</div>
                            <div class="fl data_text"><?php echo $_SESSION['user_phone']; ?></div>
                        </li>
                        <li class="clearfix">
                            <div class="fl data_name">邮箱</div>
                            <div class="fl data_text data_yes"><?php echo $email; ?></div>
                            <div class="fl real_yes hide">
                                <div class="fl ml-15"></div>
                            </div>
                            <div class="fl data_text hide data_no">
                                <input type="email" class="txt_email txt_cancel">
                                <a href="javascript:void(0)" onclick="vcn_email(this)">确定</a>
                                <a href="javascript:void(0)" onclick="cancel(this)">取消</a>
                            </div>
                            <div class="fr data_hello">
                                <a href="javascript:void(0)" onclick="modify(this)">
                                    <?php echo $email_way; ?>
                                </a></div>
                        </li>
                        <li class="clearfix">
                            <div class="fl data_name">登录密码</div>
                            <div class="fl data_text data_yes">已设置</div>
                            <div class="fl data_text hide data_no">
                                <input type="password" placeholder="新密码" class="txt_pwd_new txt_cancel">
                                <input type="password" placeholder="确认密码" class="txt_pwd_news txt_cancel">
                                <a href="javascript:void(0)" onclick="vcn_password(this);">确定</a>
                                <a href="javascript:void(0)" onclick="cancel(this)">取消</a>
                            </div>
                            <div class="fr data_hello"><a href="javascript:void(0)" onclick="modify(this)">修改</a></div>
                        </li>
                        <li class="clearfix">
                            <div class="fl data_name">手机</div>
                            <div class="fl data_text"><?php echo $_SESSION['user_phone']; ?>[已认证]</div>
                        </li>
                        <li class="clearfix">
                            <div class="fl data_name">住址</div>
                            <div class="fl data_text data_yes"><?php echo $address; ?></div>
                            <div class="fl real_yes hide">
                                <div class="fl ml-15"></div>
                            </div>
                            <div class="fl data_text hide data_no">
                                <input type="text" class="txt_cancel txt_address">
                                <a href="javascript:void(0)" onclick="vcn_address(this)">确定</a>
                                <a href="javascript:void(0)" onclick="cancel(this)">取消</a>
                            </div>
                            <div class="fr data_hello"><a href="javascript:void(0)" onclick="modify(this)">修改</a></div>
                        </li>
                        <li class="clearfix">
                            <div class="fl data_name">微信</div>
                            <div class="fl data_text data_yes"><?php echo $wechat; ?></div>
                            <div class="fl real_yes hide">
                                <div class="fl ml-15"></div>
                            </div>
                            <div class="fl data_text hide data_no">
                                <input type="text" class="txt_cancel txt_wechat">
                                <a href="javascript:void(0)" onclick="vcn_wechat(this)">确定</a>
                                <a href="javascript:void(0)" onclick="cancel(this)">取消</a>
                            </div>
                            <div class="fr data_hello"><a href="javascript:void(0)" onclick="modify(this)">绑定</a></div>
                        </li>
                        <li class="clearfix">
                            <div class="fl data_name">实名认证</div>
                            <div class="fl data_text data_yes <?php if ($sheng == "申请认证") {
                                echo "";
                            } else {
                                echo "hide";
                            } ?>"><?php echo $sheng; ?></div>
                            <div class="fl real_yes <?php if ($sheng == "申请认证") {
                                echo "hide";
                            } else {
                                echo "";
                            } ?>">
                                <div class="fl yes_one ml-30">真实姓名：<span>  <?php if ($sheng == "申请认证") {
                                            echo "";
                                        } else {
                                            echo $user_name;
                                        }; ?></span></div>
                                <div class="fl yes_ywo ml-50">身份证号码：<span><?php if ($sheng == "申请认证") {
                                            echo "";
                                        } else {
                                            echo $user_IDcard;
                                        }; ?></span></div>
                            </div>
                            <div class="fl data_text hide data_no data_cancel_real">
                                <input type="text" placeholder="真实姓名" class="txt_name txt_cancel txt_realname">
                                <input type="text" placeholder="身份证号" class="txt_user txt_cancel txt_realnames">
                                <a href="javascript:void(0)" onclick="vcn_realname(this)">确定</a>
                                <a href="javascript:void(0)" onclick="cancel(this)">取消</a>
                                <br><span class="real_status" style="color:red;"></span>
                            </div>
                            <div class="fr data_hello data_realname">
                                <?php if ($sheng == "申请认证") {
                                    echo '<a   href="javascript:void(0)" onclick="modify(this)">' . $sheng . '</a><span></span>';
                                } else {
                                    echo '<a   href="javascript:void(0)" onclick="modify(this)"></a><span>已认证</span>';
                                } ?>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- 我的资金 -->
        <div class="my_capital my_tab">
            <h3>我的资金</h3>
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="no_money n_m_1">可提现余额<br><span><?php echo floor($user_money_y); ?>.00元</span></div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="no_money n_m_2">账户余额<br><span><?php if ($user_money_y == 0) {
                                echo "0.00";
                            } else {
                                echo $user_money_y;
                            }; ?>元</span></div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="no_money n_m_3">不可提现余额<br><span><?php
                            $a = $user_money_y;
                            $b = floor($user_money_y);
                            $c = $a - $b;
                            echo sprintf("%.2f", substr(sprintf("%.3f", $c), 0, -1));;
                            ?>元</span></div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <div class="money_carry">
                        <a href="<?php echo site_url("personal/advance") ?>">提现记录</a>
                        <a href="<?php echo site_url("personal/withdraw"); ?>">申请提现</a>
                    </div>
                </div>
            </div>
        </div>


        <!-- 抵用卷 -->
        <div class="my_capital my_tab">
            <h3>抵用卷</h3>
            <div class="table-responsive">
                <table class="table tbe_payment">
                    <thead>
                    <tr>
                        <th>金额</th>
                        <th>使用范围</th>
                        <th>有效期限</th>
                        <th>状态</th>
                        <th>来源</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($envelope as $value) { ?>
                        <tr>
                            <td><?php echo $value['envelope_money']; ?>元</td>
                            <td><?php echo $value['envelope_range']; ?></td>
                            <td><?php echo $value['envelope_start']; ?>至<?php echo $value['envelope_over'] ?></td>
                            <td class="gray">
                                <?php
                                if (strtotime($value['envelope_over']) < time()) {
                                    echo '过期';
                                } else {
                                    if ($value['envelope_tag'] == 1) {
                                        echo '未使用';
                                    } else {
                                        echo '已经使用';
                                    }
                                }
                                ?>
                            </td>
                            <td><?php echo $value['envelope_source'] ?></td>
                        </tr>
                    <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>


        <!-- 未支付 -->
        <div class="no_payment my_tab">
            <h3>未支付项目</h3>
            <div class="table-responsive">
                <table class="table tbe_payment">
                    <thead>
                    <tr>
                        <th>项目名</th>
                        <th>投资时间</th>
                        <th>投资金额</th>
                        <th>状态</th>
                        <th>订单状态</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($order as $value) { ?>
                        <tr>
                            <td><?php echo $value['project_name']; ?> <span
                                    style="display: none"><?php echo $value['associated_order'] ?></span></td>
                            <td><?php echo date("Y-m-d H:i:s", $value["order_time"] - 1800); ?></td>
                            <td>&yen;<?php echo $value['money']; ?></td>
                            <td><a href="<?php echo $value['href']; ?>" class="yellow">未支付</a></td>
                            <td><a class="yellow"
                                   href="<?php echo site_url('Personal/cancel_project') . "?id=" . $value["order_time"] ?>">取消订单</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- 未支付 -->
        <iframe scrolling="no" frameborder="0" id="iframe" src="<?php echo site_url('Personal/personal_page'); ?>"
                name="menuFrame"></iframe>
    </div>
</div>
<!-- 主体 END -->

<!-- 页脚部分 START -->
<div id="foot" class="visible-md visible-lg">
    <?php require_once("static/include/part.php"); ?>
</div>
<!-- 页脚部分 END -->

<!-- 页脚 START -->
<div id="footer">
    <?php require_once("static/include/footer.php"); ?>
</div>
<!-- 页脚 END -->

<!-- 最新消息 模态框 START -->
<div id="modal" class="hide">
    <div class="mdl_text"></div>
    <a href="javascript:void(0)" id="mdl_hide">x</a>
</div>
<!-- 背景 -->
<div id="background" class="hide"></div>
<!-- 最新消息 模态框 END -->

<!-- 申请退款 START -->
<div class="apply_refund hide">
    <a href="javascript:void(0)" id="apy_hide">x</a>
    <div class="apy_head">申请退款</div>
    <div class="apy_body">
        <span>退款金额：</span>
        <input type="text" id="money1" readonly="readonly">
    </div>
    <div class="apy_body">
        <span>退款原因：</span>
        <select name="" id="whyRefund">
            <option value="">===请选择退款原因===</option>
            <option value="我不想买了">我不想买了</option>
            <option value="信息选择错误，重新购买">信息选择错误，重新购买</option>
            <option value="拍错了">拍错了</option>
            <option value="其他原因">其他原因</option>
        </select>
    </div>
    <div class="apy_footer"><a href="javascript:void(0)" id="refund">提交申请</a></div>
</div>
<!-- 申请退款 END -->

<script src="<?php echo base_url("static/plugins/jquery-2.1.4.min.js"); ?>"></script>
<script src="<?php echo base_url("static/plugins/bootstrap-3.3.0/js/bootstrap.min.js"); ?>"></script>
<script src="<?php echo base_url("static/plugins/swiper/js/swiper.min.js"); ?>"></script>
<script src="<?php echo base_url("static/js/userCore.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('static/js/public.js'); ?>"></script>
</body>
</html>