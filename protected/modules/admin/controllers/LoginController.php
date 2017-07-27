<?php

/**
 * 后台登陆
 * @author wangzilong
 * @date 2016-05-06
 */
class LoginController extends Admin
{
    /**
    *验证码属性设置
    */
    public function actions() {
        return array(
            'captcha'=>array(
                'class'=>'CCaptchaAction',
                'backColor'=>0xffffff,
                'height' => 40,
                'minLength' => 5,
                'maxLength' => 5,
                'foreColor'=>0x22B4F6,

            ),
        );
    }
    public function actionIndex(){
        $model = new LoginForm();
        if(isset($_POST['LoginForm'])){
            $model->attributes=$_POST['LoginForm'];
            
            if($model->validate()){
                $result = $model->login();
                
                if($result){
                    $this->redirect(UrlsAdmin::get('url_admin_home'));
                }
            }
        }
        $this->renderPartial('index',array('model'=>$model));
    }
   
}

