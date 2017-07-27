<?php

class Admin extends Controller
{
    /*
     * 重写模板
     */
    public $layout='/layouts/main';
    
    public function beforeAction($action) {
        $_m = $this->getModule()->id;
        $_c = $this->getId();
        $_a = $this->getAction()->id;

        if($_c!='login'){
            if(Yii::app()->user->isGuest){
                $this->redirect(UrlsAdmin::get('url_admin_login'));
            }
        }
        return parent::beforeAction($action);
    }
}

