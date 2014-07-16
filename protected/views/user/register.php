<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="container center-wrapper">
    <div class="row">
        <div class="col-md-offset-4 col-md-4">
            <div class="center-block">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="form">

                            <h1 class='text-center'>Daftar</h1>
                            <?php
                            $form = $this->beginWidget('CActiveForm', array(
                                'id' => 'user-form',
                                'enableAjaxValidation' => false,
                            ));
                            ?>
                            <?php echo $form->errorSummary($model); ?>

                            <div class="row-fluid">
                                <div class="span6">
                                    <?php echo $form->labelEx($model, 'email'); ?>
                                    <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 320, 'class' => 'form-control')); ?>

                                </div>
                                <div class="span6">
                                    <?php echo $form->labelEx($model, 'fname'); ?>
                                    <?php echo $form->textField($model, 'fname', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
                                </div>
                            </div>

                            <div class="row-fluid">
                                <div class="span6">
                                    <?php echo $form->labelEx($model, 'lname'); ?>
                                    <?php echo $form->textField($model, 'lname', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
                                </div>
                                <div class="span6">
                                    <?php echo $form->labelEx($model, 'password'); ?>
                                    <?php echo $form->passwordField($model, 'password', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
                                </div>
                            </div>
                            
                            <div class="row-fluid">
                                <div class="span6">
                                    <?php echo $form->labelEx($model, 'verifyPassword'); ?>
                                    <?php echo $form->passwordField($model, 'verifyPassword', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
                                </div>
                                <div class="span6">
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="span6">
                                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-large btn-success')); ?>
                                </div>
                                <div class="span6">

                                </div>
                            </div>
                            <?php $this->endWidget(); ?>
                        </div>
                    </div>
                    <div class="panel-footer">
                        Daftar, 
                        <small class="font-x-small">
                            Silahkan Daftar jika anda ingin menggunakan sistem 
                            ini lebih lanjut
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>