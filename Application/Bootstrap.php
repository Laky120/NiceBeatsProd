<?php

//require_once 'core/Autoloader.php';
//spl_autoload_register(['Core\Autoloader', 'autoloader']);
//Route::start(); // запускаем маршрутизатор

use Core\Route;

require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/route.php';
Route::start(); // запускаем маршрутизатор