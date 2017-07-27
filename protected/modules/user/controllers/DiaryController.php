<?php

/**
 * @author wangzilong
 * @date 20160612
 * @description 日记列表
 */

class DiaryController extends WController
{
    public function actionIndex(){
        $this->renderPartial('index');
    }
}