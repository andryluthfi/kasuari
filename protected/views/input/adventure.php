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
            <h3>
                Babak #<?= Input::model()->countByAttributes(array('user_id' => UserWeb::instance()->user()->id)) ?><br/>
                <small>
                    untuk <?= UserWeb::instance()->user()->fname . " " . UserWeb::instance()->user()->lname ?>
                </small>
            </h3>
        </div>
        <div class="col-md-11">
            <img src="http://scanc1.kpu.go.id/view.php?f=00<?= $tps->kelurahan->kelurahan_id ?><?= $tps->tps_number ?>01" />
        </div>
    </div>
</div>

