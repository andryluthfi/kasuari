<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class ControllerLogin extends ControllerCommon {


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
     * Exception when File Not Found
     * @throws CHttpException Exception when File Not Found
     */
    public function exceptionFileNotFound() {
        throw new CHttpException('404', 'Maaf, sepertinya tautan untuk berkas ini sudah hilang');
    }
    
    
    /**
     * Exception when Model Not Found
     * @throws CHttpException Exception when File Not Found
     */
    public function exceptionModelNotFound() {
        throw new CHttpException('404', 'Maaf, sepertinya tautan untuk data ini sudah hilang');
    }
}

?>
