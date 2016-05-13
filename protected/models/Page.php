<?php

/**
 * This is the model class for table "page".
 *
 * The followings are the available columns in table 'page':
 * @property integer $idpage
 * @property string $name
 * @property integer $is_deleted
 * @property integer $state
 * @property string $source
 * @property integer $single_page
 * @property integer $layout
 *
 * The followings are the available model relations:
 * @property PageHasBlock[] $pageHasBlocks
 */
class Page extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Page the static model class
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
		return 'page';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('is_deleted, state, single_page, layout', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>100),
			array('source', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idpage, name, is_deleted, state, source, single_page, layout', 'safe', 'on'=>'search'),
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
			'pageHasBlocks' => array(self::HAS_MANY, 'PageHasBlock', 'page_idpage'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idpage' => 'Idpage',
			'name' => 'Name',
			'is_deleted' => 'Is Deleted',
			'state' => 'State',
			'source' => 'Source',
			'single_page' => 'Single Page',
			'layout' => 'Layout',
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

		$criteria->compare('idpage',$this->idpage);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('is_deleted',$this->is_deleted);
		$criteria->compare('state',$this->state);
		$criteria->compare('source',$this->source,true);
		$criteria->compare('single_page',$this->single_page);
		$criteria->compare('layout',$this->layout);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}