<?php

if (!function_exists('dd')) {
    /**
     * die & dump helper
     * String var
     *  return void
     */
    function dd($var)
    {
        echo '<pre>';
        echo var_dump($var);
        echo '</pre>';
        die();
    }
}
