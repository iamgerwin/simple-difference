<?php

require 'app/logics/Differentiate/SimpleDifferentiate.php';
$diffLogic = new SimpleDifferentiate;
$diffLogic->compare('123', '321');
$results = [
    "mariz",
    "gerwin",
];

/**
 * View
 */
require 'app/views/result.php';
