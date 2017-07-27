<?php

/**
 * This is the model class for table "admin_group".
 *
 * The followings are the available columns in table 'admin_group':
 * @property string $id
 * @property string $name
 * @property string $slogan
 * @property string $headman
 * @property string $pendragon
 */
class AdminGroup extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'admin_group';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, slogan, background,headman, pendragon', 'required'),
			array('name, headman, pendragon', 'length', 'max'=>30),
			array('slogan', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, slogan, headman, pendragon', 'safe', 'on'=>'search'),
                        array('background', 
                            'file',    //定义为file类型 
                            'allowEmpty'=>false,  
                            'types'=>'jpg,png,gif',   //上传文件的类型 
                            'maxSize'=>1024*1024*1,    //上传大小限制，注意不是php.ini中的上传文件大小 
                            'tooLarge'=>'文件大于1M，上传失败！请上传小于1M的文件！' 
                        ),  
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
			'name' => 'Name',
			'slogan' => 'Slogan',
			'headman' => 'Headman',
			'pendragon' => 'Pendragon',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('slogan',$this->slogan,true);
		$criteria->compare('headman',$this->headman,true);
		$criteria->compare('pendragon',$this->pendragon,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AdminGroup the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        /*
         * 按照esort分组
         */
        public static function getGroups(){
            $criteria = new CDbCriteria;
            $criteria->addCondition("is_show =1");
            $criteria->select = 'id,name,esort';
            $criteria->order = 'esort DESC';
            $result = self::model()->findAll($criteria);
            return GlobalF::toGroup($result, 'esort');
        }
}
