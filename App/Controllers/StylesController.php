<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Repositories\StylesRepository;

class StylesController extends Controller
{

    public function indexAction(): void
    {
        $repository = new StylesRepository;
        $vars = $repository->getAll();

        $this->view->render('Стили', $vars);

    }

}