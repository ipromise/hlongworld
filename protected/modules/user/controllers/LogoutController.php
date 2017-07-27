<?php

/**
 * 登出
 *
 * @author panchunyu
 */
class LogoutController extends WController{
    
    public function actionIndex() {
        UserAuth::logout();
        $login = Urls::get('url_login');
        header('location: '.$login);
    }
    
    
}
