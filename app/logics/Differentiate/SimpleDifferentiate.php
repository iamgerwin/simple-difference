<?php
require_once 'app/logics/Differentiate/DifferentiateInterface.php';

class SimpleDifferentiate implements DifferentiateInterface
{
    /**
     * Concrete basic logic for identifying the difference of to arrays
     *  Array $a, $b
     *  @return array [array "start", array "end"]
     */
    public function compare(array $a, array $b)
    {
        $start = [];
        $end = [];
        $streak = false;

        for ($i = 0; $i <= count($a); $i++) {

            if (count($a) == $i) {
                if ($streak) {
                    $end[] = $i - 1;
                }
                break;
            }

            if ($a[$i] != $b[$i]) {
                if (!$streak) {
                    $start[] = $i;
                } else {
                    //
                }
                $streak = true;
            } else {
                if ($streak) {
                    $end[] = $i - 1;
                } else {
                    //
                }
                $streak = false;
            }
        }

        return ["start" => $start, "end" => $end];
    }
}
