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
     * @description Получаем все данные
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

    /**
     * @description Получаем данные по id
     *
     * @param string $tableName
     * @param int $id
     *
     * @return array
     */
    public function getById(string $tableName, int $id): array
    {
        return $this->mysqli
            ->query('SELECT * FROM `' . $tableName . '` WHERE `id` = ' . $id)
            ->fetch_array(MYSQLI_ASSOC);
    }

    /**
     * @description Добавляем новые строки в выбранную таблицу
     *
     * @param string $tableName
     * @param array $newRow
     *
     * @return void
     */
    public function create(string $tableName, array $newRow): void
    {
        $imlodeArrayKyes = implode("`, `", array_keys($newRow));
        $imlodeArray = implode("', '", $newRow);
        $query = ("INSERT INTO `" . $tableName . "`( `". $imlodeArrayKyes ."`) VALUES ('" . $imlodeArray . "')");
        $this->mysqli
            ->query($query);

    }

    /**
     * @description Удаляем строки из таблицы по id
     *
     * @param string $tableName
     * @param int $id
     *
     * @return void
     */
    public function delete(string $tableName, int $id): void
    {
        $this->mysqli
            ->query('DELETE FROM `' . $tableName . '` WHERE `id` = ' . $id);
    }

    /**
     * @description Обновляем данные в строках по id
     *
     * @param string $tableName
     * @param int $id
     * @param string $name
     * @param string $surname
     * @param int $status
     *
     * @return void
     */
    public function update(string $tableName, int $id, string $name, string $surname, int $status): void
    {
        $this->mysqli
            ->query("UPDATE `" . $tableName . "` SET `name`='" . $name . "', `surname`='" . $surname . "', `status`='" . $status . "' WHERE `id` =" . $id);
    }
}