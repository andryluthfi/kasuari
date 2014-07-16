<?php

/**
 * This is the model class for table "kelurahan".
 *
 * The followings are the available columns in table 'kelurahan':
 * @property integer $kelurahan_id
 * @property string $kelurahan_number
 * @property string $kelurahan_name
 * @property integer $kecamatan_id
 *
 * The followings are the available model relations:
 * @property Kecamatan $kecamatan
 * @property TPS[] $tps
 */
class BKelurahan extends BaseModel {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'kelurahan';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('kelurahan_number, kelurahan_name, kecamatan_id', 'required'),
            array('kecamatan_id', 'numerical', 'integerOnly' => true),
            array('kelurahan_number', 'length', 'max' => 7),
            array('kelurahan_name', 'length', 'max' => 50),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('kelurahan_id, kelurahan_number, kelurahan_name, kecamatan_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'kecamatan' => array(self::BELONGS_TO, 'Kecamatan', 'kecamatan_id'),
            'tps' => array(self::HAS_MANY, 'TPS', 'kelurahan_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'kelurahan_id' => 'Kelurahan',
            'kelurahan_number' => 'Kelurahan Number',
            'kelurahan_name' => 'Kelurahan Name',
            'kecamatan_id' => 'Kecamatan',
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
        $criteria->compare('kelurahan_name', $this->kelurahan_name, true);
        $criteria->compare('kecamatan_id', $this->kecamatan_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return BKelurahan the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
