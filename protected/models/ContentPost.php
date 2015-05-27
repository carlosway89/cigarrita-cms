<?php

/**
 * This is the model class for table "content_post".
 *
 * The followings are the available columns in table 'content_post':
 * @property integer $idcontent_post
 * @property integer $idcontent
 * @property integer $idpost
 *
 * The followings are the available model relations:
 * @property Content $idcontent0
 * @property Post $idpost0
 */
class ContentPost extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ContentPost the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'content_post';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idcontent_post, idcontent, idpost', 'required'),
			array('idcontent_post, idcontent, idpost', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idcontent_post, idcontent, idpost', 'safe', 'on'=>'search'),
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
			'idcontent0' => array(self::BELONGS_TO, 'Content', 'idcontent'),
			'idpost0' => array(self::BELONGS_TO, 'Post', 'idpost'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idcontent_post' => 'Idcontent Post',
			'idcontent' => 'Idcontent',
			'idpost' => 'Idpost',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idcontent_post',$this->idcontent_post);
		$criteria->compare('idcontent',$this->idcontent);
		$criteria->compare('idpost',$this->idpost);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}