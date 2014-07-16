<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Root
 * @author Andry Luthfi
 */
class Root {

    /**
     * Retrieve all Model that owned by root directory. It will constructed as
     * Tree
     */
    public static function retrieveModelsName($subPath = 'entity') {
        $basePath = Yii::app()->basePath;
        $baseSearchDirectory = sprintf("%s/models/%s", $basePath, $subPath);
        if (!file_exists($baseSearchDirectory)) {
            $baseSearchDirectory = sprintf("%s/models", $basePath);
        }
        $names = Root::retrieveNames($baseSearchDirectory);
        unset($names['.']);
        return $names;
    }

    public static function retrieveNames($basePath) {
        $names = array('.' => array());
        foreach (array_diff(scandir($basePath), array('.', '..')) as $directoryName) {
            $path = sprintf("%s/%s", $basePath, $directoryName);

            if (is_dir($path)) {
                $names[$directoryName] = Root::retrieveNames($path);
            } else {
                $pathInfo = pathinfo($directoryName);
                $names['.'][] = $pathInfo['filename'];
            }
        }
        return $names;
    }

}
