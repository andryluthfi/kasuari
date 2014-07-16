<?php

/**
 * Description of DataController
 * @author Andry Luthfi
 */
class DataController extends ControllerAdministrator {

    public $layout = "/layouts/sub-parent/parent-sidebar";

    /**
     * List of all Data/Table listed in Database or Display Spesific Data
     * on single model based given model's name
     * @param string $modelName model's name
     */
    public function actionIndex($modelName = null) {
        if ($modelName) {
            $dataProvider = Business::loads($modelName, false, isset($_GET[$modelName]) ? array('compares' => $_GET[$modelName]) : array());
            $modelClass = new $modelName('search');
            if (isset($_GET[$modelName])) {
                $modelClass->attributes = $_GET[$modelName];
            }
            $renderFunction = isset($_GET['partial']) ?
                    (intval($_GET['partial']) > 0 ? 'renderPartial' : 'render') : 'render';

            $this->$renderFunction('manage', array(
                'modelName' => $modelName,
                'modelClass' => $modelClass,
                'dataProvider' => $dataProvider
            ));
        } else {
            $this->render('index');
        }
    }

    /**
     * Insert single data on specified model based on given model's name
     * @param string $modelName model's name
     */
    public function actionInsert($modelName) {
        $model = new $modelName;

        if (isset($_POST[$modelName])) {
            $model->updateAttributes($_POST[$modelName]);
            if ($model->save()) {
                $this->redirect(array('index', 'modelName' => $modelName));
            }
        }

        $this->render('insert', array(
            'modelName' => $modelName,
            'form' => new CActiveForm,
            'model' => $model
        ));
    }

    /**
     * Insert single data on specified model based on given model's name
     * @param string $modelName model's name
     * @throws CHttpException if there isn't any related data
     */
    public function actionView($modelName) {
        $primaryParameterValue = $this->primaryParameterValue($modelName);
        $primaryParameterName = $this->primaryParameterName($modelName);

        $model = $modelName::model()->findByPk($primaryParameterValue);

        if ($model) {
            $this->initJS(array(
                'coreURL' => $this->createUrl('/administration/data/{model}')
                    ), array(
                'baseModel' => $modelName,
                'primaryKeyName' => $primaryParameterName,
                'primaryKeyValue' => $primaryParameterValue,
            ));
            $this->render('view', array(
                'modelName' => $modelName,
                'model' => $model
            ));
        } else {
            throw new CHttpException(404, "Maaf, $modelName dengan $primaryParameterName $primaryParameterValue yang diberikan, tidak terdapat di basis data");
        }
    }

    /**
     * Update single data on specified model based on given model's name
     * @param string $modelName model's name
     * @throws CHttpException if there isn't any related data
     */
    public function actionUpdate($modelName) {
        $primaryParameterValue = $this->primaryParameterValue($modelName);
        $primaryParameterName = $this->primaryParameterName($modelName);

        $model = $modelName::model()->findByPk($primaryParameterValue);
        $model->scenario = 'update-model';
        $model->afterFind();

        if ($model) {
            if (isset($_POST[$modelName])) {
                $model->updateAttributes($_POST[$modelName]);
                if ($model->save()) {
                    $this->redirect(array('index', 'modelName' => $modelName));
                }
            }

            $this->render('insert', array(
                'modelName' => $modelName,
                'form' => new CActiveForm,
                'model' => $model
            ));
        } else {
            throw new CHttpException(404, "Maaf, $modelName dengan $primaryParameterName $primaryParameterValue yang diberikan, tidak terdapat di basis data");
        }
    }

    /**
     * Delete single data on specified model based on given model's name
     * @param string $modelName model's name
     * @throws CHttpException if there isn't any related data
     */
    public function actionDelete($modelName) {
        $primaryParameterValue = $this->primaryParameterValue($modelName);
        $primaryParameterName = $this->primaryParameterName($modelName);

        $model = $modelName::model()->findByPk($primaryParameterValue);

        if ($model) {
            if ($model->delete()) {
                $this->redirect(array('index', 'modelName' => $modelName));
            }
        } else {
            throw new CHttpException(404, "Maaf, $modelName dengan $primaryParameterName $primaryParameterValue yang diberikan, tidak terdapat di basis data");
        }
    }

    /**
     * Get the primary paramter value such as ID for indentify single Model.
     * @param string $modelName model's name
     * @return string primary paramter value
     */
    protected function primaryParameterValue($modelName) {
        $primaryKey = false;
        $primaryParameterValue = $this->primaryParameterName($modelName);
        $possibleParameters = array($_POST, $_GET);
        foreach ($possibleParameters as $parameter) {
            if (isset($parameter[$primaryParameterValue])) {
                $primaryKey = $parameter[$primaryParameterValue];
                if ($primaryKey) {
                    break;
                }
            }
        }
        return $primaryKey;
    }

    /**
     * Get the primary paramter name such as ID for indentify single Model.
     * @param string $modelName model's name
     * @return string primary paramter name
     */
    protected function primaryParameterName($modelName) {
        $modelClass = new $modelName;
        return $modelClass->tableSchema->primaryKey;
    }

    /**
     * Give the best candidate label / suggest a label for represent single
     * Model
     * @param string $modelName model's name
     * @param boolean $isBestChoice make sure the label is best candidate
     * @return string model's best candidate label
     */
    protected function suggestLabel($modelName, $isBestChoice = false) {
        $bestCandidateLabel = null;
        $modelClass = is_string($modelName) ? new $modelName : $modelName;
        $attributeLabels = array_keys($modelClass->attributeLabels());

        // best candidate
        foreach ($attributeLabels as $label) {
            if (preg_match('/.*(name|title).*/', $label)) {
                $bestCandidateLabel = $label;
                break;
            }
        }

        // alternative candidate
        foreach ($modelClass->relationsBelong() as $relationInfo) {
            $candidate = $this->suggestLabel($relationInfo[1], true);
            if ($candidate) {
                $bestCandidateLabel = $candidate;
                break;
            }
        }


        // worst candidate
        if (!$isBestChoice) {
            if (!$bestCandidateLabel) {
                foreach ($attributeLabels as $label) {
                    if (preg_match('/.*(URL).*/', $label)) {
                        $bestCandidateLabel = $label;
                        break;
                    }
                }
            }

            if (!$bestCandidateLabel) {
                foreach ($attributeLabels as $label) {
                    if (preg_match('/.*([dD]ate).*/', $label)) {
                        $bestCandidateLabel = $label;
                        break;
                    }
                }
            }


            if (!$bestCandidateLabel) {
                foreach ($attributeLabels as $label) {
                    if (preg_match('/.*(ID).*/', $label)) {
                        $bestCandidateLabel = $label;
                        break;
                    }
                }
            }
        }

        return $bestCandidateLabel;
    }

}
