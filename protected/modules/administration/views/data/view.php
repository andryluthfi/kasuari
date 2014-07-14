<?php
/* @var $this DataController */
/* @var $modelName string */
/* @var $model CActiveRecord */
?>

<h2>
    <?= $modelName ?>
    <small>
        <a href="<?= $this->createUrl('index', array('modelName' => $modelName)) ?>">Pengaturan</a>
        | <a href="<?= $this->createUrl('insert', array('modelName' => $modelName)) ?>">Tambah Data</a>
        | Lihat Data
    </small>
</h2>

<fieldset>
    <legend>Data Utama</legend>
    <?php foreach ($model->getAttributes() as $name => $value): ?>
        <div class="row form-group">
            <div class="col-lg-2 text-right">
                <strong><?= $model->getAttributeLabel($name) ?></strong>
            </div>
            <div class="col-lg-10">
                <?= $value ?>
            </div>
        </div>
    <?php endforeach; ?>
</fieldset>
<br/>
<fieldset>
    <legend>Data ini Memiliki Hubungan Banyak terhadap : </legend>
    <?php foreach ($model->relationsMany() as $name => $relationInfo): ?>
        <div class="row form-group">
            <div class="col-lg-2 text-right">
                Daftar<br/>
                <strong><?= $relationInfo[1] ?></strong>
            </div>
            <div class="col-lg-10 loader-list-relation" model-name="<?= $relationInfo[1] ?>" foreign-key="<?= $relationInfo[2] ?>">
                <div class="text-center">
                    <div class="mini-wrapper">
                        Mengambil data dari Basis Data <br/>
                        <?= HTML::image('/images/loader.gif') ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</fieldset>

<script>
    $(document).ready(function() {
        $.each($('.loader-list-relation'), function(index, element) {
            var foreignAttribute = $(element).attr('model-name') + '[' + $(element).attr('foreign-key') + ']';
            var params = {};
            params[foreignAttribute] = core.values['primaryKeyValue'];
            params['partial'] = 1;
            var URL = core.getURL('coreURL', params).replace('{model}', $(element).attr('model-name'));
            $.get(URL, function(HTML) {
                $(element).html(HTML);
            });
        })
    });
</script>