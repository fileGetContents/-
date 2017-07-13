
<div class="container">
	<div class="row">
        <div class="col-sm-3">
            <div class="foot_widget">
                <ul>
                    <li><img src="<?php echo base_url('static/images/logo.png'); ?>" alt=""></li>
                    <li>天府五街200号菁蓉国际广场4B-9F</li>
                    <li>成都.中国</li>
                    <li>邮箱：contact@haitouwanhu.com</li>
                    <li>主页：www.haitouwanhu.com</li>
                </ul>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="foot_widget mg-38">
                <h4>投资项目</h4>
                <ul>
                	<li><a href="<?php echo site_url('Dome/index') ;?>">众筹项目</a></li>
                    <li><?php if(isset($_SESSION['user_phone'])){ ?>
                            <a href="<?php echo site_url('Personal/index') ;?>">会员中心</a>
                        <?php  }else{  ?>
                            <a href="<?php echo site_url('User/index') ;?>">会员中心</a>
                        <?php  } ?>

                    </li>
                </ul>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="foot_widget mg-38">
                <h4>用户指南</h4>
                <ul>
                	<li><a href="<?php echo site_url('User/userGuide');  ?>">关于众筹</a></li>
                	<li><a href="<?php echo site_url('User/userGuide');  ?>">关于投资</a></li>
                	<li><a href="<?php echo site_url('Dome/index');     ?>">项目投资</a></li>
                	<li><a href="<?php echo site_url('User/userGuide'); ?>">法律协议</a></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="foot_widget mg-38">
                <h4>关于我们</h4>
                <ul>
                	<li><a href="<?php echo site_url('Aboutus/index'); ?>">公司简介</a></li>
                	<li><a href="<?php echo site_url('Aboutus/index'); ?>">联系我们</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>