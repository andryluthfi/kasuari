<div class="form">
    Apakah data yang tertera sudah benar?
    <div class="row-fluid">
        <div class="offset3">

            <br/>
            
            <a href="<?=$this->createUrl('input/verifiedOk',array('inputId'=>$input->id))?>">
                <?php echo CHtml::button('Benar', array('submit' => array('input/verifiedOk'), 'class' => 'btn btn-large btn-success')); ?>
            </a>
            
            
        </div>
        <div class="offset3">
            
            <br/>
            <a href="<?=$this->createUrl('input/verifiedNo',array('inputId'=>$input->id))?>"><?php echo CHtml::button('Salah', array('submit' => array('input/verifiedNo'), 'class' => 'btn btn-large btn-success')); ?></a>
        </div>
    </div>

</div><!-- form -->


