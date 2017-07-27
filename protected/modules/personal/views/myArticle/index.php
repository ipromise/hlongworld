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
        <link href="<?php echo FILES_PATH;?>personal/css/city-picker.css" rel="stylesheet" type="text/css" />
        <script src="<?php echo FILES_PATH;?>personal/js/city-picker.data.js"></script>
        <script src="<?php echo FILES_PATH;?>personal/js/city-picker.js"></script>
        
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
                <h1 class="firsttitle">我的发表</h1>
        </div>
        <div class="cb"></div>
    </div>
    <?php $this->renderPartial('/layouts/footer');?>
</div>
<script>
    $(function(){
        $("#ok").click(function(){
            var data = $("#basic").serialize();
            var url = "<?php echo SITE_URL.'personal/setBasic/editBasic'?>";
            $.ajax({
                type: "POST",
                url: url,
                data: data,
                success: function(msg){
                    var msgObj=eval("("+msg+")");
                    if(msgObj.status==0){
                        usernameError  = msgObj.info;
                        $('#usernameError').css('display','block').html(usernameError);
                    }
                    if(msgObj.status==1){
                        jnotifySuccess('操作成功！');
                    }
                }
            });
        });
    });
</script>
</body>
</html>