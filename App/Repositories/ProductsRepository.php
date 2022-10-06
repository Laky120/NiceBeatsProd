<?php

namespace App\Repositories;

use App\Models\Products;

class ProductsRepository extends Repository
{

    public function __construct()
    {
        $this->model = new Products;
        parent::__construct();
    }

}