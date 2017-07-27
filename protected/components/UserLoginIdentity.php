<?php

/**
 * 前台登陆账户密码验证
 */
class UserLoginIdentity extends CUserIdentity
{
    
	public function authenticate()
	{
            $user = $this->getOne($this->username);
            if(empty($user)){
                $this->errorCode = self::ERROR_USERNAME_INVALID;
            }else{
                $password = GlobalF::password($this->password,$user['salt']);
                if($user['password']!=$password){
                    $this->errorCode = self::ERROR_PASSWORD_INVALID;
                }else{
                    $authInfo = array(
                        'userid' => $user['id'],
                        'username' => $user['username'],
                        'head'=>$user['head'],
                        );
                    $auth = UserAuth::authcode($authInfo, 'encode');
                    $cookieKey = Yii::app()->params['cookie_user'];
                    UserAuth::setAuthCookie($cookieKey,$auth);
                    $this->errorCode = self::ERROR_NONE;
                }
            }
            return $this->errorCode;
	}
        
        public function getOne($username){
            return UserMember::model()->getInfoByName($username);
        }
}