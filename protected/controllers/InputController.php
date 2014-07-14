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
                $this->refresh();
            }
        }
        $this->render('adventure', array('tps' => $tps, 'input' => $input, 'inputNote' => $inputNote));
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
        return TPS::model()->find(array('order' => 'rand()'));
    }

}
