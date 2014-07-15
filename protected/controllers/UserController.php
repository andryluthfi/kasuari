<?php

class UserController extends ControllerCommon {

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionRegister() {
        $model = new User;
        $username = new Username;

        if (isset($_POST['User']) && isset($_POST['Username'])) {
            $model->attributes = $_POST['User'];
            $username->attributes = $_POST['Username'];
            $model->fname = "-";
            $model->lname = "-";
            if ($model->validate()) {
                $model->password = $model->hashPassword($model->password);
                $username->user_id = 0;
                if ($username->validate()) {
                    $model->save();
                    $username->user_id = $model->id;
                    $username->save();
                    $this->redirect(array('site/index'));
                }
            }
        }
        $model->password = "";
        $this->render('register', array(
            'model' => $model, 'username' => $username
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
