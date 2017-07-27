<?php

/**
 * @author wangzilong
 * @description 验证码验证
 * @date 20160629
 */

class CheckCode
{
    public static function _check($val,$name){
        $val = (string)$val;
        $val_session = GlobalF::getSession($name);
        if($val === $val_session){
            return true;
        }else{
            GlobalF::destroySession($name);
            return false;
        }
    }
}

