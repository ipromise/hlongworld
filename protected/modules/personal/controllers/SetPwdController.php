<?php

/* 
 * 修改用户密码
 */
class SetPwdController extends WController
{
    public function actionIndex(){
        $this->renderPartial('index');
    }
    
    /*
     * 修改密码
     */
    public function actionEditPwd(){
        if(Yii::app()->request->isPostRequest){
            $oldPwd = Yii::app()->request->getPost('oldPassword');
            $newPwd = Yii::app()->request->getPost('newPassword');
            $rePwd = Yii::app()->request->getPost('rePassword');
            if(empty($oldPwd)||empty($newPwd)||empty($rePwd)){
                echo json_encode(array('status'=>0,'info'=>'提交参数为空！'));
                exit;
            }
            $checkResult = $this->checkOldPwd($oldPwd);
            if(!$checkResult){
                echo json_encode(array('status'=>0,'info'=>'密码错误！'));
                exit;
            }
            if(strcmp($newPwd,$rePwd)!=0){
                echo json_encode(array('status'=>0,'info'=>'两次输入密码不同！'));
                exit;
            }
            
            if(strlen($newPwd)<6||strlen($newPwd)>20){
                echo json_encode(array('status'=>0,'info'=>'密码长度不符合！'));
                exit;
            }
            if($this->saveNewPwd($newPwd)){
                echo json_encode(array('status'=>1,'info'=>'成功！'));
                exit;
            }
        }
    }
    
    /*
     * 检查原密码
     */
    public function checkOldPwd($oldPwd){
        return UserMember::model()->checkPwd($oldPwd,$this->uid);
    }
    
    /*
     * 保存新密码
     */
    public function saveNewPwd($newPwd){
        return UserMember::model()->savePwd($newPwd,$this->uid);
    }
}

