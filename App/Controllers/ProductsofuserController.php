<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Repositories\ProductsofuserRepository;

class ProductsofuserController extends Controller
{

    /**
     * @description Делает запрос на  все данные из таблицы и задает название title
     *
     * @return void
     */
    public function indexAction(): void
    {
        $repository = new ProductsofuserRepository;
        $vars = $repository->getAll();

        $this->view->render('Корзина', $vars);

    }

    /**
     * @description Задает название title
     *
     * @return void
     */
    public function createAction(): void
    {

        $this->view->render('Корзина');

    }

    /**
     * @description Задает название title
     *
     * @return void
     */
    public function updateAction(): void
    {

        $this->view->render('Корзина');

    }
}