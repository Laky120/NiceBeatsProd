<?php

namespace App\Lib;

use PDO;

class MySQL
{
    private const HOSTNAME = 'localhost';
    private const USERNAME = 'root';
    private const PASSWORD = '';
    private const DATABASE = 'nicebeatsprod';

    /**
     * @var PDO $builder - объект класса PDO
     */
    private PDO $builder;
    private string $query;


    public function __construct()
    {
        $this->builder = new PDO('mysql:host=' . self::HOSTNAME . ';dbname=' . self::DATABASE, self::USERNAME, self::PASSWORD);
    }
    /**
     * @description Начало запроса
     *
     * @return MySQL
     */
    public function createQueryBuilder(): MySQL
    {
        $this->query = "";
        return $this;
    }
    /**
     * @description Выбирает какие колонки выведет запрос
     *
     * @param array $fields
     *
     * @return MySQL
     */
    public function select(array $fields = []): MySQL
    {
        $query = "SELECT " . ($fields
                ? implode(", ", $fields)
                : "*");
        $this->query .= $query;
        return $this;
    }
    /**
     * @description Добовляет новые записи
     *
     * @param array $data
     *
     * @return MySQL
     */
    public function insert(array $data): MySQL
    {
        if (isset($data['tableName'])) {
            $tableName = $data['tableName'];
            unset($data['tableName']);
        }
        $fields = implode(", ", array_keys($data));
        $values = implode("', '", $data);
        $query = "INSERT INTO " . $tableName . " (" . $fields . ") VALUES ('" . $values . "')";
        $this->query .= $query;
        return $this;
    }
    /**
     * @description Удаляет записи
     *
     * @return MySQL
     */
    public function delete(): MySQL
    {
        $query = "DELETE";
        $this->query .= $query;
        return $this;
    }
    /**
     * @description Обновляет записи
     *
     * @param array $data
     *
     * @return MySQL
     */
    public function update(array $data): MySQL
    {
        if (isset($data['tableName'])) {
            $tableName = $data['tableName'];
            unset($data['tableName']);
        }

        foreach ($data as $key => $value) {
            $records[] = " " . $key . " = '" . $value . "' ";
        }
        $records = implode(",", $records);
        $query = "UPDATE " . $tableName . " SET " . $records;
        $this->query .= $query;
        return $this;
    }
    /**
     * @description Выбирает в какой таблице будет производиться запрос
     *
     * @param string $tableName
     *
     * @return MySQL
     */
    public function from(string $tableName): MySQL
    {
        $query = " FROM " . $tableName;
        $this->query .= $query;
        return $this;
    }
    /**
     * @description Выбирает записи по id
     *
     * @param string $field
     *
     * @param string $operation
     *
     * @param mixed $value
     *
     * @return MySQL
     */
    public function where(string $field, string $operation, mixed $value): MySQL
    {
        $query = " WHERE " . $field . " " . $operation . " " . $value;
        $this->query .= $query;
        return $this;
    }
    /**
     * @description Выполняет запрос и выводит результат запроса (все записи)
     *
     * @return array
     */
    public function all(): array
    {
        return $this->builder->query($this->query)->fetchAll(PDO::FETCH_ASSOC);
    }
    /**
     * @description Выполняет запрос и выводит результат запроса (одна запись)
     *
     * @return array
     */
    public function first(): array
    {
        return $this->builder->query($this->query)->fetch(PDO::FETCH_ASSOC);
    }
    /**
     * @description Выполняет  запрос
     *
     * @return void
     */
    public function exec(): void
    {
        $this->builder->exec($this->query);
    }


}
