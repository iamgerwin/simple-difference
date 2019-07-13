<?php

require_once 'app/logics/Display/DisplayInterface.php';

class Html implements DisplayInterface
{
    /**
     * Concrete implementation for displaying
     * Array $arranged, $diffed
     * @return array []
     */
    public function display(array $letters, array $diffed, string $class)
    {
        $response = null;

        foreach ($letters as $index => $char) {
            if (in_array($index, $diffed["start"])) {
                $response .= '<span class="' . $class . '">';
            }
            $response .= ($char);
            if (in_array($index, $diffed["end"])) {
                $response .= "</span>";
            }
        }
        return $response;
    }
}
