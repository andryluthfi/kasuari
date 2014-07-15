<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'input-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <?php echo $form->errorSummary($input); ?>
    <?php echo CHtml::hiddenField('tps_id', $tps->tps_id); ?>

    <div class="row-fluid">
        <div class="span6">
            <?php echo $form->labelEx($input, 'prabowo_count'); ?>
            <?php echo $form->textField($input, 'prabowo_count', array('id' => 'start-focus', 'size' => 10, 'maxlength' => 10, 'class' => 'form-control', 'onkeypress' => 'return isNumberKey(event)', 'OnKeyUp' => 'changeTotalVote();')); ?>
            <?php echo $form->error($input, 'prabowo_count'); ?>
        </div>
        <div class="span6">
            <?php echo $form->labelEx($input, 'jokowi_count'); ?>
            <?php echo $form->textField($input, 'jokowi_count', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control', 'onkeypress' => 'return isNumberKey(event)', 'OnKeyUp' => 'changeTotalVote()')); ?>
            <?php echo $form->error($input, 'jokowi_count'); ?>
        </div>
    </div>
    <div id="suara">
        <label for='broken-count'>Jumlah suara sah:</label> 
        <input type="text" name='broken-count' id="total_suara" class='text-info form-control' style="padding-left: 13px;" value="0" readonly>
    </div>
    <div class="row-fluid">
        <div class="span6">
            <?php echo $form->labelEx($input, 'broken_count'); ?>
            <?php echo $form->textField($input, 'broken_count', array('size' => 10, 'maxlength' => 10, 'class' => 'form-control', 'onkeypress' => 'return isNumberKey(event)', 'OnKeyUp' => 'changeTotalVote()')); ?>
            <?php echo $form->error($input, 'broken_count'); ?>
        </div>

    </div>
    <div class="row-fluid ">
        <div class='row alert alert-warning' style="margin: 13px 0px">
            Gunakan checkbox berikut untuk menandakan masalah:  

            <div class="span6 text-center">
                <?php echo $form->labelEx($input, 'check_total_count', array('style' => 'font-weight:normal')); ?>
                <?php echo $form->checkBox($input, 'check_total_count', array('uncheckValue' => '')); ?>
                <?php echo $form->error($input, 'check_total_count'); ?>
            </div>

            <div class="span6 text-center">
                <?php echo $form->labelEx($input, 'check_signature', array('style' => 'font-weight:normal')); ?>
                <?php echo $form->checkBox($input, 'check_signature', array('uncheckValue' => '')); ?>
                <?php echo $form->error($input, 'check_signature'); ?>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="form-group">
            <?php echo $form->label($inputNote, 'note'); ?>
            <?php echo $form->textArea($inputNote, 'note', array('size' => 200, 'class' => 'form-control', 'maxlength' => 200)); ?>
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
    $("#start-focus").focus();
    function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

        return true;
    }

    function changeTotalVote() {

        var valuePrabs = parseInt(document.getElementById('start-focus').value);
        var valueJoks = parseInt(document.getElementById('Input_jokowi_count').value);

        document.getElementById('total_suara').value = valueJoks + valuePrabs;

    }
</script>
