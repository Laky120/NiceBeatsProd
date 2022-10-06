<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Repositories\UsersRepository;

class UsersController extends Controller
{

    public function indexAction(): void
    {
        $repository = new UsersRepository;
        $vars = $repository->getAll();

        $this->view->render('Пользователи', $vars);

    }

}