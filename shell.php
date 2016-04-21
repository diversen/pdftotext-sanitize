#!/usr/bin/env php
<?php

include_once "func.php";

if (!isset($argv[1])) {
    die('Specify file' . PHP_EOL);
}



$ary = getFileAsAry($argv[1]);
$ary = trimStr($ary);
$str = getStr($ary);

echo preg_replace("/(\r?\n){2,}/", "\n", $str);


