<?php

/**
 * This is the model class for table "admin_baike".
 *
 * The followings are the available columns in table 'admin_baike':
 * @property string $id
 * @property string $name
 * @property string $keyword
 * @property string $url
 * @property integer $site
 * @property string $addtime
 * @property integer $is_show
 */
class AdminBaike extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'admin_baike';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, keyword, url, site, addtime', 'required'),
			array('site, is_show', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>50),
			array('keyword', 'length', 'max'=>100),
			array('url', 'length', 'max'=>300),
			array('addtime', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, keyword, url, site, addtime, is_show', 'safe', 'on'=>'search'),
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
			'keyword' => 'Keyword',
			'url' => 'Url',
			'site' => 'Site',
			'addtime' => 'Addtime',
			'is_show' => 'Is Show',
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
		$criteria->compare('keyword',$this->keyword,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('site',$this->site);
		$criteria->compare('addtime',$this->addtime,true);
		$criteria->compare('is_show',$this->is_show);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AdminBaike the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
