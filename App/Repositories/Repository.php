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

    public function getAll(): array
    {
        return $this->builder->createQueryBuilder()
            ->select()
            ->from($this->model->getTableName())
            ->all();
    }

    public function getOne(): array
    {
        return $this->builder->createQueryBuilder()
            ->select()
            ->from($this->model->getTableName())
            ->first();
    }

    public function create($createData): void
    {
        $this->builder->createQueryBuilder()
            ->insert($createData)
            ->exec();
    }

    public function update($updateData, $field, $operation, $value): void
    {
        $this->builder->createQueryBuilder()
            ->update($updateData)
            ->where($field, $operation, $value)
            ->exec();
    }

    public function delete($field, $operation, $value): void
    {
        $this->builder->createQueryBuilder()
            ->delete()
            ->from($this->model->getTableName())
            ->where($field, $operation, $value)
            ->exec();
    }

}