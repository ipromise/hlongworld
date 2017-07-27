<?php

/* 
 * 设置基本信息
 */
class SetBasicController extends WController
{
    public function actionIndex(){
        $basic = UserMember::model()->getBasic($this->uid);
        $this->renderPartial('index',array('basic'=>$basic));
    }
    
    public function actionEditBasic(){
        if(Yii::app()->request->isAjaxRequest){
            $nickname = GlobalF::new_html_special_chars(Yii::app()->request->getParam('nickname', ''));
            $ifUserNameExist = UserMember::model()->ifUserNameExist($nickname);
            if($ifUserNameExist&&$ifUserNameExist->id != $this->uid){
                echo json_encode(array('status'=>0,'info'=>'该昵称已存在'));
                exit;
            };
            $address = GlobalF::new_html_special_chars(Yii::app()->request->getParam('address', ''));
            $signature = GlobalF::new_html_special_chars(Yii::app()->request->getParam('signature', ''));
            $mystatus = GlobalF::new_html_special_chars(Yii::app()->request->getParam('mystatus', ''));
            $saveInfo = array('nickname'=>$nickname,'address'=>$address,'signature'=>$signature,'mystatus'=>$mystatus);

            $result = UserMember::model()->saveBasic($this->uid,$saveInfo);
            if($result){
                echo json_encode(array('status'=>1,'info'=>'修改成功'));
            }
        }
    }    
    
}

