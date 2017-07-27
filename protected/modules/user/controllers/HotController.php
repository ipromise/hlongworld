<?php

/**
 * @author wangzilong
 * @date 20161206
 * @description 热点
 */

class HotController extends WController
{
    public function actionIndex(){
        $uid = $this->uid;
        $this->renderPartial('index');
    }
}