<?php

/**
 * Logger class, helps to log into web or any necessary I/O selection.
 * Development/Production usage only on testing mode
 */
class Logger {

    /**
     * Dump variable in var_dump() function into web or HTML I/O
     * @param mixed $variable dumping variable into web or HTML I/O
     */
    public static function dumpWeb($variable) {
        echo "<pre>";
        var_dump($variable);
        echo "</pre>";
    }

    /**
     * Dump variable in var_dump() function into file system 
     * @param type $variable dumping variable into file system 
     */
    public static function dumpFileSystem($variable) {
        var_dump($variable);
        echo "\n\n";
    }

    /**
     * Dump variable of rows, into web or HTML I/O. rows must be from resulted
     * on sql query.
     * @param CController $controller
     * @param string[][] $rows
     */
    public static function dumpRows($controller, $rows) {
        if (count($rows) > 0) {
            $controller->widget('zii.widgets.grid.CGridView', array(
                'dataProvider' => new CArrayDataProvider($rows, array('keyField' => 'Code', 'pagination' => false)),
                'columns' => array_keys($rows[0])
            ));
        }
    }

}

?>
