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
        $a = $this->allPossible($a);
        $b = $this->allPossible($b);

        return $this->placementStartEnd($this->elimination($a, $b));
    }

    private function placementStartEnd(array $result)
    {
        $ranges = [];
        foreach ($result as $ar) {
            $ranges["start"][] = $ar["coordinates"][0];
            $ranges["end"][] = $ar["coordinates"][1];
        }
        // dd($ranges);
        // die();
        return $ranges;
    }

    private function elimination(array $mainArr, array $compareArr)
    {
        $eList = [];
        $reList = [];

        foreach ($mainArr as $key => $value) {
            $compareKey = array_search(
                $mainArr[$key]['string'],
                array_column($compareArr, 'string')
            );


            if (!($compareKey === false)) {
                $eList[] = $mainArr[$compareKey];
                dd($mainArr[$compareKey]["coordinates"]);
                foreach ($mainArr as $index => $val) {
                    if (($mainArr[$compareKey]["coordinates"][0] <=
                            $val["coordinates"][1])
                        && ($mainArr[$compareKey]["coordinates"][1] >=
                            $val["coordinates"][0])
                    ) {
                        $reList[] = $mainArr[$index];
                        unset($mainArr[$index]);
                    }
                }
            }
        }
        // dd($mainArr);
        die();
        return $mainArr;
    }

    private function allPossible(array $arr)
    {
        $perms = [];
        $i = 0;
        while (count($arr) != 0) {
            $tempo = $arr;
            while (count($tempo) != 0) {
                $perms[] = [
                    "string" => implode("", $tempo),
                    "coordinates" => [
                        $i,
                        $i + count($tempo) - 1,
                    ],
                ];
                array_pop($tempo);
            }
            $i++;
            array_shift($arr);
        }

        return $this->arrangeValues($perms);
    }

    private function arrangeValues($arr, $way = SORT_ASC)
    {
        array_multisort(
            array_map(
                'strlen',
                array_column($arr, 'string')
            ),
            $way,
            $arr
        );

        return $arr;
    }
}
