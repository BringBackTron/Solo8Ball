<?php

/**
 * Class generatorValidation
 * Represents an generatorValidation object of validation functions
 * @author Jean-Kenneth Antonio
 * @author George Mcmullen
 * @version 0.001
 */
class generatorValidation{
    static function validateTime($time): bool
    {
        return $time != 0;
    }
}
