<?php

/**
 * Description of AuthenticateController
 * @author Andry Luthfi
 */
class AuthenticateController extends ControllerAdministrator {

    public $layout = "/layouts/parent-raw";

    /**
     * make sure the system only can be accessed by user. therefore any 
     * unauthorized user will be redirected to login page to proceed. 
     * @return mixed accessRules for this Controller. 
     */
    public function accessRules() {
        return array(
            array(
                'allow',
                'actions' => array('login'),
                'expression' => 'Yii::app()->user->isGuest',
            ),
            array(
                'deny',
                'expression' => 'Yii::app()->user->isGuest',
            ),
            array(
                'deny',
                'actions' => array('login'),
                'expression' => '!Yii::app()->user->isGuest',
            )
        );
    }

    /**
     * Administator Login Page
     */
    public function actionLogin() {
        $form = new LoginAdministrator;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($form);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginAdministrator'])) {
            $form->attributes = $_POST['LoginAdministrator'];
            // validate user input and redirect to the previous page if valid
            if ($form->validate() && $form->login()) {
                $this->redirect(array('/administration'));
            }
        }
        // display the login form
        $this->render('index', array('model' => $form));
    }

}
