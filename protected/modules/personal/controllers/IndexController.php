<?php

/**
 * 个人中心首页
 */
class IndexController extends WController
{
    public function actionIndex(){
        $head = $this->head;
        $username = $this->username;
        $mydiarys = $this->myDiary();
        
        $this->renderPartial('index',array(
            'url_personal_setHead'=>Urls::get('url_personal_setHead'),
            'head'=>$head,
            'username'=>$username,
            'mydiarys'=>$mydiarys,
            ));
    }
    

    private function myDiary(){
        $uid = $this->uid;
        return UserArticle::model()->findMyArticles($uid);
    }
}