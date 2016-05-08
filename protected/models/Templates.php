<?php

/**
 * This is the model class for table "templates".
 *
 * The followings are the available columns in table 'templates':
 * @property integer $idtemplates
 * @property string $name
 * @property integer $state
 * @property integer $is_deleted
 * @property string $date_created
 * @property string $block
 */
class Templates extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Templates the static model class
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
		return 'templates';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, date_created, block', 'required'),
			array('state, is_deleted', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>300),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idtemplates, name, state, is_deleted, date_created, block', 'safe', 'on'=>'search'),
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
			'idtemplates' => 'Idtemplates',
			'name' => 'Name',
			'state' => 'State',
			'is_deleted' => 'Is Deleted',
			'date_created' => 'Date Created',
			'block' => 'Block',
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

		$criteria->compare('idtemplates',$this->idtemplates);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('state',$this->state);
		$criteria->compare('is_deleted',$this->is_deleted);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('block',$this->block,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}