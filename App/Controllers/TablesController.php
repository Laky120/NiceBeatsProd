<?php

namespace App\Controllers;

use App\Core\Controller;

class TablesController extends Controller
{
    /**
     * @description Задает название title
     *
     * @return void
     */
    public function indexAction(): void
    {

        $this->view->render('Таблицы');

    }

}