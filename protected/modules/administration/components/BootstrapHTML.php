<?php
/**
 * Description of BootstrapHTML
 *
 * @author Andry Luthfi
 */
class BootstrapHTML extends CHtml {
    
    public static function glpyhLink($url, $glyphID, $content="", $linkHTMLOptions=array()) {
        return CHtml::link(CHtml::tag("span", array("class"=>"glyphicon $glyphID"), $content), $url, $linkHTMLOptions);
    }
}
