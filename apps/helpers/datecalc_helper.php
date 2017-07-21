<?php

function date_diff($dx1, $dx2) {
    $diff = array();

    $tmp_d1 = explode(" ", $dx1);
    $tmp_d11 = explode("-", $tmp_d1[0]);
    $tmp_d12 = explode(":", $tmp_d1[1]);

    $d1 = mktime($tmp_d12[0], $tmp_d12[1], $tmp_d12[2], $tmp_d11[1], $tmp_d11[2], $tmp_d11[0]);

    $tmp_d2 = explode(" ", $dx2);
    $tmp_d21 = explode("-", $tmp_d2[0]);
    $tmp_d22 = explode(":", $tmp_d2[1]);
    $d2 = mktime($tmp_d22[0], $tmp_d22[1], $tmp_d22[2], $tmp_d21[1], $tmp_d21[2], $tmp_d21[0]);

    if ($d1 < $d2) {
        $temp = $d2;
        $d2 = $d1;
        $d1 = $temp;
    } else {
        $temp = $d1;
    }

    $d1 = date_parse(date("Y-m-d H:i:s", $d1));
    $d2 = date_parse(date("Y-m-d H:i:s", $d2));

    if ($d1['second'] >= $d2['second']) {
        $diff['second'] = $d1['second'] - $d2['second'];
    } else {
        $d1['minute']--;
        $diff['second'] = 60 - $d2['second'] + $d1['second'];
    }

    if ($d1['minute'] >= $d2['minute']) {
        $diff['minute'] = $d1['minute'] - $d2['minute'];
    } else {
        $d1['hour']--;
        $diff['minute'] = 60 - $d2['minute'] + $d1['minute'];
    }

    if ($d1['hour'] >= $d2['hour']) {
        $diff['hour'] = $d1['hour'] - $d2['hour'];
    } else {
        $d1['day']--;
        $diff['hour'] = 24 - $d2['hour'] + $d1['hour'];
    }

    if ($d1['day'] >= $d2['day']) {
        $diff['day'] = $d1['day'] - $d2['day'];
    } else {
        $d1['month']--;
        $diff['day'] = date("t", $temp) - $d2['day'] + $d1['day'];
    }

    if ($d1['month'] >= $d2['month']) {
        $diff['month'] = $d1['month'] - $d2['month'];
    } else {
        $d1['year']--;
        $diff['month'] = 12 - $d2['month'] + $d1['month'];
    }

    $diff['year'] = $d1['year'] - $d2['year'];
    return $diff;
}
