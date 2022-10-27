<?php

namespace App\Repositories;

use App\Models\Tables;

class TablesRepository extends Repository
{

    public function __construct()
    {
        $this->model = new Tables();
        parent::__construct();
    }

}