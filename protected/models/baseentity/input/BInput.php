<?php

/**
 * This is the model class for table "input".
 *
 * The followings are the available columns in table 'input':
 * @property integer $id
 * @property integer $user_id
 * @property integer $tps_id
 * @property integer $prabowo_count
 * @property integer $jokowi_count
 * @property integer $broken_count
 * @property string $timestamp
 * @property integer $check_total_count
 * @property integer $check_signature
 *
 * The followings are the available model relations:
 * @property TPS $tps
 * @property User $user
 * @property InputNote $inputNote
 */
class BInput extends BaseModel {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'input';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_id, tps_id, prabowo_count, jokowi_count, broken_count, timestamp,', 'required'),
            array('user_id, tps_id, prabowo_count, jokowi_count, broken_count, check_total_count, check_signature', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, user_id, tps_id, prabowo_count, jokowi_count, broken_count, timestamp, check_total_count, check_signature', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'tps' => array(self::BELONGS_TO, 'TPS', 'tps_id'),
            'user' => array(self::BELONGS_TO, 'User', 'user_id'),
            'inputNote' => array(self::HAS_ONE, 'InputNote', 'input_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'user_id' => 'User',
            'tps_id' => 'TPS',
            'prabowo_count' => 'Suara Prabowo',
            'jokowi_count' => 'Suara Jokowi',
            'broken_count' => 'Suara Tidak Sah',
            'timestamp' => 'Timestamp',
            'check_total_count' => 'Jumlah Total Suara Tidak Sama',
            'check_signature' => 'Tanda Tangan Tidak Lengkap',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('tps_id', $this->tps_id);
        $criteria->compare('prabowo_count', $this->prabowo_count);
        $criteria->compare('jokowi_count', $this->jokowi_count);
        $criteria->compare('broken_count', $this->broken_count);
        $criteria->compare('timestamp', $this->timestamp, true);
        $criteria->compare('check_total_count', $this->check_total_count);
        $criteria->compare('check_signature', $this->check_signature);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return BInput the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
