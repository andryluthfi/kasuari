
<?php /* @var $this ControllerAdministrator */ ?>    
<?php $this->beginContent('/layouts/parent-main'); ?>	
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
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
        <div class="col-md-8">
            <h1 class="text-right">
                
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <?php foreach (Root::retrieveModelsName() as $name => $subNames) : ?>           
                    <div class="panel-heading"><?= $name ?></div>
                    <?php foreach ($subNames['.'] as $subName) : ?>  
                        <div class="panel-body reduced-panel-body">
                            <a href="<?= $this->createUrl("/administration/data/index", array('modelName'=>$subName)) ?>">
                                <small>
                                    <?= $subName ?>
                                </small>
                            </a>

                            <span class="pull-right">
                                <a href="<?= $this->createUrl("/administration/data/insert", array('modelName'=>$subName)) ?>" class="glyphicon glyphicon-plus font-xx-small">
                                    Tambah
                                </a>
                            </span>
                        </div>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="col-md-9">
            <?= $content; ?>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>