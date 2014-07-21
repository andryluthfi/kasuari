<?php

/**
 * This is the model class for table "tps".
 *
 * The followings are the available columns in table 'tps':
 * @property integer $tps_id
 * @property integer $kelurahan_id
 * @property string $tps_number
 * @property integer $prabowo_count
 * @property integer $jokowi_count
 * @property integer $broken_count
 * @property integer $entries_count
 * @property double $ratio
 *
 * The followings are the available model relations:
 * @property Input[] $inputs
 * @property Kelurahan $kelurahan
 */
class BTPS extends BaseModel {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tps';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('kelurahan_id, tps_number', 'required'),
            array('kelurahan_id, prabowo_count, jokowi_count, broken_count, entries_count', 'numerical', 'integerOnly' => true),
            array('ratio', 'numerical'),
            array('tps_number', 'length', 'max' => 3),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('tps_id, kelurahan_id, tps_number, prabowo_count, jokowi_count, broken_count, entries_count, ratio', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'inputs' => array(self::HAS_MANY, 'Input', 'tps_id'),
            'kelurahan' => array(self::BELONGS_TO, 'Kelurahan', 'kelurahan_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'tps_id' => 'TPS',
            'kelurahan_id' => 'Kelurahan',
            'tps_number' => 'Nomor TPS',
            'prabowo_count' => 'Jumlah suara Prabowo-Hatta',
            'jokowi_count' => 'Jumlah suara Jokowi-JK',
            'broken_count' => 'Suara Tidak Sah',
            'entries_count' => 'Jumlah Entri',
            'ratio' => 'Rasio',
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

        $criteria->compare('tps_id', $this->tps_id);
        $criteria->compare('kelurahan_id', $this->kelurahan_id);
        $criteria->compare('tps_number', $this->tps_number, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return BTPS the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
