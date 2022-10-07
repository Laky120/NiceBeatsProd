<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Repositories\UsersRepository;

class UsersController extends Controller
{

    /**
     * @description Делает запрос на  все данные из таблицы и задает название title
     *
     * @return void
     */
    public function indexAction(): void
    {
        $repository = new UsersRepository;
        $vars = $repository->getAll();

        $this->view->render('Пользователи', $vars);

    }

    /**
     * @description Задает название title
     *
     * @return void
     */
    public function createAction(): void
    {

        $this->view->render('Пользователи');

    }

    /**
     * @description Задает название title
     *
     * @return void
     */
    public function updateAction(): void
    {

        $this->view->render('Пользователи');

    }

}