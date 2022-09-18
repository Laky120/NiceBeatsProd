<?php

namespace Main;

require_once 'Classes/DataBase/MySQL.php';

use Classes\DataBase\MySQL;
use mysqli;

$mysql = new MySQL(new mysqli());

$items = $mysql->getAll('test');
$elem = $mysql->getById('test', 5);
var_dump($elem);
//try {
//    $connect = mysqli_connect('localhost', 'root', '', 'test');
//
//    if ($connect) {
//        echo 'Соединение установлено успешно' . PHP_EOL;
//        $sql = 'SELECT * FROM test';
//        $result = mysqli_query($connect, $sql);
//        $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
//
//        var_dump($items);
//
        foreach ($items as $item) {
            if (isset($item['id'], $item['name'], $item['surname'], $item['status'])) {
                echo
                    'ID: ' . $item['id'] .
                    ' | Name: ' . $item['name'] .
                    ' | Surname: ' . $item['surname'] .
                    ' | Status: ' . ($item['status'] ? 'Active' : 'Not active') . PHP_EOL;
            }
        }
//    }
//
//    mysqli_close($connect);
//} catch (Exception $e) {
//    echo 'Ошибка: Невозможно подключиться к MySQL ' . mysqli_connect_error() . PHP_EOL;
//}