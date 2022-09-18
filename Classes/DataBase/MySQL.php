<?php

namespace Classes\DataBase;

use mysqli;

class MySQL
{
    private const HOSTNAME = 'localhost';
    private const USERNAME = 'root';
    private const PASSWORD = '';
    private const DATABASE = 'test';

    /**
     * @var mysqli $mysqli - объект класса mysqli
     */
    private mysqli $mysqli;


    public function __construct(mysqli $mysqli)
    {
        $this->mysqli = $mysqli;
        $this->mysqli->connect(self::HOSTNAME, self::USERNAME, self::PASSWORD, self::DATABASE);
    }

    /**
     * @description Получаем данные
     *
     * @param string $tableName
     *
     * @return array
     */
    public function getAll(string $tableName): array
    {
        return $this->mysqli
            ->query('SELECT * FROM `' . $tableName . '`')
            ->fetch_all(MYSQLI_ASSOC);
    }

    public function getById(string $tableName, int $id): array
    {
        return $this->mysqli
            ->query('SELECT * FROM `' . $tableName . '` WHERE `id` = ' . $id)
            ->fetch_array(MYSQLI_ASSOC);
    }
}