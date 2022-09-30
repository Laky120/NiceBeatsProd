<?php

namespace Core;

abstract class Controller
{
    /**
     * @var View $builder - объект класса View
     */
    private View $view;

    public function __construct()
    {
        $this->view = new View();
    }
    /**
     * @return View
     */
    public function getView(): View
    {
        return $this->view;
    }
    /**
     * @return void
     */
    public function beforeAction(): void
    {
    }
}

//class Controller {
//
//    public $model;
//    public $view;
//
//    function __construct()
//    {
//        $this->view = new View();
//    }
//
//    function action_index()
//    {
//    }
//}
