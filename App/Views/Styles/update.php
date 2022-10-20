<?php

use App\Lib\Debug;
use App\Repositories\Repository;

session_name('stylesUp');
session_start();

$builder = new Repository;

if (!empty($_POST)) {

    $data = ['tableName' => 'styles',
        'name' => $_POST['inputName'],
    ];

    $field = $_POST['field'];
    $operation = $_POST['operation'];
    $value = $_POST['value'];

    $builder->update($data, $field, $operation, $value);

    $_SESSION['data'][] = $data;
    $_POST = [];
}
?>
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top border-bottom">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="/styles/index">
                        <button class="btn btn-sm btn-secondary" type="button">Назад</button>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
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
                    <input type="text" name="field" class="form-control" placeholder="Field" required="">
                </div>
                <div class="input-wrapper">
                    <input type="text" name="operation" class="form-control" placeholder="Operation" required="">
                </div>
                <div class="input-wrapper">
                    <input type="text" name="value" class="form-control" placeholder="Value" required="">
                </div>
                <div class="button-wrapper">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Создать</button>
                </div>
            </form>
        </div>
    </section>
</main>


