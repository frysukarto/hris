<?php

function _slug($sString) {
    $string = strip_tags($sString);
    $string = strtolower($string);
    $string = preg_replace("/&(.)(uml);/", "$1e", $string);
    $string = preg_replace("/&(.)(acute|cedil|circ|ring|tilde|uml);/", "$1", $string);
    $string = preg_replace("/([^a-z0-9]+)/", "-", $string);
    $string = trim($string, "-");
    return $string;
}

function randomString($charNum = 7) {
    $newcode_length = '';
    $newcode = '';
    $codelenght = $charNum;
    while ($newcode_length < $codelenght) {
        $x = 1;
        $y = 3;
        $part = rand($x, $y);
        if ($part == 1) {
            $a = 48;
            $b = 57;
        } // Numbers
        if ($part == 2) {
            $a = 65;
            $b = 90;
        } // UpperCase
        if ($part == 3) {
            $a = 97;
            $b = 122;
        } // LowerCase
        $code_part = chr(rand($a, $b));
        $newcode_length = $newcode_length + 1;
        $newcode = $newcode . $code_part;
    }
    return $newcode;
}



function unique_vistors(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $urlpath = $_SERVER['REQUEST_URI'];

    $unique = $ip . '#' . $_SERVER['HTTP_USER_AGENT'] . '#' . $_SERVER['REQUEST_URI'];
    return base64_encode($unique);
}

function infoServer(){
    if(isset($_SERVER['SERVER_ADDR'])){
        $server = explode('.',$_SERVER['SERVER_ADDR']);
        $serverip = $server[3];
    } else {
        $serverip = 'sn';
    }
    
    return $serverip;
}