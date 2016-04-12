<?php

/**
 * This is the model class for table "menu".
 *
 * The followings are the available columns in table 'menu':
 * @property integer $idmenu
 * @property string $url
 * @property string $name
 * @property string $type
 * @property string $SEO_title
 * @property string $SEO_description
 * @property string $SEO_keywords
 * @property integer $state
 * @property integer $position
 * @property integer $hierarchy
 * @property integer $is_deleted
 * @property string $language
 * @property integer $page
 * @property integer $parent_id
 * @property string $source
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
			array('idmenu, state, position, hierarchy, is_deleted, page', 'numerical', 'integerOnly'=>true),
			array('url, name', 'length', 'max'=>100),
			array('type, language', 'length', 'max'=>10),
			array('source', 'safe'),
			array('parent_id', 'default', 'setOnEmpty' => true, 'value' => null),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idmenu, url, name, SEO_title, SEO_description, SEO_keywords, type, state, position, is_deleted, language, page, parent_id, source', 'safe', 'on'=>'search'),
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
			'idmenu' => 'Idmenu',
			'url' => 'Url',
			'name' => 'Name',
			'SEO_title'=>'SEO title',
			'SEO_description'=>'SEO description',
			'SEO_keywords'=>'SEO keywords',
			'type' => 'Type',
			'state' => 'State',
			'position' => 'Position',
			'hierarchy'=>'Hierarchy',
			'is_deleted' => 'Is Deleted',
			'language' => 'Language',
			'page' => 'Page',
			'parent_id' => 'Parent',
			'source' => 'Source',
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
		$criteria->compare('url',$this->url,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('state',$this->state);
		$criteria->compare('position',$this->position);
		$criteria->compare('hierarchy',$this->hierarchy);
		$criteria->compare('is_deleted',$this->is_deleted);
		$criteria->compare('language',$this->language,true);
		$criteria->compare('page',$this->page);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('source',$this->source,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}