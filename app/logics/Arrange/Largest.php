<?php
require 'app/logics/Arrange/ArrangeInterface.php';

class Largest implements ArrangeInterface
{
    /**
     * Arrange first and second array and tag if reversed
     * String $a, $b
     * @return array [array "first", array "second", bool "reverse"]
     */
    public function arrange(array $a, array $b)
    {
        if (count($a) >= count($b)) {
            return [
                "first" => $a,
                "second" => $b,
                "reverse" => false,
            ];
        } else {
            return [
                "first" => $b,
                "second" => $a,
                "reverse" => true,
            ];
        }
    }
}
