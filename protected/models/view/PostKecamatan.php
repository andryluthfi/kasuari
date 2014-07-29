<?php

/**
 * This is the model class for table "post_kecamatan".
 *
 * The followings are the available columns in table 'post_kecamatan':
 * @property integer $kecamatan_id
 * @property string $kecamatan_name
 * @property string $kecamatan_number
 * @property integer $kota_id
 * @property string $jumlah_input
 * @property string $jumlah_tps
 * @property string $count_jokowi
 * @property string $count_prabowo
 */
class PostKecamatan extends BaseModel {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'post_kecamatan';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('kecamatan_name, kecamatan_number, kota_id', 'required'),
            array('kecamatan_id, kota_id', 'numerical', 'integerOnly' => true),
            array('kecamatan_name', 'length', 'max' => 50),
            array('kecamatan_number', 'length', 'max' => 7),
            array('jumlah_input, jumlah_tps', 'length', 'max' => 21),
            array('count_jokowi, count_prabowo', 'length', 'max' => 32),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('kecamatan_id, kecamatan_name, kecamatan_number, kota_id, jumlah_input, jumlah_tps, count_jokowi, count_prabowo', 'safe', 'on' => 'search'),
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
            'kecamatan_name' => 'Kecamatan Name',
            'jumlah_input' => 'Jumlah TPS ter-input',
            'jumlah_tps' => 'Jumlah TPS',
            'count_prabowo' => 'Jumlah Suara Prabowo-Hatta',
            'count_jokowi' => 'Jumlah Suara Jokowi-JK',
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

        $criteria->compare('kecamatan_id', $this->kecamatan_id);
        $criteria->compare('kecamatan_name', $this->kecamatan_name, true);
        $criteria->compare('kecamatan_number', $this->kecamatan_number, true);
        $criteria->compare('kota_id', $this->kota_id);
        $criteria->compare('jumlah_input', $this->jumlah_input, true);
        $criteria->compare('jumlah_tps', $this->jumlah_tps, true);
        $criteria->compare('count_jokowi', $this->count_jokowi, true);
        $criteria->compare('count_prabowo', $this->count_prabowo, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PostKecamatan the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * Get the next label for this class
     * @return string next label for this class
     */
    public function getNextLabel() {
        return 'kelurahan';
    }

    /**
     * Get the previous label for this class
     * @return string previous label for this class
     */
    public function getPrevLabel() {
        return 'kota';
    }
    
    /**
     * Get the ID
     * @return integer
     */
    public function getID() {
        return $this->kecamatan_id;
    }
}
