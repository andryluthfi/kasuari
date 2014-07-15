<?php
/* @var $this InputController */
/* @var $dataProvider CActiveDataProvider */
/* @var $viewPath string */
/* @var $breadcrumb string[][] */
?>
<ol class="breadcrumb">
    <?php foreach ($breadcrumb as $menu): ?>
        <li>
            <a href="<?= isset($menu['URL']) ? $menu['URL'] : '#' ?>">
                <?= $menu['label'] ?>
            </a>
        </li>
    <?php endforeach; ?>
</ol>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider' => $dataProvider,
    'columns' => array_merge(array_keys($model->attributeLabels()), array(
        array(
            'value' => 'CHtml::link("Telusuri", $this->grid->controller->createUrl("inventory", array("which"=>$data->nextLabel, "id"=>$data->ID)))',
            'type' => 'raw'
        )
    )),
    'itemsCssClass' => 'table table-striped table-hover font-smaller'
))
?> 