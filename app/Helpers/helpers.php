<?php

function convertNumberJP($number) {
    if ($number === null) {
        return '-';
    }
    $str = "";
    $number0 = intval($number / 100000000);
    $number1 = intval(($number % 100000000) / 10000);
    $number2 = $number % 10000;
    if ($number0) {
        $str .= $number0 . "億";
    }
    if ($number1) {
        $str .= $number1 . "万";
    }
    if ($number2) {
        $str .= $number2;
    }
    if ($str=="") {
        $str = 0;
    }
    
    return $str;
}