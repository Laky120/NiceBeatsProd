<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Repositories\MainRepository;

class MainController extends Controller
{

    public function indexAction()
    {
        $repository = new MainRepository;
        $vars = $repository->getAll();

        $this->view->render('Главная страница', $vars);


    }
}