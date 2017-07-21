<?php

function insertComment($content_id,$channel_id,$hit){
    $CI = & get_instance();
    $CI->load->model('news/mdbnews');
    $CI->mdbnews->insertcomment($content_id,$channel_id,$hit);
}

function updateComment($content_id,$channel_id,$hit){
    $CI = & get_instance();
    $CI->load->model('news/mdbnews');
    $CI->mdbnews->updatecomment($content_id,$channel_id,$hit);
}

function cekComment($content_id,$channel_id){
    $CI = & get_instance();
    $CI->load->model('news/mdbnews');
    $result = $CI->mdbnews->checkcomment($content_id,$channel_id);
    return $result;
}

function grabComment($url){
    $CI = & get_instance();
    $CI->load->library('curl');
    $fb = 'https://graph.facebook.com/?ids=' . $url;
    $getfb = json_decode($CI->curl->simple_get($fb));
    $count = 0;
    if(count($getfb) > 0){
        foreach($getfb as $cfb){
            $count = $cfb->comments;
        }
    }

    return $count;
}

function executeComment($url,$content_id,$channel_id){
    $hit = grabComment($url);
    if($hit > 0){
        $cek = cekComment($content_id,$channel_id);
        if($cek > 0){
            updateComment($content_id,$channel_id,$hit);
        } else {
            insertComment($content_id,$channel_id,$hit);
        }
    }
}
