<?php
$basicConfiguration = include 'web-basic.php';
$basicConfiguration['components']['db'] = array(
    'connectionString' => 'mysql:host=localhost;dbname=captcha_kara', // ;unix_socket:/var/lib/mysqld/mysqld.sock
    'emulatePrepare' => true,
    'username' => 'captcha',
    'password' => 'captch4$',
    'charset' => 'utf8',
);
return $basicConfiguration;