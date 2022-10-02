<?php

namespace App\Repositories;

use App\Models\Main;

class MainRepository extends Repository
{

    public function __construct()
    {
        $this->model = new Main;
        parent::__construct();
    }

}