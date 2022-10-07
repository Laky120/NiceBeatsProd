<?php

namespace App\Core;

use App\Core\View;
use App\Lib\Debug;

abstract class Controller
{
    /**
     * @var array $route - action
     */
    public array $route;
    /**
     * @var View $view - Объект класса Veiw
     */
    public View $view;
    /**
     * @var mixed|void $model - model
     */
    public $model;

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = new View($route);
        $this->model = $this->loadModel($route['controller']);
    }

    /**
     * @description получаем путь до модели
     *
     * @param $name
     *
     * @return mixed|void
     */
    public function loadModel($name)
    {
        $path = 'App\models\\'.ucfirst($name);
        if (class_exists($path)){
            return new $path;
        }
    }

}