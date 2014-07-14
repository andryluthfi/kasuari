<?php
/* @var $this DataController */
/* @var $modelName string */
/* @var $model BaseModel */
/* @var $form CActiveForm */
?>


<h2>
    <?= $modelName ?>
    <small>
        <a href="<?= $this->createUrl('index', array('modelName' => $modelName)) ?>">Pengaturan</a>
        | Tambah Data
    </small>
</h2>

<?php
$this->beginWidget('CActiveForm', array(
    'id' => 'model-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array(
        'class' => 'form-horizontal'
    )
));
?>

<fieldset>
    <legend id="fields-main">Data Utama</legend>
    <?php foreach ($model->attributeNames() as $name): ?>
        <?php if ($model->fieldType($name)): ?>
            <div class="form-group <?= $model->hasErrors($name) ? 'has-error' : '' ?>" <?= $model->hasErrors($name) ? 'data-toggle="tooltip" data-placement="top" title="' . $model->getError($name) . '" data-original-title="' . $model->getError($name) . '"' : "" ?>>
                <label for="input-<?= $name ?>" class="col-lg-2 control-label"><?= $name ?></label>
                <div class="col-lg-10">
                    <?php $fieldName = $model->fieldName($name) ?>
                    <?= $form->$fieldName($model, $name, array('class' => 'form-control', 'id' => "input-$name")) ?>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</fieldset>

<fieldset>
    <legend id="fields-relation-belong">Data dimiliki oleh</legend>
    <?php foreach ($model->relationsBelong() as $relationInfo): ?>
        <div class="form-group <?= $model->hasErrors($relationInfo[2]) ? "has-error" : "" ?>" <?= $model->hasErrors($name) ? 'data-toggle="tooltip" data-placement="top" title="' . $model->getError($relationInfo[2]) . '" data-original-title="' . $model->getError($relationInfo[2]) . '"' : "" ?>>
            <label for="input-<?= $relationInfo[2] ?>" class="col-lg-2 control-label">
                <?= $relationInfo[2] ?>
            </label>
            <div class="col-lg-10">
                <?= $form->dropDownList($model, $relationInfo[2], Business::dropDownList($relationInfo[1], $this->primaryParameterName($relationInfo[1]), $this->suggestLabel($relationInfo[1])), array('class' => 'form-control', 'id' => "input-$relationInfo[2]")) ?>
            </div>
        </div>
    <?php endforeach; ?>
</fieldset>

<?php if ($model->hasErrors()) : ?>
    <script>
        $(document).ready(function() {
            $('.has-error').tooltip();
        });
    </script>
<?php endif; ?>
    
    <script>
        $(document).ready(function(){
           if($('#fields-main').siblings().size() === 0) {
               $('#fields-main').parent().remove();
           } 
           if($('#fields-relation-belong').siblings().size() === 0) {
               $('#fields-relation-belong').parent().remove();
           } 
        });
    </script>

<div class="form-group text-center">
    <input type="submit" class="btn btn-default" value="<?= $model->isNewRecord ? "Simpan" : "Ubah" ?>" />
</div>
<?php $this->endWidget(); ?>
