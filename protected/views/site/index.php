<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>
<div class="row">
    <h1>
        Kawal Suara Online
    </h1>

    <?php if (UserWeb::instance()->isGuest) : ?>
    <?php endif; ?>
</div>