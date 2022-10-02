<?php

namespace App\Lib;

class Debug
{

    public function __construct()
    {

    }

    public static function dd($data): array
    {
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
        exit;
    }
}


