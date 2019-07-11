<?php

class BasicDifference
{
    protected $valueA;
    protected $valueB;

    public function __construct($valueA, $valueB)
    {
        $this->valueA = htmlspecialchars($valueA);
        $this->valueB = htmlspecialchars($valueB);
    }

    public function compare($way = 'difference')
    {
        $arrays = $this->getLargestString($this->valueA, $this->valueB);
        $start = [];
        $end = [];
        $streak = false;

        for ($i = 0; $i <= count($arrays["first"]); $i++) {

            if (count($arrays["first"]) == $i) {
                if ($streak) {
                    $end[] = $i - 1;
                }
                break;
            }

            switch ($way) {
                case 'similar':
                    $method = $arrays["first"][$i] == $arrays["second"][$i];
                    break;
                default: // difference
                    $method = $arrays["first"][$i] != $arrays["second"][$i];
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
            "reverse" => $arrays["reverse"],
            "words" => [$arrays["first"], $arrays["second"]],
            "placement" => [$start, $end]
        ];
    }

    public function display($arr)
    {
        $arrange = (!$arr["reverse"]) ?  [0, 1] : [1, 0];
        $first = $this->htmlDisplay($arr['words'][$arrange[0]], $arr['placement'], 'first');
        $second = $this->htmlDisplay($arr['words'][$arrange[1]], $arr['placement'], 'second');

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

    private function getLargestString($a, $b)
    {
        $a = str_split($a);
        $b = str_split($b);

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
