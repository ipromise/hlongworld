<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>小龙与小龙的后花园</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo BS_PATH;?>bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="<?php echo BS_PATH;?>bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo BS_PATH;?>dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo BS_PATH;?>bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">后台管理系统</h3>
                    </div>
                    <div class="panel-body">
                        <?php $form=$this->beginWidget('CActiveForm', array(
                                'id'=>'login-form',
                               // 'enableClientValidation'=>true,
                                'clientOptions'=>array(
                                        'validateOnSubmit'=>true,
                                ),
                        )); ?>
                            <fieldset>
                                <div class="form-group">
                                    <?php echo $form->textField($model,'username',array('class'=>'form-control','placeholder'=>'用户名','autofocus'=>'autofocus','autocomplete'=>'off','value'=>"")); ?>
                                    <?php echo $form->error($model,'username'); ?>
                                </div>
                                <div class="form-group">
                                    <?php echo $form->passwordField($model,'password',array('class'=>'form-control','placeholder'=>'密码','value'=>'')); ?>
                                    <?php echo $form->error($model,'password'); ?>
                                </div>
                                <?php if(CCaptcha::checkRequirements()): ?>
                                <div class="form-group">
                                    <?php echo $form->textField($model,'verifyCode',array('class'=>'form-control','placeholder'=>'验证码','style'=>'width:40%;display:inline;')); ?>
                                    <?php $this->widget('CCaptcha',array('showRefreshButton'=>false,'clickableImage'=>true,'imageOptions'=>array('alt'=>'图片无法加载','title'=>'点击换图', 'style'=>'cursor:pointer'))); ?>
                                    <?php echo $form->error($model,'verifyCode'); ?>
                                </div>
                                <?php endif; ?>
                                <!-- Change this to a button or input when using this as a form -->
                                <?php echo CHtml::submitButton('登陆',array('class'=>'btn btn-lg btn-success btn-block')); ?>
                                <!--<input type='submit' class="btn btn-lg btn-success btn-block" value='登陆'>-->
                            </fieldset>
                        <?php $this->endWidget(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
