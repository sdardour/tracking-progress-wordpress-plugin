<?php

/**
 * @package tracking_progress_wordpress_plugin
 * @version 1.0
 **/

/**
Plugin Name: Tracking Progress
Plugin URI: https://sdardour.com/lab/2020/tracking-progress-wordpress-plugin/
Description: A WordPress Plugin for tracking progress. Requires the Bootstrap Plugin — https://github.com/sdardour/bootstrap-inside-wordpress-plugin/ —. Insert progress bars into WordPress posts and pages using simple shortcodes, e.g.: [planned], [working], [stuck], [finalizing] and [done].
Author: lab@sdardour.com
Version: 1.0
Author URI: https://sdardour.com/lab
 **/

/* --- */

if (!function_exists("add_action")) {
    exit;
}

/* --- */

function SDARDOURCOM_TRACKING_PROGRESS_CHECK_T($custom, $default)
{
    $title = $default;
    if (strlen($custom) > 0) {
        $title = $custom;
    }
    return $title;
}

function SDARDOURCOM_TRACKING_PROGRESS_CHECK_P($custom, $default)
{
    $progress = $default;
    if (strlen($custom) > 0) {
        $p = intval($custom);
        if (($p >= 0) && ($p <= 100)) {
            $progress = strval($p);
        } else {
            $progress = $default;
        }
    }
    return $progress;
}

function SDARDOURCOM_TRACKING_PROGRESS_CHECK_H($custom, $default)
{
    $height = $default;
    if (strlen($custom) > 0) {
        $h = intval($custom);
        if (($h >= 0) && ($h <= 1000)) {
            $height = strval($h);
        } else {
            $height = $default;
        }
    }
    return $height;
}

/* --- */

function SDARDOURCOM_TRACKING_PROGRESS_HTM($color, $title, $progress, $height)
{

    $htm = "<div class=\"bootstrap-inside\">";

    $htm .= "<div class=\"text-" . $color . "\" style=\"margin: 1rem 0; padding: 0.5rem 1rem 1rem 1rem; border: 1px solid #ddd; border-radius: 0.25rem;\">";

    $htm .= "<div class=\"text-" . $color . "\" style=\"margin: 0 0 2.5px 10px;\">" . $title . "</div>";

    $htm .= "<div class=\"progress\" style=\"height: " . $height . "px;\">";

    $att = "class=\"progress-bar progress-bar-striped bg-" . $color . "\" ";
    $att .= "role=\"progressbar\" ";
    $att .= "style=\"width: " . $progress . "%;\" ";
    $att .= "aria-valuenow=\"" . $progress . "\" ";
    $att .= "aria-valuemin=\"0\" ";
    $att .= "aria-valuemax=\"100\"";

    $htm .= "<div " . $att . "></div>";

    $htm .= "</div>";

    $htm .= "</div>";

    $htm .= "</div>";

    return $htm;

}

/* --- */

function SDARDOURCOM_TRACKING_PROGRESS_PLANNED_HTM($atts)
{

    $atts = shortcode_atts(
        array(
            "title"    => "",
            "progress" => "",
            "height"   => "",
        ), $atts
    );

    $color    = "secondary";
    $title    = SDARDOURCOM_TRACKING_PROGRESS_CHECK_T($atts["title"], "Planned");
    $progress = SDARDOURCOM_TRACKING_PROGRESS_CHECK_P($atts["progress"], "30");
    $height   = SDARDOURCOM_TRACKING_PROGRESS_CHECK_H($atts["height"], "20");

    return SDARDOURCOM_TRACKING_PROGRESS_HTM($color, $title, $progress, $height);

}

add_shortcode("planned", "SDARDOURCOM_TRACKING_PROGRESS_PLANNED_HTM");

/* --- */

function SDARDOURCOM_TRACKING_PROGRESS_WORKING_HTM($atts)
{

    $atts = shortcode_atts(
        array(
            "title"    => "",
            "progress" => "",
            "height"   => "",
        ), $atts
    );

    $color    = "info";
    $title    = SDARDOURCOM_TRACKING_PROGRESS_CHECK_T($atts["title"], "Working on it");
    $progress = SDARDOURCOM_TRACKING_PROGRESS_CHECK_P($atts["progress"], "60");
    $height   = SDARDOURCOM_TRACKING_PROGRESS_CHECK_H($atts["height"], "20");

    return SDARDOURCOM_TRACKING_PROGRESS_HTM($color, $title, $progress, $height);

}

add_shortcode("working", "SDARDOURCOM_TRACKING_PROGRESS_WORKING_HTM");

/* --- */

function SDARDOURCOM_TRACKING_PROGRESS_STUCK_HTM($atts)
{

    $atts = shortcode_atts(
        array(
            "title"    => "",
            "progress" => "",
            "height"   => "",
        ), $atts
    );

    $color    = "danger";
    $title    = SDARDOURCOM_TRACKING_PROGRESS_CHECK_T($atts["title"], "Stuck");
    $progress = SDARDOURCOM_TRACKING_PROGRESS_CHECK_P($atts["progress"], "60");
    $height   = SDARDOURCOM_TRACKING_PROGRESS_CHECK_H($atts["height"], "20");

    return SDARDOURCOM_TRACKING_PROGRESS_HTM($color, $title, $progress, $height);

}

add_shortcode("stuck", "SDARDOURCOM_TRACKING_PROGRESS_STUCK_HTM");

/* --- */

function SDARDOURCOM_TRACKING_PROGRESS_FINALIZING_HTM($atts)
{

    $atts = shortcode_atts(
        array(
            "title"    => "",
            "progress" => "",
            "height"   => "",
        ), $atts
    );

    $color    = "primary";
    $title    = SDARDOURCOM_TRACKING_PROGRESS_CHECK_T($atts["title"], "Finalizing");
    $progress = SDARDOURCOM_TRACKING_PROGRESS_CHECK_P($atts["progress"], "90");
    $height   = SDARDOURCOM_TRACKING_PROGRESS_CHECK_H($atts["height"], "20");

    return SDARDOURCOM_TRACKING_PROGRESS_HTM($color, $title, $progress, $height);

}

add_shortcode("finalizing", "SDARDOURCOM_TRACKING_PROGRESS_FINALIZING_HTM");

/* --- */

function SDARDOURCOM_TRACKING_PROGRESS_DONE_HTM($atts)
{

    $atts = shortcode_atts(
        array(
            "title"    => "",
            "progress" => "",
            "height"   => "",
        ), $atts
    );

    $color    = "success";
    $title    = SDARDOURCOM_TRACKING_PROGRESS_CHECK_T($atts["title"], "Done");
    $progress = SDARDOURCOM_TRACKING_PROGRESS_CHECK_P($atts["progress"], "100");
    $height   = SDARDOURCOM_TRACKING_PROGRESS_CHECK_H($atts["height"], "20");

    return SDARDOURCOM_TRACKING_PROGRESS_HTM($color, $title, $progress, $height);

}

add_shortcode("done", "SDARDOURCOM_TRACKING_PROGRESS_DONE_HTM");

/* --- */
