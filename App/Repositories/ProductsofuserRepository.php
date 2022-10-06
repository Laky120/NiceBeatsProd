<?php

namespace App\Repositories;

use App\Models\Productsofuser;

class ProductsofuserRepository extends Repository
{

    public function __construct()
    {
        $this->model = new Productsofuser();
        parent::__construct();
    }

}