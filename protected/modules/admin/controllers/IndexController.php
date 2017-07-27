<?php

/**
 * 后台主页
 * @author wangzilong
 * @date 2016-05-06
 */

class IndexController extends Admin
{
    public function actionIndex(){
        $this->render('index');
    }
}
