<?php

/**
 * 登出
 * @author wangzilong
 * @date 2016-5-10
 */
class LogoutController extends Admin
{
    public function actionIndex(){
        Yii::app()->user->logout();
        $this->redirect(UrlsAdmin::get('url_admin_login'));
    }
}

