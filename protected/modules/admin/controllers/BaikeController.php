<?php

/**
 * 百科管理
 * @author wangzilong
 * @date 2017-07-24
 */
class BaikeController extends Admin
{

    public function actionIndex(){
        $this->render('index');
    }
    
    public function actionAdd(){
        $model = new AdminBaike();
        $fair = Fair::main();
        if(isset($_POST['AdminBaike'])){
            $model->attributes = $_POST['AdminBaike'];
            $name = isset($_POST['AdminBaike']['name']) ? $_POST['AdminBaike']['name'] : '';
            $keyword = isset($_POST['AdminBaike']['keyword']) ? $_POST['AdminBaike']['keyword'] : '';
            $url = isset($_POST['AdminBaike']['url']) ? $_POST['AdminBaike']['url'] : 'javascript:;';
            $site = isset($_POST['AdminBaike']['site']) ? $_POST['AdminBaike']['site'] : 'javascript:;';
            $validate_file = $model->validate(array('name','keyword','url','site'));
            
            if($validate_file){
                $model->name = $name;
                $model->url = $url;
                $model->src = $dir.$fileName;
                $model->classify = $classify;
                $model->addtime = time();
                $result = $model->save();
                if($result){
                    Yii::app()->user->setFlash('success', '成功');
                }else{
                    Yii::app()->user->setFlash('error', '失败');
                }
            }else{
                Yii::app()->user->setFlash('error', '参数非法');
            }
        }
        $this->render('add',array(
            'model'=>$model,
            'fair'=>$fair,
            ));
    }
}

