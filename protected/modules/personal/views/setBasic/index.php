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
                <h1 class="firsttitle">基本信息</h1>
                <form id="basic" onsubmit="return false">
                <div class="basic">
                    <div class="mt10">
                        <span class="subheading">昵&nbsp;&nbsp;&nbsp;&nbsp;称：</span>
                        <ul class="inputGray fl">
                            <li class="iLeft"></li>
                            <li class="iCenter" style="border-bottom:#E9E9E9 1px solid; ">
                                <input name="nickname" type="text" value="<?php echo isset($basic['nickname']) ? $basic['nickname'] : '';?>" autocomplete="off" onfocus="$('#nicknameError').css('display','none')">
                            </li>
                            <li class="iRight"></li>
                        </ul>
                        <p id="nicknameError" class="nicknameError"></p>
                        <div class="cb"></div>
                    </div>
                    <div class="mt10">
                        <span class="subheading">等&nbsp;&nbsp;&nbsp;&nbsp;级：</span>
                        <div class="LV fl">LV<?php echo isset($basic['vip']) ? $basic['vip'] : '';?></div>
                        <div class="cb"></div>
                    </div>
                    <div class="mt10">
                        <span class="subheading">积&nbsp;&nbsp;&nbsp;&nbsp;分：</span>
                        <div class="fl grade"><?php echo isset($basic['point']) ? $basic['point'] : '';?></div>
                        <a href="http://www.lamabang.com/user/score" class="fl explain">查看积分说明</a>
                        <div class="cb"></div>
                    </div>
                    <div class="mt10">
                        <span class="subheading">签&nbsp;&nbsp;&nbsp;&nbsp;名：</span>
                        <ul class="inputGray fl">
                            <li class="iLeft"></li>
                            <li class="iCenter" style="border-bottom:#E9E9E9 1px solid; ">
                                <input class=" w500" name="signature"  type="text" autocomplete="off" value="<?php echo isset($basic['signature']) ? $basic['signature'] : '';?>">
                            </li>
                            <li class="iRight"></li>
                        </ul>
                        <div class="cb"></div>
                    </div>
                    <div class="mt10">
                        <span class="subheading">地&nbsp;&nbsp;&nbsp;&nbsp;址：</span>
                        <div id="distpicker" class="form-inline">
                            <div class="form-group">
                                <div style="position: relative;">
                                    <input id="city-picker3" class="form-control" name="address" type="text" value="<?php echo isset($basic['address']) ? $basic['address'] : '';?>" data-toggle="city-picker" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="cb"></div>
                    </div>
                    <div class="mt10 ">
                    <div class="mb30">
                        <span class="subheading">妈宝状态：</span>
                        <div class="grade">
                            <div class="mr20"><input  style="height:34px; vertical-align:text-top; margin-top:0;" name="mystatus" value="0" type="radio" <?php echo $basic['mystatus']==0 ? 'checked' : '';?>> <div style="height:34px;">备孕</div></div>                            
                            <div class="mr20"><input  style="height:34px; vertical-align:text-top; margin-top:0;" name="mystatus" value="1" type="radio" <?php echo $basic['mystatus']==1 ? 'checked' : '';?>> <div style="height:34px;">孕期</div></div>
                            <div class="mr20"><input  style="height:34px; vertical-align:text-top; margin-top:0;" name="mystatus" value="2" type="radio" <?php echo $basic['mystatus']==2 ? 'checked' : '';?>> <div style="height:34px;">分娩</div></div>
                            <div class="mr20"><input  style="height:34px; vertical-align:text-top; margin-top:0;" name="mystatus" value="3" type="radio" <?php echo $basic['mystatus']==3 ? 'checked' : '';?>> <div style="height:34px;">0-1岁</div></div>
                            <div class="mr20"><input  style="height:34px; vertical-align:text-top; margin-top:0;" name="mystatus" value="4" type="radio" <?php echo $basic['mystatus']==4 ? 'checked' : '';?>> <div style="height:34px;">1-3岁</div></div>
                            <div class="mr20"><input  style="height:34px; vertical-align:text-top; margin-top:0;" name="mystatus" value="5" type="radio" <?php echo $basic['mystatus']==5 ? 'checked' : '';?>> <div style="height:34px;">3-6岁</div></div>
                        </div>
                    </div>
                    <div class="cb"></div>
                </div>
                <div class="mt50">
                    <input class="ok" id="ok" value="确认" type="submit">
                </div>
            </div>
            </form>
        </div>
        <div class="cb"></div>
    </div>
    <?php $this->renderPartial('/layouts/footer');?>
</div>
<script>
    $(function(){
        $("#ok").click(function(){
            var data = $("#basic").serialize();
            var url = "<?php echo Urls::get('url_personal_editBasic');?>";
            $.ajax({
                type: "POST",
                url: url,
                data: data,
                success: function(msg){
                    var msgObj=eval("("+msg+")");
                    if(msgObj.status==0){
                        nicknameError  = msgObj.info;
                        $('#nicknameError').css('display','block').html(nicknameError);
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