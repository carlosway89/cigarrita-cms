<?php

/**
 * This is the model class for table "attributes".
 *
 * The followings are the available columns in table 'attributes':
 * @property string $key
 * @property string $value
 * @property integer $idattributes
 *
 * The followings are the available model relations:
 * @property PostHasAttributes[] $postHasAttributes
 */
class Attributes extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Attributes the static model class
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
		return 'attributes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('key', 'length', 'max'=>100),
			array('value', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('key, value, idattributes', 'safe', 'on'=>'search'),
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
			'postHasAttributes' => array(self::HAS_MANY, 'PostHasAttributes', 'attributes_idattributes'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'key' => 'Key',
			'value' => 'Value',
			'idattributes' => 'Idattributes',
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

		$criteria->compare('key',$this->key,true);
		$criteria->compare('value',$this->value,true);
		$criteria->compare('idattributes',$this->idattributes);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}