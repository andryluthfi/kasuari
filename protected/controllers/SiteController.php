<?php

class SiteController extends ControllerCommon {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            'oauth' => array(
                // the list of additional properties of this action is below
                'class' => 'ext.hoauth.HOAuthAction',
                // Yii alias for your user's model, or simply class name, when it already on yii's import path
                // default value of this property is: User
                'model' => 'User',
                // map model attributes to attributes of user's social profile
                // model attribute => profile attribute
                // the list of avaible attributes is below
                'attributes' => array(
                    'email' => 'email',
                    'fname' => 'firstName',
                    'lname' => 'lastName',
                    'gender' => 'genderShort',
                    'birthday' => 'birthDate',
                    // you can also specify additional values, 
                    // that will be applied to your model (eg. account activation status)
                    'acc_status' => 1,
                ),
            ),
            // this is an admin action that will help you to configure HybridAuth 
            // (you must delete this action, when you'll be ready with configuration, or 
            // specify rules for admin role. User shouldn't have access to this action!)
            'oauthadmin' => array(
                'class' => 'ext.hoauth.HOAuthAdminAction',
            ),
        );
    }

    /**
     * list of defined filters mode on this Controller and each classes which
     * inherit.
     * @return string[] defined filters on this Controller and Sub-Class
     */
    public function filters() {
        return array("accessControl");
    }

    /**
     * make sure the system only can be accessed by user. therefore any 
     * unauthorized user will be redirected to login page to proceed. 
     * @return type mixed accessRules for this Controller. 
     */
    public function accessRules() {
        return array(
            array(
                'deny',
                'actions' => array('oauthadmin'),
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        $result = Result::model()->find();
        $usersScore = PostUser::model()->findAll(array('limit' => 20, 'order' => 'total_post desc'));
        $this->render('index', array('result' => $result, 'usersScore' => $usersScore));
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionInput() {
        $this->render('index');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {
                $this->redirect(array("input/adventure"));
            } else {
                Logger::dumpWeb($model->errors);
            }
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    /**
     * Help Page
     */
    public function actionHelp() {
        $this->render('help');
    }

    /**
     * About Page
     */
    public function actionAbout() {
        $this->render('about');
    }

    /**
     * Load something partially on AJAX call or something.
     * @param string $which key for which value to be load
     */
    public function actionLoadPartial($which) {
        header('Content-type: application/json');
        $values = array();
        switch ($which) {
            case 'user-pictureURL':
                $values['user-pictureURL'] = UserWeb::instance()->getPhotoURL();
                break;
        }
        echo CJSON::encode($values);
        Yii::app()->end();
    }

}
