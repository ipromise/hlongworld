<?php

/**
 * @author wangzilong
 * @date 20170204
 * @description 百科
 */

class BaikeController extends WController
{
    public function actionIndex(){
        $uid = $this->uid;
        $this->renderPartial('index');
    }
    
    public function actionItem(){
        $this->renderPartial('item');
    }
}