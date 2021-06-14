<?php

class generatorValidation{
    static function validateTime($time): bool
    {
        return $time != 0;
    }
}
