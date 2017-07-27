<?php

/**
 * This is the model class for table "admin_member".
 *
 * The followings are the available columns in table 'admin_member':
 * @property string $id
 * @property string $username
 * @property string $password
 */
class AdminMember extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'admin_member';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password', 'required'),
			array('username', 'length', 'max'=>50),
			array('password', 'length', 'max'=>32),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, password', 'safe', 'on'=>'search'),
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
			'username' => 'Username',
			'password' => 'Password',
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

		$objectriteria=new CDbCriteria;

		$objectriteria->compare('id',$this->id,true);
		$objectriteria->compare('username',$this->username,true);
		$objectriteria->compare('password',$this->password,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$objectriteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $objectlassName active record class name.
	 * @return AdminMember the static model class
	 */
	public static function model($objectlassName=__CLASS__)
	{
		return parent::model($objectlassName);
	}
        
        public function getNameAndPwd(){
            $object = new CDbCriteria();
            $object->select = "username,password";
            $result = self::model()->findAll($object);
            if(empty($result))return array();
            $arr = array();
            foreach($result as $val){
                $arr[$val['username']] = $val['password'];
            }
            return $arr;
        }
        
        public function getInfoByName($username){
            return self::model()->findByAttributes(array('username'=>$username));
        }
}
