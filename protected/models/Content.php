<?php

/**
 * This is the model class for table "content".
 *
 * The followings are the available columns in table 'content':
 * @property integer $idcontent
 * @property string $tipo
 * @property string $background
 * @property string $header
 * @property string $subheader
 * @property string $template
 * @property string $idmenu
 * @property integer $estado
 *
 * The followings are the available model relations:
 * @property ContentPost[] $contentPosts
 */
class Content extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Content the static model class
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
		return 'content';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// array('idcontent', 'required'),
			array('estado', 'numerical', 'integerOnly'=>true),
			array('tipo, background, header, subheader, template, idmenu', 'length', 'max'=>700),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idcontent, tipo, background, header, subheader, template, idmenu, estado', 'safe', 'on'=>'search'),
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
			'contentPosts' => array(self::HAS_MANY, 'ContentPost', 'idcontent'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idcontent' => 'Idcontent',
			'tipo' => 'Tipo',
			'background' => 'Background',
			'header' => 'Header',
			'subheader' => 'Subheader',
			'template' => 'template',
			'idmenu' => 'Idmenu',
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

		$criteria->compare('idcontent',$this->idcontent);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('background',$this->background,true);
		$criteria->compare('header',$this->header,true);
		$criteria->compare('subheader',$this->subheader,true);
		$criteria->compare('template',$this->template,true);
		$criteria->compare('idmenu',$this->idmenu,true);
		$criteria->compare('estado',$this->estado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}