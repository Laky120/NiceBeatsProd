<?php

namespace App\Lib;

class Debug
{

    public function __construct()
    {

    }

    /**
     * @description Простой дебагер, выводит значения переменных
     *
     * @param $data
     * @return array
     */
    public static function dd($data): array
    {
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
        exit;
    }
}


