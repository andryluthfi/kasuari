<?php

/**
 * This is the model class for table "detailhitperday".
 *
 * The followings are the available columns in table 'detailhitperday':
 * @property string $IP
 * @property string $route
 * @property string $date
 * @property string $totalHit
 */
class DetailHitPerDay extends BaseModel {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'detailhitperday';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('IP', 'length', 'max' => 16),
            array('route', 'length', 'max' => 255),
            array('totalHit', 'length', 'max' => 21),
            array('date', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('IP, route, date, totalHit', 'safe', 'on' => 'search'),
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
            'IP' => 'Ip',
            'route' => 'Route',
            'date' => 'Date',
            'totalHit' => 'Total Hit',
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

        $criteria->compare('IP', $this->IP, true);
        $criteria->compare('route', $this->route, true);
        $criteria->compare('date', $this->date, true);
        $criteria->compare('totalHit', $this->totalHit, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return DetailHitPerDay the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
