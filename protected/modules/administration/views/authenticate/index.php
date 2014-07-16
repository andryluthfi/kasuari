<?php
/* @var $this AuthenticateController */
/* @var $model LoginAdministrator */
/* @var $form CActiveForm  */
?>
<div class="container center-wrapper">
    <div class="row">
        <div class="col-md-offset-4 col-md-4">
            <div class="center-block">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'login-form',
                            'enableClientValidation' => true,
                            'clientOptions' => array(
                                'validateOnSubmit' => true,
                            ),
                        ));
                        ?>

                        <div class="form-group <?= $model->hasErrors('email') ? "has-error" : "" ?>">
                            <div class="col-lg-9">
                                <?= $form->textField($model, 'email', array('class' => 'form-control', 'placeholder' => "email")) ?>
                            </div>
                        </div>

                        <div class="form-group <?= $model->hasErrors('password') ? "has-error" : "" ?>">
                            <div class="col-lg-9">
                                <?= $form->passwordField($model, 'password', array('class' => 'form-control', 'placeholder' => "password")) ?>
                            </div>
                        </div>

                        <div class="form-group col-lg-1">
                            <?php echo CHtml::submitButton('Login', array('class' => 'btn btn-default')); ?>
                        </div>

                        <?php $this->endWidget(); ?>
                    </div>
                    <div class="panel-footer">
                        Login, 
                        <small class="font-x-small">
                            Jika akses gagal atau lupa password silahkan 
                            menghubungi pihak Administrator untuk
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>