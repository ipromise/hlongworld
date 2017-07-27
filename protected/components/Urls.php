<?php

/* 
 * 全站路径
 */
class Urls
{
    public static $url = array(
        'url_home'=>SITE_URL.'index.php?r=user/index',
        'url_login'=>SITE_URL.'index.php?r=user/login',
        'url_logout'=>SITE_URL.'index.php?r=user/logout',
        'url_register'=>SITE_URL.'index.php?r=user/register',
        'url_personal'=>SITE_URL.'index.php?r=personal/index',
        'url_personal_setBasic'=>SITE_URL.'index.php?r=personal/setBasic',
        'url_personal_editBasic'=>SITE_URL.'index.php?r=personal/setBasic/editBasic',
        'url_personal_setHead'=>SITE_URL.'index.php?r=personal/setHead',
        'url_personal_editHead'=>SITE_URL.'index.php?r=personal/setHead/editHead',
        'url_personal_setPwd'=>SITE_URL.'index.php?r=personal/setPwd',
        'url_user_group'=>SITE_URL.'index.php?r=user/group',
        'url_user_group_item'=>SITE_URL.'index.php?r=user/group/item',
        'url_user_hot'=>SITE_URL.'index.php?r=user/hot',
        'url_user_baike'=>SITE_URL.'index.php?r=user/baike',
        'url_user_diary'=>SITE_URL.'index.php?r=user/diary',
        'url_user_fair'=>SITE_URL.'index.php?r=user/fair',
        'url_user_fair_list'=>SITE_URL.'index.php?r=user/fair/list',
        'url_user_fair_ajax'=>SITE_URL.'index.php?r=user/fair/ajax',
        
    );
    /*
     * 获得路径
     */
    public static function get($key,$params=''){
        $go = isset(self::$url[$key]) ? self::$url[$key] : self::$url['url_home'];
        if(empty($params)){
            return $go;
        }else{
            $string = '';
            foreach($params as $key=>$val){
                $string .='&'.$key.'='.$val;
            }
            return $go.$string;
        }
    }
}

