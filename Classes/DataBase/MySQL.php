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
     * @param array $createData
     *
     * @return void
     */
    public function create(string $tableName, array $createData): void
    {
        $fields = implode("`, `", array_keys($createData));
        $values = implode("', '", $createData);
        $query = ("INSERT INTO `" . $tableName . "`( `". $fields ."`) VALUES ('" . $values . "')");
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
     * @param array $updateData
     * @param string $tableName
     *
     * @return void
     */

    public function update(string $tableName, array $updateData): void
    {

        if(isset($updateData["id"])){
            $id = $updateData["id"];
            unset($updateData["id"]);
            foreach ($updateData as $key => $value){
                $records[] = "`".$key."` = '".$value."'";
            }
            $allRecords = implode(", ", $records);
            $query = ("UPDATE `" . $tableName . "` SET ". $allRecords ." WHERE `id` = " . $id);
            $this->mysqli->query($query);
        }
        else {
            echo "пшл нах, введи id";
        }
    }

}