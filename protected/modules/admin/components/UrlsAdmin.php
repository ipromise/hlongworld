<?php

/* 
 * 后台地址
 */
class UrlsAdmin
{
    public static $url = array(
        'url_admin_home'=>SITE_URL.'index.php?r=admin/index',
        'url_admin_login'=>SITE_URL.'index.php?r=admin/login',
        'url_admin_logout'=>SITE_URL.'index.php?r=admin/logout',
        'url_admin_banner'=>SITE_URL.'index.php?r=admin/banner',
        'url_admin_banner_add'=>SITE_URL.'index.php?r=admin/banner/add',
        'url_admin_banner_edit'=>SITE_URL.'index.php?r=admin/banner/edit',
        'url_admin_banner_change'=>SITE_URL.'index.php?r=admin/banner/change',
        'url_admin_banner_order'=>SITE_URL.'index.php?r=admin/banner/order',
        'url_admin_banner_show'=>SITE_URL.'index.php?r=admin/banner/show',
        'url_admin_classify'=>SITE_URL.'index.php?r=admin/classify',
        'url_admin_classify_detail'=>SITE_URL.'index.php?r=admin/classify/detail',
        'url_admin_classify_delete'=>SITE_URL.'index.php?r=admin/classify/delete',
        'url_admin_classify_save'=>SITE_URL.'index.php?r=admin/classify/save',
        'url_admin_classify_add'=>SITE_URL.'index.php?r=admin/classify/add',
        'url_admin_dimension'=>SITE_URL.'index.php?r=admin/dimension',
        'url_admin_group'=>SITE_URL.'index.php?r=admin/group',
        'url_admin_group_add'=>SITE_URL.'index.php?r=admin/group/add',
        'url_admin_group_verify'=>SITE_URL.'index.php?r=admin/group/verify',
        'url_admin_group_user'=>SITE_URL.'index.php?r=admin/group/user',
        'url_admin_fair'=>SITE_URL.'index.php?r=admin/fair/index',
        'url_admin_fair_add'=>SITE_URL.'index.php?r=admin/fair/add',
        'url_admin_baike'=>SITE_URL.'index.php?r=admin/baike',
        'url_admin_baike_add'=>SITE_URL.'index.php?r=admin/baike/add',
        
    );
    /*
     * 获得路径
     */
    public static function get($key){
        return isset(self::$url[$key]) ? self::$url[$key] : self::$url['url_admin_home'];
    }
}

