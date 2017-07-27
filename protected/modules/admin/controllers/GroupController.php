<?php

/**
 * 小组管理
 * @author wangzilong
 * @date 2017-02-04
 */
class GroupController extends Admin
{
    public function actionIndex(){
        $this->render('index');
    }
    
    public function actionAdd(){
        $model = new AdminGroup();
        if(isset($_POST['AdminGroup'])){
            $info = self::_toDoAdminGroup($_POST['AdminGroup']);
            $model->attributes=$info;
            $validate_file = $model->validate(array('name','slogan','headman','pendragon'));
            
            //获得一个CUploadedFile的实例 
            $image = CUploadedFile::getInstance($model,'background');    
            if (is_object($image) && get_class($image)==='CUploadedFile'){
                $base = dirname(Yii::app()->BasePath).DIRECTORY_SEPARATOR;
                $dir = 'assets'. DIRECTORY_SEPARATOR .
                        'upload' . DIRECTORY_SEPARATOR . 
                        'img' . DIRECTORY_SEPARATOR . 
                        'group' . DIRECTORY_SEPARATOR ;
                
                $ext = $image->getExtensionName();
                $fileName = uniqid() . '.' . $ext;
                
                $last = $base.$dir.$fileName;
                $saveResult = $image->saveAs($last);
            }
            
            if($validate_file){
                $acronym = Spell::encode($info['name'],'head');
                $model->acronym = $acronym;
                $model->esort = substr($acronym,0,1);
                $model->background = $dir.$fileName;
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
        ));
    }
    
    public function actionVerify(){
        $this->render('verify');
    }
    
    public function actionUser(){
        $search = Yii::app()->request->getParam('search');
        $result = UserMember::model()->searchUser($search);
        echo CJSON::encode($result);
        Yii::app()->end();
    }
    
    /*
     * 处理提交信息中组长和副组长
     */
    private static function _toDoAdminGroup($info){
        $info['headman'] = isset($info['headman'][0]) ? $info['headman'][0] : 0;
        $info['pendragon'] = isset($info['pendragon']) ? implode(',',$info['pendragon']) : 0;
        return $info;
    }
}