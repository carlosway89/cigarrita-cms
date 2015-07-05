<?php

/**
 * This is the model class for table "about".
 *
 * The followings are the available columns in table 'about':
 * @property integer $idabout
 * @property string $mission
 * @property string $founded
 * @property string $description
 * @property string $category
 * @property string $cover
 * @property string $about
 * @property string $company_overview
 */
class About extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return About the static model class
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
		return 'about';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// array('mission, founded, description, category, cover, about, company_overview', 'required'),
			array('founded', 'length', 'max'=>200),
			array('category', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idabout, mission, founded, description, category, cover, about, company_overview', 'safe', 'on'=>'search'),
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
			'idabout' => 'Idabout',
			'mission' => 'Mission',
			'founded' => 'Founded',
			'description' => 'Description',
			'category' => 'Category',
			'cover' => 'Cover',
			'about' => 'About',
			'company_overview' => 'Company Overview',
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

		$criteria->compare('idabout',$this->idabout);
		$criteria->compare('mission',$this->mission,true);
		$criteria->compare('founded',$this->founded,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('category',$this->category,true);
		$criteria->compare('cover',$this->cover,true);
		$criteria->compare('about',$this->about,true);
		$criteria->compare('company_overview',$this->company_overview,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}