<?php

namespace App\Core;

use App\Core\View;
use App\Lib\Debug;

class Router
{
    /**
     * @var array $routes - контроллеры и actions
     */
    protected array $routes = [];

    /**
     * @var array $params - actions
     */
    protected array $params = [];

    /**
     * @var int $id - id элемента таблицы
     */
    protected int $id;

    function __construct()
    {
        $arr = require_once 'App/Config/RoutesNew.php';
        foreach ($arr as $key => $val) {
            $this->add($key, $val);
        }
    }

    public function add($route, $params): void
    {
        $route = '#^' . $route . '$#';
        $this->routes[$route] = $params;
    }

    /**
     * @description Ищет нужный контроллер
     *
     * @return bool
     */
    public function match(): bool
    {
        $url = strtok($_SERVER['REQUEST_URI'], '?');
        $elements = explode('/', $url);
        $end = array_pop($elements);
        $key = '';
        if (is_numeric($end)){
            $this->id = $end;
            $url = implode('/',$elements);
            $key = '{id}';
        }

        $url = trim($url, '/');
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {

                $this->params = $params[$key][$_SERVER['REQUEST_METHOD']];
                return true;
            }
        }
        return false;
    }

    /**
     * @description Запускает контроллер
     *
     * @return void
     */
    public function run(): void
    {

        if ($this->match()) {
            $path = 'App\Controllers\\' . ucfirst($this->params['controller']) . 'Controller';
            if (class_exists($path)) {
                $action = $this->params['action'] . 'Action';
                if (method_exists($path, $action)) {
                    $controller = new $path($this->params);
                    $controller->$action();
                } else {
//                    View::errorCode(404);
                }
            } else {
//                View::errorCode(404);
            }
        } else {
//            View::errorCode(404);
        }
    }
}