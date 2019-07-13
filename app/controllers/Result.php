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
$simpleResults = [
    $html->display($arranged["first"], $simpleDiffed, 'first'),
    $html->display($arranged["second"], $simpleDiffed, 'second')
];
$simpleResults = isReversed($arranged["reverse"], $simpleResults);
dd(array_reverse($advanced->allPossible($arranged["first"])));
$advancedDiffed = $advanced->compare($arranged["first"], $arranged["second"]);
if (is_array($advancedDiffed)) {
    $advancedResults = [
        $html->display($arranged["first"], $advancedDiffed, 'first'),
        $html->display($arranged["second"], $advancedDiffed, 'second'),
    ];
    $advancedResults = isReversed($arranged["reverse"], $advancedResults);
}

function isReversed($reverse, $array)
{
    return $reverse ? array_reverse($array) : $array;
}

function dd($var)
{
    echo '<pre>';
    var_dump($var);
    echo '<pre>';
    die();
}
/**
 * View
 */
require 'app/views/result.php';
