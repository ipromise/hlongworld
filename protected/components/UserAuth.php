<?php

/* 
 *用户登录登出COOKIE操作
 */

class UserAuth
{
    
    /*
     * 记住时间
     */
    const REMEMBER_AUTH_EXPIRE = 86400;
    
    
    /*
     * 获取用户身份
     */
    public static function getUserAuth(){
        $cookieName =Yii::app()->params['cookie_user'];
        $auth = GlobalF::get_cookie($cookieName);
        if($auth){
            return self::authcode($auth, 'decode');
        }
        return false;
    }
        
    /**
     * 用户身份字串加解密
     * @param string $type 操作类型
     * @return array
     */
    public static function authcode($authdata, $type = 'decode') {
        $auth_key = md5(Yii::app()->params['auth_key']);
        if ($type === 'encode') {
            empty($authdata) && trigger_error('param not found', E_USER_ERROR);
            $auth = GlobalF::sys_auth($authdata['userid'] . "\t" . $authdata['username']. "\t" . $authdata['head'], 'ENCODE', $auth_key);
        } else {
            $auth = array();
            $data = explode("\t", GlobalF::sys_auth($authdata, 'DECODE', $auth_key));     
            $auth['userid'] = isset($data[0]) ? intval($data[0]) : 0;
            $auth['username'] = isset($data[1]) ? GlobalF::safe_replace($data[1]) : '';
            $auth['head'] = isset($data[2]) ? GlobalF::safe_replace($data[2]) : '';
        }
        return $auth;
    }
    
    /**
     * 用户身份字串写入Cookie
     * @param string $code
     * @param tinyint $remember_username
     * @return null 
     */
    public static function setAuthCookie($cookieKey,$cookieValue, $remember=0) {
        $httponly = true;
        $expire = $remember ? time() + self::REMEMBER_AUTH_EXPIRE : 0;
        GlobalF::set_cookie($cookieKey, $cookieValue, $expire, $httponly);
    }
    
    /**
     * 用户退出操作
     * 清除所有cookie
     */
    public static function logout() {
        $cookieKey = Yii::app()->params['cookie_user'];
        $cookie = Yii::app()->request->getCookies();
        unset($cookie[$cookieKey]);
    }
}

