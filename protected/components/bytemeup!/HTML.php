<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Collection of overided method/function which already defined in super class,
 * which is CHtml
 *
 * @see CHtml
 * @author Andry Luthfi
 */
class HTML extends CHtml {

    /**
     * basically helps you to add base URL in image source
     * @param string $src image's source without base URL (which is already 
     *                    included)
     * @param string $alt image's alt
     * @param string[] $htmlOptions html options
     */
    public static function image($src, $alt = '', $htmlOptions = array()) {
        return parent::image(Yii::app()->baseUrl . '/' . $src, $alt, $htmlOptions);
    }

}
