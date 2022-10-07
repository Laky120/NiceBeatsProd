<?php

use App\Lib\Debug;
use App\Repositories\Repository;

session_name('productsUpdate');
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

    $field = $_POST['field'];
    $operation = $_POST['operation'];
    $value = $_POST['value'];

    $builder->update($data, $field, $operation, $value);

    $_SESSION['data'][] = $data;

    $_POST = [];
}
?>
<!DOCTYPE html>
<html lang="ru" prefix="og: http://ogp.me/ns#">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://bootstrap5.ru/examples/sign-in">
    <meta name="description" content="Индивидуальный макет формы и дизайн для простой формы входа.">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors, Alexey Golyagin">
    <meta name="docsearch:language" content="ru">
    <meta name="docsearch:version" content="5.0">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
          integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://bootstrap5.ru/css/docs.css">
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="https://bootstrap5.ru/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="https://bootstrap5.ru/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="https://bootstrap5.ru/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="https://bootstrap5.ru/img/favicons/manifest.json">
    <link rel="mask-icon" href="https://bootstrap5.ru/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="https://bootstrap5.ru/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">
    <!-- Facebook -->
    <meta property="og:url" content="https://bootstrap5.ru/examples/sign-in">
    <meta property="og:title" content="Бесплатный bootstrap 5 шаблон - Вход в систему">
    <meta property="og:description" content="Индивидуальный макет формы и дизайн для простой формы входа.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://bootstrap5.ru/img/examples/sign-in.png">
    <meta property="og:image:type" content="image/jpg">
    <meta property="og:image:width" content="1000">
    <meta property="og:image:height" content="500">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="/css/examples/signin.css" rel="stylesheet">
</head>
<body class="text-center">
<form action="update" class="form-signin" method="post">
    <h1 class="h3 mb-3 font-weight-normal">Пожалуйста введите данные</h1>
    <label for="inputName" class="sr-only">Name</label>
    <input type="text" name="inputName" class="form-control" placeholder="Name" required="" autofocus="">
    </label>
    <label for="inputImage" class="sr-only">Image</label>
    <input type="text" name="inputImage" class="form-control" placeholder="Image" required="">
    </label>
    <label for="inputPrice" class="sr-only">Price</label>
    <input type="number" name="inputPrice" class="form-control" placeholder="Price" required="">
    </label>
    <label for="inputDescription" class="sr-only">Description</label>
    <input type="text" name="inputDescription" class="form-control" placeholder="Description" required="">
    </label>
    <label for="inputStyleId" class="sr-only">Style id</label>
    <input type="number" name="inputStyleId" class="form-control" placeholder="Style id" required="">
    </label>
    <label for="field" class="sr-only">Field</label>
    <input type="text" name="field" class="form-control" placeholder="Field" required="">
    </label>
    <label for="operation" class="sr-only">Operation</label>
    <input type="text" name="operation" class="form-control" placeholder="Operation" required="">
    </label>
    <label for="value" class="sr-only">Value</label>
    <input type="text" name="value" class="form-control" placeholder="Value" required="">
    </label>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Обновить</button>
</form>
<h2>Вы уже обновили записи со следующими значениями: </h2>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <?php
            if (!empty($_SESSION['data'])) {
                foreach ($_SESSION['data'] as $data) {
                    if (isset($data['tableName'])) {
                        unset($data['tableName']);
                    }
                    foreach ($data as $key => $item) {
                        echo '<th>' . $key . '</th>';
                    }
                    break;
                }
            }
            ?>
        </tr>
        </thead>
        <tbody>
        <?php
        if (!empty($_SESSION['data'])) {
            foreach ($_SESSION['data'] as $data) {
                if (isset($data['tableName'])) {
                    unset($data['tableName']);
                }
                echo '<tr>';
                foreach ($data as $key => $item) {
                    echo '<td>' . $item . '</td>';
                }
                echo '</tr>';
            }
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
