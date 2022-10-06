<?php

namespace App\Core;

use App\Lib\Debug;

class View
{
    public string $path;
    public string $layout = 'default';
    public array $route;


    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $this->route['controller'] . '/' . $this->route['action'];
    }

    public function render($title, $vars = []): void
    {
        $path = 'App/Views/' . $this->path . '.php';
        if (file_exists($path)) {
            require_once 'App/Views/Layouts/' . $this->layout . '.php';
            require_once $path;
        } else {
            View::errorCode(404);
        }
    }

    public function redirect($url): void
    {
        header('location: ' . $url);
        exit;
    }

    public static function errorCode($code): void
    {
        $path = 'App/Views/Errors/' . $code . '.php';
        if (file_exists($path)) {
            http_response_code($code);
            require_once $path;
            exit;
        }
    }
}