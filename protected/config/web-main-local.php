<?php

$basicConfiguration = include 'web-basic.php';
$basicConfiguration['components']['db'] = array(
    'connectionString' => 'mysql:host=localhost;dbname=kara',
    'emulatePrepare' => true,
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
);

$basicConfiguration['params']['values']['baseURL'] = 'http://localhost:8081/kara/site/oauth';
$basicConfiguration['params']['facebookAPI'] = array(
    'ID' => '1455887414680617',
    'secret' => 'c47d1b513ed377e547cfd610270149ba'
);

//For email configuration
//$basicConfiguration['components']['request'] = array(
//    'hostInfo' => 'http://www.mss.com',
//    'baseUrl' => '',
//    'scriptUrl' => '',
//);

return $basicConfiguration;
