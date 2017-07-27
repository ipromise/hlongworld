<?php

/**
 * @author wangzilong
 * @date 20160620
 * @description 发表帖子
 */

class ArticlePublishController extends WController
{
    CONST ADDURL = '';
    public function actionIndex(){
//        $classify = GlobalF::getCache('classify');
//        if(!$classify){
            $classify = AdminClassify::model()->getAllClassify();
        //}
        $this->renderPartial('index',array('classify'=>$classify));
    }
}