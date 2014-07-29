<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $email
 * @property string $fname
 * @property string $lname
 * @property string $gender
 * @property string $birthday
 * @property integer $acc_status
 * @property string $password
 * @property integer $klaim
 * @property string $photoURL
 *
 * The followings are the available model relations:
 * @property Username $username
 */
class BUser extends BaseModel {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('email, fname, lname, password', 'required'),
            array('acc_status, klaim', 'numerical', 'integerOnly' => true),
            array('email', 'length', 'max' => 320),
            array('fname, lname, gender', 'length', 'max' => 45),
            array('password', 'length', 'max' => 255),
            array('photoURL', 'length', 'max' => 2038),
            array('birthday', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, email, fname, lname, gender, birthday, acc_status, password, klaim, photoURL', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'username' => array(self::HAS_ONE, 'Username', 'user_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'email' => 'Email',
            'fname' => 'Fname',
            'lname' => 'Lname',
            'gender' => 'Gender',
            'birthday' => 'Birthday',
            'acc_status' => 'Acc Status',
            'password' => 'Password',
            'klaim' => 'Klaim',
            'photoURL' => 'Photo Url',
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

        $criteria->compare('id', $this->id);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('fname', $this->fname, true);
        $criteria->compare('lname', $this->lname, true);
        $criteria->compare('gender', $this->gender, true);
        $criteria->compare('birthday', $this->birthday, true);
        $criteria->compare('acc_status', $this->acc_status);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('klaim', $this->klaim);
        $criteria->compare('photoURL', $this->photoURL, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return BUser the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
