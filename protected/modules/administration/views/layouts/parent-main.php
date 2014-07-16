<?php
/* @var $this ControllerAdministrator */
?>
<?php $this->beginContent('/layouts/parent-raw'); ?>
<header>
    <?php $this->renderPartial('/layouts/components/panel-menubar') ?>
</header>

<article>
    <?= $content; ?>
</article>

<footer>
    <?php $this->renderPartial('/layouts/components/panel-footer') ?>
</footer>
<?php $this->endContent(); ?>