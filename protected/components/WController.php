<?php

/* 
 * 用户登录前置操作
 */
class WController extends Controller
{   
    
    public $uid;
    
    public $username;
    
    public $head;
    
    public function init(){
        $userAuth = UserAuth::getUserAuth();
        if (isset($userAuth['userid']) && $userAuth['userid'] > 0) {
            $this->uid = $userAuth['userid'];
            $this->username = $userAuth['username'];
            $this->head = SITE_URL.$userAuth['head'];
            
            if($this->module->id=='user'&&in_array(Yii::app()->controller->id,array('login'))){
                $loginForward = LoginForward::getLoginForward();
                $this->redirect($loginForward);
            }
        }else{
            if(in_array($this->module->id,array('personal'))){
                $this->redirect(array('/user/login'));
            }else{
                return false;
            }
        }
    }
}

