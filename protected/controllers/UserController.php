<?php

class UserController extends ControllerCommon {

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionRegister() {
        $model = new User;
        //$username = new Username;
        $passTemp = "";
        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            //$username->attributes = $_POST['Username'];
//            $model->password = $model->hashPassword($model->password);
//            $model->verifyPassword = $model->hashPassword($model->password);
            //echo $model->password . " " . $model->verifyPassword;
            $model->klaim = 1;
            if ($model->validate()) {
                $passTemp = $model->password;
                $model->password = $model->hashPassword($model->password);
                $model->verifyPassword = $model->hashPassword($model->verifyPassword);
                
                //echo $model->password . " " . $model->verifyPassword;
                //$username->user_id = 0;
                if ($model->save()) {
                    $identity = new UserIdentity($model->email, $passTemp);
                    $identity->authenticate();
                    Yii::app()->user->login($identity, 0);
                    $this->redirect(array('input/adventure'));
                }
//                if ($username->validate()) {
//                    $model->save();
//                    $username->user_id = $model->id;
//                    $username->save();
//                    $this->redirect(array('site/index'));
//                }
            }
        }
        $model->password = "";
        $model->verifyPassword = "";
        $this->render('register', array(
            'model' => $model, //'username' => $username
        ));
    }

    public function actionKlaim() {
        $model = new User;
        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            $modelOld = User::model()->findEmailToClaim($model->email);
//            echo $modelOld->email;
            if (isset($modelOld) || $modelOld != "") {
                $passTemp = $modelOld->password;
                $modelOld->password = $modelOld->hashPassword($model->password);
                $modelOld->klaim = 1;
                if ($modelOld->update()) {
                    $identity = new UserIdentity($model->email, $passTemp);
                    $identity->authenticate();
                    Yii::app()->user->login($identity, 0);
                    $this->redirect(array('input/adventure'));
                }
            }
        }
        $this->render('klaim', array(
            'model' => $model, //'username' => $username
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return User the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = User::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

}
