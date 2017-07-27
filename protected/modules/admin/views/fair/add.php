<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">添加商品</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                    <!--提示信息-->
                    <?php if (Yii::app()->user->hasFlash('success')) { ?>
                        <div class="alert alert-success" role="alert"><?php echo Yii::app()->user->getFlash('success'); ?></div>
                    <?php } ?>
                    <?php if (Yii::app()->user->hasFlash('error')) { ?>
                        <div class="alert alert-danger" role="alert"><?php echo Yii::app()->user->getFlash('error'); ?></div>
                    <?php } ?>
                    </div>
                </div>
                <div class="row">
                    <?php $form=$this->beginWidget('CActiveForm', array(
                                'id'=>'fair-form',
                                //是否启用客户端验证
                                //'enableClientValidation'=>true,
                                //提交时验证
                                'clientOptions'=>array(
                                        'validateOnSubmit'=>true,
                                ),
                                'htmlOptions'=> array(
//                                    'class'=> 'form-horizontal',
//                                    'role'=> 'form',
                                    'enctype'=> 'multipart/form-data'
                                )
                        )); ?>
                    <div class="col-md-6" role="main">
                            <div class="form-group">
                                <label>商品名称</label>
                                <?php echo $form->textField($model,'name',array('class'=>'form-control','autofocus'=>'autofocus','autocomplete'=>'off','value'=>"")); ?>
                                <?php echo $form->error($model,'name'); ?>
                            </div>
                            <div class="form-group">
                                <label>商品图</label>
                                <?php echo $form->fileField($model, 'src', array('class' => '')); ?>
                                <?php echo $form->error($model,'src'); ?>
                            </div>
                            <div class="form-group">
                                <label>商品链接</label>
                                <?php echo $form->textField($model,'url',array('class'=>'form-control','autofocus'=>'autofocus','autocomplete'=>'off','value'=>"")); ?>
                                <?php echo $form->error($model,'url'); ?>
                            </div>
                            <div class="form-group">
                                <label>所属分类</label>
                                <div class="radio">
                                    <?php if(isset($fair)&&!empty($fair)){?>
                                    <?php foreach($fair as $key=>$val){?>
                                    <label class="radio-inline">
                                    <!-- 在这里使用小物件的时候发生了个问题，暂时先这样吧 -->   
                                        <input name="AdminFair[classify]" type="radio" value="<?php echo $val['id'];?>"><?php echo $val['name'];?>
                                    </label>
                                    <?php }?>
                                    <?php }?>
                                </div>
                            </div>
                    </div>
                    <div class="col-md-6">
                        <p><button type="button" class="btn btn-default" onclick="window.location.href = '<?php echo UrlsAdmin::get('url_admin_fair');?>'">返回</button></p>
                        <p><?php echo CHtml::submitButton('保存',array('class'=>'btn btn-primary')); ?></p>
                    </div>
                    <?php $this->endWidget(); ?>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"></h1>
                    </div>
                </div>
            </div>
        </div>