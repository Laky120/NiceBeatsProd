<?php
namespace Controllers;

use Core\Controller;

class MainController extends Controller
{
    /**
     * @description Подключает общую разметку и разметку для Главной
     *
     * @return void
     */
    public function indexAction()
    {
        $this->getView()->generate('main.php', 'templates\\template.php');
    }
}