<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BaseModel
 *
 * The followings are the available model relations:
 * @property CActiveRecord $next next instance of this model
 * @property CActiveRecord $previous previous instance of this model
 * 
 * @author Andry Luthfi
 */
class BaseModel extends CActiveRecord {

    public $fieldTypes = array(
        'ID' => false
    );

    /**
     * Return the appropriate field type by lookup through $fieldTypes which
     * defined privately specific for this class.
     * @param string $attributeName looked up attribute's name 
     * @return string appropriate field type
     */
    public function fieldType($attributeName) {
        $fieldType = isset($this->fieldTypes[$attributeName]) ?
                $this->fieldTypes[$attributeName] :
                false;

        if (!$fieldType) {
            // rule based suggestion
            $isRelation = false;
            foreach ($this->relations() as $relationInfo) {
                if ($relationInfo[2] === $attributeName) {
                    $isRelation = true;
                    break;
                }
            }
            if (!$isRelation) {
                if (preg_match('/.*password.*/', $attributeName)) {
                    $fieldType = 'password';
                }
                if (!$fieldType && preg_match('/.*(name|title).*/', $attributeName)) {
                    $fieldType = 'text';
                }
                if (!$fieldType && preg_match('/^is[A-Z]+.*/', $attributeName)) {
                    $fieldType = 'boolean';
                }
                if (!$fieldType && (preg_match('/.*[\w]Date.*/', $attributeName) || preg_match('/^date.*/', $attributeName))) {
                    $fieldType = 'date';
                }
                if (!$fieldType && preg_match('/.*([cC]ontent|[dD]esc).*/', $attributeName)) {
                    $fieldType = 'content';
                }
                if (!$fieldType && preg_match('/.*URL.*/', $attributeName)) {
                    $fieldType = 'file';
                }

                if (!$fieldType && $this->tableSchema->primaryKey !== $attributeName) {
                    $fieldType = 'text';
                }
            }
        }


        return $fieldType;
    }

    /**
     * Define appropriate fieldName by lookup via fieldType function
     * @see fieldType()
     * @param string $attributeName looked up attribute's name
     * @return string field's name
     */
    public function fieldName($attributeName) {
        $name = 'textField';
        switch ($this->fieldType($attributeName)) {
            case 'password':
                $name = 'passwordField';
                break;
            case 'date':
                $name = 'textField';
                break;
            case 'boolean':
                $name = 'checkBox';
                break;
            case 'content':
                $name = 'textArea';
                break;
            case 'file':
                $name = 'fileField';
                break;

            case 0:
            case 'text':
                break;
        }
        return $name;
    }

    /**
     * Basically just update the attributes. Somehow it can be override to 
     * other purposes.
     * @param string[] $attributes attributes that replaced the old one
     */
    public function updateAttributes($attributes) {
        $this->setAttributes($attributes);
    }

    /**
     * Retieve all relation which defined as CHasManyRelation
     * @see CHasManyRelation
     * @see relations()
     * @return string[] relations info on CHasManyRelation relation defined
     *                  in this class
     */
    public function relationsMany() {
        $relations = array();
        foreach ($this->relations() as $relation => $relationInfo) {
            if (strcasecmp($relationInfo[0], 'CHasManyRelation') === 0) {
                $relations[$relation] = $relationInfo;
            }
        }
        return $relations;
    }

    /**
     * Retieve all relation which defined as CBelongsToRelation
     * @see CBelongsToRelation
     * @see relations()
     * @return string[] relations info on CBelongsToRelation relation defined
     *                  in this class
     */
    public function relationsBelong() {
        $relations = array();
        foreach ($this->relations() as $relation => $relationInfo) {
            if (strcasecmp($relationInfo[0], 'CBelongsToRelation') === 0) {
                $relations[$relation] = $relationInfo;
            }
        }
        return $relations;
    }

    /**
     * Character Limiter
     *
     * Limits the string based on the character count.  Preserves complete words
     * so the character count may not be exactly as specified.
     *
     * @access   public
     * @param    string
     * @param    integer
     * @param    string  the end character. Usually an ellipsis
     * @return   string
     */
    public function characterLimiter($str, $n = 500, $end_char = '&#8230;') {
        if (strlen($str) < $n) {
            return $str;
        }

        $str = preg_replace("/\s+/", ' ', str_replace(array("\r\n", "\r", "\n"), ' ', $str));

        if (strlen($str) <= $n) {
            return $str;
        }

        $out = "";
        foreach (explode(' ', trim($str)) as $val) {
            $out .= $val . ' ';

            if (strlen($out) >= $n) {
                $out = trim($out);
                return (strlen($out) == strlen($str)) ? $out : $out . $end_char;
            }
        }
    }

    /**
     * @return string get label on model
     */
    public function getLabelModel() {
        return $this->primaryKey;
    }

    /**
     * Retrieves grid view attribute name
     * @return mixed grid view attribute name
     */
    public function gridViewAttributeNames() {
        $names = $this->attributeNames();
        $gridViewName = array();
        $belongs = $this->relationsBelong();

        foreach ($names as $attributName) {
            $value = "\$data->$attributName";
            foreach ($belongs as $relationName => $belong) {
                if ($belong[2] === $attributName) {
                    $value = "\$data->$relationName" . "->labelModel";
                }
            }
            $gridViewName[] = array(
                'name' => $attributName,
                'value' => $value
            );
        }
        return $gridViewName;
    }

    /**
     * IOveride on child
     * @return boolean status of success
     */
    public function afterFindInternal() {
        return parent::afterFindInternal();
    }

    /**
     * Overide on child
     * @return boolean status of success
     */
    public function afterFind() {
        return parent::afterFind();
    }

    /**
     * Get next instance of this model
     * @return CActiveRecord get next instance of this model
     */
    public function getNext() {
        return $this->getAttribute('ID') ? $this->model()->find(array('condition' => 'ID > :currentID', 'params' => array(':currentID' => $this->getAttribute('ID')))) : null;
    }

    /**
     * Get previous instance of this model
     * @return CActiveRecord get next instance of this model
     */
    public function getPrevious() {
        return $this->getAttribute('ID') ? $this->model()->find(array('condition' => 'ID < :currentID', 'params' => array(':currentID' => $this->getAttribute('ID')))) : null;
    }

    /**
     * Finds a single active record with the specified primary key.
     * Validate whether the model is not found, then it will throws into
     * CHttpException
     * See {@link find()} for detailed explanation about $condition and $params.
     * @param mixed $pk primary key value(s). Use array for multiple primary keys. For composite key, each key value must be an array (column name=>column value).
     * @param mixed $condition query condition or criteria.
     * @param array $params parameters to be bound to an SQL statement.
     * @return BaseModel the record found. Null if none is found.
     */
    public function findByPk($pk, $condition = '', $params = array(), $isHandleException=true) {
        $model = parent::findByPk($pk, $condition, $params);
        if($isHandleException && !$model) {
            throw new CHttpException(404, "Maaf data yang dicari tidak ditemukan");
        }
        return $model;
    }

}
