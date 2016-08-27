<?php

/**
 * This is the model class for table "form".
 *
 * The followings are the available columns in table 'form':
 * @property integer $idform
 * @property string $email
 * @property string $subject
 * @property string $body
 * @property string $ip_address
 * @property string $country_name
 * @property string $browser
 * @property string $state
 * @property string $is_deleted
 * @property string $date
 */
class Form extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Form the static model class
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
		return 'form';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// array('date', 'required'),
			array('email', 'length', 'max'=>100),
			array('subject', 'length', 'max'=>400),
			array('is_deleted', 'numerical', 'integerOnly'=>true),
			array('ip_address, country_name, browser, state', 'length', 'max'=>300),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idform, email, subject, body, ip_address, country_name, browser, state, date', 'safe', 'on'=>'search'),
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
			'idform' => 'Idform',
			'email' => 'Email',
			'subject' => 'Subject',
			'body' => 'Message',
			'ip_address' => 'Ip Address',
			'country_name' => 'Country Name',
			'browser' => 'Browser',
			'state' => 'State',
			'date' => 'Date',
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

		$criteria->compare('idform',$this->idform);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('body',$this->body,true);
		$criteria->compare('ip_address',$this->ip_address,true);
		$criteria->compare('country_name',$this->country_name,true);
		$criteria->compare('browser',$this->browser,true);
		$criteria->compare('state',$this->device,true);
		$criteria->compare('date',$this->date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}