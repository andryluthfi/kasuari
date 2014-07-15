<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
	<?php echo $form->errorSummary($username); ?>
        
        <div class="row-fluid">
            <div class="span6">
                <?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>320)); ?>
		
            </div>
            <div class="span6">
                <?php echo $form->labelEx($username,'username'); ?>
		<?php echo $form->textField($username,'username',array('size'=>45,'maxlength'=>100)); ?>
		
            </div>
        </div>
    
        <div class="row-fluid">
            <div class="span6">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>255)); ?>
		
            </div>
            <div class="span6">

            </div>
        </div>
    
        
    
        <div class="row-fluid">
            <div class="span6">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class' => 'btn btn-large btn-success')); ?>
            </div>
            <div class="span6">

            </div>
        </div>


<?php $this->endWidget(); ?>

</div><!-- form -->