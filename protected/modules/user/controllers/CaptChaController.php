<?php

/**
 * @description 验证码
 * @author wangzilong
 * @date 20160627
 */
class CaptChaController extends Controller
{
    
    public function actionIndex(){
        $_vc = new ValidateCode();
        $_vc->doimg(SessionName::SESSION_NAME_REGISTER);
    }
    
    public function actionCheck(){
        if(Yii::app()->request->isAjaxRequest){
            $sum = Yii::app()->request->getParam('sum','');
            $result = CheckCode::_check($sum, SessionName::SESSION_NAME_REGISTER);
            if($result){
                echo ResponseRegister::descJson('000');
            }else{
                echo ResponseRegister::descJson('005');
            }
        }else{
            echo ResponseRegister::descJson('001');
        }
        Yii::app()->end();
    }
}

