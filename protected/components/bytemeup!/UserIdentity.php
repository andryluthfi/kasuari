<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity {

    /**
     * @var User $user user model that we will get by email
     */
    public $user;

    //public $user_id;
    public function __construct($username, $password = null) {
        // sets username and password values
        parent::__construct($username, $password);
//        $usernameObject = Username::model()->find('LOWER(username)=?', array(strtolower($this->username)));
//        if ($usernameObject === null) {
        //$this->user = User::model()->find('LOWER(email)=?', array(strtolower($this->username)));
        $this->user = User::model()->find('LOWER(email)=?', array(strtolower($this->username)));
        if ($this->user === null) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        }
//        } else {
//            $this->user = User::model()->findByPk($usernameObject->user_id);
//        }

        if ($this->user === null)
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        elseif ($password === null) {
            /**
             * you can set here states for user logged in with oauth if you need
             * you can also use hoauthAfterLogin()
             * @link https://github.com/SleepWalker/hoauth/wiki/Callbacks
             */
            $this->beforeAuthentication();
            $this->errorCode = self::ERROR_NONE;
        }
    }

    /**
     * Authenticates a user.
     * @return boolean whether authentication succeeds.
     */
    public function authenticate() {
        if ($this->errorCode === self::ERROR_UNKNOWN_IDENTITY) {
            if (!$this->user->validatePassword($this->password))
                $this->errorCode = self::ERROR_PASSWORD_INVALID;
            else {
                $this->beforeAuthentication();
                $this->errorCode = self::ERROR_NONE;
            }
        }
        return $this->errorCode == self::ERROR_NONE;
    }

    public function getId() {
        return $this->user->id;
    }

    public function getName() {
        return $this->user->email;
    }

    public function beforeAuthentication() {
        // do before authenctiation work
    }

}
