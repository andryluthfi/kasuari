<?php
/* @var $this CoreController */
/* @var $data Order */
?>
<div class="row">
    <div class="col-md-1 jumbotron font-xx-large">
        <?= $widget->dataProvider->getPagination()->currentPage * $widget->dataProvider->getPagination()->pageSize + $index + 1; ?> 
        <?php if ($data->datetime === date('Y-m-d H:i:s')): ?>
            <h5 class='text-info'>
                Hari Ini
            </h5>
        <?php endif; ?>        
    </div>
    <div class="col-md-5">
        <h4>#<?= $data->transactionCode ?> <br/>
            <small><?= date('j F Y - H:i', strtotime($data->datetime)); ?><br />
                oleh <?= $data->name ?> (<?= CHtml::link($data->email, "mailto:$data->email") ?>)
            </small>
        </h4>
        <a href="<?= $this->createUrl('viewOrder', array('id' => $data->ID)) ?>" class="btn btn-default">
            Lihat Selengkapnya
        </a>
    </div>
    <div class="col-md-4">
        <h5>
            Pilihan Kostan 
        </h5>
        <ol>
            <?php foreach ($data->items as $index => $item): ?>
                <li>         
                    <h5>
                        <a href="<?= $this->createUrl('rent/viewRent', array('id' => $item->rentID)) ?>"><?= $item->rent->name ?> </a>
                        <small>
                            untuk <?= $item->proposeMonth ?> bulan
                        </small>
                    </h5>
                </li>
            <?php endforeach; ?>
        </ol>
    </div>
    <div class="col-md-2">
        <div class="btn-group">
            <button class="btn btn-sm <?= !$data->acceptOrder ? 'btn-default' : ($data->acceptOrder->availableOrder ? 'btn-info' : 'btn-default') ?> disabled">
                Tersedia
            </button>
            <button class="btn btn-sm <?= !$data->acceptOrder ? 'btn-default' : ($data->acceptOrder->availableOrder ? 'btn-default' : 'btn-info') ?> disabled">
                Tidak
            </button>
        </div>

        <?php if ($data->status): ?>
            <div class="text-center publish-info">
                <small class="font-xx-small text-success">
                    oleh <?= $data->acceptOrder->user->username; ?><br/>
                    <?= $data->acceptOrder->datetime; ?>
                </small>
            </div>
        <?php endif; ?>
    </div>
</div>
<hr />