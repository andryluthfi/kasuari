<?php /* @var $this ControllerAdministrator */ ?>    
<?php $this->beginContent('/layouts/parent-main'); ?>	
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <?php
            $this->widget('zii.widgets.CMenu', array(
                'items' => $this->breadcrumbs,
                'htmlOptions' => array(
                    'class' => 'breadcrumb',
                    'style' => 'margin-bottom: 5px;'
                )
            ));
            ?>
        </div>
        <div class="col-md-4">
            <h1 class="text-right">
                
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?= $content; ?>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>
