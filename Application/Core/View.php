<?php

namespace Core;

class View
{
    private array $data;

    /**
     * @description Подключает вид
     *
     * @param $contentView
     * @param $templateView
     *
     * @return void
     */
    public function generate($contentView, $templateView): void
    {
        include 'application/views/'.$templateView;
    }

//  не знаю, что это, оставлю на всякий случай
//    public function render($inputName): void
//    {
//        require_once($_SERVER["DOCUMENT_ROOT"].'/application/views/templates/inputs/'.$inputName.'.php');
//    }
}