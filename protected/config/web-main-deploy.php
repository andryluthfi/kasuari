<?php

$basicConfiguration = include 'web-basic.php';
$basicConfiguration['components']['db'] = array(
    'connectionString' => 'mysql:host=152.118.27.8;dbname=captcha_kasuari', // ;unix_socket:/var/lib/mysqld/mysqld.sock
    'emulatePrepare' => true,
    'username' => 'captcha',
    'password' => 'captch4$',
    'charset' => 'utf8',
);
$basicConfiguration['params']['values']['baseURL'] = 'http://bahasa.cs.ui.ac.id/kasuari/site/oauth';
$basicConfiguration['params']['values']['proxy'] = array(CURLOPT_PROXY => '152.118.24.10:8080');
$basicConfiguration['params']['facebookAPI'] = array(
    'ID' => '1455810054688353',
    'secret' => '3cddb47400d5381c5a8c68633ecc12d9'
);
$basicConfiguration['components']['curl']['options']['setOptions'] = array(
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_PROXY => '152.118.24.10:8080'
);
return $basicConfiguration;
