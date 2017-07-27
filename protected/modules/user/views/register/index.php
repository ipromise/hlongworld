<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>注册-糖糖闹闹</title>
    <meta name="Keywords" content=""/>
    <meta name="Description" content=""/>
    <script type="text/javascript" src="<?php echo JS_PATH;?>jquery-1.3.2.min.js"></script>
    <script type="text/javascript" src="<?php echo FILES_PATH;?>point/js/sweet-alert.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH.'index1.css'?>" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>gui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>wait.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>login-reg.css">
    <link rel="stylesheet" type="text/css" href="<?php echo FILES_PATH;?>point/css/sweet-alert.css">  
</head>
<body>
    <div class="container ">
        <div class="gheader-wp">
            <div class="gheader-wp-b">
                <div class="gheader" id="gheader">
                    <a class="gheader-logo gfl" id="guokrLogo" href="<?php echo Urls::get('url_home');?>" >糖糖闹闹网</a>
                    <img class="gmotto" src="<?php echo IMG_PATH;?>slogan.png" alt="糖糖闹闹都是好孩子！" />
                </div>
            </div>
        </div>
        <div class="wrap grow gmt30 gpack">
            <div class="gspan-6 gprefix-3 gsuffix-3 side">
                <div class="side-title">你还可以用第三方帐号登录</div>
                <div class="login wlogin">
                    <div class="wsites">
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
                <p>已有帐号？<a rel="nofollow" id="changeVcode" href="<?php echo SITE_URL.'index.php?r=user/login'?>">马上登录</a></p>
            </div>
            <div class="gspan-16 gprefix-2 main">     
            <h1>Welcome</h1>
            <form class="gform" id="register"> 
                <p class="gform-box">
                    <input class="gbtxt" id="email" type="email" name="email" placeholder="邮箱" value="">
                    <span class="tip" id="email_tip"></span>
                </p>
                <p class="gform-box">
                    <img  id='src' title="点击刷新" src="<?php echo $url_register_reFreshCode;?>" align="absbottom" onclick="this.src='<?php echo $url_register_reFreshCode;?>'+'&'+Math.random();"></img>
                    <input class="gbtxt" id="sum" type="text" name="sum" placeholder="和or差？" value="" style="width:100px;" autocomplete="off">
                    <span class="tip" id="sum_tip"></span>
                </p>
                <div>
                    <input type="submit" class="gform-submit greg-btn" value="发送验证邮件">
                </div>
            </form>
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
        <div class="loader" id="loader">
            <div class="loader1">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        
    </div>
    <script>
        $('#changeVcode').click(function(){
            $('#loginbg').css('display','block');
            $('#login').css('display','block');
        });
    </script>
    <script>
        $('#email').blur(function(){
           checkEmail();
        });
        $('#register').bind('submit', function(){
            var isEmail = checkEmail();
            var isSum= checkSum();
            if(isEmail && isSum){
                formSubmit();
            }
            return false;
        });

        function formSubmit(){
            var email = $('#email').val();
            var sum = $('#sum').val();
            $.ajax({
                url: "<?php echo $url_register_submit;?>",
                data: {email:email,sum:sum},
                async: false,
                beforeSend: function(){
                    $('#loader').css('display','block');
                },
                type: 'post',
                dataType:'json', 
                success:function(data) {
                    if(data.status == '000'){
                        $('#loader').css('display','none');
                        refreSrc();
                        swal({
                                title: "邮件已发送！",
                                type: "success",
                                showCancelButton: false,
                                confirmButtonColor: '#aedef4',
                                confirmButtonText: '去激活',
                                allowOutsideClick: true,
                        },
                        function(){
                              window.open(data.url); 
                        }); 
                    }
                },
            });
        }
        
        function checkEmail(){
            var email = $('#email');
            var tip = $('#email_tip');
            check_result  = false;
            $.ajax({
                url:'<?php echo $url_register_checkEmail;?>',
                data:{email:email.val()},
                type:'post',  
                cache:false,
                async:false, 
                dataType:'json',  
                success:function(data) {
                    if(data.status == '000'){
                        tip.html('');
                        check_result  = true;
                    }else{
                        tip.html(data.desc);
                    }
                },
            });
            return check_result;
        }
        
        function checkSum(){
            var sum = $("#sum").val();
            check_result  = false;
            $.ajax({
                url:'<?php echo $url_register_checkCalculate;?>',
                data:{sum:sum},
                type:'post',  
                cache:false,
                async:false, 
                dataType:'json',  
                success:function(data) {
                    if(data.status == '000'){
                        check_result = true;
                        $('#sum_tip').html('');
                    }else{
                        $('#sum_tip').html(data.desc);
                        refreSrc();
                    }
                 },
                error:function(){
                    refreSrc();
                },
            });
            return check_result;
        }
        
        function refreSrc(){
            var src = '<?php echo $url_register_reFreshCode;?>'+'&'+Math.random();
            $('#src').attr('src',src);
        }
    </script>
</body>
</html>