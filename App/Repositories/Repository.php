<?php

namespace App\Repositories;

use App\Core\Model;
use App\Lib\MySQL;

class Repository
{
    /**
     * @var Model $model - объект класса Model
     */
    protected Model $model;
    /**
     * @var MySQL $builder - объект класса MySQL
     */
    protected MySQL $builder;

    public function __construct()
    {
        $this->builder = new MySQL();

    }

    /**
     * @description Делает запрос на вывод всех элементов таблицы
     *
     * @return array
     */
    public function getAll(): array
    {
        return $this->builder->createQueryBuilder()
            ->select()
            ->from($this->model->getTableName())
            ->all();
    }

    /**
     * @description Делает запрос на вывод одного элемента из таблицы
     *
     * @return array
     */
    public function getOne(): array
    {
        return $this->builder->createQueryBuilder()
            ->select()
            ->from($this->model->getTableName())
            ->first();
    }

    /**
     * @description Делает запрос на создание нового элемента таблицы
     *
     * @param $createData
     * @return void
     */
    public function create($createData): void
    {
        $this->builder->createQueryBuilder()
            ->insert($createData)
            ->exec();
    }

    /**
     * @description Делает запрос на обновление элемента таблицы
     *
     * @param $updateData
     * @param $field
     * @param $operation
     * @param $value
     * @return void
     */
    public function update($updateData, $field, $operation, $value): void
    {
        $this->builder->createQueryBuilder()
            ->update($updateData)
            ->where($field, $operation, $value)
            ->exec();
    }

    /**
     * @description Делает запрос на удаление элемента таблицы
     *
     * @param $field
     * @param $operation
     * @param $value
     * @return void
     */
    public function delete($field, $operation, $value): void
    {
        $this->builder->createQueryBuilder()
            ->delete()
            ->from($this->model->getTableName())
            ->where($field, $operation, $value)
            ->exec();
    }

}