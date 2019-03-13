<?php
/*
Plugin Name: tooltip
Description: Plugin for tooltip (shortcode)
Author: JohnT
Version: 1.0.0
*/

function shortcode_infobulle( $atts, $content = null){

    /* [tooltip title="title"]Content[/tooltip] */

    //get attributes
    $atts = shortcode_atts(
        array(
            'title' => '',
            'tooltip' => ''
        ),
        $atts,
        'tooltip'
    );
    $title = ($atts['title'] == '' ? $content : $atts['title'] );

    //return HTML
    return '<span data-tooltip="' . ($content == '' ? $title : $content) . '"><a href="' . $title . '">' . ($content == '' ? $title : $content) . '</a></span>';
}
add_shortcode('tooltip', 'shortcode_infobulle');
?>
