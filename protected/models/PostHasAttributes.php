<?php

/**
 * This is the model class for table "post_has_attributes".
 *
 * The followings are the available columns in table 'post_has_attributes':
 * @property integer $post_idpost
 * @property integer $attributes_idattributes
 * @property integer $id_post_has_attributes
 *
 * The followings are the available model relations:
 * @property Attributes $attributesIdattributes
 * @property Post $postIdpost
 */
class PostHasAttributes extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PostHasAttributes the static model class
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
		return 'post_has_attributes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('post_idpost, attributes_idattributes', 'required'),
			array('post_idpost, attributes_idattributes', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('post_idpost, attributes_idattributes, id_post_has_attributes', 'safe', 'on'=>'search'),
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
			'attributesIdattributes' => array(self::BELONGS_TO, 'Attributes', 'attributes_idattributes'),
			'postIdpost' => array(self::BELONGS_TO, 'Post', 'post_idpost'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'post_idpost' => 'Post Idpost',
			'attributes_idattributes' => 'Attributes Idattributes',
			'id_post_has_attributes' => 'Id Post Has Attributes',
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

		$criteria->compare('post_idpost',$this->post_idpost);
		$criteria->compare('attributes_idattributes',$this->attributes_idattributes);
		$criteria->compare('id_post_has_attributes',$this->id_post_has_attributes);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}