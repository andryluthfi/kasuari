<?php
/* @var $this InputController */
/* @var $tps TPS */
?>

<div class="container">
    <h2 class="text-info text-center" style="line-height:0.6">
        TPS Nomor 
        <?= $tps->tps_number ?> <br/>
        <small>

            <?= $tps->kelurahan->kecamatan->kota->propinsi->propinsi_name ?>
            <small>
                (<?= $tps->kelurahan->kecamatan->kota->propinsi->propinsi_number ?>)
            </small>
            -
            <?= $tps->kelurahan->kecamatan->kota->kota_name ?> 
            <small>
                (<?= $tps->kelurahan->kecamatan->kota->kota_number ?>)
            </small>
            -
            <?= $tps->kelurahan->kecamatan->kecamatan_name ?> 
            <small>
                (<?= $tps->kelurahan->kecamatan->kecamatan_number ?>)
            </small>
            - 
            <?= $tps->kelurahan->kelurahan_name ?> 
            <small>
                (<?= $tps->kelurahan->kelurahan_number ?>)
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
            <img style='width: 100%; border: 2px solid #b3b3b3' src="http://scanc1.kpu.go.id/viewp.php?f=<?= $tps->kelurahan->kelurahan_number ?><?= $tps->tps_number ?>04.jpg" />
        </div>

        <div class="col-md-2">
            <?= $this->renderPartial('_form', array('input' => $input)) ?>
        </div>
    </div>

</div>

