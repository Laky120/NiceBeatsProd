<?php

use App\Lib\Debug;
use App\Repositories\Repository;

session_name('productsCreate');
session_start();

$builder = new Repository;

if (!empty($_POST)) {

    $data = ['tableName' => 'products',
        'name' => $_POST['inputName'],
        'image' => $_POST['inputImage'],
        'price' => $_POST['inputPrice'],
        'description' => $_POST['inputDescription'],
        'style_id' => $_POST['inputStyleId'],
    ];

    $builder->create($data);

    $_SESSION['data'][] = $data;
    $_POST = [];
}
require_once "App/Views/Templates/Admin/mini-header.php";
?>
<main>
    <section>
        <div class="my-form">
            <form action="create" class="form" method="post">
                <h1 class="h3 mb-3 font-weight-normal">Пожалуйста введите данные</h1>
                <div class="input-wrapper">
                    <input type="text" name="inputName" class="form-control" placeholder="Name" required=""
                           autofocus="">
                </div>
                <div class="input-wrapper">
                    <input type="text" name="inputImage" class="form-control" placeholder="Image" required="">
                </div>
                <div class="input-wrapper">
                    <input type="number" name="inputPrice" class="form-control" placeholder="Price" required="">
                </div>
                <div class="input-wrapper">
                    <input type="text" name="inputDescription" class="form-control" placeholder="Description"
                           required="">
                </div>
                <div class="input-wrapper">
                    <input type="number" name="inputStyleId" class="form-control" placeholder="Style id" required="">
                </div>
                <div class="button-wrapper">
                    <button class="btn btn-lg btn-primary" type="submit">Создать</button>
                </div>
            </form>
        </div>
    </section>
<!--    <section>-->
<!--        --><?php
//        if (!empty($_SESSION['data'])):
//            ?>
<!--            <h2 class="name-table h3 mb-3 font-weight-normal">Вы уже создали записи со следующими значениями: </h2>-->
<!--        --><?php
//        endif;
//        ?>
<!--        <div class="table-responsive my-table">-->
<!--            <table class="table table-striped table-sm table-bordered table-hover table-secondary">-->
<!--                <thead>-->
<!--                <tr>-->
<!--                    --><?php
//                    if (!empty($_SESSION['data'])) {
//                        foreach ($_SESSION['data'] as $data) {
//                            if (isset($data['tableName'])) {
//                                unset($data['tableName']);
//                            }
//                            foreach ($data as $key => $item) {
//                                echo '<th>' . $key . '</th>';
//                            }
//                            break;
//                        }
//                    }
//                    ?>
<!--                </tr>-->
<!--                </thead>-->
<!--                <tbody>-->
<!--                --><?php
//                if (!empty($_SESSION['data'])) {
//                    foreach ($_SESSION['data'] as $data) {
//                        if (isset($data['tableName'])) {
//                            unset($data['tableName']);
//                        }
//                        echo '<tr>';
//                        foreach ($data as $key => $item) {
//                            echo '<td>' . $item . '</td>';
//                        }
//                        echo '</tr>';
//                    }
//                }
//                ?>
<!--                </tbody>-->
<!--            </table>-->
<!--        </div>-->
<!--    </section>-->
</main>
