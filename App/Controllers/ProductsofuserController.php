<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Repositories\ProductsofuserRepository;

class ProductsofuserController extends Controller
{

    public function indexAction(): void
    {
        $repository = new ProductsofuserRepository;
        $vars = $repository->getAll();

        $this->view->render('Корзина', $vars);

    }
}