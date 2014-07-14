<?php

class AdministrationModule extends CWebModule {

    public function init() {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application
        // import the module-level models and components

        Yii::app()->user->loginUrl = array(
            '0' => '/administration/authenticate/login'
        );

        $this->setImport(array(
            'administration.models.*',
            'administration.models.baseentity.*',
            'administration.models.entity.*',
            'administration.models.form.*',
            'administration.models.view.*',
            'administration.components.*',
        ));
    }

    /**
     * 
     * @param ControllerCommon $controller
     * @param CAction $action
     * @return boolean
     */
    public function beforeControllerAction($controller, $action) {
        if (parent::beforeControllerAction($controller, $action)) {
            Yii::app()->name = sprintf("%s, Administration System", Yii::app()->name); 
            $controller->breadcrumbs = array(
                array('label' => 'Beranda', 'url' => array('/administration')),
            );

            if (strcasecmp($controller->id, $this->defaultController) !== 0) {
                $controller->breadcrumbs[] = array(
                    'label' => $controller->id,
                    'url' => array("/administration/$controller->id")
                );
            } 


            if (!strcmp($controller->route, 'administration/data')) {
                if (!strcmp($action->id, 'index')) {
                    if (isset($action->getController()->actionParams['modelName'])) {
                        $modelName = $action->getController()->actionParams['modelName'];
                        $controller->breadcrumbs[] = array(
                            'label' => $modelName,
                            'url' => array('/administration/data/index', 'modelName' => $modelName)
                        );
                    }
                }
            }
            return true;
        } else {
            return false;
        }
    }

}
