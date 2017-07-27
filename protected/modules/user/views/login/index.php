<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>注册-糖糖闹闹</title>
    <meta name="Keywords" content=""/>
    <meta name="Description" content=""/>
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH.'index1.css'?>" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>gui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>wait.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>login-reg.css">
</head>
<body>
    <div class="container ">
        <div class="gheader-wp">
            <div class="gheader-wp-b">
                <div class="gheader" id="gheader">
                    <a class="gheader-logo gfl" id="guokrLogo" href="<?php echo $url_home;?>" >糖糖闹闹网</a>
                    <img class="gmotto" src="<?php echo IMG_PATH;?>slogan.png" alt="糖糖闹闹都是好孩子！" />
                </div>
            </div>
        </div>
        <div class="wrap grow gmt30 gpack">
            <div id="login">
                <div class="mask-body" style="width: 660px;">
                    <div class="tt-s">
                        <span>登录</span>
                    </div>
                    <div class="mask-cont">
                        <div class="win-wraper clr" id="poplogin">
                            <div class="login clr">
                                <div class="cont">
                                    <?php $form = $this->beginWidget('CActiveForm',array(
                                        'id'=>'user-form',
                                        'enableAjaxValidation'=>true,
                                        'enableClientValidation'=>true,
                                        'clientOptions'=>array(  
                                                'validateOnSubmit'=>true,     //提交时的验证  
                                                'validateOnChange'=>true,     //输入框值改变时的验证  
                                                'validateOnType'=>false,      //键入时验证  
                                            ),       
                                        )); ?>
                                        <div class="dt-unme cnt-i clr">
                                            <?php echo $form->textField($model,'username',array('class'=>'form-control','placeholder'=>'邮箱/用户名/手机','autofocus'=>'autofocus','autocomplete'=>'off','value'=>"")); ?>
                                        </div>
                                        <?php echo $form->error($model,'username',array('class'=>'errorstyle')); ?>
                                        <div class="dt-pswd cnt-i clr">
                                            <?php echo $form->passwordField($model,'password',array('class'=>'form-control','placeholder'=>'密码','value'=>'')); ?>
                                        </div>
                                        <?php echo $form->error($model,'password',array('class'=>'errorstyle')); ?>
                                       <?php if(CCaptcha::checkRequirements()): ?>
                                        <div class="dt-ccode cnt-i clr">
                                            <?php echo $form->textField($model,'verifyCode',array('class'=>'ccode','placeholder'=>'验证码')); ?>
                                            <?php $this->widget('CCaptcha',array('showRefreshButton'=>false,'clickableImage'=>true,'imageOptions'=>array('alt'=>'图片无法加载','title'=>'点击换图', 'style'=>'cursor:pointer;'))); ?>
                                        </div>
                                        <?php echo $form->error($model,'verifyCode',array('class'=>'errorstyle')); ?>
                                        <?php endif; ?>
                                        <div class="u-chk clr">
                                            <input type="checkbox" value="" name="rememberMe" class="chk" checked>
                                            <label for="poplogin-rem">记住我</label><a class="r" href="">忘记密码？</a>
                                        </div>
                                        <div class="submit clr">
                                            <a id="loginbtn" href="javascript:;" class="abtn l">
                                                <button class="pg-loginbtn" type="submit"><u>登录</u></button>
                                            </a>
                                        </div>
                                    <?php $this->endWidget(); ?>
                                </div>
                                <div class="sites">
                                    <div class="clr">
                                        <ul class="pg-reg">
                                            <!--<li><a href="" class="qqsite"><i class="pg-weixin"></i>微信账号登录</a></li>-->
                                            <li><a href="" class="qqsite"><i class="pg-qq"></i>QQ账号登录</a></li>
                                            <li><a href="" class="weibo"><i class="pg-weibo"></i>新浪微博账号登录</a></li>
                                            <li><a href="" class="douban"><i class="pg-douban"></i>豆瓣账号登录</a></li>
                                            <li><a href="" class="taobao"><i class="pg-taobao"></i>淘宝账号登录</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="toreg clr"><a href="<?php echo SITE_URL.'index.php?r=user/register';?>">还没有账号?立即注册</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gbottom">
            <div class="gbottom-nav">
                <a href="">关于我们</a>
                <a href="">加入TTNN</a>
                <a href="">媒体报道</a>
                <a href="">帮助中心</a>
                <a href="">活动</a>
                <a href="">免责声明</a>
                <a href="">联系我们</a>
            </div>
            <div class="gbottom-i">©2016糖糖闹闹网&nbsp;京ICP备XXXXXXX号-2&nbsp;</div>
        </div>
    </div>
<script>
$(document).ready(function(){
    var img = new Image;
        img.onload=function(){
            $('#yw0').trigger('click');
        }
        img.src = $('#yw0').attr('src');
});
</script>
</body>
</html>
