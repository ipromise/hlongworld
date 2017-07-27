<?php

/**
 * 轮播图管理
 * @author wangzilong
 * @date 2016-05-12
 */
class BannerController extends Admin
{
    /*
     * 默认图片
     */
    const NOPIC = 'noPic.png';

    public function actionIndex(){
        $banners = AdminBanner::model()->getAll();
        $this->render('index',array('banners'=>$banners));
    }
    
    public function actionAdd(){
        if(Yii::app()->request->isPostRequest){
            $src = isset($_FILES['src']) ? $_FILES['src']:'';
            $url = Yii::app()->request->getPost('url','');
            $base = dirname(Yii::app()->BasePath).'/';
            $dir = 'assets/upload/img/banner/';
            if(!empty($src)){
                $model=new AdminBanner;
                $file = CUploadedFile::getInstanceByName('src');
                $name = self::NOPIC;
                if(is_object($file)&&get_class($file) === 'CUploadedFile'){
                    $name = 'banner_'.time().'_'.rand(0,9999).'.'.$file->extensionName;
                    $last = $base.$dir.$name;
                    $model->src = $dir.$name;
                    if($model->save()){
                        echo $file->saveAs($last) ? $this->toDoSrc($model) :'error';
                    }
                } 
            }  
        }else{
            $this->render('add');
        }       
    }
    
    public function toDoSrc($model){
        $src = 'javascrit:;';
        if(isset($model->src)){
            $src =  '<a href="'.SITE_URL.$model->src.'" target="_blank">'.SITE_URL.$model->src .'</a>';
        }
        return $src;
    }
    
    public function actionEdit(){
        $id = Yii::app()->request->getParam('id',0);
        $id = intval($id);
        $banner = AdminBanner::model()->getById($id);
        $reorder = isset($banner['reorder']) ? $banner['reorder'] : 0;
        $count = AdminBanner::model()->countByAttributes(array('is_show'=>1));
        if(!empty($banner)){
            $this->render('edit',array('banner'=>$banner,'count'=>$count,'reorder'=>$reorder));
        }
    }
    
    public function actionShow(){
        if(Yii::app()->request->isAjaxRequest){
            $id = Yii::app()->request->getPost('id',0);
            $id = intval($id);
            if($id){
                $adminBanner = AdminBanner::model()->getById($id);
                $current = isset($adminBanner['is_show']) ? $adminBanner['is_show'] : '';
                $toType = abs($current-1);
                $result = $this->toSave($adminBanner,$toType);
                if($result){
                    $canChangeName = ($toType==1) ? '隐藏' : '显示';
                    echo json_encode(array('status'=>'000','info'=>'修改成功','canChangeName'=>$canChangeName));
                }else{
                    echo json_encode(array('status'=>'003','info'=>'保存失败！'));
                    Yii::app()->end();
                }
            }else{
                echo json_encode(array('status'=>'002','info'=>'提交参数错误'));
                 Yii::app()->end();
            }
        }else{
            echo json_encode(array('status'=>'001','info'=>'提交方式非法'));
            Yii::app()->end();
        }
    }
    
    private function toSave($adminBanner,$toType){
        if($adminBanner){
            $toType = intval($toType);
            $adminBanner->is_show = $toType;
            $result = $adminBanner->save();
            if($result){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    
    public function actionChange(){
        if(Yii::app()->request->isAjaxRequest){
            $id = Yii::app()->request->getPost('id',0);
            $id = intval($id);
            if($id){
                $url = Yii::app()->request->getPost('linkUrl',0);
                if(GlobalF::isUrl($url)){
                    $adminBanner = AdminBanner::model()->findByPk($id);
                    $adminBanner->url = $url;
                    $result = $adminBanner->save();
                    if($result){
                        echo json_encode(array('status'=>'000','info'=>'修改成功'));
                        Yii::app()->end();
                    }
                }else{
                    echo json_encode(array('status'=>'004','info'=>'URL格式不正确'));
                    Yii::app()->end();
                }
            }
        }else{
            echo json_encode(array('status'=>'001','info'=>'提交方式非法'));
            Yii::app()->end();
        }
    }
    
    public function actionOrder(){
        if(Yii::app()->request->isAjaxRequest){
            $id = Yii::app()->request->getPost('id',0);
            $id = intval($id);
            if($id){
                $reorder = Yii::app()->request->getPost('reorder',0);
                $adminBanner = AdminBanner::model()->findByPk($id);
                if($adminBanner->is_show!=1){
                    echo json_encode(array('status'=>'005','info'=>'隐藏图片不能排序'));
                    Yii::app()->end();
                }
                $adminBanner->reorder = $reorder;
                $result = $adminBanner->save();
                if($result){
                    echo json_encode(array('status'=>'000','info'=>'修改成功'));
                    Yii::app()->end();
                }
            }
        }else{
            echo json_encode(array('status'=>'001','info'=>'提交方式非法'));
            Yii::app()->end();
        }
    }
}

