<?php

/**
 * Controller is the customized base controller class which is exclusively 
 * intented for administrator.
 * All controller classes for this application should extend from this base class.
 */
class ControllerAdministrator extends ControllerLogin {

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layoutPath = 'modules/administration/views/layouts';
    public $layout = "/layouts/sub-parent/parent-primary";
    public $headerURI = '/layouts/components/header-main';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();
    public $currentTitle = "";
    public $breadcrumbs = array();

    /**
     * list of defined filters mode on this Controller and each classes which
     * inherit.
     * @return string[] defined filters on this Controller and Sub-Class
     */
    public function filters() {
        return array("accessControl");
    }

    /**
     * make sure the system only can be accessed by Administrator. therefore any 
     * unauthorized user and non-Administrator will be redirected to login page 
     * to proceed. 
     * @return type mixed accessRules for this Controller. 
     */
    public function accessRules() {
        return array(
            array(
                'allow',
                'expression' => '!Yii::app()->user->isGuest',
            ),
            array(
                'deny',
                'users' => array('*'),
            )
        );
    }

}

?>
