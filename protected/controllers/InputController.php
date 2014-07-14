<?php

/**
 * Description of InputController
 *
 * @author Andry Luthfi
 */
class InputController extends ControllerCommon {

    public function actionAdventure() {
        $tps = $this->prioritizeTPS();
        $input = new Input;

        if (isset($_POST['Input'])) {
            $input->attributes = $_POST['Input'];
            $date = date("Y-m-d H:i:s");
            $input->timestamp = $date;
            $input->tps_id = $tps->tps_id;
            $input->user_id = 123; //dummy
            if ($input->save())
                $this->refresh();
        }
        $this->render('adventure', array('tps' => $tps, 'input' => $input));
    }

    protected function prioritizeTPS() {
        return TPS::model()->find(array('order' => 'rand()'));
    }

}
