<?php

/**
 * Description of CoreController
 * @author Andry Luthfi
 */
class CoreController extends ControllerAdministrator {

    /**
     * Overview Statistic Page for Administration Dashboard
     */
    public function actionIndex() {
        $this->render('index');
    }

}
