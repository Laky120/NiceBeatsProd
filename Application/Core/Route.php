<?php

namespace Core;

class Route
{
    /**
     * @description Получаем имя контроллера и экшена
     *
     * @return void
     */
    public static function start(): void
    {
        session_start();
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        $controller = self::getController($routes[1]);
        $action = count($routes) <= 2 ? null : $routes[2];
        self::getAction($controller, $action);
    }

    private static function getController($route): Controller
    {
        $controllerName = $route
            ? str_replace('_', '', $route) . 'Controller'
            : 'MainController';
        $controllerFile = strtolower($controllerName) . '.php';
        $controllerPath = "application/controllers/" . $controllerFile;
        if (file_exists($controllerPath)) {
            require_once $controllerPath;
        }
        else {
            Route::ErrorPage404();
        }
        $controllerName = 'Controllers\\' . $controllerName;

        return new $controllerName;
    }

    /**
     * @description Строим имя экшена и ищем его
     *
     * @param Controller $controller
     * @param string|null $route
     *
     * @return void
     */
    private static function getAction(Controller $controller, ?string $route): void
    {
        $action = ($route && $route[0] != '?')
            ? $route . 'Action'
            : 'indexAction';
        if (method_exists($controller, $action)) {
            $controller->beforeAction();
            $controller->$action();
        } else {
            Route::ErrorPage404();
        }
    }

    /**
     * @description Error
     *
     * @return void
     */
    public static function errorPage404(): void
    {
        header('Location: /404/');
        //        Реализовать рендер и сделать реализацию не только 404 ошибку
        //        header('Status: 404 Not Found');
        exit();
    }
}

//class Route
//{
//    static function start(): void
//    {
//        // контроллер и действие по умолчанию
//        $controller_name = 'Main';
//        $action_name = 'index';
//
//        $routes = explode('/', $_SERVER['REQUEST_URI']);
//
//        // получаем имя контроллера
//        if (!empty($routes[1])) {
//            $controller_name = $routes[1];
//        }
//
//        // получаем имя экшена
//        if (!empty($routes[2])) {
//            $action_name = $routes[2];
//        }
//
//        // добавляем префиксы
//        $model_name = 'Model_' . $controller_name;
//        $controller_name = 'Controller_' . $controller_name;
//        $action_name = 'action_' . $action_name;
//
//        // подцепляем файл с классом модели (файла модели может и не быть)
//
//        $model_file = strtolower($model_name) . '.php';
//        $model_path = "application/models/" . $model_file;
//        if (file_exists($model_path)) {
//            include "application/models/" . $model_file;
//        }
//
//        // подцепляем файл с классом контроллера
//        $controller_file = strtolower($controller_name) . '.php';
//        $controller_path = "application/controllers/" . $controller_file;
//        if (file_exists($controller_path)) {
//            include "application/controllers/" . $controller_file;
//        } else {
//            /*
//            правильно было бы кинуть здесь исключение,
//            но для упрощения сразу сделаем редирект на страницу 404
//            */
//            (new Route)->ErrorPage404();
//        }
//
//        // создаем контроллер
//        $controller = new $controller_name;
//        $action = $action_name;
//
//        if (method_exists($controller, $action)) {
//            // вызываем действие контроллера
//            $controller->$action();
//        } else {
//            (new Route)->ErrorPage404();
//        }
//    }
//
//    function ErrorPage404(): void
//    {
//        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
//        header('HTTP/1.1 404 Not Found');
//        header("Status: 404 Not Found");
//        header('Location:' . $host . '404');
//    }
//}