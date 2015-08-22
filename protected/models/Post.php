<?php

/**
 * This is the model class for table "post".
 *
 * The followings are the available columns in table 'post':
 * @property integer $idpost
 * @property string $category
 * @property string $header
 * @property string $subheader
 * @property string $source
 * @property string $language
 * @property integer $state
 * @property integer $is_deleted
 * @property string $date_created
 *
 * The followings are the available model relations:
 * @property Attributes[] $attributes
 * @property BlockHasPost[] $blockHasPosts
 * @property Category $category0
 * @property PostHasAttributes[] $postHasAttributes
 */
class Post extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Post the static model class
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
		return 'post';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('state, is_deleted', 'numerical', 'integerOnly'=>true),
			array('category, language', 'length', 'max'=>10),
			array('header, subheader, source, date_created', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idpost, category, header, subheader, source, language, state, is_deleted, date_created', 'safe', 'on'=>'search'),
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
			'attributes0' => array(self::HAS_MANY, 'Attributes', 'idpost'),
			'blockHasPosts' => array(self::HAS_MANY, 'BlockHasPost', 'post_idpost'),
			'category0' => array(self::BELONGS_TO, 'Category', 'category'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idpost' => 'Idpost',
			'category' => 'Category',
			'header' => 'Header',
			'subheader' => 'Subheader',
			'source' => 'Source',
			'language' => 'Language',
			'state' => 'State',
			'is_deleted' => 'Is Deleted',
			'date_created' => 'Date Created',
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

		$criteria->compare('idpost',$this->idpost);
		$criteria->compare('category',$this->category,true);
		$criteria->compare('header',$this->header,true);
		$criteria->compare('subheader',$this->subheader,true);
		$criteria->compare('source',$this->source,true);
		$criteria->compare('language',$this->language,true);
		$criteria->compare('state',$this->state);
		$criteria->compare('is_deleted',$this->is_deleted);
		$criteria->compare('date_created',$this->date_created,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}