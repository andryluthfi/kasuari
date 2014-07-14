<?php
/* @var $this DataController */
?>

<div class="font-smaller alert alert-dismissable alert-warning animate-show" style="opacity: 0; height: 0px;">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <h4>Warning!</h4>
    <p>
        Disarankan untuk menggunakan halaman ini jika memahami Struktur Data 
        (<i>diasumsikan, kemampuan ini dimiliki oleh seorang Administrator</i>). 
        <strong>Namun</strong> disediakan halaman lainya, yang mungkin memiliki fungsi sama namun 
        dirancang dengan tingkat pengalaman Pengguna yang relatif rendah 
        (<strong>mudah digunakan</strong>)
    </p>
</div>
<div class="row">
    <div class="col-lg-3">
        <h1 class="text-right font-xx-large">
            Selamat Datang 
        </h1>
    </div>
    <div class="col-lg-9">
        <h2 class="text-left font-x-large">
            di Halaman Utama dari Administrator<br/>
            <small>
                silahkan gunakan menu di samping untuk mengarah pada
                data yang akan diakses dan pengaturan lebih lanjut
            </small>
        </h2>
    </div>
</div>
<div class="row">
    <div class="col-lg-8 col-lg-offset-2">
        <h3 class="text-right">
            Jumlah Data <br/>
            <small>untuk Setiap Tabel</small>
        </h3>
        <div class="panel panel-default font-x-small">
            <?php foreach (Root::retrieveModelsName() as $name => $subNames) : ?>           
                <div class="panel-heading"><?= $name ?></div>
                <div class="panel-body">
                    <ul class="list-group">  
                        <?php foreach ($subNames['.'] as $subName) : ?>  
                            <li class="list-group-item">
                                <span class="badge"><?= CActiveRecord::model($subName)->count() ?></span>
                                <a href='<?= $this->createUrl("/administration/data", array('modelName'=>$subName)) ?>'>
                                    <?= $subName ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script>
</script>