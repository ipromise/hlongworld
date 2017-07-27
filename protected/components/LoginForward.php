<?php

/* 
 * 登陆后跳转操作
 * wangzilong
 * 20161208
 */
class LoginForward
{
    /*
     * 默认登录后前往的地址
     * 个人中心首页
     */
    CONST LOGINFORWARD_URL = 'index.php?r=personal/index';
    
    /*
     * 存储跳转地址session名称
     */
    CONST LOGINFORWARD_NAME = 'loginForward';
    
    /*
     * 网站域名
     */
    public static $allowHosts = array('localhost');
    
    
    /*
     * 获得登录后前往的URL
     */
    public static function getLoginForward(){
        $loginForward = GlobalF::getSession(self::LOGINFORWARD_NAME);
        return !empty($loginForward) ? $loginForward : SITE_URL.self::LOGINFORWARD_URL;
    }
    
    
    /**
     * 设置登录后前往的URL
     * @param string $url
     * @return null 
     */
    public static function setLoginForward($url) {
        if (self::allowLoginForward($url)) {
            GlobalF::setSession(self::LOGINFORWARD_NAME,$url);
        }
    }
    
    /**
     * 判断是否可做为登录后前往的URL
     * @param string $url
     * @return boolean
     */
    public static function allowLoginForward($url) {
        if (self::urlInsite($url)) {
            $notallow = array('/login', '/register', '/logout');
            foreach ($notallow as $u) {
                if (strpos($url, $u)) {
                    return false;
                }
            }
            return true;
        }else{
            return false;
        }
    }
    
    /**
     * 判断是否站内URL
     * @param string $url
     * @return boolean
     */
    public static function urlInsite($url) {
        if (empty($url)) return false;
        $host = parse_url($url, PHP_URL_HOST);
        if ($host) {
            return in_array($host, self::$allowHosts);
        }else{
            return false;
        }
    }
}

