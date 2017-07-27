<?php

/**
 * @author xiaohonglong28@163.com   
 * @date 20170724
 * @description 集市
 */

class FairController extends WController
{
    CONST NUMBER = 8;
    public function actionIndex(){
        $uid = $this->uid;
        $this->renderPartial('index');
    }
    
    public function actionList(){
        $classify = Yii::app()->request->getParam('id'); 
        $data = AdminFair::getInfoByAttributes($classify,self::NUMBER);
        $this->renderPartial('list',array(
            'data'=>$data,
            'ajaxUrl'=>  Urls::get('url_user_fair_ajax'),
            'classify'=>$classify,
            ));
    }
    
    public function actionAjax(){
        $page = Yii::app()->request->getParam('page');
        $classify = Yii::app()->request->getParam('classify');
        $data = AdminFair::getInfoByAttributes($classify,self::NUMBER,$page);
        echo CJSON::encode($data);
        exit;
    }
}