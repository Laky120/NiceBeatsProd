<?php

namespace Core;
class AutoLoader
{
    /**
     * @description Подключает классы
     *
     * @param string|null $classname
     *
     * @return void
     */
    static function autoloader(?string $classname = null): void
    {
        $dirs = ['application', 'classes'];
        foreach ($dirs as $dir) {
            $path = realpath(__DIR__ . '\\..\\..\\' . $dir . '\\' . $classname . '.php');
            if (file_exists($path)) {
                require_once $path;
                break;
            }
        }
    }
}
