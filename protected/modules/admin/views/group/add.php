<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">添加小组</h1>
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
                                'id'=>'group-form',
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
                                <label>组名</label>
                                <?php echo $form->textField($model,'name',array('class'=>'form-control','autofocus'=>'autofocus','autocomplete'=>'off','value'=>"")); ?>
                                <?php echo $form->error($model,'name'); ?>
                            </div>
                            <div class="form-group">
                                <label>口号</label>
                                <?php echo $form->textField($model,'slogan',array('class'=>'form-control','autofocus'=>'autofocus','autocomplete'=>'off','value'=>"")); ?>
                                <?php echo $form->error($model,'slogan'); ?>
                            </div>
                            <div class="form-group">
                                <label>背景图</label>
                                <?php echo $form->fileField($model, 'background', array('class' => '')); ?>
                                <?php echo $form->error($model,'background'); ?>
                            </div>
                        <div class="form-group">
                           <label>组长：</label>
                                <?php echo $form->listBox($model, 'headman', array(),array('class'=>'selectpicker show-tick form-control','multiple'=>'multiple','data-live-search'=>true,'id'=>'headman'));?>
                                <p class="help-block">请选择1名组长</p>
                          </div>
                        <div class="form-group">
                           <label>副组长：</label>
                                <?php echo $form->listBox($model, 'pendragon', array(),array('class'=>'selectpicker show-tick form-control','multiple'=>'multiple','data-live-search'=>true,'id'=>'pendragon'));?>
                                <p class="help-block">请选择最多5名组长</p>
                          </div>
                    </div>
                    <div class="col-md-6">
                        <p><button type="button" class="btn btn-default" onclick="window.location.href = '<?php echo UrlsAdmin::get('url_admin_group');?>'">返回</button></p>
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
<script type="text/javascript">
    $(window).on('load', function () {
        $('.selectpicker').selectpicker();
        $("#headman").prev().children('.bs-searchbox').children('input').keyup(function() {
            var search = $(this).val();
            getschoolList(search,'headman');
        });
        $("#pendragon").prev().children('.bs-searchbox').children('input').keyup(function() {
            var search = $(this).val();
            getschoolList(search,'pendragon');
        });
    });
    
    


    function getschoolList(search,selectName) {
        object = $('#'+selectName)
        $.ajax({
            url: "<?php echo UrlsAdmin::get('url_admin_group_user');?>",
            type: "get",
            dataType: "json",
            data: {search:search},
            success: function (data) {
                object.html('');
                $.each(data, function (i) {
                    object.append("<option value=" + data[i].id + ">" + data[i].username + "</option>");
                });
                object.selectpicker('refresh');
            },
            error: function (data) {}
        })

    }
</script>