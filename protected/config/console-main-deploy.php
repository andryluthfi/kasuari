<?php

$basicConfiguration = include 'console-basic.php';
$basicConfiguration['components']['db'] = array(
    'connectionString' => 'mysql:host=152.118.27.8;dbname=captcha_kasuari', // ;unix_socket:/var/lib/mysqld/mysqld.sock
    'emulatePrepare' => true,
    'username' => 'captcha',
    'password' => 'captch4$',
    'charset' => 'utf8',
);
return $basicConfiguration;
