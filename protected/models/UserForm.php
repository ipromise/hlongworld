<?php

/**
 * @description 前台用户登录
 * @author wangzilong
 * @date 20160901
 */
class UserForm extends CFormModel
{
	public $username;
	public $password;
	public $rememberMe;
        public $verifyCode; 
	private $_identity;

	/**
         * 字段规则
	 */
	public function rules()
	{
            return array(
                array('username','required','message'=>'用户名不能为空！'),
                array('password', 'required','message'=>'密码不能为空！'),
                array('verifyCode','captcha','message'=>'验证码不正确'),
                array('rememberMe', 'boolean'),
                array('password', 'authenticate'),   
            );
	}
	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
                        'username'=>'用户名',
                        'password'=>'密码',
			'rememberMe'=>'记住我',
                        'verifyCode'=>'验证码',
		);
	}

	/**
         * 用户名密码验证
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserLoginIdentity($this->username,$this->password);
                        $errorCode = $this->_identity->authenticate();
                        if($errorCode===1){
                            $this->addError('username','该用户不存在');
                        }else if($errorCode===2){
                            $this->addError('password','用户名或密码不正确');
                        }
		}
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserLoginIdentity($this->username,$this->password);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserLoginIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}
}
