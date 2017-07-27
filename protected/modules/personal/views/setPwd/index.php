<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="Description" content="">
        <meta name="Keywords" content="">
        <link href="<?php echo FILES_PATH;?>personal/css/common.css" rel="stylesheet" type="text/css">
        <link href="<?php echo FILES_PATH;?>personal/css/user.css" rel="stylesheet" type="text/css">
        <link href="<?php echo FILES_PATH;?>personal/css/main.css" rel="stylesheet" type="text/css">
	<script src="<?php echo FILES_PATH;?>personal/js/jquery.js" type="text/javascript"></script>
	<script src="<?php echo FILES_PATH;?>personal/js/main.js" type="text/javascript"></script>
        <link href="<?php echo FILES_PATH;?>personal/css/bootstrap.css" rel="stylesheet" type="text/css" />
        
        <!-- 修改密码开始 -->
        <!--<link href="<?php echo FILES_PATH;?>personal/css/bootstrap.min.css" rel="stylesheet">-->
        <link href="<?php echo FILES_PATH;?>personal/css/gloab.css" rel="stylesheet">
        <link href="<?php echo FILES_PATH;?>personal/css/index.css" rel="stylesheet">
        <script src="<?php echo FILES_PATH;?>personal/js/jquery-1.11.1.min.js"></script>
        <script src="<?php echo FILES_PATH;?>personal/js/changePwd.js"></script>
        <!-- 修改密码结束 -->
        
        <!-- 提示开始 -->
        <script type="text/javascript" src="<?php echo FILES_PATH;?>personal/js/jquery-2.1.1.min.js"></script> 
	<script type="text/javascript" src="<?php echo FILES_PATH;?>personal/js/jnotify.jquery.js"></script> 
        <script type="text/javascript" src="<?php echo FILES_PATH;?>personal/js/jnotify.js"></script> 
	<link rel="stylesheet" type="text/css" href="<?php echo FILES_PATH;?>personal/css/jnotify.jquery.css" /> 
        <!-- 提示结束 -->
        
    </head>
    <body>
    <?php $this->renderPartial('//layouts/header');?>
    <div class="main">
        <div class="inCenter">		
            <?php $this->renderPartial('/layouts/left');?>
            <div class="right">
                <h1 class="firsttitle">修改密码</h1>
                <div class="basic">
                    <form id="pwd" onsubmit="return false">
                        <div class="reg-box" id="verifyCheck">
                        <div class="part1">
                            <div class="item col-xs-12">
                                <span class="intelligent-label f-fl"><b class="ftx04">*</b>原密码：</span>    
                                <div class="f-fl item-ifo">
                                    <input type="password" id="oldPassword" name="oldPassword" class="txt03 f-r3 required" tabindex="3"  autocomplete="off" data-valid="isNonEmpty||between:6-20" data-error="密码不能为空||密码长度6-20位" /> 
                                    <span class="ie8 icon-close close hide" style="right:55px"></span>
                                    <span class="showpwd" data-eye="oldPassword"></span>                        
                                    <label class="icon-sucessfill blank hide"></label>
                                    <label class="focus"></label>
                                    <label class="focus valid" id="oldPassword_error"></label>
                                    <span class="clearfix"></span>
                                </div>
                            </div>
                            <div class="item col-xs-12">
                                <span class="intelligent-label f-fl"><b class="ftx04">*</b>密码：</span>    
                                <div class="f-fl item-ifo">
                                    <input type="password" id="password" name="newPassword" maxlength="20" class="txt03 f-r3 required" tabindex="3"  autocomplete="off" data-valid="isNonEmpty||between:6-20||level:2" data-error="密码不能为空||密码长度6-20位||该密码太简单，有被盗风险，建议字母+数字的组合" /> 
                                    <span class="ie8 icon-close close hide" style="right:55px"></span>
                                    <span class="showpwd" data-eye="password"></span>                        
                                    <label class="icon-sucessfill blank hide"></label>
                                    <label class="focus">6-20位英文（区分大小写）、数字、字符的组合</label>
                                    <label class="focus valid"></label>
                                    <span class="clearfix"></span>
                                    <label class="strength">
                                        <!--<span class="f-fl f-size12">安全程度：</span>-->
                                        <b><i>弱</i><i>中</i><i>强</i></b>
                                    </label>    
                                </div>
                            </div>
                            <div class="item col-xs-12">
                                <span class="intelligent-label f-fl"><b class="ftx04">*</b>确认密码：</span>    
                                <div class="f-fl item-ifo">
                                    <input type="password" id="rePassword" name="rePassword" maxlength="20" class="txt03 f-r3 required" tabindex="4"  autocomplete="off" data-valid="isNonEmpty||between:6-16||isRepeat:password" data-error="密码不能为空||密码长度6-16位||两次密码输入不一致" />
                                    <span class="ie8 icon-close close hide" style="right:55px"></span>
                                    <span class="showpwd" data-eye="rePassword"></span>
                                    <label class="icon-sucessfill blank hide"></label>
                                    <label class="focus">请再输入一遍上面的密码</label> 
                                    <label class="focus valid"></label>                          
                                </div>
                            </div>
                            <div class="item col-xs-12">
                                <span class="intelligent-label f-fl">&nbsp;</span>    
                                <div class="f-fl item-ifo">
                                   <a href="javascript:;" class="btn btn-blue f-r3" id="btn_part1">保存</a>                         
                                </div>
                            </div> 
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="cb"></div>
        </div>
    <?php $this->renderPartial('/layouts/footer');?>
    </div>
<script>
$(function(){	
    $("#btn_part1").click(function(){						
        if(!verifyCheck._click()) return;
        var data = $("#pwd").serialize();
        var url = "<?php echo SITE_URL.'personal/setPwd/editPwd'?>";
        $.ajax({
                type: "POST",
                url: url,
                data: data,
                success: function(msg){
                    var msgObj=eval("("+msg+")");
                    error  = msgObj.info;
                    if(msgObj.status==0){
                        $('#oldPassword_error').addClass('error').html(error);
                    }
                    if(msgObj.status==1){
                        $('#oldPassword_error').removeClass('error').html('');
                        var url = "<?php echo SITE_URL;?>user/logout.html";
                        jnotifySuccess('保存成功！',url);
                    }
                }
            });
    });
});
</script>
</body>
</html>