<?php

/**
 * This is the model class for table "post_kelurahan".
 *
 * The followings are the available columns in table 'post_kelurahan':
 * @property integer $kelurahan_id
 * @property string $kelurahan_number
 * @property integer $kecamatan_id
 * @property string $count_prabowo
 * @property string $count_jokowi
 * @property string $count_broken
 */
class PostKelurahan extends BaseModel {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'post_kelurahan';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('kelurahan_number, kecamatan_id', 'required'),
            array('kelurahan_id, kecamatan_id', 'numerical', 'integerOnly' => true),
            array('kelurahan_number', 'length', 'max' => 7),
            array('count_prabowo, count_jokowi, count_broken', 'length', 'max' => 32),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('kelurahan_id, kelurahan_number, kecamatan_id, count_prabowo, count_jokowi, count_broken', 'safe', 'on' => 'search'),
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
            'kelurahan_id' => 'Kelurahan',
            'kelurahan_number' => 'Kelurahan Number',
            'kecamatan_id' => 'Kecamatan',
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

        $criteria->compare('kelurahan_id', $this->kelurahan_id);
        $criteria->compare('kelurahan_number', $this->kelurahan_number, true);
        $criteria->compare('kecamatan_id', $this->kecamatan_id);
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
     * @return PostKelurahan the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * Get the next label for this class
     * @return string next label for this class
     */
    public function getNextLabel() {
        return 'TPS';
    }

    /**
     * Get the previous label for this class
     * @return string previous label for this class
     */
    public function getPrevLabel() {
        return 'kecamatan';
    }

    /**
     * Get the ID
     * @return integer
     */
    public function getID() {
        return $this->kelurahan_id;
    }

}
