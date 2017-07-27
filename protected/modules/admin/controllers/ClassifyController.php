<?php

/**
 * 导航分类管理
 * @author wangzilong
 * @date 2016-06-21
 */
class ClassifyController extends Admin
{
    public function filters()
	{
            return array(
                    array(
                        'PerformanceFilter + delete, save',
                        //'unit'=>'second',
                    ),
            );
	}
    public function actionIndex(){
        $parents = AdminClassify::model()->getAllParent();
        $this->render('index',array('parents'=>$parents));
    }
    
    public function actionDetail(){
        $id = intval(Yii::app()->request->getParam('id',0));
        $detail = AdminClassify::model()->getChildren($id);
        $parent = AdminClassify::model()->getOneParent($id);
        $this->render('detail',array('id'=>$id,'detail'=>$detail,'name'=>$parent['name']));
    }
    
    public function actionSave(){
        if(Yii::app()->request->isAjaxRequest&&Yii::app()->request->isPostRequest){
            $id = intval(Yii::app()->request->getParam('id',0));
            $name = Yii::app()->request->getParam('name','');
            $url = Yii::app()->request->getParam('url','');
            if($this->check($id,$name,$url)){
               $info = array('name'=>$name,'url'=>$url,'is_delete'=>0);
               $result = AdminClassify::model()->saveInfo($id,$info);
               if($result){
                    echo json_encode(array('status'=>'000','info'=>'成功'));
               }
            }   
        }else{
            echo json_encode(array('status'=>'001','info'=>'提交方式非法'));
            Yii::app()->end();
        }
    }
    
    private function check($id,$name,$url){
        $name = trim($name);
        $url = trim($url);
        if(!GlobalF::isUrl($url)){
            echo json_encode(array('status'=>'003','info'=>'URL格式错误'));
            Yii::app()->end();
        }
        if(empty($id) || empty($name) || empty($url)){
            echo json_encode(array('status'=>'002','info'=>'保存数据不能为空'));
            Yii::app()->end();
        }
        return true;
    }
    
    public function actionAdd(){
        if(Yii::app()->request->isAjaxRequest&&Yii::app()->request->isPostRequest){
            $parent_id = intval(Yii::app()->request->getParam('parent',0));
            $admin_classify=new AdminClassify;
            $admin_classify->parent_id = $parent_id;
            $result = $admin_classify->save();
            if($parent_id>0 && $result>0){
               echo json_encode(array('status'=>'000','info'=>'成功','id'=>$admin_classify->id));
               Yii::app()->end();
            }
        }else{
            echo json_encode(array('status'=>'001','info'=>'提交方式非法'));
            Yii::app()->end();
        }
    }
    
    public function actionDelete(){
        if(Yii::app()->request->isAjaxRequest&&Yii::app()->request->isPostRequest){
            $id = intval(Yii::app()->request->getParam('id',0));
            $info = array('is_delete'=>1);
            $result = AdminClassify::model()->saveInfo($id,$info);
            if($result){
               echo json_encode(array('status'=>'000','info'=>'成功'));
            }
        }else{
            echo json_encode(array('status'=>'001','info'=>'提交方式非法'));
            Yii::app()->end();
        }
    }
}