<?php

/**
 * This is the model class for table "modules".
 *
 * The followings are the available columns in table 'modules':
 * @property integer $idmodules
 * @property string $name
 * @property integer $is_deleted
 * @property integer $editable
 * @property string $date_created
 * @property string $type
 * @property integer $state
 * @property integer $deletable
 */
class Modules extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Modules the static model class
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
		return 'modules';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, date_created, type, state', 'required'),
			array('is_deleted, editable, state, deletable', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>300),
			array('type', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idmodules, name, is_deleted, editable, date_created, type, state, deletable', 'safe', 'on'=>'search'),
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
			'idmodules' => 'Idmodules',
			'name' => 'Name',
			'is_deleted' => 'Is Deleted',
			'editable' => 'Editable',
			'date_created' => 'Date Created',
			'type' => 'Type',
			'state' => 'State',
			'deletable' => 'Deletable',
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

		$criteria->compare('idmodules',$this->idmodules);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('is_deleted',$this->is_deleted);
		$criteria->compare('editable',$this->editable);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('state',$this->state);
		$criteria->compare('deletable',$this->deletable);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}