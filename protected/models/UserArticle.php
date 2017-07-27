<?php

/**
 * This is the model class for table "user_article".
 *
 * The followings are the available columns in table 'user_article':
 * @property string $id
 * @property string $title
 * @property integer $uid
 * @property string $content
 * @property integer $addtime
 * @property integer $updatetime
 */
class UserArticle extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_article';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, uid, content, addtime, updatetime', 'required'),
			array('uid, addtime, updatetime', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, uid, content, addtime, updatetime', 'safe', 'on'=>'search'),
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
			'title' => 'Title',
			'uid' => 'Uid',
			'content' => 'Content',
			'addtime' => 'Addtime',
			'updatetime' => 'Updatetime',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('uid',$this->uid);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('addtime',$this->addtime);
		$criteria->compare('updatetime',$this->updatetime);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UserArticle the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        
        public function articleSave($id,$uid,$title,$content){
            $result = self::model()->findByAttributes(array('id'=>$id,'uid'=>$uid));
            if(empty($result)){
                return $this->articleAdd($uid, $title, $content);
            }else{
                return $this->articleEdit($id, $title, $content);
            }
        }
        
        /**
         * 修改文章
         * @param string $id
         * @param string $title
         * @param string $content
         * @return int $id
         */
        public function articleEdit($id, $title, $content){
            $result = self::model()->findByAttributes(array('id'=>$id));
            $result->title = $title;
            $result->content = $content;
            $result->updatetime = time();
            $result->save();
            return $id;
        }
        
        /*
         * 添加新文章
         */
        public function articleAdd($uid,$title,$content){
            $article = new UserArticle;
            $article->uid = $uid;
            $article->title = $title;
            $article->content = $content;
            $article->addtime = time();
            $article->updatetime = time();
            $article->save();
            return $article->attributes['id'];
        }
        
        public function findMyArticles($uid){
            $result =  self::model()->findAll(array('condition'=>'uid='.$uid,'select'=>'id,title,addtime','order'=>'addtime desc','limit'=>10));
            if(empty($result)){
                return array();
            }else{
                $arr = array();
                foreach($result as $val){
                    $arr[$val['id']]['title'] = $val['title'];
                    $arr[$val['id']]['year'] = date('Y',$val['addtime']);
                    $arr[$val['id']]['md'] = date('md',$val['addtime']);
                }
                return $arr;
            }
        }
}
