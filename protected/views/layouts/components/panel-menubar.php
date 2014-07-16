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
            KASUARI
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
                    'label' => 'Masukan Data',
                    'url' => array('/input/adventure'),
                    'visible' => !UserWeb::instance()->isGuest
                ),
                array(
                    'label' => 'Brankas',
                    'url' => array('/input/inventory'),
                    'visible' => !UserWeb::instance()->isGuest
                ),
                array(
                    'label' => 'Verifikasi',
                    'url' => array('/input/verifyInput'),
                    'visible' => false
                ),
                array(
                    'label' => 'Help',
                    'url' => array('/site/help'),
                ),
                array(
                    'label' => 'Tentang Sistem',
                    'url' => array('/site/about'),
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
                           
                            <form action="<?= $this->createUrl('/site/login') ?>" method="post">
                                <div class="form-group">
                                    <input class="form-control input-sm" type="text" name="LoginForm[email]" placeholder="Email"/>
                                    <input class="form-control input-sm" type="password" name="LoginForm[password]" placeholder="Password"/>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-default btn-sm">Login</button>
                                </div>
                            </form>
                        </li>
                        <li class="mini-login-wrapper">
                            <?php $this->widget('ext.hoauth.widgets.HOAuth'); ?>
                        </li>
                        <li class="mini-login-wrapper">
                            <h5>
                                atau ingin daftar dulu?
                                <a href='<?= $this->createUrl('/user/register') ?>'>
                                    Daftar Sini
                                </a>
                            </h5>
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
                                <?= UserWeb::instance()->user()->fname . " " . UserWeb::instance()->user()->lname ?><br/>
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
Anda user realcount.heroku.com?klik di <?= CHtml::link('sini',array("user/klaim"))?>

<script>

</script>