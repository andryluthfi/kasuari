<?php

/**
 * Helps to manage file.
 */
class FileManager {

    /**
     * Retrieve ControllersName that owned by some context. As say, Admin,
     * then the Controllers that would been given to is /modules/admin 
     * context.
     * 
     * pattern of context in file path system :
     * application.modules.<context>.controllers.*
     * @param string $context defining context of application path, eg. 
     *                        application.modules.<context>.controllers.*
     */
    public static function retrieveControllersMenu($context) {
        $basePath = Yii::app()->basePath;
        $adminControllerPath = sprintf("%s/modules/%s/controllers/", $basePath, $context);
        Yii::import(sprintf("application.modules.%s.controllers.*", $context));

        $menus = array();
        foreach (scandir($adminControllerPath) as $file) {
            $match = null;
            if (preg_match('/(\w+)Controller/', $file, $match)) {
                if ($match[1] !== "Default") {
                    $className = $match[1];

                    $controllersVariables = get_class_vars($className . "Controller");
                    $menu = $controllersVariables['MENU'];
                    $menus[$className] = $menu;
                }
            }
        }
        return $menus;
    }

    /**
     * Converts list of retrieved Controller's Menu into CMenu
     * @param mixed $menus
     * @param string $context
     * @return CMenu[] list of CMenu
     */
    public static function convertMenu($menus, $context) {
        $cmenus = array();
        foreach ($menus as $name => $menu) {
            $nameID = strtolower($name);
            $name = array_key_exists($name, FileManager::$controllersTranslate) ? FileManager::$controllersTranslate[$name] : $name;
            $cmenu = array(
                'label' => $name,
                'url' => Yii::app()->createUrl(sprintf('/%s/%s/', $context, $nameID)),
                'items' => $menu
            );
            $cmenus[] = $cmenu;
        }
        return $cmenus;
    }

    /**
     * simply create folder under given string path and force to do it
     * recursively
     * @param string $path path that needed to be created
     */
    public static function createFolder($path) {
        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }
    }

    /**
     * Uploads multiple files and store it into given pathBase. it basicaly 
     * called the uploads single file and iterate it for each files.
     * @param CUploadedFile[] $files multiple files
     * @return boolean true whether the uploads is succeed
     */
    public static function uploadFiles($files, $pathBase = 'cache/') {
        $isSuccess = true;
        $path = Yii::app()->basePath . '/../' . $pathBase;
        FileManager::createFolder($path);
        foreach ($files as $index => $file) {
            if (!FileManager::uploadFile($file, $pathBase)) {
                $isSuccess = false;
                break;
            }
        }
        return $isSuccess;
    }

    /**
     * Uploads single file and store it into given pathBase
     * @param CUploadedFile $file single file
     * @return boolean true whether the uploads is succeed
     */
    public static function uploadFile($file, $pathBase = 'cache/', $filename = null) {
        $path = Yii::app()->basePath . '/../' . $pathBase;
        $url = $pathBase;
        FileManager::createFolder($path);
        $rawName = $filename ? $filename : $file->name;

        $fileNameExtension = $rawName;
        return $file->saveAs($path . $fileNameExtension) ? $url . $fileNameExtension : false;
    }

    /**
     * Get list of directories on some path context with getting its URL 
     * information and some additional informations that needed. 
     * It will retrieve directories information through its sub-directories
     * until reached its max depth (if the $maxDepth is given) or until it's
     * finished searching through the deepest leaf.
     * @param string $context context on its path
     * @return array the list of directories with its informations 
     */
    public static function listDirectories($context = '/', $maxDepth = null, $level = 1) {
        if ($maxDepth !== null && $level >= $maxDepth) {
            return "";
        }
        $basePath = sprintf('%s/..%s', Yii::app()->basePath, $context);
        $directoryTree = array();
        foreach (scandir($basePath) as $file) {
            if (strcasecmp($file, ".") != 0 && strcasecmp($file, "..") != 0) {
                $filePath = sprintf('%s/%s', $basePath, $file);
                if (is_dir($filePath)) {
                    $directoryTree[] = array(
                        'name' => $file,
                        'type' => 'directory',
                        'subdirectories' => FileManager::listDirectories(sprintf("%s/%s", $context, $file), $maxDepth, $level + 1)
                    );
                } else {
                    $directoryTree[] = array(
                        'name' => $file,
                        'type' => 'file',
                    );
                }
            }
        }

        return $directoryTree;
    }

}

?>
