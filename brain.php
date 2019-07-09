<?php
include 'BasicDifference.php';

$engine = new BasicDifference($_REQUEST['valueA'], $_REQUEST['valueB']);

echo 'similarity';
echo $engine->display($engine->compare('similar'));
echo '<hr>';
echo 'difference';
echo $engine->display($engine->compare('difference'));
