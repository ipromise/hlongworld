<?php

/* 
 * 集市配置
 */

class Fair
{
    public static function main(){
        return array(
            array('id'=>1,'name'=>'童书','url'=>Urls::get('url_user_fair_list',array('id'=>1))),
            array('id'=>2,'name'=>'玩具','url'=>Urls::get('url_user_fair_list',array('id'=>2))),
            array('id'=>3,'name'=>'涂鸦','url'=>Urls::get('url_user_fair_list',array('id'=>3))),
        );
    }
}

