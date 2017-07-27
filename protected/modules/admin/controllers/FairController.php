<?php

/**
 * 集市管理
 * @author wangzilong
 * @date 2017-07-24
 */
class FairController extends Admin
{

    public function actionIndex(){
        $this->render('index');
    }
    
    public function actionAdd(){
        $model = new AdminFair();
        $fair = Fair::main();
        if(isset($_POST['AdminFair'])){
            $model->attributes = $_POST['AdminFair'];
            $name = isset($_POST['AdminFair']['name']) ? $_POST['AdminFair']['name'] : '';
            $classify = isset($_POST['AdminFair']['classify']) ? $_POST['AdminFair']['classify'] : 0;
            $url = isset($_POST['AdminFair']['url']) ? $_POST['AdminFair']['url'] : 0;
            $validate_file = $model->validate(array('name','classify','url'));
            
            //获得一个CUploadedFile的实例 
            $image = CUploadedFile::getInstance($model,'src');    
            if (is_object($image) && get_class($image)==='CUploadedFile'){
                $base = dirname(Yii::app()->BasePath).DIRECTORY_SEPARATOR;
                $dir = 'assets'. DIRECTORY_SEPARATOR .
                        'upload' . DIRECTORY_SEPARATOR . 
                        'img' . DIRECTORY_SEPARATOR . 
                        'fair' . DIRECTORY_SEPARATOR ;
                
                $ext = $image->getExtensionName();
                $fileName = uniqid() . '.' . $ext;
                
                $last = $base.$dir.$fileName;
                $saveResult = $image->saveAs($last);
            }
            
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

