<?php

use App\Lib\Debug;
use App\Repositories\Repository;

session_name('roles');
session_start();

$builder = new Repository;

if (!empty($_POST)) {

    $data = ['tableName' => 'roles',
        'name' => $_POST['inputName'],
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
                <div class="button-wrapper">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Создать</button>
                </div>
            </form>
        </div>
    </section>
</main>

