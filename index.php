<?php

namespace Main;

require_once 'Classes/DataBase/MySQL.php';

use Classes\DataBase\MySQL;
use mysqli;

$mysql = new MySQL(new mysqli());

function getAll1($mysql, $tableName):array
{
    return $mysql->getAll($tableName);
}
function getById($mysql, $tableName, $id)
{
    return $mysql->getById($tableName, $id);
}
function create($mysql, $tableName, $createData): void
{
    $mysql->create($tableName, $createData);
}
function delete($mysql, $id):void
{
    $mysql->delete('test', $id);
}
function update($mysql, $tableName, $updateData): void
{
    $mysql->update($tableName, $updateData);
}
function getAll2($tableName): void
{
    try {
        $connect = mysqli_connect('localhost', 'root', '', 'test');

        if ($connect) {
            echo 'Соединение установлено успешно' . PHP_EOL;
            $sql = 'SELECT * FROM '.$tableName;
            $result = mysqli_query($connect, $sql);
            $items = mysqli_fetch_all($result, MYSQLI_ASSOC);

            foreach ($items as $item) {
                if (isset($item['id'], $item['name'], $item['surname'], $item['status'])) {
                    echo
                        'ID: ' . $item['id'] .
                        ' | Name: ' . $item['name'] .
                        ' | Surname: ' . $item['surname'] .
                        ' | Status: ' . ($item['status'] ? 'Active' : 'Not active') . PHP_EOL;
                }
            }
        }

        mysqli_close($connect);
    } catch (Exception $e) {
        echo 'Ошибка: Невозможно подключиться к MySQL ' . mysqli_connect_error() . PHP_EOL;
    }
}
//var_dump(getAll1($mysql,'test')); /* Выведи все данные таблицы (ООП) */
//getAll2('test');/* Выведи все данные таблицы (процедурный) */
//var_dump(getById($mysql, 'test', 44)); /* Выведи элемент по заданному id из таблицы */

//------------------------------------------------------------------------------------
$createData = [
    "name" => "oper",
    "surname" => "style",
    "status" => 1
];
//create($mysql, 'test', $createData); /* Создай элемент с заданными значениями в таблице */

//------------------------------------------------------------------------------------
$updateData = [
    "id" => 46,
    "name" => "omon",
    "surname" => "228",
    "status" => 1
];
//update($mysql, 'test', $updateData); /* Обнови элемент с новыми заданными значениями в таблице */
//------------------------------------------------------------------------------------

//delete($mysql, 45); /* Удали элемент по заданному id из таблицы */
