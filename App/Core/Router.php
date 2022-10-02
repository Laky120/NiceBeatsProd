<?php

namespace App\Core;

use App\Core\View;

class Router
{
    protected array $routes = [];
    protected array $params = [];

    function __construct()
    {
        $arr = require_once 'App/Config/Routes.php';
        foreach ($arr as $key => $val) {
            $this->add($key, $val);
        }
    }

    public function add($route, $params): void
    {
        $route = '#^' . $route . '$#';
        $this->routes[$route] = $params;
    }

    public function match(): bool
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    public function run(): void
    {
        if ($this->match())
        {
            $path = 'App\Controllers\\' . ucfirst($this->params['controller']) . 'Controller';
            if (class_exists($path))
            {
                $action = $this->params['action'] . 'Action';
                if (method_exists($path, $action))
                {
                    $controller = new $path($this->params);
                    $controller->$action();
                } else {
                    View::errorCode(404);
                }
            } else {
                View::errorCode(404);
            }
        } else {
            View::errorCode(404);
        }
    }
}