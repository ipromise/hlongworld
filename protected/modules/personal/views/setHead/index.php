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
        <!--  头像开始 -->
        <!--<script src="<?php echo FILES_PATH;?>personal/js/jquery.min.js"></script>-->
	<link href="<?php echo FILES_PATH;?>personal/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo FILES_PATH;?>personal/css/cropper.min.css" rel="stylesheet">
	<link href="<?php echo FILES_PATH;?>personal/css/sitelogo.css" rel="stylesheet">
	<script src="<?php echo FILES_PATH;?>personal/js/cropper.min.js"></script>
	<script src="<?php echo FILES_PATH;?>personal/js/sitelogo.js"></script>
	<script src="<?php echo FILES_PATH;?>personal/js/bootstrap.min.js"></script>
        <!--  头像结束 -->
    </head>
    <body>
    <?php $this->renderPartial('//layouts/header');?>
    <div class="main">
        <div class="inCenter">		
            <?php $this->renderPartial('/layouts/left');?>
            <div class="right">
                <h1 class="firsttitle">我的头像</h1>
                <div class="basic">
                    <div class="ibox-content">
                        <div class="row">
                            <div id="crop-avatar" class="col-md-6">
                                <div class="avatar-view" title="点击图片更换">
                                    <img src="<?php echo SITE_URL.$head;?>" alt="head" id="head">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form class="avatar-form" action="<?php echo $url_personal_editHead;?>" enctype="multipart/form-data" method="post">
                                    <div class="modal-header">
                                        <button class="close" data-dismiss="modal" type="button">&times;</button>
                                        <h4 class="modal-title" id="avatar-modal-label">修改头像</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="avatar-body">
                                            <div class="avatar-upload">
                                                <input class="avatar-src" name="avatar_src" type="hidden">
                                                <input class="avatar-data" name="avatar_data" type="hidden">
                                                <label for="avatarInput">图片上传</label>
                                                <input class="avatar-input" id="avatarInput" name="avatar_file" type="file">
                                            </div>
                                            <div class="row">
                                                <div class="col-md-9">
                                                    <div class="avatar-wrapper"></div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="avatar-preview preview-lg"></div>
                                                    <div class="avatar-preview preview-md"></div>
                                                    <div class="avatar-preview preview-sm"></div>
                                                </div>
                                            </div>
                                            <div class="row avatar-btns">
                                                <div class="col-md-9">
                                                    <div class="btn-group">
                                                        <button class="btn" data-method="rotate" data-option="-90" type="button" title="Rotate -90 degrees"><i class="fa fa-undo"></i> 向左旋转</button>
                                                    </div>
                                                    <div class="btn-group">
                                                        <button class="btn" data-method="rotate" data-option="90" type="button" title="Rotate 90 degrees"><i class="fa fa-repeat"></i> 向右旋转</button>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <button class="btn btn-success btn-block avatar-save" type="submit"><i class="fa fa-save"></i> 保存修改</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="loading" aria-label="Loading" role="img" tabindex="-1"></div>
                </div>
            </div>
            <div class="cb"></div>
        </div>
    <?php $this->renderPartial('/layouts/footer');?>
    </div>
    </body>
</html>