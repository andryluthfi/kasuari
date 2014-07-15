<?php
/* @var $this ControllerCommon */
?>
<div class="navbar navbar-default navbar-shadow">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?= $this->createUrl('/administration') ?>">
            <?= Renamer::titleHTML(Yii::app()->name) ?>
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
                    'url' => array('/administration'),
                    'active' => $this->module ?
                            strcasecmp($this->module->id, "administration") === 0 &&
                            strcasecmp($this->action->controller->id, "core") === 0 &&
                            strcasecmp($this->action->id, "index") === 0 : false,
                ),
                array(
                    'label' => 'Post',
                    'url' => array('/administration/post/'),
                    'active' => $this->module ?
                            strcasecmp($this->module->id, "administration") === 0 &&
                            strcasecmp($this->action->controller->id, "post") === 0 &&
                            (
                            strcasecmp($this->action->id, "index") === 0 ||
                            strcasecmp($this->action->id, "inser") === 0 ||
                            strcasecmp($this->action->id, "view") === 0
                            ) : false,
                ),
                array(
                    'label' => 'File',
                    'url' => array('/administration/file/'),
                    'active' => $this->module ?
                            strcasecmp($this->module->id, "administration") === 0 &&
                            strcasecmp($this->action->controller->id, "file") === 0 &&
                            (
                            strcasecmp($this->action->id, "index") === 0 ||
                            strcasecmp($this->action->id, "view") === 0
                            ) : false,
                ),
                array(
                    'label' => 'Polling',
                    'url' => array('/administration/polling/'),
                    'active' => $this->module ?
                            strcasecmp($this->module->id, "administration") === 0 &&
                            strcasecmp($this->action->controller->id, "polling") === 0 &&
                            (
                            strcasecmp($this->action->id, "index") === 0 ||
                            strcasecmp($this->action->id, "insert") === 0 ||
                            strcasecmp($this->action->id, "view") === 0
                            ) : false,
                ),
                array(
                    'label' => 'Subscriber',
                    'url' => array('/administration/subscriber'),
                    'active' => $this->module ?
                            strcasecmp($this->module->id, "administration") === 0 &&
                            strcasecmp($this->action->controller->id, "subscriber") === 0 : false,
                ),
                array(
                    'label' => '<small>Administrasi<small><br/>Basis Data</small></small>',
                    'url' => array('/administration/data'),
                    'active' => $this->module ?
                            strcasecmp($this->module->id, "administration") === 0 &&
                            strcasecmp($this->action->controller->id, "data") === 0 : false,
                    'visible' => UserWeb::instance()->isAdministrator(),
                    'linkOptions' => array(
                        'class' => 'line-close'
                    )
                ),
            ),
            'htmlOptions' => array(
                'class' => 'nav navbar-nav',
            )
        ));
        ?>

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <?php if (Yii::app()->user->isGuest): ?>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="mini-login-wrapper">
                            <form action="<?= $this->createUrl('/site/login') ?>" method="post">
                                <div class="form-group">
                                    <input class="form-control input-sm" type="text" name="Login[username]"/>
                                    <input class="form-control input-sm" type="password" name="Login[password]"/>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-default btn-sm">Login</button>
                                </div>
                            </form>
                        </li>
                    </ul>
                <?php else: ?>

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Personal <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="row">
                                <div class="col-sm-4">
                                    <img src="<?= UserWeb::instance()->getPhotoURL() ?>" style="padding: 2px; margin-left: 4px; border-radius: 30px" />
                                </div>
                                <div class="col-sm-8">
                                    <a href="#" class="font-smaller">
                                        <?= UserWeb::instance()->user()->fname . UserWeb::instance()->user()->lname ?><br/>
                                        <small>
                                            sebagai  
                                            <?= get_class(UserWeb::instance()->level()) ?>
                                        </small>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?= $this->createUrl('/site/logout') ?>">Logout</a></li>
                    </ul>
                <?php endif; ?>
            </li>
        </ul>
    </div>
</div>