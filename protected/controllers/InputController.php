<?php
/**
 * Description of InputController
 *
 * @author Andry Luthfi
 */
class InputController extends ControllerCommon {
    
    public function actionAdventure() {
        $tps = $this->prioritizeTPS();
        $this->render('adventure');
    }
    
    protected function prioritizeTPS() {
        return TPS::model()->find(array('order'=>'rand()'));
    }

}
