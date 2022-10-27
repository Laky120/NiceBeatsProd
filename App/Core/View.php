<?php

namespace App\Core;

use App\Lib\Debug;

class View
{
    /**
     * @var string $path - путь
     */
    public string $path;

    /**
     * @var string $layout - шаблон
     */
    public string $layout = 'default';

    /**
     * @var array $route - контроллер и action
     */
    public array $route;


    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $this->route['controller'] . '/' . $this->route['action'];
    }

    /**
     * @description Подключает шаблон и view
     *
     * @param $title
     * @param $vars
     * @return void
     */
    public function render($title, $vars = []): void
    {
        $path = 'App/Views/' . $this->path . '.php';
        if (file_exists($path)) {
            require_once 'App/Views/Templates/Admin/template.php';
        } else {
//            View::errorCode(404);
        }
    }

    /**
     * @description Перебрасывает на другую страницу
     *
     * @param $url
     * @return void
     */
    public function redirect($url): void
    {
        header('location: ' . $url);
        exit;
    }

    /**
     * @description Выводит страницу ошибки
     *
     * @param $code
     * @return void
     */
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