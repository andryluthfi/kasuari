<?php

/**
 * This is the model class for table "result".
 *
 * The followings are the available columns in table 'result':
 * @property string $count_prabowo
 * @property string $count_jokowi
 * @property string $percentage_prabowo
 * @property string $percentage_jokowi
 */
class Result extends BaseModel {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'result';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('count_prabowo, count_jokowi', 'length', 'max' => 32),
            array('percentage_prabowo, percentage_jokowi', 'length', 'max' => 36),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('count_prabowo, count_jokowi, percentage_prabowo, percentage_jokowi', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'count_prabowo' => 'Jumlah Suara Prabowo-Hatta',
            'count_jokowi' => 'Jumlah Suara Jokowi-JK',
            'percentage_prabowo' => 'Percentage Prabowo',
            'percentage_jokowi' => 'Percentage Jokowi',
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

        $criteria->compare('count_prabowo', $this->count_prabowo, true);
        $criteria->compare('count_jokowi', $this->count_jokowi, true);
        $criteria->compare('percentage_prabowo', $this->percentage_prabowo, true);
        $criteria->compare('percentage_jokowi', $this->percentage_jokowi, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Result the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
