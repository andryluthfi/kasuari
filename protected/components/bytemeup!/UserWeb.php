<?php

/**
 * 
 */
class UserWeb extends CWebUser {

    const SESSION_ORDER = 'order';
    const SESSION_LAST_ORDER = 'last-order';

    private $level;
    private $user;
    private $administrator;

    /**
     * to checks whether the User is Administrator or not
     * @return boolean true if user is Administrator, false otherwise
     */
    public function isAdministrator() {
        $user = $this->loadUser();
        return $user && !Yii::app()->user->isGuest;
    }

    /**
     * Load user model.
     * @param integer $id selected ID of user
     * @return User selected user which given ID of user
     */
    protected function loadUser($id = null) {
        if ($this->user === null) {
            if ($id !== null) {
                $this->user = User::model()->findByPk($id);
            } else if (!Yii::app()->user->isGuest) {
                $this->user = User::model()->findByPk(Yii::app()->user->id);
            }
        }
        return $this->user;
    }

    /**
     * Return this instance UserWeb which stored in session of this App.
     * @return UserWeb instance UserWeb which stored in session
     */
    public static function instance() {
        return Yii::app()->user;
    }

    /**
     * @return User get User
     */
    public function user() {
        return $this->loadUser();
    }

    /**
     * @return User get current level
     */
    public function level() {
        if (!$this->level) {
            $user = $this->loadUser();
            $this->level = $user;
        }
        return $this->level;
    }

    /**
     * Set flash for common message system / notification system. 
     * @param string $status basically the code for differentiate one message to 
     *                       another. eg. : info, warning, alert-info, etc. 
     * @param string $message the message to displayed
     * @param string $context postfix for flashes' name
     */
    public function setMessage($status, $message, $context = "") {
        $this->setFlash("status$context", $status);
        $this->setFlash("message$context", $message);
    }

    /**
     * Check the availability of message
     * @param string $context postfix for flashes' name
     * @return boolean availbility of message
     */
    public function hasMessage($context = "") {
        return $this->hasFlash("message$context") || $this->hasFlash("code$context");
    }

    /**
     * Get the message's status
     * @param string $context postfix for flashes' name
     * @return string message's status
     */
    public function getMessageStatus($context = "") {
        return $this->hasMessage($context) ? $this->getFlash("status$context") : "";
    }

    /**
     * Get the message's content
     * @param string $context postfix for flashes' name
     * @return string message's content
     */
    public function getMessageContent($context = "") {
        return $this->hasMessage($context) ? $this->getFlash("message$context") : "";
    }

    /**
     * Count the related model in current User
     * @param string $modelName
     * @param string $attributeName
     * @return integer
     */
    public function countRelation($modelName, $attributeName = 'userID') {
        return $modelName::model()->count(array('condition' => "$attributeName = :currentUserID", 'params' => array(':currentUserID' => $this->ID)));
    }

    /**
     * Get User's Photo
     * @return string User's Social Photo
     */
    public function getPhotoURL() {
        $userAuth = UserOAuth::model()->findByAttributes(array('user_id' => $this->user()->id));
        $userID = $userAuth->getProfile()->identifier;
        $curl = Yii::app()->curl->run("http://graph.facebook.com/$userID/picture?redirect=false");
        return !$curl->hasErrors() ? preg_replace('/.*\"url\".*:.*\"(.+)\",.*/s', '$1', $curl->getData()) : null;
    }

}

?>
