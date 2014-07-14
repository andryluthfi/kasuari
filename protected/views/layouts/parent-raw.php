<?php
/* @var $this Controller */
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
        <link rel="shortcut icon" href="<?php echo Yii::app()->baseUrl; ?>/favicon.ico" type="images/x-icon"></link>
        <?php $this->renderPartial($this->headerURI); ?>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>
        <header>
            <?php $this->renderPartial('//layouts/components/panel-menubar') ?>
        </header>

        <article style="min-height: 390px">
            <?= $content; ?>
        </article>
        <footer>
            <?php $this->renderPartial('//layouts/components/panel-footer') ?>
        </footer>
    </body>
</html>
