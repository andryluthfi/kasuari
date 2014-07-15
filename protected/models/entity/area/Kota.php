<?php

/**
 * This is the model class for table "kota".
 *
 * The followings are the available columns in table 'kota':
 * @property string $nextLabel next label for this class
 * @property string $prevLabel prev label for this class
 * The followings are the available model relations:
 * @property Kota $next next instance of this model
 * @property Kota $previous previous instance of this model
 */
class Kota extends BKota {

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array_merge(parent::rules(), array(
        ));
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return CMap::mergeArray(parent::attributeLabels(), array());
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
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
    public function search($isHidePagination = true) {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('kota_id', $this->kota_id);
        $criteria->compare('kota_number', $this->kota_number, true);
        $criteria->compare('kota_name', $this->kota_name, true);
        $criteria->compare('propinsi_id', $this->propinsi_id);

        $options = array(
            'criteria' => $criteria,
        );
        if ($isHidePagination) {
            $options['pagination'] = false;
        }
        return new CActiveDataProvider($this, $options);
    }

    /**
     * Get the next label for this class
     * @return string next label for this class
     */
    public function getNextLabel() {
        return 'kecamatan';
    }

    /**
     * Get the previous label for this class
     * @return string previous label for this class
     */
    public function getPrevLabel() {
        return 'propinsi';
    }

}
