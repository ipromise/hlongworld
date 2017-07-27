<?php

/* 
 * 设置头像
 */
class SetHeadController extends WController
{
    public function actionIndex(){
        $basic = UserMember::model()->getBasic($this->uid);
        $head = isset($basic['head']) ? $basic['head'] : '';
        $url_personal_editHead = Urls::get('url_personal_editHead');
        $this->renderPartial('index',array(
            'head'=>$head,
            'url_personal_editHead'=>$url_personal_editHead,
            ));
    }
    
    public function actionEditHead(){
        if(Yii::app()->request->isPostRequest){
            $avatarFile = isset($_FILES['avatar_file']) ? $_FILES['avatar_file']:'';
            $avatarData = json_decode(Yii::app()->request->getPost('avatar_data'),true);
            $base = dirname(Yii::app()->BasePath).'/';
            $dir = 'assets/upload/img/head/';
            if(!empty($avatarFile)){
                $user=UserMember::model()->findByPk($this->uid);
                $file = CUploadedFile::getInstanceByName('avatar_file');
                if(is_object($file)&&get_class($file) === 'CUploadedFile'){
                    $name = 'header_'.time().'_'.rand(0,9999).'.'.$file->extensionName;
                    $last = $base.$dir.$name;
                    $user->head = $dir.$name;
                    if($user->save()){
                        $file->saveAs($last);
                        Image::ImageCropper($last,$avatarData['x'], $avatarData['y'],$avatarData['width'], $avatarData['height']);
                        echo json_encode(array('result'=>SITE_URL.$user->head));
                        exit;
                    }
                } 
            }  
        }
    }
}

