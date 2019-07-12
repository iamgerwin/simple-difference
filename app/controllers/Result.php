<?php

require 'app/logics/Arrange/Largest.php';
require 'app/logics/Differentiate/SimpleDifferentiate.php';
require 'app/logics/Display/Html.php';

/**
 * Initialize classes
 */
$largest = new Largest;
$differentiate = new SimpleDifferentiate;
$html = new Html;

/**
 * Steps
 */
$arranged = $largest->arrange(
    str_split(htmlentities($_POST["valueA"])),
    str_split(htmlentities($_POST["valueB"]))
);
$diffed = $differentiate->compare($arranged["first"], $arranged["second"]);
$results = $html->display($arranged, $diffed);

/**
 * View
 */
require 'app/views/result.php';
