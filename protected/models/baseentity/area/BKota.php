<?php

/**
 * This is the model class for table "kota".
 *
 * The followings are the available columns in table 'kota':
 * @property integer $kota_id
 * @property string $kota_number
 * @property string $kota_name
 * @property integer $propinsi_id
 *
 * The followings are the available model relations:
 * @property Kecamatan[] $kecamatans
 * @property Propinsi $propinsi
 */
class BKota extends BaseModel {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'kota';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('kota_number, kota_name, propinsi_id', 'required'),
            array('propinsi_id', 'numerical', 'integerOnly' => true),
            array('kota_number', 'length', 'max' => 7),
            array('kota_name', 'length', 'max' => 50),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('kota_id, kota_number, kota_name, propinsi_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'kecamatans' => array(self::HAS_MANY, 'Kecamatan', 'kota_id'),
            'propinsi' => array(self::BELONGS_TO, 'Propinsi', 'propinsi_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'kota_id' => 'Kota',
            'kota_number' => 'Kota Number',
            'kota_name' => 'Kota Name',
            'propinsi_id' => 'Propinsi',
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

        $criteria->compare('kota_id', $this->kota_id);
        $criteria->compare('kota_number', $this->kota_number, true);
        $criteria->compare('kota_name', $this->kota_name, true);
        $criteria->compare('propinsi_id', $this->propinsi_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return BKota the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
