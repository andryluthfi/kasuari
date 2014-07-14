<?php

$basicConfiguration = include 'web-basic.php';
$basicConfiguration['components']['db'] = array(
    'connectionString' => 'mysql:host=localhost;dbname=kara',
    'emulatePrepare' => true,
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
);

//For email configuration
//$basicConfiguration['components']['request'] = array(
//    'hostInfo' => 'http://www.mss.com',
//    'baseUrl' => '',
//    'scriptUrl' => '',
//);

return $basicConfiguration;
