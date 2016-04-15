#!/usr/bin/env php
<?php

if (!isset($argv[1])) {
    die('Specify file' . PHP_EOL);
}

/**
 * Get file as an array and remove empty lines
 * @param string $file
 * @return array $ary
 */
function getFileAsAry($file) {

    if (!file_exists($file)) {
        return false;
    }
    $handle = fopen($file, "r");
    $ary = [];
    while (!feof($handle)) {
        $str = fgets($handle);
        $str = trim($str);
        if (empty($str)) {
            continue;
        }

        $ary[] = $str;
    }
    return $ary;
}

/**
 * Trim all lines
 * @param array $ary
 * @return array $ary
 */
function trimStr ($ary) {
    foreach ($ary as $key => $val) {
        $ary[$key] = trim($val);
    }
    return $ary;
}

/**
 * Remove '-' and return string
 * @param array $ary
 * @return string $str
 */
function getStr ($ary) {
    $ret = '';
    foreach ($ary as $val) {
        if (endsWith($val, '-')) {
            $val = rtrim($val, '-');
            $ret.=$val;
        } else {
            // $val = rtrim($val, '-');
            $ret.= $val . "\n";
        }
    }
    return $ret;
}

/**
 * endsWith
 * @param string $haystack
 * @param string $needle
 * @return boolean $res
 */
function endsWith($haystack, $needle) {
    // search forward starting from end minus needle length characters
    return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== false);
}

$ary = getFileAsAry($argv[1]);
$ary = trimStr($ary);
$str = getStr($ary);

// rm double lines
echo preg_replace("/(\r?\n){2,}/", "\n", $str);


