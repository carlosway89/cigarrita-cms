<?php

/**
 * This is the model class for table "menu".
 *
 * The followings are the available columns in table 'menu':
 * @property integer $idmenu
 * @property string $name
 * @property string $url
 * @property integer $estado
 * @property string $language
 * @property integer $minimal
 * @property integer $position
 * @property integer $is_deleted
 *
 * The followings are the available model relations:
 * @property MenuSubMenu[] $menuSubMenus
 */
class Menu extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Menu the static model class
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
		return 'menu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// array('estado, minimal, position', 'required'),
			array('estado, minimal, position, is_deleted', 'numerical', 'integerOnly'=>true),
			array('name, url', 'length', 'max'=>45),
			array('language', 'length', 'max'=>4),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idmenu, name, url, estado, language, minimal, position, is_deleted', 'safe', 'on'=>'search'),
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
			'menuSubMenus' => array(self::HAS_MANY, 'MenuSubMenu', 'idmenu'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idmenu' => 'Idmenu',
			'name' => 'Name',
			'url' => 'Url',
			'estado' => 'Estado',
			'language' => 'Language',
			'minimal' => 'Minimal',
			'position' => 'Position',
			'is_deleted' => 'Is Deleted',
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

		$criteria->compare('idmenu',$this->idmenu);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('language',$this->language,true);
		$criteria->compare('minimal',$this->minimal);
		$criteria->compare('position',$this->position);
		$criteria->compare('is_deleted',$this->is_deleted);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}