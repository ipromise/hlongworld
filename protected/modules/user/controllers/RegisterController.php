<?php

/**
 * @author wangzilong
 * @description 注册
 * @date 20160630
 */

class RegisterController extends WController
{
    
    public function actionIndex(){
        if(Yii::app()->request->isAjaxRequest){
            $email = Yii::app()->request->getParam('email');
            $sum = Yii::app()->request->getParam('sum');
            $checkEmail = GlobalF::checkEmail($email);
            $checkSum = CheckCode::_check($sum, SessionName::SESSION_NAME_REGISTER);
            if(!$checkEmail){
                echo ResponseRegister::descJson('004');
                exit;
            }else if(!$checkSum){
                echo ResponseRegister::descJson('005');
                exit;
            }else{
                $url = SITE_URL.'index.php?r=user/register/activate';
                $activate_info = GlobalF::sys_auth($email);
                $url = $url.'&activate_info='.$activate_info;
                $result = UserMember::model()->addMember($email,$url);
                GlobalF::destroySession(SessionName::SESSION_NAME_REGISTER);
                if($result){
                    echo $result;
                    exit;
                }else{
                    echo ResponseRegister::descJson('100');
                    exit;
                }
            }            
        }else{
            $url_register_reFreshCode = SITE_URL."index.php?r=user/captCha";
            $url_register_checkEmail = SITE_URL."index.php?r=user/register/checkEmail";
            $url_register_checkCalculate = SITE_URL."index.php?r=user/captCha/check";
            $url_register_submit = SITE_URL."index.php?r=user/register";
            $this->renderPartial('index',array(
                'url_register_reFreshCode' => $url_register_reFreshCode,
                'url_register_checkEmail'=>$url_register_checkEmail,
                'url_register_checkCalculate'=>$url_register_checkCalculate,
                'url_register_submit'=>$url_register_submit,
            ));
        }
    }
    
    public function actionCheckEmail(){
        if(Yii::app()->request->isAjaxRequest){
            $email = Yii::app()->request->getPost('email');
            $email = trim($email);
            $emailCan = UserMember::model()->emailCan($email);
            echo $emailCan;
            exit;
        }
    }
    
    public function actionActivate(){
        $activate = trim(Yii::app()->request->getParam('activate_info'));
        if(empty($activate)){
            echo ResponseRegister::descJson('100');
            exit;
        }else{
            $email = GlobalF::sys_auth($activate, 'DECODE');
            if(!$email){
                echo ResponseRegister::descJson('100');
                exit;
            }else{
                $url_register_password = SITE_URL.'index.php?r=user/register/password';
                $this->renderPartial('activate',array(
                    'email'=>$email,
                    'activate'=>$activate,
                    'url_register_password'=>$url_register_password,
                    ));
            }
        }
    }
    
    /**
     * 记录登陆密码
     */
    public function actionPassword(){
        if(Yii::app()->request->isPostRequest){
            $activate = trim(Yii::app()->request->getParam('activate'));
            $email = GlobalF::sys_auth($activate, 'DECODE');
            $password = trim(Yii::app()->request->getParam('password'));
            $confirm_password = trim(Yii::app()->request->getParam('confirm_password'));
            if(empty($email)){
                echo ResponseRegister::descJson('100');
                exit;
            }
            if($password!=$confirm_password){
                echo ResponseRegister::descJson('006');
                exit;
            }
            $length = mb_strlen($password,'utf-8');
            if($length<8|| $length>16){
                echo ResponseRegister::descJson('007');
                exit;
            }
            $result = UserMember::model()->addPassword($email,$password);
        }else{
            echo ResponseRegister::descJson('101');
            exit;
        }
    }
}