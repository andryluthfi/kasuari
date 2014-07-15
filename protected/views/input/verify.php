<?php
/* @var $this InputController */
/* @var $input Input */
/* @var $user_verify UserVerify */
?>

<div class="container">
    <h2 class="text-info text-center" style="line-height:0.6">
        TPS Nomor 
        <?= $input->tps->tps_number ?> <br/>
        <small>

            <?= $input->tps->kelurahan->kecamatan->kota->propinsi->propinsi_name ?>
            <small>
                (<?= $input->tps->kelurahan->kecamatan->kota->propinsi->propinsi_number ?>)
            </small>
            -
            <?= $input->tps->kelurahan->kecamatan->kota->kota_name ?> 
            <small>
                (<?= $input->tps->kelurahan->kecamatan->kota->kota_number ?>)
            </small>
            -
            <?= $input->tps->kelurahan->kecamatan->kecamatan_name ?> 
            <small>
                (<?= $input->tps->kelurahan->kecamatan->kecamatan_number ?>)
            </small>
            - 
            <?= $input->tps->kelurahan->kelurahan_name ?> 
            <small>
                (<?= $input->tps->kelurahan->kelurahan_number ?>)
            </small>
        </small>
    </h2>


    <div class="row">
        <div class="col-md-1">
            <h4>
                Babak 
                <i >
                    #<?= @Input::model()->countByAttributes(array('user_id' => UserWeb::instance()->user()->id)) ?><br/>
                </i>
                <small>
                    untuk <?= @UserWeb::instance()->user()->fname . " " . @UserWeb::instance()->user()->lname ?>
                </small>
            </h4>
        </div>
        <div class="col-md-9" style="">
            <img style='width: 100%; border: 2px solid #b3b3b3' src="http://scanc1.kpu.go.id/viewp.php?f=<?= $input->tps->kelurahan->kelurahan_number ?><?= $input->tps->tps_number ?>04.jpg" />
        </div>
        <div>
            Propinsi: <?= $input->tps->kelurahan->kecamatan->kota->propinsi->propinsi_name ?>
        </div>
        <div>
            Kab/Kota: <?= $input->tps->kelurahan->kecamatan->kota->kota_name ?>
        </div>
        <div>
            Kecamatan: <?= $input->tps->kelurahan->kecamatan->kecamatan_name ?>
        </div>
        <div>
            Kelurahan: <?= $input->tps->kelurahan->kelurahan_name ?>
        </div>
        <div>
            Nomor TPS: <?= $input->tps->tps_number ?>
        </div>
        <div>
            Prabs: <?= $input->prabowo_count ?>
        </div>
        <div>
            Joks: <?= $input->jokowi_count ?>
        </div>
        <div>
            Sah: <?= $input->prabowo_count+$input->jokowi_count?>
        </div>
        <div>
            Tidak sah: <?= $input->broken_count ?>
        </div>
        
        <div class="col-md-2">
            <?php $this->renderPartial('_form_verify', array('input' => $input)) ?>
        </div>
    </div>

</div>

