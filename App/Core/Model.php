<?php

namespace App\Core;

abstract class Model
{

    protected string $tableName;

    /**
     * @description Получаем название таблицы
     *
     * @return string
     */
    public function getTableName()
    {
        return $this->tableName;
    }

}