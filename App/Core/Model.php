<?php

namespace App\Core;

abstract class Model
{

    protected string $tableName;

    public function getTableName()
    {
        return $this->tableName;
    }

}