#!/usr/bin/env php
<?php

include_once "vendor/autoload.php";
use diversen\file\string;

if (!isset($argv[1])) {
    die('Specify file' . PHP_EOL);
}
$ary = string::getFileAsAry($argv[1]);

function trimStr ($ary) {
    foreach ($ary as $key => $val) {
        $ary[$key] = trim($val);
    }
    return $ary;
}

function rmBind ($ary) {
    foreach ($ary as $key => $val) {
        $ary[$key] = rtrim($val, '-');
    }
    return $ary;
}

function getStr ($ary) {
    $ret = '';
    foreach ($ary as $val) {
        $ret.= $val . "\n";
    }
    return $ret;
}



$ary = trimStr($ary);
$ary = rmBind($ary);
$str = getStr($ary);

// rm double lines
echo preg_replace("/(\r?\n){2,}/", "\n\n", $str);


