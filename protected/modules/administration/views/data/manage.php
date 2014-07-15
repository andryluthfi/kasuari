<?php
/* @var $this DataController */
/* @var $dataProvider CActiveDataProvider */
/* @var $modelName string */
/* @var $modelClass CActiveRecord */
?>

<?php if (!isset($_GET['partial']) || intval($_GET['partial']) <= 0): ?>
    <h2>
        <?= $modelName ?>
        <small>
            Pengaturan
            | <a href="<?= $this->createUrl('insert', array('modelName' => $modelName)) ?>">Tambah Data</a>
        </small>
    </h2>
<?php endif; ?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 ">
        <form method="get" action="<?= $this->createUrl('') ?>">
            <?php
            $this->widget('zii.widgets.grid.CGridView', array(
                'dataProvider' => $dataProvider,
                'filter' => (!isset($_GET['partial']) || intval($_GET['partial']) <= 0) ? $modelClass : null,
                'columns' => array_merge(array_keys($modelName::model()->attributeLabels()), array(
                    array(
                        'type' => 'raw',
                        'value' => sprintf(''
                                . 'BootstrapHTML::glpyhLink($this->grid->controller->createUrl("view", array("modelName"=>"%1$s", $data->tableSchema->primaryKey=>$data->getAttribute($data->tableSchema->primaryKey))), "glyphicon-print") . " &nbsp; " .'
                                . 'BootstrapHTML::glpyhLink($this->grid->controller->createUrl("delete", array("modelName"=>"%1$s", $data->tableSchema->primaryKey=>$data->getAttribute($data->tableSchema->primaryKey))), "glyphicon-trash", "", array("onclick"=>"js:return confirm(\'Apakah anda yakin ingin menghapus data ini?\')")) . " &nbsp; " .'
                                . 'BootstrapHTML::glpyhLink($this->grid->controller->createUrl("update", array("modelName"=>"%1$s", $data->tableSchema->primaryKey=>$data->getAttribute($data->tableSchema->primaryKey))), "glyphicon-pencil")', $modelName)
                    )
                )),
                'itemsCssClass' => 'table table-striped table-hover font-smaller'
            ))
            ?>        
        </form>
    </div>
</div>

<script>
    $('input').keypress(function(e) {
        if (e.keyCode === 13) {
            $('form').submit();
        }
    })
</script>