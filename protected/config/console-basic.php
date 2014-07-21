<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'KASUARI: Kawal Suara Rakyat Indonesia',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.models.view.*',
        'application.models.form.*',
        'application.models.baseentity.*',
        'application.models.baseentity.account.*',
        'application.models.baseentity.area.*',
        'application.models.baseentity.input.*',
        'application.models.entity.*',
        'application.models.entity.account.*',
        'application.models.entity.area.*',
        'application.models.entity.input.*',
        'application.components.*',
        'application.components.bytemeup!.*',
        'ext.hoauth.models.*',
    ),
    // application components
    'components' => array(
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
                'host' => 'smtp.gmail.com',
                'username' => 'mail.goodjobsid@gmail.com',
                'password' => 'tanyagoodjobs',
                'port' => 465,
                'encryption' => 'ssl',
            ),
            'logging' => false,
            'dryRun' => false
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        /**
         * Google Analytic Profile
         */
        'ga_email' => 'bmuanalytics@gmail.com',
        'ga_password' => 'tanyabytemeup',
        'ga_profile_id' => '87854550',
        // this is used in contact page
        'adminEmail' => 'contact@goodjobsid.com',
        'noReply' => 'noreply@goodjobsid.com',
        'postJobEmail' => 'postjob@goodjobsid.com',
        'infoEmail' => 'info@goodjobsid.com',
        'phone' => '(021) 9899 8287',
        'facebookURL' => 'https://www.facebook.com/goodjobsid',
        'twitterURL' => 'https://twitter.com/GoodJobs_ID',
        'linkedlnURL' => 'http://www.linkedin.com/company/3721115?trk=tyah&trkInfo=tarId%3A1399948186703%2Ctas%3Agoodjobs%20id%2Cidx%3A1-1-1',
        'bankAccount' => array(
            'BNI' => 'Nomor Rekening: 0344790257<br />a/n Ulfa Filosophia',
        ),
    ),
);
