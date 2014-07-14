<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class ControllerCommon extends CController {

    /**
     * @var string the default layout for the controller view. Defaults to 
     * '//layouts/column1', meaning using a single column layout. See 
     * 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/sub-parent/parent-primary';

    /**
     * @var string URI or path to header of page on parent.
     */
    public $headerURI = '//layouts/components/header-main';

    /**
     * @var string[] Stacked JS which initialize more than once.
     */
    public $stackedJS = array('urls' => array(), 'values' => array());

    /**
     * @var array context menu items. This property will be assigned to 
     * IF you are intended to use //layouts/sub-parent/parent-subsidebar as 
     * layout prefference
     * {@link CMenu::items}.
     */
    public $subSideBarMenu = array();

    /**
     * @var array the breadcrumbs of the current page. The value of this 
     * property will be assigned to {@link CBreadcrumbs::links}. Please refer to 
     * {@link CBreadcrumbs::links} for more details on how to specify this 
     * property.
     */
    public $breadcrumbs = array();

    /**
     * @var string Current title displayed
     */
    public $currentTitle = "";

    /**
     * @var AnnounceBoard current announcement board 
     */
    public $announceBoard;

    /**
     * Default defined behaviors on this Class.
     * @return mixed default behaviors on this Class.
     */
    public function behaviors() {
        return array(
        );
    }

    /**
     * Retrieve rendered on string format on /views/reference. depends on 
     * given sub-view. eg. : /views/reference/template-dateParameter
     * @param string $view name of sub-view
     * @param mixed $data data which pass into
     * @return string string version of rendered sub-view
     */
    public function template($view, $data = array()) {
        return $this->renderPartial("//reference/$view", $data, true);
    }

    /**
     * Initialize JS values and urls. in order to make JS code so much tidier.
     * such doge isn't? you can access the urls or values via indexes of
     * simakbmn.values or simakbmn.urls
     * @param string[] $values list of values
     * @param string[] $urls list of urls
     * @param integer $placement placement of the script init.
     */
    public function initJS($urls, $values, $placement = CClientScript::POS_HEAD) {

        $this->stackedJS['values'] = CMap::mergeArray($this->stackedJS['values'], $values);
        $this->stackedJS['urls'] = CMap::mergeArray($this->stackedJS['urls'], $urls);

        $optionValues = CJavaScript::encode($this->stackedJS['values']);
        $optionURLs = CJavaScript::encode($this->stackedJS['urls']);

        Yii::app()->clientScript->registerScript(__CLASS__ . '#core', "core.init($optionURLs, $optionValues); ", $placement);
    }

    /**
     * Register any values that needed on beforeAction
     * @param CAction $action action
     * @return boolean whether the action is allowed ?
     */
    public function beforeAction($action) {
        $this->initJS(array(
            'baseURL' => Yii::app()->baseUrl,
            'authenticationURL' => $this->createUrl('/administration/authenticate/ask'),
            'loadPartial' => $this->createUrl('/site/loadPartial')
                ), array());
        return parent::beforeAction($action);
    }

    /**
     * Register any values that needed on afterAction
     * @param CAction $action action
     * @return boolean whether the action is allowed ?
     */
    protected function afterAction($action) {
        return parent::afterAction($action);
    }

    /**
     * try to catch reliable client's IP
     * @return string client's IP
     */
    public function catchClientIP() {
        $IP = !empty($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] :
                !empty($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] :
                        $_SERVER['REMOTE_ADDR'];
        return $IP;
    }

}
