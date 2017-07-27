<?php

/**
 * This is the model class for table "admin_classify".
 *
 * The followings are the available columns in table 'admin_classify':
 * @property string $id
 * @property string $name
 * @property string $url
 * @property integer $parent_id
 */
class AdminClassify extends CActiveRecord
{        
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
            return 'admin_classify';
	}
       

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parent_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>20),
			array('url', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, url, parent_id', 'safe', 'on'=>'search'),
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
			'url' => 'Url',
			'parent_id' => 'Parent',
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
		$criteria->compare('url',$this->url,true);
		$criteria->compare('parent_id',$this->parent_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AdminClassify the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        /**
         * 获得所有有效父级分类
         * @return object
         */
        public function getAllParent(){
            return self::model()->findAll(array('condition'=>'parent_id=0 AND is_delete = 0','index'=> 'id'));
        }
        
        /**
         * 获得某个类下的有效子类
         * @param int $id
         * @return object
         */
        public function getChildren($id){
            return self::model()->findAll(array('condition'=>'parent_id='.$id.' AND is_delete = 0','order'=>'id desc','index'=> 'id'));
        }
        
        /**
         * 获得某个父级分类
         * @param int $id
         * @return object
         */
        public function getOneParent($id){
            $id = intval($id);
            return self::model()->findByPK($id);
        }
        
        /**
         * 保存数据
         * @param int $id
         * @param array $info
         * @return boolean
         */
        public function saveInfo($id,$info){
            $id = intval($id);
            $model =AdminClassify::model()->findByPk($id);
            foreach($info as $key=>$val){
                $model->$key = $val;
            }
            if($model->save()){
                return true;
            }
            return false;
        }
        
        /**
         * 获得所有分类包括子类
         * @return array
         */
        public function getAllClassify(){
            $result = self::model()->findAll(array('condition'=>'is_delete = 0 AND name is not null','index'=> 'id'));
            $result = GlobalF::toGroup($result, 'parent_id');
            $arr = array();
            foreach($result as $key=>$val){
                $newval = array();
                foreach($val as $k=>$v){
                    $newval[$k]['id'] = isset($v['id']) ? $v['id'] : '';
                    $newval[$k]['name'] = isset($v['name']) ? $v['name'] : '';
                    $newval[$k]['url'] = isset($v['url'])&&empty($val['url']) ? $v['url'] : 'javascript:;';
                }
                $arr[$key] = $newval;
            }
            return $arr;
        }
        
}
