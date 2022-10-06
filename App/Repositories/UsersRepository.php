<?php

namespace App\Repositories;

use App\Models\Users;

class UsersRepository extends Repository
{

    public function __construct()
    {
        $this->model = new Users;
        parent::__construct();
    }

}