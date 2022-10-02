<?php

namespace App\Repositories;

use App\Core\Model;
use App\Lib\MySQL;

class Repository
{
    protected Model $model;
    protected MySQL $builder;

    public function __construct()
    {
        $this->builder = new MySQL();

    }

    public function getAll()
    {
        return $this->builder->createQueryBuilder()
            ->select()
            ->from($this->model->getTableName())
            ->all();
    }

}