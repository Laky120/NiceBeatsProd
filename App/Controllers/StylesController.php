<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Repositories\StylesRepository;

class StylesController extends Controller
{

    /**
     * @description Делает запрос на  все данные из таблицы и задает название title
     *
     * @return void
     */
    public function indexAction(): void
    {
        $repository = new StylesRepository;
        $vars = $repository->getAll();

        $this->view->render('Стили', $vars);

    }

    /**
     * @description Задает название title
     *
     * @return void
     */
    public function createAction(): void
    {

        $this->view->render('Стили');

    }

    /**
     * @description Задает название title
     *
     * @return void
     */
    public function updateAction(): void
    {

        $this->view->render('Стили');

    }

}