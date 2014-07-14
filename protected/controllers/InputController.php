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
        $input->prabowo_count = 0;
        $input->jokowi_count = 0;
        $input->broken_count = 0;
        $inputNote = new InputNote;
        //$inputNote->note = "asdasd";
        if (isset($_POST['Input'])) {
            $input->attributes = $_POST['Input'];
            $date = date("Y-m-d H:i:s");
            $input->timestamp = $date;
            $input->tps_id = $tps->tps_id;
            $input->user_id = 123; //dummy
            if ($input->save()) {
                if (isset($_POST['InputNote'])) {
                    $inputNote->attributes = $_POST['InputNote'];
                    if ($inputNote->note != "") {
                        $inputNote->input_id = $input->id;
                        $inputNote->save();
                    }
                }
                $this->refresh();
            }
        }
        $this->render('adventure', array('tps' => $tps, 'input' => $input, 'inputNote' =>$inputNote));
    }

    protected function prioritizeTPS() {
        return TPS::model()->find(array('order' => 'rand()'));
    }

}
