<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="<?php  echo base_url('static/css/public.css');  ?>">
    <link rel="stylesheet" href="<?php  echo base_url('static/plugins/pgwslider.min.css') ;?>">
    <link rel="stylesheet" href="<?php  echo base_url('static/css/details.css');?>">
</head>
<body>
<!-- 导航条 -->
<div class="header">
    <div class="container">
        <a href="<?php  echo base_url() ;?>">
            <img src=" <?php echo base_url('static/images/logo.png') ;?>" alt="">
        </a>
        <ul class="shouye_list">
            <li class="active">
                <a style="color: #ffa61e;"  href="<?php  echo site_url('Welcome/index');?>">首页</a>
            </li>
            <li>
                <a href="<?php  echo site_url('Dome/index');?>">投资项目</a>
            </li>
            <li>
                <a href="<?php  echo site_url('User/userGuide');?>">用户指南</a>
            </li>
            <li>
                <a href="<?php  echo site_url('Aboutus/index');?>">关于我们</a>
            </li>
        </ul>
        <div class="demo_rigister">
            <?php
            if(!isset($_SESSION["user_phone"])){
                echo "<a  style='display: none'><i></i></a>";
                echo "<a href='".site_url('User/index')."'>登录</a>";
                echo "<a href='".site_url('Registered/index')."'>注册</a>";
            }else{
                echo "<a  style='display:".$_SESSION["message"]."' href='".site_url('Personal/message')."'><i></i></a>";
                echo "<a href='".site_url('Personal/index')."' class='welcome'>欢迎你，".$_SESSION["user_phone"]."</a>";
                echo "<a href='".site_url("User/sessionD")."'>注销</a>";
            }
            ?>
        </div>
    </div>
</div>

<!-- 主体 -->
<div class="container clearfix mai_top">
    <!-- banner -->
    <div class="warrper">
        <div class="development">
            <h1><?php echo $project_name;?></h1>
            <p> <?php echo $project_introduction;?></p>
        </div>
        <div class="content">
            <ul class="pgwSlider">
                <li>
                    <img src="<?php  echo base_url($project_images2);?>">
                </li>
                <li>
                    <img src="<?php  echo base_url($project_images2);?>">
                </li>
                <li>
                    <img src="<?php  echo base_url($project_images2);?>">
                </li>
                <li>
                    <img src="<?php  echo base_url($project_images2);?>">
                </li>
            </ul>
        </div>
    </div>

    <div class="sidebar_b">
        <div class="off_start clearfix">
            <p>
                <?php
                if($project_tag==1){
                    echo  "正在进行";
                }elseif($project_tag==0){
                    echo  "已经完成";
                }elseif($project_tag==2){
                    echo   "即将开始";
                }
                ?>
            </p>

            <p>
                <?php
                if($project_tag==0){
                    echo $project_time_over;
                }elseif($project_tag==1){
                    echo $project_time_over;
                }elseif($project_tag==2){
                    echo $project_time_start;
                }
                ?>
            </p>
        </div>
        <div class="off_option">
            <table>
                <tbody>
                <tr>
                    <td>投资选项</td>
                    <td>
                        <ul>
                            <li>xxxxxxxxxxxx</li>
                            <li>xxxxxxxxxxxx</li>
                            <li>xxxxxxxxxxxx</li>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td>收益方式</td>
                    <td>xxxxxxxxxxxxxxxx</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="off_start clearfix">
            <p>
                <span>&yen;<?php echo $V_num; ?></span>
                <span style="color:#555;">/&yen;<?php echo $project_money_all ; ?></span>
            </p>
            <p>
                <?php
                if($project_tag==1){
                    echo  "正在进行";
                }elseif($project_tag==0){
                    echo  "已经完成";
                }elseif($project_tag==2){
                    echo   "即将开始";
                }
                ?>
            </p>
        </div>
        <div class="progress">
            <div class="progress-bar" style="width:<?php echo $V_progress; ?>%;"><?php echo $V_progress;?>%</div>
        </div>
        <div class="off_submit">
            <?php   echo  $m; ?>
        </div>
        <?php
        if($project_tag==0) {
            echo '<img src="'.base_url('static/images/sold_out.png').'" alt="" id="sold_out">';
        }
        ?>


    </div>
</div>


<!-- 简介 -->
<div class="container">
    <ul class="project clearfix">
        <li class="active"><a href="#">简介与分析</a></li>
        <li><a href="#">项目方</a></li>
        <li><a href="#">支持记录</a></li>
    </ul>
    <div class="main">
        <!-- 简介 -->
        <div class="brief_introduction">
            <?php  echo $project_introduce;?>
        </div>
        <!-- 项目方 -->
        <div class="project_side">
            <?php echo $project_party;?>
        </div>
        <!-- 支持记录 -->
        <div class="record">
            <table>
                <thead>
                <tr>
                    <th>用户名</th>
                    <th>年化收益</th>
                    <th>持有期限</th>
                    <th>起投金额</th>
                </tr>
                </thead>
                <tbody>
                <?php
                if(!empty($ass)){
                    foreach($ass  as $value){
                        ?>
                        <tr>
                            <td><?php echo $value["phone"];?></td>
                            <td><?php echo $value["earning"];?></td>
                            <td><?php echo $project_cycle;?>个月</td>
                            <td><?php echo $value["meny"] ;?></td>
                        </tr>
                        <?php
                    }
                }
                ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- 尾部 -->
<footer>
    <div class="footer_bottom">
        <p>COPYRIGHT    &copy; 1998 - 2016 KONGZHONG ALL 空中网版权所有</p>
        <p>京ICP证020001号 京网文[2011]0267-160号 经营许可证编号:B2-20090197</p>
    </div>
</footer>


<script src="<?php  echo base_url('static/plugins/jquery-3.1.0.min.js');?>"></script>
<script src="<?php  echo base_url('static/js/public.js');?>"></script>
<script src="<?php  echo base_url('static/plugins/pgwslider.min.js');?>"></script>
<script src="<?php  echo base_url('static/js/details.js');?>"></script>

<!-- <script src="plugins/jquery-ui-1.8.6.core.widget.js"></script>
<script src="plugins/jqueryui.bannerize.js"></script> -->

<script type="text/javascript">
    $(document).ready(function(){
        $(document).ready(function() {
            $('.pgwSlider').pgwSlider();
        });
    });
</script>
</body>
</html>