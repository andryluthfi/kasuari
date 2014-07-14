<?php
$basicConfiguration = include 'web-basic.php';
$basicConfiguration['components']['db'] = array(
    'connectionString' => 'mysql:host=localhost;dbname=e-archive', // ;unix_socket:/var/lib/mysqld/mysqld.sock
    'emulatePrepare' => true,
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
);
return $basicConfiguration;