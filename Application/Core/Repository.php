<?php

namespace Core;

class Repository
{

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
        $query = "INSERT INTO `" . $tableName . "`( `". $fields ."`) VALUES ('" . $values . "')";
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
     * @param array $data
     * @param string $tableName
     *
     * @return void
     */

    public function update(string $tableName, array $data): void
    {

        if(isset($data["id"])){
            $id = $data["id"];
            unset($data["id"]);
            foreach ($data as $key => $value){
                $values[] = "`".$key."` = '".$value."'";
            }
            $values = implode(", ", $values);
            $query = "UPDATE `" . $tableName . "` SET ". $values ." WHERE `id` = " . $id;
            $this->mysqli->query($query);
        }
    }
}