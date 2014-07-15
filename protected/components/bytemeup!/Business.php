<?php

class Business {
    
   
    /**
     * Business class to retrieve models which match to given properties. 
     * 
     * @param string $modelName model's name in which to be retrieved
     * @param boolean $isArray if true the return value will be array, if it isn't
     *                      then the return value will be CActiveDataProvider
     * @param mixed[] $options comparing attribute name (index) and value 
     *                           (value)
     * @return CActiveRecord[] list of models which retrieved that match
     *                         properties
     */
    public static function loads($modelName, $isArray = false, $options = array()) {

        $criteria = new CDbCriteria;
        if (isset($options['compares']) && count($options['compares']) > 0) {
            foreach ($options['compares'] as $attribute => $value) {
                $matches = null;
                
                if ($value === null || preg_match('/is[ ]*( not)*[ ]+null/', $value, $matches)) {
                    // predefine single condition, whether the condition NULL
                    // falsifiable
                    if (empty($criteria->condition)) {
                        $criteria->condition = sprintf(" $attribute is %s NULL ", (isset($matches[1]) ? ($matches[1]) : ""));
                    } else {
                        $criteria->condition .= sprintf(" AND $attribute is %s NULL ", (isset($matches[1]) ? ($matches[1]) : ""));
                    }
                } else {
                    // custom condition
                    if (strpos($value, "OR")) {
                        if (empty($criteria->condition)) {
                            $criteria->condition = $value;
                        } else {
                            $criteria->condition .= " AND $value ";
                        }
                    } else {
                        // default conditionality, compare attribute
                        $criteria->compare($attribute, $value, !is_numeric($value));
                    }
                }
            }
        }

        if (isset($options['condition'])) {
            $criteria->condition = empty($criteria->condition) ? $options['condition'] : $criteria->condition . " AND " . $options['condition'];
        }
        if (isset($options['with'])) {
            $criteria->together = true;
            $criteria->with = $options['with'];
        }
        if (isset($options['limit']) && is_integer($options['limit'])) {
            $criteria->limit = $options['limit'];
        }
        if (isset($options['offset']) && is_integer($options['offset'])) {
            $criteria->offset = $options['offset'];
        }
        if (isset($options['order'])) {
            $criteria->order = $options['order'];
        }

        $dataProvidersOption = array('criteria' => $criteria);
        if (isset($criterias['isPageable']) && !$criterias['isPageable']) {
            $dataProvidersOption['pagination'] = false;
        }

        return $isArray ? CActiveRecord::model($modelName)->findAll($criteria) : new CActiveDataProvider($modelName, $dataProvidersOption);
    }
    
    
    
    public static function dropDownList($modelName, $valueField, $textField, $options=array()) {
        return CHtml::listData(Business::loads($modelName, true, $options), $valueField, $textField);
    }
}

?>
