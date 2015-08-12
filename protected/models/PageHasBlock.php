<?php

/**
 * This is the model class for table "page_has_block".
 *
 * The followings are the available columns in table 'page_has_block':
 * @property integer $page_idpage
 * @property integer $block_idblock
 * @property integer $id_page_has_block
 *
 * The followings are the available model relations:
 * @property Block $blockIdblock
 * @property Page $pageIdpage
 */
class PageHasBlock extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PageHasBlock the static model class
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
		return 'page_has_block';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('page_idpage, block_idblock', 'required'),
			array('page_idpage, block_idblock', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('page_idpage, block_idblock, id_page_has_block', 'safe', 'on'=>'search'),
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
			'blockIdblock' => array(self::BELONGS_TO, 'Block', 'block_idblock'),
			'pageIdpage' => array(self::BELONGS_TO, 'Page', 'page_idpage'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'page_idpage' => 'Page Idpage',
			'block_idblock' => 'Block Idblock',
			'id_page_has_block' => 'Id Page Has Block',
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

		$criteria->compare('page_idpage',$this->page_idpage);
		$criteria->compare('block_idblock',$this->block_idblock);
		$criteria->compare('id_page_has_block',$this->id_page_has_block);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}