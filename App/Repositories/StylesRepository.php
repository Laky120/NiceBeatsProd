<?php

namespace App\Repositories;

use App\Models\Styles;

class StylesRepository extends Repository
{

    public function __construct()
    {
        $this->model = new Styles;
        parent::__construct();
    }

}