<?php
/* @var $this ControllerCommon */
?>
<div class="navbar navbar-default navbar-scala">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand navbar-logo" href="<?= $this->createUrl('/site/index') ?>">
            Kara
        </a>
    </div>
    <div class="navbar-collapse collapse navbar-responsive-collapse">
        <?php
        $this->widget('zii.widgets.CMenu', array(
            'activateParents' => true,
            'encodeLabel' => false,
            'items' => array(
                array(
                    'label' => 'Beranda',
                    'url' => array('/site/index')
                ),
                array(
                    'label' => 'Mulai Bertualang',
                    'url' => array('/input/adventure')
                ),
            ),
            'htmlOptions' => array(
                'class' => 'nav navbar-nav',
            )
        ));
        ?>

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown <?= strcasecmp($this->id, 'account') === 0 ? 'active' : '' ?>">
                <?php if (Yii::app()->user->isGuest): ?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login <b class="caret"></b></a>
                    <ul class="dropdown-menu" style="width: 299px;padding: 20px;">
                        <li class="mini-login-wrapper">
                            <?php $this->widget('ext.hoauth.widgets.HOAuth'); ?>
                        </li>
                    </ul>
                <?php else: ?>
                    <a href="#" class="dropdown-toggle  line-close" data-toggle="dropdown">

                        <div class="row">
                            <div class="col-sm-4">
                                <img id="user-picture" src="" style="padding: 2px; margin-left: 4px; border-radius: 30px" />
                                <script>
                                    $.get(core.getURL('loadPartial', {which: 'user-pictureURL'}), function(json) {
                                        $('#user-picture').attr('src', json['user-pictureURL']);
                                    });
                                </script>
                            </div>
                            <div class="col-sm-8">
                                <?= UserWeb::instance()->user()->fname . UserWeb::instance()->user()->lname ?><br/>
                                <small>
                                    sebagai  
                                    <?= get_class(UserWeb::instance()->level()) ?>
                                </small>
                            </div>
                        </div>

                        <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="divider"></li>

                        <li><a href="<?= $this->createUrl('/site/logout') ?>">Logout</a></li>
                    </ul>
                <?php endif; ?>
            </li>
        </ul>
    </div>
</div>

<script>

</script>