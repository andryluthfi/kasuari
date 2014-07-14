<?php

/**
 * Description of InputController
 *
 * @author Andry Luthfi
 */
class InputController extends ControllerCommon {

    /**
     * Give a random Challenge to User
     */
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
            $input->user_id = UserWeb::instance()->user()->id; //dummy
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

    /**
     * Display result
     */
    public function actionInventory($which = null, $id = null) {
        switch ($which) {
            case 'kota':
                $model = new Kota;
                if ($id) {
                    $model->propinsi_id = $id;
                }
                $dataProvider = $model->search();
                break;

            case 'kecamatan':
                $model = new Kecamatan;
                if ($id) {
                    $model->kota_id = $id;
                }
                $dataProvider = $model->search();
                break;

            case 'kelurahan':
                $model = new Kelurahan;
                if ($id) {
                    $model->kecamatan_id = $id;
                }
                $dataProvider = $model->search();
                break;

            case 'TPS':
                $model = new TPS;
                if ($id) {
                    $model->kelurahan_id = $id;
                }
                $dataProvider = $model->search();
                break;


            default:
                $model = new Propinsi;
                $dataProvider = $model->search();
                break;
        }
        $this->render('inventory', array('dataProvider' => $dataProvider, 'model' => $model));
    }

    /**
     * Prioritize function for best candidate TPS
     * @return TPS best candidate TPS
     */
    protected function prioritizeTPS() {
        return TPS::model()->find(array('order' => 'rand()'));
    }

}
