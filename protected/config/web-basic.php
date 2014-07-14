<?php

Yii::setPathOfAlias('chartjs', dirname(__FILE__) . '/../extensions/yii-chartjs');
// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Kawal Suara Online',
    // preloading 'log' component
    'preload' => array('log'),
    'sourceLanguage' => 'id',
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.models.form.*',
        'application.models.baseentity.*',
        'application.models.baseentity.account.*',
        'application.models.entity.*',
        'application.models.entity.account.*',
        'application.components.*',
        'application.components.bytemeup!.*',
        'ext.hoauth.models.*',
    ),
    'modules' => array(
        'administration' => array(
            'defaultController' => 'core',
        ),
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'tanyakara',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
            'generatorPaths' => array(
                'ext.gtc', // a path alias
            ),
        ),
    ),
    // application components
    'components' => array(
        'curl' => array(
            'class' => 'application.extensions.curl.Curl',
            'options' => array(
                'setOptions' => array(
                ),
            )
        ),
        'user' => array(
            'allowAutoLogin' => true,
            'class' => 'UserWeb',
        ),
        'urlManager' => array(
            'urlFormat' => 'path',
            'appendParams' => false,
            'showScriptName' => false,
            'rules' => array(
                'gii' => 'gii/default',
                '/' => 'site/index',
                /**
                 * Core Controller
                 */
                /**
                 * Data Controller
                 */
                'administration/data/<modelName:\w+>' => 'administration/data/index',
                'administration/data/<modelName:\w+>/add' => 'administration/data/insert',
                'administration/data/<modelName:\w+>/update' => 'administration/data/update',
                'administration/data/<modelName:\w+>/delete' => 'administration/data/delete',
                'administration/data/<modelName:\w+>/view' => 'administration/data/view',
                /**
                 * General Rules
                 */
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        'errorHandler' => array(
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            ),
        ),
        'mail' => array(
            'class' => 'ext.yii-mail.YiiMail',
            'transportType' => 'smtp',
            'transportOptions' => array(
                'host' => 'mail.budaya.cs.ui.ac.id',
                'username' => 'noreply@budaya.cs.ui.ac.id',
                'password' => '',
                'port' => 25
            ),
            'logging' => true,
            'dryRun' => false
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        /**
         * Google Analytic Profile
         */
        'ga_email' => '',
        'ga_password' => '',
        'ga_profile_id' => '',
        /**
         * emails
         */
        'emails' => array(
        ),
        'social' => array(
            'facebook' => array(
                'URL' => ''
            ),
            'twitter' => array(
                'URL' => ''
            ),
            'linkedin' => array(
                'URL' => ''
            ),
            'rss' => array(
                'URL' => ''
            ),
        ),
    ),
);
