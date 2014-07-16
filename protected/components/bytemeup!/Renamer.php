<?php

/**
 * Helps to rename things.
 */
class Renamer {

    protected static $possibleLabel = array(
        'Name',
        'Username',
    );

    /**
     * Convert the random name into an appropriate HTML's ID
     * eg. "Air Conditioner (AC)" -> "AirConditionerAC"
     * @param string $stringName random name
     * @return string an appropriate HTML's ID
     */
    public static function convertHTMLID($stringName) {
        return str_replace(array('(', ')', ' '), '', $stringName);
    }

    /**
     * rename all foreign keys value into possible label owned by relation 
     * model
     * @param CActiveRecord[] $models models
     */
    public static function renameModelsID($models) {
        foreach ($models as &$model) {
            foreach ($model->relations() as $relation => $properties) {
                if ($properties[0] === CActiveRecord::BELONGS_TO) {
                    foreach (Renamer::$possibleLabel as $label) {
                        if (isset($model[$relation]->attributes[$label])) {
                            $model[$properties[2]] = $model[$relation]->attributes[$label];
                        }
                    }
                }
            }
        }
    }

    /**
     * Converts a class name into a HTML ID.
     * For example, 'PostTag' will be converted as 'post-tag'.
     * @param string $name the string to be converted
     * @return string the resulting ID
     */
    public static function class2id($name) {
        $nameWithoutNumber = preg_replace('/\d/', '', $name);
        if (!ctype_upper($nameWithoutNumber)) {
            $spacedWord = preg_replace('/(?<![A-Z])[A-Z]/', ' \0', $name);
            $words = explode(' ', trim($spacedWord, ' '));
            $words[0] = strtolower($words[0]);
            $nameID = "";
            foreach ($words as $word) {
                $nameID .= $word;
            }
        } else {
            $nameID = $name;
        }
        return $nameID;
    }

    /**
     * Converts a class name into space-separated words.
     * For example, 'PostTag' will be converted as 'Post Tag'.
     * @param string $name the string to be converted
     * @param boolean $ucwords whether to capitalize the first letter in each word
     * @return string the resulting words
     */
    public static function class2name($name, $ucwords = true) {
        $nameWithoutNumber = preg_replace('/\d/', '', $name);
        if (!ctype_upper($nameWithoutNumber)) {
            $result = trim(strtolower(str_replace('_', ' ', preg_replace('/(?<![A-Z])[A-Z]/', ' \0', $name))));
        } else {
            $result = $name;
        }
        return $ucwords ? ucwords($result) : $result;
    }

    /**
     * Converts a class name into a variable name with the first letter in lower case.
     * This method is provided because lcfirst() PHP function is only available for PHP 5.3+.
     * @param string $name the class name
     * @return string the variable name converted from the class name
     * @since 1.1.4
     */
    public static function class2var($name) {
        $nameWithoutNumber = preg_replace('/\d/', '', $name);
        if (!ctype_upper($nameWithoutNumber)) {
            $name[0] = strtolower($name[0]);
        }
        return $name;
    }

    /**
     * Split the commas and make the first value inside strong HTML tag and
     * the rest will be inside small HTML tag
     * @param string $title comma separated title
     * @return string HTML formed of title
     */
    public static function titleHTML($title) {
        $subTitles = explode(",", $title);
        $html = CHtml::tag('strong', array('class'=>'title'), $subTitles[0]);
        return $html . "<br/>" . CHtml::tag('small', array('class'=>'title'), implode(" ", array_slice($subTitles, 1)));
    }

}

?>
