<?php

/**
 * This is the model class for table "configuration".
 *
 * The followings are the available columns in table 'configuration':
 * @property integer $idconfig
 * @property string $title
 * @property string $logo
 * @property string $description
 * @property string $language
 * @property string $analytic_id
 * @property string $keywords
 * @property integer $is_installed
 */
class Configuration extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Configuration the static model class
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
		return 'configuration';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, logo, description, language, keywords, is_installed', 'required'),
			array('is_installed', 'numerical', 'integerOnly'=>true),
			array('title, analytic_id', 'length', 'max'=>100),
			// array('logo', 'length', 'max'=>200),
			array('logo', 'file', 'types'=>'jpg, gif, png', 'safe' => false, 'allowEmpty'=>true,'on' => 'update'),
			array('description,id_facebook,id_facebook_page', 'length', 'max'=>400),
			array('language', 'length', 'max'=>5),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idconfig, title, description, language, analytic_id, keywords, is_installed', 'safe', 'on'=>'search'),
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
			'idconfig' => 'Idconfig',
			'title' => 'Title',
			'logo' => 'Logo',
			'description' => 'Description',
			'language' => 'Language',
			'analytic_id' => 'Analytic',
			'keywords' => 'Keywords',
			'is_installed' => 'Is Installed',
			'id_facebook' => 'ID Facebook User',
			'id_facebook_page' => 'ID Facebook page',
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

		$criteria->compare('idconfig',$this->idconfig);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('language',$this->language,true);
		$criteria->compare('analytic_id',$this->analytic_id,true);
		$criteria->compare('keywords',$this->keywords,true);
		$criteria->compare('is_installed',$this->is_installed);
		$criteria->compare('id_facebook',$this->id_facebook);
		$criteria->compare('id_facebook_page',$this->id_facebook_page);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}