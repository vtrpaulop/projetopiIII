<?php

namespace Core;

class Validator
{
    public static function string(string $value, int $min = 0, int $max = 255)
    {
        $value_length = strlen($value);
        if ($value_length < $min || $value_length > 255) {
            return false;
        }

        return filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS);
    }

    public static function email($value, int $min = 0, int $max = 255)
    {
        $value_length = strlen($value);
        if ($value_length < $min || $value_length > 255) {
            return false;
        }

        return filter_var($value, FILTER_SANITIZE_EMAIL);
    }
}