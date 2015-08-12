<?php

/**
 * This is the model class for table "block".
 *
 * The followings are the available columns in table 'block':
 * @property integer $idblock
 * @property string $category
 * @property string $header
 * @property string $subheader
 * @property integer $is_deleted
 * @property integer $state
 * @property string $language
 * @property string $source
 *
 * The followings are the available model relations:
 * @property Category $category0
 * @property BlockHasPost[] $blockHasPosts
 * @property PageHasBlock[] $pageHasBlocks
 */
class Block extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Block the static model class
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
		return 'block';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// array('idblock, category', 'required'),
			array('idblock, is_deleted, state', 'numerical', 'integerOnly'=>true),
			array('category, language', 'length', 'max'=>10),
			array('header, subheader, source', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idblock, category, header, subheader, is_deleted, state, language, source', 'safe', 'on'=>'search'),
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
			'category0' => array(self::BELONGS_TO, 'Category', 'category'),
			'blockHasPosts' => array(self::HAS_MANY, 'BlockHasPost', 'block_idblock'),
			'pageHasBlocks' => array(self::HAS_MANY, 'PageHasBlock', 'block_idblock'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idblock' => 'Idblock',
			'category' => 'Category',
			'header' => 'Header',
			'subheader' => 'Subheader',
			'is_deleted' => 'Is Deleted',
			'state' => 'State',
			'language' => 'Language',
			'source' => 'Source',
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

		$criteria->compare('idblock',$this->idblock);
		$criteria->compare('category',$this->category,true);
		$criteria->compare('header',$this->header,true);
		$criteria->compare('subheader',$this->subheader,true);
		$criteria->compare('is_deleted',$this->is_deleted);
		$criteria->compare('state',$this->state);
		$criteria->compare('language',$this->language,true);
		$criteria->compare('source',$this->source,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}