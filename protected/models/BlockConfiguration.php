<?php

/**
 * This is the model class for table "block_configuration".
 *
 * The followings are the available columns in table 'block_configuration':
 * @property integer $idblockconfiguration
 * @property integer $max_width
 * @property integer $max_height
 * @property integer $crop
 * @property string $quality
 * @property string $type_source
 * @property integer $has_source
 * @property integer $has_header
 * @property integer $has_subheader
 * @property integer $has_teaser
 * @property string $category
 * @property integer $idblock
 */
class BlockConfiguration extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BlockConfiguration the static model class
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
		return 'block_configuration';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('max_width, max_height, crop, quality, type_source, has_source, has_header, has_subheader, has_teaser, category, idblock', 'required'),
			array('max_width, max_height, crop, has_source, has_header, has_subheader, has_teaser, idblock', 'numerical', 'integerOnly'=>true),
			array('quality, type_source, category', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idblockconfiguration, max_width, max_height, crop, quality, type_source, has_source, has_header, has_subheader, has_teaser, category, idblock', 'safe', 'on'=>'search'),
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
			'idblockconfiguration' => 'Idblockconfiguration',
			'max_width' => 'Max Width',
			'max_height' => 'Max Height',
			'crop' => 'Crop',
			'quality' => 'Quality',
			'type_source' => 'Type Source',
			'has_source' => 'Has Source',
			'has_header' => 'Has Header',
			'has_subheader' => 'Has Subheader',
			'has_teaser' => 'Has Teaser',
			'category' => 'Category',
			'idblock' => 'Idblock',
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

		$criteria->compare('idblockconfiguration',$this->idblockconfiguration);
		$criteria->compare('max_width',$this->max_width);
		$criteria->compare('max_height',$this->max_height);
		$criteria->compare('crop',$this->crop);
		$criteria->compare('quality',$this->quality,true);
		$criteria->compare('type_source',$this->type_source,true);
		$criteria->compare('has_source',$this->has_source);
		$criteria->compare('has_header',$this->has_header);
		$criteria->compare('has_subheader',$this->has_subheader);
		$criteria->compare('has_teaser',$this->has_teaser);
		$criteria->compare('category',$this->category,true);
		$criteria->compare('idblock',$this->idblock);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}