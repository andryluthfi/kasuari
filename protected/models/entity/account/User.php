<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * The followings are the available model relations:
 * @property User $next next instance of this model
 * @property User $previous previous instance of this model
 */
class User extends BUser {

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
     * before saving the model, the method will crypt the password
     * @return boolean save status
     */
    public function beforeSave() {
        $status = parent::beforeSave();
        return $status;
    }

    /**
     * Returns User model by its email
     * 
     * @param string $email 
     * @access public
     * @return User
     */
    public function findByEmail($email) {
        return self::model()->findByAttributes(array('email' => $email));
    }

}
