<?php

namespace Core;

class Validator
{
    public static function body($value, $min = 1, $max = 1000) {
    $value = trim($value);

        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email($value) {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public static function password($value, $min = 1, $max = 50) {
        $value = trim($value);
        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function id($value) {
        return filter_var($value, FILTER_VALIDATE_INT);
    }
}