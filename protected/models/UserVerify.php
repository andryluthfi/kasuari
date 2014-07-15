<?php

/**
 * This is the model class for table "user_verify".
 *
 * The followings are the available columns in table 'user_verify':
 * @property integer $user_verify_id
 * @property integer $user_id
 * @property integer $input_id
 * @property integer $is_ok
 *
 * The followings are the available model relations:
 * @property Input $input
 */
class UserVerify extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserVerify the static model class
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
		return 'user_verify';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, input_id, is_ok', 'required'),
			array('user_verify_id, user_id, input_id, is_ok', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_verify_id, user_id, input_id, is_ok', 'safe', 'on'=>'search'),
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
			'input' => array(self::BELONGS_TO, 'Input', 'input_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_verify_id' => 'User Verify',
			'user_id' => 'User',
			'input_id' => 'Input',
			'is_ok' => 'Is Ok',
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

		$criteria->compare('user_verify_id',$this->user_verify_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('input_id',$this->input_id);
		$criteria->compare('is_ok',$this->is_ok);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}