<!doctype html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
        <title>I love you ,My little dear!</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="<?php echo FILES_PATH;?>article/css/articleMain.css" rel="stylesheet" type="text/css">
        <link href="<?php echo FILES_PATH;?>article/css/specialList.css" rel="stylesheet" type="text/css">
        <link href="<?php echo FILES_PATH;?>personal/css/main.css" rel="stylesheet" type="text/css">
        <link href="<?php echo CSS_PATH.'index1.css'?>" rel="stylesheet" />
        <link href="<?php echo CSS_PATH.'index2.css'?>" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo FILES_PATH;?>sideBar/css/animation.css">
        <link rel="stylesheet" href="<?php echo FILES_PATH;?>sideBar/css/sideBar.css">
        <link rel="stylesheet" href="<?php echo FILES_PATH;?>figure/css/style.css" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo FILES_PATH;?>group/css/cascade.css">
        <script src="<?php echo JS_PATH.'jquery-1.11.2.min.js'?>"></script>
        <script src="<?php echo JS_PATH.'index2.js'?>" ></script>
    </head>
<body>
    <?php $this->renderPartial('//layouts/header');?>
    <div id="wrapper">
        <!-- 品牌列表开始 -->
        <div class="brand-list">
            <div class="brand-bd cle" id="brand-waterfall">
                <!-- 循环字母模块 item -->
                <div class="item" id="brand-a">
                    <p> <img src="<?php echo FILES_PATH;?>group/img/sensor77.jpg" style="width:100%;"></p>
                    <p class="margin-clear"><label class="text-color-bg1"> Hi：</label><label>雁过留声，人过留名</label></p>
                    <p class="margin-clear"><label class="text-color-bg1" style="color:#22b4f6">申请小组：</label><label><a href="">请点击这里</a></label></p>
                    <p class="margin-clear"><label class="text-color-bg1" style="color:#fb7191">举报小组：</label><label><a href="">请点击这里</a></label></p>
                </div>
                <?php if(isset($groups)&&!empty($groups)){?>
                <?php foreach($groups as $key=>$val){?>
                <div class="item" id="brand-<?php echo $key;?>">
                    <h3><?php echo strtoupper($key);?></h3>
                    <?php foreach($val as $v){?>
                    <p><a href="<?php echo Urls::get('url_user_group_item',array('id'=>$v['id']));?>" ><?php echo isset($v['name']) ? $v['name'] : '';?></a></p>
                    <?php }?>
                </div>
                <?php }?>
                <?php }?>
            </div>
        </div>
        <!-- 品牌列表 end -->
    </div>
    <?php $this->renderPartial('//layouts/footer');?>
    <?php $this->renderPartial('/layouts/sideBar');?>
</body>
<script type="text/javascript" src="<?php echo FILES_PATH;?>group/js/cascade.js"></script>
    <script>
        $('#brand-waterfall').cascade();
    </script>
</html>