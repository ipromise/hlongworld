<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
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
                    Yii::app()->session['userid'] = $user['id'];
                    Yii::app()->session['username'] = $user['username'];
                    $this->errorCode = self::ERROR_NONE;
                }
            }
            return $this->errorCode;
            
//		$users=array(
//			// username => password
//			'demo'=>'demo',
//			'admin'=>'admin',
//		);
//		if(!isset($users[$this->username]))
//			$this->errorCode=self::ERROR_USERNAME_INVALID;
//		elseif($users[$this->username]!==$this->password)
//			$this->errorCode=self::ERROR_PASSWORD_INVALID;
//		else
//			$this->errorCode=self::ERROR_NONE;
		//return !$this->errorCode;
	}
        
        public function getAll(){
            return AdminMember::model()->getNameAndPwd();
        }
        
        public function getOne($username){
            return AdminMember::model()->getInfoByName($username);
        }
}