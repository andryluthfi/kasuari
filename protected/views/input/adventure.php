<?php
/* @var $this InputController */
/* @var $tps TPS */
?>

<div class="container" style="margin-top: -40px">
    <h2 class="text-info text-center" style="line-height:0.6">
        TPS Nomor 
        <?= $tps->tps_number ?> <br/>
        <small>

            <?= $tps->kelurahan->kecamatan->kota->propinsi->propinsi_name ?>
            <small>
                (Propinsi)
            </small>
            -
            <?= $tps->kelurahan->kecamatan->kota->kota_name ?> 
            <small>
                (Kota/Kabupaten)
            </small>
            -
            <?= $tps->kelurahan->kecamatan->kecamatan_name ?> 
            <small>
                (Kecamatan)
            </small>
            - 
            <?= $tps->kelurahan->kelurahan_name ?> 
            <small>
                (Kelurahan/Desa)
            </small>
        </small>
    </h2>


    <div class="row">
        <div class="col-md-2">
            <h4>
                Form 
                <i >
                    #<?= @Input::model()->countByAttributes(array('user_id' => UserWeb::instance()->user()->id)) ?><br/>
                </i>
                <small>
                    untuk <?= @UserWeb::instance()->user()->fname . " " . @UserWeb::instance()->user()->lname ?>
                </small>
            </h4>
        </div>

        <div class="col-md-6 text-center" style="">
            <a href ="#" id="image1" >Berkas 1</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href ="#" id="image2" >Berkas 2</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href ="#" id="image3" >Berkas 3</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href ="#" id="image4" >Berkas 4</a>
            <img id="imageKPU" style='width: 80%; border: 2px solid #b3b3b3' src="http://scanc1.kpu.go.id/viewp.php?f=<?= $tps->kelurahan->kelurahan_number ?><?= $tps->tps_number ?>04.jpg" />
        </div>

        <div class="col-md-4">
            <?= $this->renderPartial('_form', array('input' => $input, 'inputNote' => $inputNote, 'tps' => $tps)) ?>
        </div>
    </div>

</div>

<script type="text/javascript">
    $('#image1').on({
        'click': function() {
            $('#imageKPU').attr('src', 'http://scanc1.kpu.go.id/viewp.php?f=<?= $tps->kelurahan->kelurahan_number ?><?= $tps->tps_number ?>01.jpg');
        }
    });
    $('#image2').on({
        'click': function() {
            $('#imageKPU').attr('src', 'http://scanc1.kpu.go.id/viewp.php?f=<?= $tps->kelurahan->kelurahan_number ?><?= $tps->tps_number ?>02.jpg');
        }
    });
    $('#image3').on({
        'click': function() {
            $('#imageKPU').attr('src', 'http://scanc1.kpu.go.id/viewp.php?f=<?= $tps->kelurahan->kelurahan_number ?><?= $tps->tps_number ?>03.jpg');
        }
    });
    $('#image4').on({
        'click': function() {
            $('#imageKPU').attr('src', 'http://scanc1.kpu.go.id/viewp.php?f=<?= $tps->kelurahan->kelurahan_number ?><?= $tps->tps_number ?>04.jpg');
        }
    });

</script>