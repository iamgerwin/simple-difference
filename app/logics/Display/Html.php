<?php

require 'app/logics/Display/DisplayInterface.php';

class Html implements DisplayInterface
{
    /**
     * Concrete implementation for displaying
     * Array $arranged, $diffed
     * @return array []
     */
    public function display(array $arranged, array $diffed)
    {
        $results = [];
        $strings = [$arranged["first"], $arranged["second"]];
        $strings = (!$arranged["reverse"]) ?  $strings : array_reverse($strings);
        foreach ($strings as $key => $letters) {
            $response = null;
            $class = (!$key) ? 'first' : 'second';
            foreach ($letters as $index => $char) {
                if (in_array($index, $diffed["start"])) {
                    $response .= '<span class="' . $class . '">';
                }
                $response .= trim($char);
                if (in_array($index, $diffed["end"])) {
                    $response .= "</span>";
                }
            }
            $results[] = $response;
        }

        return $results;
    }
}
