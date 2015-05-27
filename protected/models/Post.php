<?php

/**
 * This is the model class for table "post".
 *
 * The followings are the available columns in table 'post':
 * @property integer $idpost
 * @property string $background
 * @property string $image
 * @property string $header
 * @property string $subheader
 * @property string $link
 * @property integer $estado
 *
 * The followings are the available model relations:
 * @property ContentPost[] $contentPosts
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
			// array('idpost', 'required'),
			array('estado', 'numerical', 'integerOnly'=>true),
			array('background, image, header, subheader, link', 'length', 'max'=>700),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idpost, background, image, header, subheader, link, estado', 'safe', 'on'=>'search'),
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
			'contentPosts' => array(self::HAS_MANY, 'ContentPost', 'idpost'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idpost' => 'Idpost',
			'background' => 'Background',
			'image' => 'Image',
			'header' => 'Header',
			'subheader' => 'Subheader',
			'link' => 'Link',
			'estado' => 'Estado',
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
		$criteria->compare('background',$this->background,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('header',$this->header,true);
		$criteria->compare('subheader',$this->subheader,true);
		$criteria->compare('link',$this->link,true);
		$criteria->compare('estado',$this->estado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}