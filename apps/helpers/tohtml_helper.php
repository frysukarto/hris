<?php

function to_html($string = "") {
    if (trim($string) == "")
        return"";
    $string = nl2br($string);
    $string = html_entity_decode($string);
    $string = stripslashes($string);
    return $string;
}

function clean($value) {
    $value = preg_replace("@[^A-Za-z 0-9\-_'\".,/?:;()&%!<>]+@i", "", $value);
    return $value;
}