<?php

require_once 'app/logics/Arrange/Largest.php';
require_once 'app/logics/Differentiate/SimpleDifferentiate.php';
require_once 'app/logics/Differentiate/AdvancedDifferentiate.php';
require_once 'app/logics/Display/Html.php';

/**
 * Initialize classes
 */
$largest = new Largest;
$simple = new SimpleDifferentiate;
$advanced = new AdvancedDifferentiate;
$html = new Html;


/**
 * Steps
 */
$arranged = $largest->arrange(
    str_split(($_POST["valueA"])),
    str_split(($_POST["valueB"]))
);

$simpleDiffed = $simple->compare($arranged["first"], $arranged["second"]);
// dd($simpleDiffed);
$simpleResults = [
    $html->display($arranged["first"], $simpleDiffed, 'first'),
    $html->display($arranged["second"], $simpleDiffed, 'second')
];
$simpleResults = isReversed($arranged["reverse"], $simpleResults);

$aDiffed01 = $advanced->compare($arranged["first"], $arranged["second"]);
$aDiffed02 = $advanced->compare($arranged["second"], $arranged["first"]);
// dd($aDiffed02);
// ["start" => [25, 8], "end" => [50, 8]]
$advancedResults = [
    $html->display($arranged["first"], $aDiffed01, 'first'),
    $html->display($arranged["second"], $aDiffed02, 'second'),
];
$advancedResults = isReversed($arranged["reverse"], $advancedResults);

function isReversed($reverse, $array)
{
    return $reverse ? array_reverse($array) : $array;
}

function dd($var)
{
    echo '<pre>';
    var_dump($var);
    echo '<pre>';
    // die();
}

/**
 * View
 */
require 'app/views/result.php';
