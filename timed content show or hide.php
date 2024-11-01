<?php
/*
Plugin Name: Timed content show or hide
Description: This plugin show or hide the content after a specified time.
Version: 1.0
Author: Tomek
Author URI: http://wp-learning-net
*/

function timed_shortcode( $atts, $content = null ) {
    extract(shortcode_atts(array("time"  => "5000", "visible"  => "no"), $atts));
    if ($visible == "no") {
        echo '<script type="text/javascript">function hideIt() {document.getElementById("timed-content").style.display = "block";};setTimeout("hideIt()", '.$time.');</script>';
        return '<div id="timed-content" style="display:none;">'.$content.'</div>';
    } elseif ($visible == "yes") {
        echo '<script type="text/javascript">function showIt() {document.getElementById("timed-content").style.display = "none";};setTimeout("showIt()", '.$time.');</script>';
        return '<div id="timed-content" style="display:block;">'.$content.'</div>';
    }
}

add_shortcode('timed-content','timed_shortcode');
?>