<?php

function array_to_xml($data, &$header) {
    foreach ($data as $key => $value) {
        if (is_array($value)) {
            if (!is_numeric($key)) {
                $subnode = $header->addChild("$key");
                array_to_xml($value, $subnode);
            } else {
                array_to_xml($value, $xml_student_info);
            }
        } else {
            $header->addChild("$key", "$value");
        }
    }
}