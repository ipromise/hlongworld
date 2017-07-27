<?php

/**
 * @author wangzilong
 * @date 20160620
 * @description 帖子详情
 */

class ArticleDetailController extends WController
{
    public function actionIndex(){
        $this->renderPartial('index');
    }
}