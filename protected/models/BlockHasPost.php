<?php

/**
 * This is the model class for table "block_has_post".
 *
 * The followings are the available columns in table 'block_has_post':
 * @property integer $block_idblock
 * @property integer $post_idpost
 * @property integer $id_block_has_post
 *
 * The followings are the available model relations:
 * @property Block $blockIdblock
 * @property Post $postIdpost
 */
class BlockHasPost extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BlockHasPost the static model class
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
		return 'block_has_post';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('block_idblock, post_idpost', 'required'),
			array('block_idblock, post_idpost', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('block_idblock, post_idpost, id_block_has_post', 'safe', 'on'=>'search'),
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
			'postIdpost' => array(self::BELONGS_TO, 'Post', 'post_idpost'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'block_idblock' => 'Block Idblock',
			'post_idpost' => 'Post Idpost',
			'id_block_has_post' => 'Id Block Has Post',
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

		$criteria->compare('block_idblock',$this->block_idblock);
		$criteria->compare('post_idpost',$this->post_idpost);
		$criteria->compare('id_block_has_post',$this->id_block_has_post);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}