<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Repositories\ProductsRepository;

class ProductsController extends Controller
{

    /**
     * @description Делает запрос на  все данные из таблицы и задает название title
     *
     * @return void
     */
    public function indexAction(): void
    {
        $repository = new ProductsRepository;
        $vars = $repository->getAll();

        $this->view->render('Продукты', $vars);

    }

    /**
     * @description Задает название title
     *
     * @return void
     */
    public function createAction(): void
    {

        $this->view->render('Продукты');

    }

    /**
     * @description Задает название title
     *
     * @return void
     */
    public function updateAction(): void
    {

        $this->view->render('Продукты');

    }

}