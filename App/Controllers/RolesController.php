<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Repositories\RolesRepository;

class RolesController extends Controller
{

    public function indexAction(): void
    {
        $repository = new RolesRepository;
        $vars = $repository->getAll();

        $this->view->render('Роли', $vars);

    }

}