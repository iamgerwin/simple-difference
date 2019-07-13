<?php
require_once 'app/logics/Differentiate/DifferentiateInterface.php';

class AdvancedDifferentiate implements DifferentiateInterface
{
    /**
     * Concrete advanced logic for identifying the difference of to arrays
     *  Array $a, $b
     *  @return array [
     *                 "first" => [array "start", array "end"],
     *                 "second" => [array "start", array "end"],
     *                ]
     */
    public function compare(array $a, array $b)
    {
        dd($this->allPossible(['a', 'b', 'c']));
    }

    public function allPossible(array $arr)
    {
        $perms = [];
        $i = 0;
        while (count($arr) != 0) {
            $tempo = $arr;
            while (count($tempo) != 0) {
                $perms[implode("", $tempo)] = [
                    $i,
                    $i + count($tempo) - 1,
                ];
                array_pop($tempo);
            }
            $i++;
            array_shift($arr);
        }
        return $perms;
    }
}
