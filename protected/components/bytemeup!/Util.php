<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Util {

    const KEY_COMMAND = 'bytemeup!';

    public static function formatCurrency($number) {
        return Yii::app()->numberFormatter->formatCurrency($number, "IDR");
    }

    /**
     * @param string $emailAddress
     * @return mixed if true integer otherwise null
     */
    public static function saveEmailAddress($emailAddress) {
        $emailID = null;
        $parseEmail = explode('@', strtolower(trim($emailAddress)));
        if (count($parseEmail) == 2) {
            $domain = Domain::model()->findByAttributes(array('name' => $parseEmail[1]));
            if (!$domain) {
                $domain = new Domain;
                $domain->name = $parseEmail[1];
            }
            if ($domain->save()) {
                $email = new Email;
                $email->username = $parseEmail[0];
                $email->domainID = $domain->ID;
                if ($email->save()) {
                    $emailID = $email->ID;
                } else {
                    if ($domain->isNewRecord) {
                        Domain::model()->deleteByPk($domain->ID);
                    }
                }
            }
        }
        return $emailID;
    }

}

?>
