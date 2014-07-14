<?php

/**
 * This is the model class for table "kelurahan".
 *
 * The followings are the available columns in table 'user':
 * The followings are the available model relations:
 * @property Kelurahan $next next instance of this model
 * @property Kelurahan $previous previous instance of this model
 */
class Kelurahan extends BKelurahan {

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

}
