<?php

/**
 * This is the model class for table "user_member".
 *
 * The followings are the available columns in table 'user_member':
 * @property string $id
 * @property string $email
 * @property integer $checkEmail
 */
class UserMember extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_member';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email', 'required'),
			array('checkEmail', 'numerical', 'integerOnly'=>true),
			array('email', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, email, checkEmail', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'email' => 'Email',
			'checkEmail' => 'Check Email',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('checkEmail',$this->checkEmail);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserMember the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function addMember($checkEmail,$url){
            $result = $this->emailCan($checkEmail);
            $newresult = json_decode($result,true);
            if($newresult['status']=='000'){
                $member = new self;
                $member->email = $checkEmail;
                $member->sendNum +=1;
                $memberResult = $member->save();
                //发送认证邮件
                $sendResult = SendEmail::_send($checkEmail,$url);
                if($sendResult){
                    $arr = array('url'=>GlobalF::getEmailLogin($checkEmail));
                    return ResponseRegister::descJson('000',$arr);
                }
            }else{
                return $result;
            }
        }
        
        public function emailCan($email){
            if(!GlobalF::checkEmail($email)){
               return ResponseRegister::descJson('004');
            }
            $result = self::model()->findByAttributes(array('email'=>$email));
            if(empty($result)){
                return ResponseRegister::descJson('000');
            }else{
                if(1==$result->checkEmail){
                    return ResponseRegister::descJson('001');
                }else{
                    $emailLogin = GlobalF::getEmailLogin($email);
                    $arr = array('url'=>GlobalF::getEmailLogin($email));
                    return ResponseRegister::descJson('002',$arr);
                }
            }
        }
        
        public function addPassword($email,$password){
            $result = self::model()->findByAttributes(array('email'=>$email));
            if(empty($result)){
                return false;
            }else{
               if(empty($result['salt'])){
                   $salt = GlobalF::create_randomstr(6);
                   $result->salt  = $salt;
               }else{
                   $salt = $result['salt'];
               }
               $password = GlobalF::password($password,$salt);
               $result->password = $password;
               $result->checkEmail = 1;
               return $result->save();
            }
        }
        
        public function getInfoByName($username){
            $username = trim($username);
            if(GlobalF::checkEmail($username)){
                $attributes = array('email'=>$username);
            }else{
                return false;
            }
            return self::model()->findByAttributes($attributes);
        }
        
        /*
         * 保存基本资料信息
         */
        public function saveBasic($uid,$info){
            $model = self::model()->findByPk($uid);
            foreach($info as $key=>$val){
                $model->$key = $val;
            }
            return $model->save();
        }
        
        public function ifUserNameExist($username){
            return self::model()->findByAttributes(array('username'=>$username));
        }
        
        /*
         * 获得用户信息
         */
        public function getBasic($uid){
            return self::model()->findByPk($uid);
        }
        
        /**
         * 验证密码
         * @param type $oldPwd
         * @param type $uid
         * @return boolean
         */
        public function checkPwd($oldPwd,$uid){
            $result = self::model()->findByPk($uid);
            if(empty($result)){
                return false;
            }else{
                $oldPwd = GlobalF::password($oldPwd,$result['salt']);
                $password = isset($result['password']) ? $result['password'] : '';
                return $oldPwd==$password;
            }
        }
        
        /**
         * 根据UID保存密码
         * @param type $pwd
         * @param type $uid
         * @return boolean
         */
        public function savePwd($password,$uid){
            $result = self::model()->findByPk(array('id'=>$uid));
            if(empty($result)){
                return false;
            }else{
               if(empty($result['salt'])){
                   $salt = GlobalF::create_randomstr(6);
                   $result->salt  = $salt;
               }else{
                   $salt = $result['salt'];
               }
               $password = GlobalF::password($password,$salt);
               $result->password = $password;
               return $result->save();
            }
        }
        
        /*
         * 模糊查询
         * true代表模糊查询
         */
        public function searchUser($username){    
            $criteria = new CDbCriteria;
            $criteria->select = 'id,username';  
            $criteria->compare('username',$username,true); 
            return self::model()->findAll($criteria);
        }
        
        /*
         * 根据uids获得用户信息
         */
        public static function getUsersByUids($uids){
            return self::model()->findAll(array('condition'=>'id IN ('.$uids.')', 'index'=> 'id'));  ;
        }
}
