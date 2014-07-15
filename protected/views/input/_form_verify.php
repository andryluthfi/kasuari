<div class="form">
    Apakah data yang tertera sudah benar?
    <div class="row-fluid">
        <div class="offset3">

            <br/>
            
            <a href="<?=$this->createUrl('input/verified',array('inputId'=>$input->id, 'respond'=>1))?>">
                <?php echo CHtml::button('Benar', array('submit' => array('input/verifiedOk'), 'class' => 'btn btn-large btn-success')); ?>
            </a>
            
            
        </div>
        <div class="offset3">
            
            <br/>
            <a href="<?=$this->createUrl('input/verified',array('inputId'=>$input->id, 'respond'=>0))?>">
                <?php echo CHtml::button('Salah', array('submit' => array('input/verifiedNo'), 'class' => 'btn btn-large btn-success')); ?>
            </a>
        </div>
    </div>

</div><!-- form -->


