<?php

use App\Lib\Debug;
use App\Repositories\Repository;

session_name('users');
session_start();

$builder = new Repository;

if (!empty($_POST)) {

    $data = ['tableName' => 'users',
        'login' => $_POST['inputLogin'],
        'password' => $_POST['inputPassword'],
        'image' => $_POST['inputImage'],
        'role_id' => $_POST['inputRoleId'],
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
                        <input type="text" name="inputLogin" class="form-control" placeholder="Login" required=""
                               autofocus="">
                </div>
                <div class="input-wrapper">
                        <input type="text" name="inputPassword" class="form-control" placeholder="Password" required="">
                </div>
                <div class="input-wrapper">
                        <input type="text" name="inputImage" class="form-control" placeholder="Image" required="">
                </div>
                <div class="input-wrapper">
                        <input type="text" name="inputRoleId" class="form-control" placeholder="Role id" required="">
                </div>
                <div class="button-wrapper">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Создать</button>
                </div>
            </form>
        </div>
    </section>
</main>

