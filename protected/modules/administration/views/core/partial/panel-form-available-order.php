<?php
/* @var $this CoreController */
/* @var $order Order */
?>
<div class="row">                <div class="container">

        <form method="post" class="form-horizontal" role="form">
            <?php if (intval($this->actionParams['accept']) === 0): ?>
                <h3 class="strong-header text-orange text-center">
                    Dengan memilih pilihan ini, anda menyatakan bahwa 
                    <strong>
                        dari semua pilihan Kostan,
                    </strong> <strong>tidak ada yang tersedia</strong>
                </h3>

            <?php else: ?>
                <h3 class="strong-header text-blue text-center">
                    Dengan memilih pilihan ini, anda menyatakan bahwa 
                    <strong>
                        dari salah satu pilihan Kostan,
                    </strong> <strong>tersedia</strong>
                </h3>
                <div class="form-group">
                    <label for="input-selectedRentID" class="col-sm-2 control-label">
                        Kostan yang Dipilih / Tersedia
                    </label>
                    <div class="col-sm-10">
                        <?= CHtml::dropDownList('selectedRentID', null, CHtml::listData($order->items, 'rentID', 'rent.name'), array('id' => 'input-selectedRentID', 'class' => 'form-control')) ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="input-notes" class="col-sm-2 control-label">
                        Catatan untuk Pemesan
                    </label>
                    <div class="col-sm-10">
                        <?= CHtml::textArea('notes', '', array('id' => 'input-notes', 'class' => 'form-control', 'rows' => 13)) ?>
                    </div>
                </div>
                <script>
                    tinymce.init({selector: 'textarea'});
                </script>
            <?php endif; ?>  

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
                        <tr class="<?= intval($this->actionParams['accept']) === 0 ? 'danger' : 'info' ?>">
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
                        <td colspan="3" class="text-right">                                    
                            <?php if (!$order->acceptOrder) : ?>
                                <div class="btn-group">
                                    <button type="submit" name="confirmation" value="1" class="btn btn-default">
                                        Konfirmasi
                                    </button>
                                    <button type="submit" name="confirmation" value="0" class="btn btn-default">
                                        Batal
                                    </button>
                                </div>                                   
                            <?php endif; ?>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </form>  
    </div>
</div>