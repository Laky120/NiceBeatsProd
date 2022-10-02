<?php


use App\Core\Router;
use App\Lib\Debug;

function autoLoad($class) {
    $path = str_replace('\\', '/', $class.'.php');
    if (file_exists($path)){
        require_once $path;
    }
}

spl_autoload_register('autoLoad');

session_start();

$router = new Router;
$router -> run();

