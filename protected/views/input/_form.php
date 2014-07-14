<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'input-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($input); ?>
    <div id="suara">
        Total Suara: 
        <div id="total_suara">
            0
        </div>
    </div>
    <div class="row-fluid">
        <div class="span6">
            <?php echo $form->labelEx($input, 'prabowo_count'); ?>
            <?php echo $form->textField($input, 'prabowo_count', array('size' => 10, 'maxlength' => 10, 'onkeypress' => 'return isNumberKey(event)', 'OnKeyUp'=> 'changeTotalVote()')); ?>
            <?php echo $form->error($input, 'prabowo_count'); ?>
        </div>
        <div class="span6">
            <?php echo $form->labelEx($input, 'jokowi_count'); ?>
            <?php echo $form->textField($input, 'jokowi_count', array('size' => 10, 'maxlength' => 10, 'onkeypress' => 'return isNumberKey(event)', 'OnKeyUp'=> 'changeTotalVote()')); ?>
            <?php echo $form->error($input, 'jokowi_count'); ?>
        </div>
    </div>

    <div class="row-fluid">
        <div class="span6">
            <?php echo $form->labelEx($input, 'broken_count'); ?>
            <?php echo $form->textField($input, 'broken_count', array('size' => 10, 'maxlength' => 10, 'onkeypress' => 'return isNumberKey(event)', 'OnKeyUp'=> 'changeTotalVote()')); ?>
            <?php echo $form->error($input, 'broken_count'); ?>
        </div>

    </div>
    <div class="row-fluid">
        <div class="span6">
            <?php echo $form->labelEx($input, 'check_total_count'); ?>
            <?php echo $form->checkBox($input, 'check_total_count', array('uncheckValue' => '')); ?>
            <?php echo $form->error($input, 'check_total_count'); ?>
        </div>

        <div class="span6">
            <?php echo $form->labelEx($input, 'check_signature'); ?>
            <?php echo $form->checkBox($input, 'check_signature', array('uncheckValue' => '')); ?>
            <?php echo $form->error($input, 'check_signature'); ?>
        </div>

    </div>
    <div class="row-fluid">
        <div class="span6">
            <?php echo $form->labelEx($inputNote, 'note'); ?>
            <?php echo $form->textArea($inputNote, 'note', array('size' => 200, 'maxlength' => 200)); ?>
            <?php echo $form->error($inputNote, 'note'); ?>
        </div>
    </div>
    <div class="row-fluid">
        <div class="offset3">

            <br/>
            <?php echo CHtml::submitButton($input->isNewRecord ? 'Submit' : 'Save', array('class' => 'btn btn-large btn-success')); ?>
        </div>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">
    function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

        return true;
    }

    function changeTotalVote() {
        var valuePrabs = parseInt(document.getElementById('Input_prabowo_count').value);
        var valueJoks = parseInt(document.getElementById('Input_jokowi_count').value);
        var valueTidakSah = parseInt(document.getElementById('Input_broken_count').value);
        
        document.getElementById('total_suara').innerHTML = valueJoks+valuePrabs+valueTidakSah;

    }
</script>
