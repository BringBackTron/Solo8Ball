<?php

//turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

class generatorValidation{
    static function validateTime($time): bool
    {
        return $time != 0;
    }
}
