<?php

/* @var $this CoreController */
?>

<?php

//$url = 'http://graph.facebook.com/100000771470028/picture?type=large';
//$aContext = array(
//    'http' => array(
//        'proxy' => 'tcp://152.118.24.10:8080',
//        'request_fulluri' => true,
//    ),
//);
//$cxContext = stream_context_create($aContext);
//
//$sFile = file_get_contents($url, false, $cxContext);
//
//Logger::dumpWeb($sFile);

Logger::dumpWeb(UserWeb::instance()->getPhotoURL());
?>
