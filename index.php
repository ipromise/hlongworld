<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';
$qqApi = dirname(__FILE__).'/protected/vendor/API/qqConnectAPI.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
defined('CHARSET') or define('CHARSET','utf8');
defined('SITE_URL') or define('SITE_URL','http://localhost/hlongworld/');
defined('FILES_PATH') or define('FILES_PATH',SITE_URL.'assets/');
defined('IMG_PATH') or define('IMG_PATH',SITE_URL.'assets/img/');
defined('CSS_PATH') or define('CSS_PATH',SITE_URL.'assets/css/');
defined('JS_PATH') or define('JS_PATH',SITE_URL.'assets/js/');
defined('FONT_PATH') or define('FONT_PATH',SITE_URL.'assets/font/');

defined('BS_PATH') or define('BS_PATH',SITE_URL.'assets/bootstrap/');
defined('UP_PATH') or define('UP_PATH',SITE_URL.'assets/upload/');
require_once($yii);
require_once($qqApi);
Yii::createWebApplication($config)->run();
