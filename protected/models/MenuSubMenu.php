<?php

/**
 * This is the model class for table "menu_sub_menu".
 *
 * The followings are the available columns in table 'menu_sub_menu':
 * @property integer $idsub_menu
 * @property integer $idmenu
 * @property integer $id_menu_submenu
 *
 * The followings are the available model relations:
 * @property Menu $idmenu0
 * @property SubMenu $idsubMenu
 */
class MenuSubMenu extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MenuSubMenu the static model class
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
		return 'menu_sub_menu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idsub_menu, idmenu', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idsub_menu, idmenu, id_menu_submenu', 'safe', 'on'=>'search'),
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
			'idmenu0' => array(self::BELONGS_TO, 'Menu', 'idmenu'),
			'idsubMenu' => array(self::BELONGS_TO, 'SubMenu', 'idsub_menu'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idsub_menu' => 'Idsub Menu',
			'idmenu' => 'Idmenu',
			'id_menu_submenu' => 'Id Menu Submenu',
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

		$criteria->compare('idsub_menu',$this->idsub_menu);
		$criteria->compare('idmenu',$this->idmenu);
		$criteria->compare('id_menu_submenu',$this->id_menu_submenu);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}