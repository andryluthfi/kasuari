<?php
/* @var $this CoreController */
/* @var $order Order */
/* @var $form CActiveForm */
?>
<div class="row">
    <div class="col-lg-12">
        <h4>Informasi Pemesan</h4>
        <table class="table table-hover table-condensed table-responsive">
            <tbody>
                <tr>
                    <td>
                        Kontak
                    </td>
                    <td>
                        <?= $order->name ?> 
                        (<?= CHtml::link($order->email, "mailto:$order->email") ?>)
                    </td>
                </tr>
                <tr>
                    <td>
                        Nomor Telephone
                    </td>
                    <td>
                        <?= $order->mobilePhone ?> 
                    </td>
                </tr>
                <tr>
                    <td>
                        Alamat
                    </td>
                    <td>
                        <?= $order->address ?> 
                    </td>
                </tr>
                <tr>
                    <td>
                        Informasi Pengguna
                    </td>
                    <td>
                        <?= $order->userDetail ? $order->userDetail->detail : '---' ?> 
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <h4>Informasi Pemesan</h4>
        <?php $this->beginWidget('CActiveForm', array('method' => 'post')) ?>
        <table class="table table-hover table-condensed table-responsive table-striped">
            <thead>
                <tr>
                    <td>
                        Prioritas
                    </td>
                    <td>
                        Kode Satuan
                    </td>
                    <td>
                        Kostan
                    </td>
                    <td>
                        Bulan
                    </td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($order->priorityItems as $item): ?>
                    <tr class="<?= $order->acceptOrder && $order->acceptOrder->availableOrder ? ($order->acceptOrder->availableOrder->selectedRentID === $item->rentID ? 'info' : '') : '' ?>">
                        <td>
                            <?= $item->priority ?>
                        </td>
                        <td>
                            <?= $item->transactionCode ?>
                        </td>
                        <td>
                            <?= $item->rent->name ?> 
                            <small>
                                <?= $item->rent->area->name ?> 
                            </small>
                        </td>
                        <td>
                            <?= $item->proposeMonth ?> 
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3"> 
                        <?php if ($order->acceptOrder && $order->acceptOrder->availableOrder && $order->acceptOrder->availableOrder->paymentConfirmation): ?>
                            <div class="thumbnail padded-horizontal-most">
                                <div class="row">
                                    <h4>
                                        Konfirmasi Pembayaran oleh Pemesan
                                    </h4>

                                    <div class="row">
                                        <div class="col-md-4 text-center">
                                            <strong>
                                                Dari Bank
                                            </strong>
                                        </div>
                                        <div class="col-md-3 text-center">
                                            <strong>
                                                <i class="glyphicon glyphicon-arrow-right"></i>
                                            </strong>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <strong>
                                                Ke Bank
                                            </strong>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 text-center">
                                            <?= $order->acceptOrder->availableOrder->paymentConfirmation->bankFrom ?>
                                        </div>
                                        <div class="col-md-3 text-center">
                                            <p class="text-orange">
                                                <?= Yii::app()->numberFormatter->formatCurrency($order->acceptOrder->availableOrder->paymentConfirmation->amount, 'Rp.') ?>
                                            </p>
                                            <p>
                                                <?= date('j F Y', strtotime($order->acceptOrder->availableOrder->paymentConfirmation->date)); ?>
                                            </p>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <?= $order->acceptOrder->availableOrder->paymentConfirmation->bankTo ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <?php if ($order->acceptOrder->availableOrder->paymentConfirmation->paymentFinalization): ?>
                                        <h4>                                    
                                            Pesan Konfirmasi Pembayaran
                                        </h4>   
                                        <p><?= $order->acceptOrder->availableOrder->paymentConfirmation->paymentFinalization->notes; ?></p>
                                    <?php else: ?>
                                        <h4>                                    
                                            Memberi Konfirmasi Pembayaran kepada Pemesan
                                        </h4>
                                        <?=
                                        CHtml::textArea('payment-notes', $order->acceptOrder->availableOrder->paymentConfirmation->paymentFinalization ? $order->acceptOrder->availableOrder->paymentConfirmation->paymentFinalization->notes : '', array(
                                            'class' => $order->acceptOrder->availableOrder->paymentConfirmation->paymentFinalization ? 'form-control disabled' : 'form-control',
                                            'rows' => 17,
                                            'placeholder' => 'Masukan pesan tambahan yang akan ditampilkan pada Email yang akan dikirimkan ke Pemesan ...'
                                        ))
                                        ?>

                                        <script>
                                            tinymce.init({selector: 'textarea'});
                                        </script>
                                    <?php endif; ?>

                                    <?=
                                    CHtml::submitButton($order->acceptOrder->availableOrder->paymentConfirmation->paymentFinalization ? "Sudah Serah Terima" : "Serah Terima", array(
                                        'class' => $order->acceptOrder->availableOrder->paymentConfirmation->paymentFinalization ? 'btn btn-info disabled' : 'btn btn-default',
                                        'name' => 'action'
                                    ))
                                    ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </td>                                   
                    <td class="text-right">                                    
                        <div class="btn-group">
                            <a href="<?= $this->createUrl('viewOrder', array('id' => $order->ID, 'accept' => 1)) ?>" class="btn btn-sm <?= $order->acceptOrder ? ($order->acceptOrder->availableOrder ? 'btn-info disabled' : 'btn-default disabled') : 'btn-default' ?>">
                                Tersedia
                            </a>
                            <a href="<?= $this->createUrl('viewOrder', array('id' => $order->ID, 'accept' => 0)) ?>" class="btn btn-sm <?= $order->acceptOrder ? ($order->acceptOrder->availableOrder ? 'btn-default disabled' : 'btn-info disabled') : 'btn-default' ?>">
                                Tidak
                            </a>
                        </div>                                   
                    </td>
                </tr>
            </tfoot>
        </table>
        <?php $this->endWidget(); ?>
    </div>
</div>