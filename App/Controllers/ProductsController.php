<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Repositories\ProductsRepository;

class ProductsController extends Controller
{

    public function indexAction(): void
    {
        $repository = new ProductsRepository;
        $vars = $repository->getAll();

        $this->view->render('Продукты', $vars);

    }

    public function createAction(): void
    {

        $this->view->render('Продукты');

    }

}