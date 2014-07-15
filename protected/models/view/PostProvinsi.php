<?php

/**
 * This is the model class for table "post_provinsi".
 *
 * The followings are the available columns in table 'post_provinsi':
 * @property integer $propinsi_id
 * @property string $propinsi_name
 * @property string $propinsi_number
 * @property string $jumlah_input
 * @property string $jumlah_tps
 * @property string $count_jokowi
 * @property string $count_prabowo
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
            array('propinsi_name, propinsi_number', 'required'),
            array('propinsi_id', 'numerical', 'integerOnly' => true),
            array('propinsi_name', 'length', 'max' => 50),
            array('propinsi_number', 'length', 'max' => 7),
            array('jumlah_input, jumlah_tps', 'length', 'max' => 21),
            array('count_jokowi, count_prabowo', 'length', 'max' => 32),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('propinsi_id, propinsi_name, propinsi_number, jumlah_input, jumlah_tps, count_jokowi, count_prabowo', 'safe', 'on' => 'search'),
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
            'propinsi_name' => 'Propinsi Name',
            'jumlah_input' => 'Jumlah Input',
            'jumlah_tps' => 'Jumlah Tps',
            'count_jokowi' => 'Count Jokowi',
            'count_prabowo' => 'Count Prabowo',
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
        $criteria->compare('propinsi_name', $this->propinsi_name, true);
        $criteria->compare('propinsi_number', $this->propinsi_number, true);
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