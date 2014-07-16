<?php

/**
 * This is the model class for table "propinsi".
 *
 * The followings are the available columns in table 'propinsi':
 * @property integer $propinsi_id
 * @property string $propinsi_number
 * @property string $propinsi_name
 *
 * The followings are the available model relations:
 * @property Kota[] $kotas
 */
class BPropinsi extends BaseModel {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'propinsi';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('propinsi_number, propinsi_name', 'required'),
            array('propinsi_number', 'length', 'max' => 7),
            array('propinsi_name', 'length', 'max' => 50),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('propinsi_id, propinsi_number, propinsi_name', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'kotas' => array(self::HAS_MANY, 'Kota', 'propinsi_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'propinsi_id' => 'Propinsi',
            'propinsi_number' => 'Propinsi Number',
            'propinsi_name' => 'Propinsi Name',
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
        $criteria->compare('propinsi_name', $this->propinsi_name, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return BPropinsi the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
