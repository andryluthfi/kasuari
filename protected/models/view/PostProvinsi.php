<?php

/**
 * This is the model class for table "post_provinsi".
 *
 * The followings are the available columns in table 'post_provinsi':
 * @property integer $propinsi_id
 * @property string $propinsi_number
 * @property string $count_prabowo
 * @property string $count_jokowi
 * @property string $count_broken
 */
class PostProvinsi extends BaseModel {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'post_provinsi';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('propinsi_number', 'required'),
            array('propinsi_id', 'numerical', 'integerOnly' => true),
            array('propinsi_number', 'length', 'max' => 7),
            array('count_prabowo, count_jokowi, count_broken', 'length', 'max' => 32),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('propinsi_id, propinsi_number, count_prabowo, count_jokowi, count_broken', 'safe', 'on' => 'search'),
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
            'propinsi_id' => 'Propinsi',
            'propinsi_number' => 'Propinsi Number',
            'count_prabowo' => 'Count Prabowo',
            'count_jokowi' => 'Count Jokowi',
            'count_broken' => 'Count Broken',
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

        $criteria->compare('propinsi_id', $this->propinsi_id);
        $criteria->compare('propinsi_number', $this->propinsi_number, true);
        $criteria->compare('count_prabowo', $this->count_prabowo, true);
        $criteria->compare('count_jokowi', $this->count_jokowi, true);
        $criteria->compare('count_broken', $this->count_broken, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PostProvinsi the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * Get the next label for this class
     * @return string next label for this class
     */
    public function getNextLabel() {
        return 'kota';
    }

    /**
     * Get the previous label for this class
     * @return string previous label for this class
     */
    public function getPrevLabel() {
        return '';
    }

    /**
     * Get the ID
     * @return integer
     */
    public function getID() {
        return $this->propinsi_id;
    }

}
