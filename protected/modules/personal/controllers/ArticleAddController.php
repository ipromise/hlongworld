<?php

/**
 * @author wangzilong
 * @date 20160620
 * @description 添加帖子
 */

class ArticleAddController extends WController
{
    public function actionIndex(){
        if(Yii::app()->request->isPostRequest){
            $uid = $this->uid;
            $id = (int)Yii::app()->request->getPost('articleId');
            $title = htmlspecialchars(Yii::app()->request->getPost('title'));
            $content = htmlspecialchars(Yii::app()->request->getPost('content'));
            $result = UserArticle::model()->articleSave($id,$uid,$title,$content);
            echo json_encode(array('articleId'=>$result));
            exit;
        }
    }
}