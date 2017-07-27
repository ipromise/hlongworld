<?php

/**
 * @description 登陆
 * @author wangzilong
 * @date 20160627
 */
class LoginController extends WController
{
    /**
    *验证码属性设置
    */
    public function actions() {
        return array(
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xffffff,
                'foreColor'=>0x22B4F6,
                'height' => 40,
                'minLength' => 5,
                'maxLength' => 5,
                'testLimit' => 999,
            ),
        );
    }
    
    public function actionIndex(){
        $model = new UserForm();
        $this->performAjaxValidation($model);
        if(isset($_POST['UserForm'])){
            $model->attributes=$_POST['UserForm'];
            if($model->validate()&&$model->login()){
                $loginForward = LoginForward::getLoginForward();
                $this->redirect($loginForward);
            }
        }else{
            $referrer = Yii::app()->request->urlReferrer;
            LoginForward::setLoginForward($referrer);
        }
        $this->renderPartial('index',array(
            'model'=>$model,
            'url_home'=>Urls::get('url_home'),
            ),$return=false,$processOutput=true);
    }
    public function actionQq(){
        $qc = new QC();
        $qc->qq_login();
    }
    
    protected function performAjaxValidation($model){
        if(isset($_POST['ajax'])&& $_POST['ajax']=='user-form'){
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}

