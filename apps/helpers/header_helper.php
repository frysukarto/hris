<?php

function metaname($meta = array(),$newline = "\n"){
    $str = '';
    foreach($meta as $key => $val){
        $str .= '<meta name="' . $key . '" content="' . $val . '">' . $newline;
    }
    return $str;
}

function metafb($meta = array(),$newline = "\n"){
    $str = '';
    foreach($meta as $key => $val){
        $str .= '<meta property="og:' . $key . '" content="' . $val . '">' . $newline;
    }
    return $str;
}

function metafbarticle($meta = array(),$newline = "\n"){
    $str = '';
    foreach($meta as $key => $val){
        $str .= '<meta property="article:' . $key . '" content="' . $val . '">' . $newline;
    }
    return $str;
}

function add_js($js = ''){
    $CI = & get_instance();
    $string = "<script src=\"" . $CI->config->item('template_uri') . $js . "\"></script>\n";
    return $string;
}

function m_add_js($js = ''){
    $CI = & get_instance();
    $string = "<script src=\"" . $CI->config->item('m_template_uri') . $js . "\"></script>\n";
    return $string;
}

function defer_js($js = ''){
    $CI = & get_instance();
    $string = "<script defer type=\"text/javascript\" src=\"" . $CI->config->item('template_uri') . $js . "\"></script>\n";
    return $string;
}

function add_external_js($js = ''){
    $string = "<script type=\"text/javascript\" src=\"" . $js . "\"></script>\n";
    return $string;
}

function add_css($css = ''){
    $CI = & get_instance();
    $string = "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . $CI->config->item('template_uri') . $css . "\" media=\"all\">\n";
    return $string;
}

function m_add_css($css = ''){
    $CI = & get_instance();
    $string = "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . $CI->config->item('m_template_uri') . $css . "\" media=\"all\">\n";
    return $string;
}

function add_external_css($css = ''){
    $string = "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . $css . "\">\n";
    return $string;
}

function addMobileCss($csspath,$type = null){
    $media = (($type != null)) ? "media=\"" . $type . "\"" : "";

    $string = "<link rel=\"stylesheet\" " . $media . " href=\"" . $csspath . "\" type=\"text/css\">\n\t";
    return $string;
}

function addTitle($title){
    $string = "<title>" . $title . "</title>\n";
    return $string;
}

function add_canonical($type,$url){
    $string = "<link rel=\"" . $type . "\" href=\"" . $url . "\">\n";
    return $string;
}
