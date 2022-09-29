<?php

use Classes\DataBase\MySQL;

require_once "Classes/DataBase/MySQL.php";
$mysql = new MySQL;

//$data = $mysql->createQueryBuilder()
//    ->select()
//    ->from('test')
//    ->all();
$createData = [
    'tableName' => 'test',
    'name' => 'Rider',
    'surname' => 'Fillovskii',
    'status' => 1
];

//$mysql->createQueryBuilder()
//    ->insert($createData)
//    ->exec();

$mysql->createQueryBuilder()
    ->delete()
    ->from('test')
    ->where('id', '=', 54)
    ->exec();

$updateData = [
    'tableName' => 'test',
    'name' => 'Rider',
    'surname' => 'Svorovskiii',
    'status' => 1
];

//$mysql->createQueryBuilder()
//    ->update($updateData)
//    ->where('id', '=', 52)
//    ->exec();