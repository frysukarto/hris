<?php

function socialShareCount($url){
    $fbendpoint = 'https://graph.facebook.com/?ids=' . $url;
    $getfb = json_decode(file_get_contents($fbendpoint),true);

    $fbcomments_count = 0;
    $fbshare_count = 0;
    
    if(count($getfb) > 0){
        $fbshare_count = $getfb[$url]['shares'];
        if(isset($getfb[$url]['comments'])){
            $fbcomments_count = $getfb[$url]['comments'];
        }
    }
    $fbtotal = $fbshare_count + $fbcomments_count;

    $linkedin_endpoint = 'http://www.linkedin.com/countserv/count/share?url=' . $url . '&format=json';
    $getlinkedin = json_decode(file_get_contents($linkedin_endpoint),true);
    $linkedin_share_count = 0;
    if(count($getlinkedin) > 0){
        $linkedin_share_count = $getlinkedin['count'];
    }
    
    $getGPlus = file_get_contents("https://plusone.google.com/_/+1/fastbutton?url=" . urlencode($url));
    $gPlusDoc = new DOMDocument();
    @$gPlusDoc->loadHTML($getGPlus);
    $gPlusCounter = $gPlusDoc->getElementById('aggregateCount');
    $gPlus_share = $gPlusCounter->nodeValue;

    if($gPlus_share == ''){
        $gplus_share_count = 0;
    }else{
        $gplus_share_count = $gPlus_share;
    }
   
    $social_total = $fbtotal + $linkedin_share_count + $gplus_share_count;
    $result = getRound($social_total);
    
    return $result;
}

function getRound($number){
    $k = 1000;
    $m = 1000000;
    $b = 1000000000;

    $getK = $number / $k;
    $getM = $number / $m;
    $getB = $number / $b;

    if($number > $k){
        $output = round($getK,1,PHP_ROUND_HALF_UP) . 'K';
    }elseif($number > $m){
        $output = round($getM,1,PHP_ROUND_HALF_UP) . 'M';
    }elseif($number > $b){
        $output = round($getB,1,PHP_ROUND_HALF_UP) . 'B';
    } else {
        $output = $number;
    }

    return $output;
}

function getAPICount($url){
    $endpoint = 'http://index.sindonews.com/xml/social?url=' . $url;
    $getdata = json_decode(file_get_contents($endpoint),true);
    if($getdata['total'] > 0){
        $total = getRound($getdata['total']);
    } else {
        $total = 0;
    }
    
    return $total;
}