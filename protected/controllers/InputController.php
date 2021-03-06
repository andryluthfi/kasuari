<?php

/**
 * Description of InputController
 *
 * @author Andry Luthfi
 */
class InputController extends ControllerLogin {

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
        if (isset($_POST['Input']) && isset($_POST['tps_id'])) {
            $input->attributes = $_POST['Input'];
            $date = date("Y-m-d H:i:s");
            $input->timestamp = $date;
            $input->tps_id = $_POST['tps_id'];

            $input->user_id = UserWeb::instance()->user()->id; //dummy
            if ($input->save()) {
                if (isset($_POST['InputNote'])) {
                    $inputNote->attributes = $_POST['InputNote'];
                    if ($inputNote->note != "") {
                        $inputNote->input_id = $input->id;
                        $inputNote->save();
                    }
                }
                $candidates = array();
                foreach ($input->tps->inputs as $candidateInput) {
                    $key = $candidateInput->prabowo_count . "-" . $candidateInput->jokowi_count . "-" . $candidateInput->broken_count;
                    if (!isset($candidates[$key])) {
                        $candidates[$key] = 0;
                    }
                    $candidates[$key] ++;
                }
                asort($candidates);
                $values = array_keys($candidates);
                $data = $values[0];
                $info = explode('-', $data);
                $input->tps->prabowo_count = $info[0];
                $input->tps->jokowi_count = $info[1];
                $input->tps->broken_count = $info[2];
                $input->tps->entries_count = count($candidates);
                $input->tps->ratio = $candidates[$data] / array_sum($candidates);
                $input->tps->save();
                $this->redirect(array('adventure'));
            }
        }
        $this->render('adventure', array('tps' => $tps, 'input' => $input, 'inputNote' => $inputNote));
    }

    /**
     * Verify input Page
     */
    public function actionVerifyInput() {
        $input = $this->loadInputRandom();
        $this->render('verify', array('input' => $input));
    }

    /**
     * Action Verify input
     */
    public function actionVerified($inputId, $respond) {
        throw new CHttpException(404, 'Maaf fitur ini sedang dalam masa pengembangan');
        if (is_numeric($respond) && intval($respond) === 0 || intval($respond) === 1) {
            $user_verify = new UserVerify;
            $user_verify->user_id = UserWeb::instance()->user()->id; //dummy
            $user_verify->input_id = $inputId;
            $user_verify->is_ok = intval($respond);
            $user_verify->save();
        }
        $this->redirect("verifyInput");
    }

    /**
     * Display result
     */
    public function actionInventory($which = null, $id = null) {
        $breadcrumb = array(array('URL' => $this->createUrl('inventory'), 'label' => 'Nasional'));
        switch ($which) {
            case 'kota':
                $model = new PostKota('search');
                $propinsi = Propinsi::model()->findByPk($id);
                $breadcrumb[] = array(
                    'URL' => $this->createUrl('inventory', array('which' => 'kota', 'id' => $propinsi->propinsi_id)),
                    'label' => sprintf('Propinsi (%s)', $propinsi->propinsi_name)
                );
                $dataProvider = new CActiveDataProvider('PostKota', array('criteria' => array('condition' => 'propinsi_id = :propinsi_id', 'params' => array(':propinsi_id' => $id)), 'pagination' => false));
                break;

            case 'kecamatan':
                $model = new PostKecamatan('search');
                $kota = Kota::model()->findByPk($id);
                $breadcrumb[] = array(
                    'URL' => $this->createUrl('inventory', array('which' => 'kota', 'id' => $kota->propinsi->propinsi_id)),
                    'label' => sprintf('Propinsi (%s)', $kota->propinsi->propinsi_name)
                );
                $breadcrumb[] = array(
                    'URL' => $this->createUrl('inventory', array('which' => 'kecamatan', 'id' => $kota->kota_id)),
                    'label' => sprintf('Kota (%s)', $kota->kota_name)
                );
                $dataProvider = new CActiveDataProvider('PostKecamatan', array('criteria' => array('condition' => 'kota_id = :kota_id', 'params' => array(':kota_id' => $id)), 'pagination' => false));
                break;

            case 'kelurahan':
                $model = new PostKelurahan('search');
                $kecamatan = Kecamatan::model()->findByPk($id);
                $breadcrumb[] = array(
                    'URL' => $this->createUrl('inventory', array('which' => 'kota', 'id' => $kecamatan->kota->propinsi->propinsi_id)),
                    'label' => sprintf('Propinsi (%s)', $kecamatan->kota->propinsi->propinsi_name)
                );
                $breadcrumb[] = array(
                    'URL' => $this->createUrl('inventory', array('which' => 'kecamatan', 'id' => $kecamatan->kota->kota_id)),
                    'label' => sprintf('Kota (%s)', $kecamatan->kota->kota_name)
                );
                $breadcrumb[] = array(
                    'URL' => $this->createUrl('inventory', array('which' => 'kelurahan', 'id' => $kecamatan->kecamatan_id)),
                    'label' => sprintf('Kecamatan (%s)', $kecamatan->kecamatan_name)
                );
                $dataProvider = new CActiveDataProvider('PostKelurahan', array('criteria' => array('condition' => 'kecamatan_id = :kecamatan_id', 'params' => array(':kecamatan_id' => $id)), 'pagination' => false));
                break;

            case 'TPS':
                $model = new PostTPS;
                $kelurahan = Kelurahan::model()->findByPk($id);
                $breadcrumb[] = array(
                    'URL' => $this->createUrl('inventory', array('which' => 'kota', 'id' => $kelurahan->kecamatan->kota->propinsi->propinsi_id)),
                    'label' => sprintf('Propinsi (%s)', $kelurahan->kecamatan->kota->propinsi->propinsi_name)
                );
                $breadcrumb[] = array(
                    'URL' => $this->createUrl('inventory', array('which' => 'kecamatan', 'id' => $kelurahan->kecamatan->kota->kota_id)),
                    'label' => sprintf('Kota (%s)', $kelurahan->kecamatan->kota->kota_name)
                );
                $breadcrumb[] = array(
                    'URL' => $this->createUrl('inventory', array('which' => 'kelurahan', 'id' => $kelurahan->kecamatan->kecamatan_id)),
                    'label' => sprintf('Kecamatan (%s)', $kelurahan->kecamatan->kecamatan_name)
                );
                $breadcrumb[] = array(
                    'URL' => $this->createUrl('inventory', array('which' => 'TPS', 'id' => $kelurahan->kelurahan_id)),
                    'label' => sprintf('Kelurahan (%s)', $kelurahan->kelurahan_name)
                );
                $dataProvider = new CActiveDataProvider('PostTPS', array('criteria' => array('condition' => 'kelurahan_id = :kelurahan_id', 'params' => array(':kelurahan_id' => $id)), 'pagination' => false));
                break;

            case 'TPS-view':
                $tps = TPS::model()->findByPk($id);
                $this->redirect(sprintf('http://scanc1.kpu.go.id/viewp.php?f=%s%s04.jpg', $tps->kelurahan->kelurahan_number, $tps->tps_number));
                break;

            default:
                $model = new PostProvinsi('search');
                $dataProvider = new CActiveDataProvider('PostProvinsi', array('pagination' => false));
                break;
        }
        $this->render('inventory', array('dataProvider' => $dataProvider, 'model' => $model, 'breadcrumb' => $breadcrumb));
    }

    /**
     * Prioritize function for best candidate TPS
     * @return TPS best candidate TPS
     */
    protected function prioritizeTPS() {
        $candidateTPS = TPS::model()->find(array('condition' => 'tps_id >= RAND() * (SELECT MAX(tps_id) FROM tps)'));
//        if (!$candidateTPS) {
//            $candidateTPS = TPS::model()->find(array('condition' => 'entries_count > 0', 'order' => 'rand()'));
//        }
        return $candidateTPS;
    }

    /**
     * Random function for select Input to be verified
     * @return TPS selected Input to be verified
     */
    public function loadInputRandom() {
        $model = Input::model()->find(array('order' => 'rand()'));
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

}
