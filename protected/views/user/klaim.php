<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */
//$this->pageTitle = Yii::app()->name . ' - Login';
?>

<div class="container center-wrapper">
    <div class="row">
        <br />
        CATATAN: Jika anda adalah user yang sudah berkontribusi sebelumnya pada sistem http://realcount.herokuapp.com, dan pada sistem realcount tersebut anda melakukan Sign-In dengan Facebook, maka anda cukup melakukan hal yang sama pada sistem Kasuari, dan ia akan mengidentifikasi anda dan me-retrieve profil lama anda, sehingga anda dapat melanjutkan kontribusi data entry yang telah dilakukan pada sistem realcount. Namun, jika pada sistem realcount anda <b>TIDAK</b> melakukan Sign-In dengan Facebook, silahkan melakukan <b>registrasi user baru</b> pada Kasuari dengan menggunakan alamat email yang sama seperti yang digunakan pada sistem realcount, dan sistem Kasuari akan mengidentifikasi anda dan me-retrieve profil lama anda
        <br/>
        <br/>
        <br/>
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
                            <?php echo CHtml::submitButton('Klaim', array('class' => 'btn btn-default')); ?>
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