<?php
/* @var $this SiteController */
/* @var $result Result */
?>

<div class='container'>
    <div class="row text-center">
        <h1 style='line-height: 0.6'>
            Kawal Suara Online<br/>
            <small>
                oleh Lab. Riset IR - Fasilkom UI
            </small>
        </h1>
        <div class="progress">
            <div class="progress-bar progress-bar-success" style="width: <?= $result->percentage_prabowo * 100 ?>%">
                <span class="sr-only"><?= $result->percentage_prabowo * 100 ?>% Prabowo</span>
            </div>
            <div class="progress-bar progress-bar-info progress-bar-striped" style="width: <?= $result->percentage_jokowi * 100 ?>%">
                <span class="sr-only"><?= $result->percentage_jokowi * 100 ?>% Jokowi</span>
            </div>
        </div>
        <div class="row">
            <div class='col-md-6'>
                perolehan suara untuk Prabowo
                <?= $result->percentage_prabowo * 100 ?>%<br/>
                (<?= number_format($result->count_prabowo) ?>)
                
            </div>
            <div class='col-md-6'>
                perolehan suara untuk Jokowi
                <?= $result->percentage_jokowi * 100 ?>%<br/>
                (<?= number_format($result->count_jokowi) ?>)
            </div>
        </div>
    </div>
</div>