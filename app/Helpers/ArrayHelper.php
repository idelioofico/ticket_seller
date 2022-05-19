<?php

namespace App\Helpers;


use Illuminate\Support\Str;

class ArrayHelper
{

    public static function ValidateKeyData($key, $array)
    {
        $data = null;
        if (isset($array[$key]))
            $data = !empty($array[$key]) ? $array[$key] : null;
        return $data;
    }
}
