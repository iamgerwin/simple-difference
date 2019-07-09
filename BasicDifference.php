<?php

class BasicDifference
{

    protected $valueA;
    protected $valueB;

    public function __construct($valueA, $valueB)
    {
        $this->valueA = $valueA;
        $this->valueB = $valueB;
    }

    public function compare($way = 'difference')
    {
        $arrayA = str_split($this->valueA);
        $arrayB = str_split($this->valueB);
        $start = [];
        $end = [];
        $streak = false;

        for ($i = 0; $i <= count($arrayA); $i++) {

            if (count($arrayA) == $i) {
                if ($streak) {
                    $end[] = $i - 1;
                }
                break;
            }

            switch ($way) {
                case 'similar':
                    $method = $arrayA[$i] == $arrayB[$i];
                    break;
                default: // difference
                    $method = $arrayA[$i] != $arrayB[$i];
            }

            if ($method) {
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

        return [
            "words" => [$arrayA, $arrayB],
            "placement" => [$start, $end]
        ];
    }

    public function display($arr)
    {
        $first = $this->htmlDisplay($arr['words'][0], $arr['placement'], 'first');
        $second = $this->htmlDisplay($arr['words'][1], $arr['placement'], 'second');
        echo '<link rel="stylesheet" href="main.css">';
        echo '<table class="diff">';
        echo '<tbody>';
        echo '<tr>';
        echo '<td>' . $first . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<td>' . $second . '</td >';
        echo '</tr>';
        echo '</tbody>';
        echo '</table>';
    }

    public function htmlDisplay($words, $placement, $class)
    {
        $response = '';
        $index = 0;

        foreach ($words as $char) {
            if (in_array($index, $placement[0])) {
                $response .= '<span class="' . $class . '">';
            }
            $response .= $char;
            if (in_array($index, $placement[1])) {
                $response .= "</span>";
            }
            $index++;
        }
        return $response;
    }
}
