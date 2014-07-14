<?php

/* @var $this InputController */
/* @var $dataProvider CActiveDataProvider */
/* @var $viewPath string */
?>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider' => $dataProvider,
    'columns' => array_merge(array_keys($model->getAttributes()), array(
        array(
            'value' => 'CHtml::link("Telusuri", $this->grid->controller->createUrl("inventory", array("which"=>$data->nextLabel, "id"=>$data->primaryKey)))',
            'type'=>'raw'
        )
    )),
    'itemsCssClass' => 'table table-striped table-hover font-smaller'
))
?> 