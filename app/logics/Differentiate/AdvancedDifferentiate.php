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
        $base = $arr;
        $perms = [];

        while (count($arr) != 0) {
            $tempo = $arr;
            while (count($tempo) != 0) {
                dd(current($tempo));
                $perms[] = [implode("", $tempo) => [
                    array_search(reset($tempo), $base),
                    array_search(end($tempo), $base)
                ]];
                array_pop($tempo);
            }
            array_shift($arr);
        }
        return $perms;
    }
}
