<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Repositories\RolesRepository;

class RolesController extends Controller
{

    /**
     * @description Делает запрос на  все данные из таблицы и задает название title
     *
     * @return void
     */
    public function indexAction(): void
    {
        $repository = new RolesRepository;
        $vars = $repository->getAll();

        $this->view->render('Роли', $vars);

    }

    /**
     * @description Задает название title
     *
     * @return void
     */
    public function createAction(): void
    {

        $this->view->render('Роли');

    }

    /**
     * @description Задает название title
     *
     * @return void
     */
    public function updateAction(): void
    {

        $this->view->render('Роли');

    }

}