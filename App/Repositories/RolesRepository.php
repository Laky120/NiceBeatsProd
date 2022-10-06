<?php

namespace App\Repositories;

use App\Models\Roles;

class RolesRepository extends Repository
{

    public function __construct()
    {
        $this->model = new Roles;
        parent::__construct();
    }

}