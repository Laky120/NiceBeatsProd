<?php

namespace App\Core;

use App\Lib\Debug;

class View
{
    public $path;
    public $layout = 'default';
    public $route;


    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $this->route['controller'] . '/' . $this->route['action'];
    }

    public function render($title, $vars = []): void
    {
        $path = 'App/Views/' . $this->path . '.php';
        if (file_exists($path)) {
            ob_start();
            require_once $path;
            $content = ob_get_clean();
            require_once 'App/Views/Layouts/' . $this->layout . '.php';
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