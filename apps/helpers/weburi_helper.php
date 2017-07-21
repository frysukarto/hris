<?php

function template_uri() {
    $CI = & get_instance();
    return $CI->config->item('template_uri');
}

function secure_template_uri() {
    $CI = & get_instance();
    return $CI->config->item('secure_template_uri');
}

function m_template_uri() {
    $CI = & get_instance();
    return $CI->config->item('m_template_uri');
}

function secure_m_template_uri() {
    $CI = & get_instance();
    return $CI->config->item('secure_m_template_uri');
}

function images_uri() {
    $CI = & get_instance();
    return $CI->config->item('images_uri');
}

function read_uri() {
    $CI = & get_instance();
    return $CI->config->item('read_uri');
}

function secure_images_uri() {
    $CI = & get_instance();
    return $CI->config->item('secure_images_uri');
}

function tv_images_uri() {
    $CI = & get_instance();
    return $CI->config->item('pendopo_images_uri');
}

function tv_video_uri() {
    $CI = & get_instance();
    return $CI->config->item('pendopo_video_uri');
}

function slug($sString) {
    $string = strip_tags($sString);
    $string = strtolower($string);
    $string = preg_replace("/&(.)(uml);/", "$1e", $string);
    $string = preg_replace("/&(.)(acute|cedil|circ|ring|tilde|uml);/", "$1", $string);
    $string = preg_replace("/([^a-z0-9]+)/", "-", $string);
    $string = trim($string, "-");
    return $string;
}

function utmterm($sString){
    $string = strip_tags($sString);
    $string = strtolower($string);
    $string = preg_replace("/&(.)(uml);/", "$1e", $string);
    $string = preg_replace("/&(.)(acute|cedil|circ|ring|tilde|uml);/", "$1", $string);
    $string = preg_replace("/([^a-z0-9]+)/", "+", $string);
    $string = trim($string, "+");
    $string = rtrim($string,'+');
    return $string;
}