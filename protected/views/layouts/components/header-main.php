<?php

$baseUrl = Yii::app()->baseUrl;
$clientScripts = Yii::app()->getClientScript();
// register main/common styles
$clientScripts->registerCssFile($baseUrl . '/styles/bootstrap/bootstrap.readable.css');
$clientScripts->registerCssFile($baseUrl . '/styles/main.css');

// register main/common scripts
$clientScripts->registerScriptFile($baseUrl . '/scripts/jquery/jquery-1.11.0.min.js');
$clientScripts->registerScriptFile($baseUrl . '/scripts/jquery/jquery.overscroll.js');
$clientScripts->registerScriptFile($baseUrl . '/scripts/jquery/jquery.scrollTableBody-1.0.0.js');
$clientScripts->registerScriptFile($baseUrl . '/scripts/util/underscore-1.5.2.min.js');
$clientScripts->registerScriptFile($baseUrl . '/scripts/bootstrap/bootstrap.min.js');
$clientScripts->registerScriptFile($baseUrl . '/scripts/core/core.js');
?>