<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <title>注册 | 糖糖闹闹网</title>
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta charset="UTF-8">
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">  
        <link href="<?php echo FILES_PATH;?>register/css/reset.css" rel="stylesheet">
        <link href="<?php echo FILES_PATH;?>register/css/normalize.css" rel="stylesheet">
        <link href="<?php echo FILES_PATH;?>register/css/common.css" rel="stylesheet">
        <link href="<?php echo FILES_PATH;?>register/css/mod-info.css" rel="stylesheet">
        <script src="<?php echo FILES_PATH;?>register/js/jquery.js"></script>
	<script src="<?php echo FILES_PATH;?>register/js/jquery.validate.js"></script>
        <style>
            .hideShowPassword-toggle {
              background-image: url(<?php echo FILES_PATH;?>register/img/wink.svg);
              background-position: 0 center;
              background-repeat: no-repeat;
              cursor: pointer;
              height: 46px;
              overflow: hidden;
              text-indent: -9999em;
              width: 44px;
            }
            .hideShowPassword-toggle-hide {
              background-position: -44px center;
          }
  </style>
    </head>
    <body>
        <header class="common-header">
            <div class="container">
                <a href="<?php echo SITE_URL.'user/index';?>" class="logo fl"><img src="<?php echo IMG_PATH;?>ttnn.png"></a>
                <div class="info fr">
                    <div class="fl login-in">
                        <a href="<?php echo SITE_URL;?>user/login">登录</a><span class="line">|</span><a href="<?php echo SITE_URL;?>user/register">注册</a>        		            
                    </div>
                </div>
            </div>
        </header>
    <div class="main w1200 cf">
	<div class="form-wrap">
            <div class="title">设置密码</div>
            <div id="w1">
                <form id="signupForm" class="login" action="<?php echo $url_register_password;?>" method="post" enctype="multipart/form-data" data-pjax="1">
                    <div class="fs12 text-center mg-b35">
                        请设置您的账号<span class="redcolor"><?php echo $email;?></span> 的登录密码
                    </div>
                    
                    <div class="formitem-wrap">
                        <div class="border-bottom hasbg cf">
                            <input id="password" class="fl" name="password" placeholder="请输入密码" type="password">
                        </div>
                        <div class="hasbg cf">
                            <input id="password_verify" class="fl" name="confirm_password" placeholder="请确认密码" type="password">
                        </div>
                        <input type="hidden" name="activate" value="<?php echo $activate;?>">
                    </div>
                    <div class="text-center mg-b35"><div id="error"></div></div>
                    <div class="formitem">
                        <button type="submit" class="earthbtn">保存</button>
                    </div>
                    </form>
            </div>
        </div>
    </div>
    <footer class="footer cf">
        <div class="footer_wrap cf">
            <div class="footer_left fl">
                <div class="links">
                    <a href="http://www.iheima.com/sitemap/">站点地图</a> |
                    <a href="http://www.iheima.com/about" target="_blank">关于我们</a> |
                    <a href="http://www.iheima.com/feedback" target="_blank">意见反馈</a> |
                    <a href="http://www.iheima.com/opinion" target="_blank">免责声明</a>
                </div>
                <div class="links">版权所有 © 糖糖闹闹网 京ICP备</div>
            </div>
            <div class="footer_right fr">
                <h5 class="h5">友情链接</h5>
                <ul class="footer-link cf">
                <li><a href="http://finance.qq.com/" class="external" target="_blank">腾讯财经</a></li>
                <li><a href="http://finance.qq.com/" class="external" target="_blank">腾讯财经</a></li>
                <li><a href="http://finance.qq.com/" class="external" target="_blank">腾讯财经</a></li>
                <li><a href="http://finance.qq.com/" class="external" target="_blank">腾讯财经</a></li>
                </ul>
            </div>
        </div>
    </footer>
    <script>
	$(document).ready(function() {
            $("#signupForm").validate({
                rules: {
                    password: {
                        required: true,
                        minlength: 8,
                        maxlength:16
                    },
                    confirm_password: {
//                        required: true,
                        equalTo: "#password"
                    },
                    //agree: "required"
                },
                messages: {
                    password: {
                        required: "密码不能为空",
                        minlength: "密码长度为8-16个字符"
                    },
                    confirm_password: {
                        equalTo: "两次输入密码不一致"
                    },
                    //agree: "",
                },
              errorLabelContainer: $("#signupForm #error"),
              errorElement : 'p',
            });
	});
        $.validator.setDefaults({
            submitHandler: function() {
                form.submit();
            }
	});
	</script>
<script src="<?php echo FILES_PATH;?>register/js/modernizr.custom.js"></script>
<script>
document.write('<script src=<?php echo FILES_PATH;?>register/js/' +
('__proto__' in {} ? 'zepto.custom' : 'jquery') +
'.js><\/script>')
</script>
<script src="<?php echo FILES_PATH;?>register/js/hideShowPassword.min.js"></script>
<script>
$('#password').hideShowPassword({
  innerToggle: true,
  touchSupport: Modernizr.touch
});
</script>
</body>
</html>