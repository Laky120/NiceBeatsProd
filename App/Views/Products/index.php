<?php

use App\Lib\Debug;
use App\Repositories\Repository;

if (!isset($_SESSION)) {
    session_start();
    echo session_status();
}

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
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://bootstrap5.ru/examples/dashboard">
    <meta name="description"
          content="Базовая оболочка панели администратора с фиксированной боковой панелью и навигационной панелью.">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors, Alexey Golyagin">
    <meta name="docsearch:language" content="ru">
    <meta name="docsearch:version" content="5.0">
    <title>Административная панель</title>
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
    <meta property="og:url" content="https://bootstrap5.ru/examples/dashboard">
    <meta property="og:title" content="Бесплатный bootstrap 5 шаблон административной панели">
    <meta property="og:description"
          content="Базовая оболочка панели администратора с фиксированной боковой панелью и навигационной панелью.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://bootstrap5.ru/img/examples/dashboard.png">
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
    <link href="/css/examples/dashboard.css" rel="stylesheet">
    <style type="text/css">/* Chart.js */
        @keyframes chartjs-render-animation {
            from {
                opacity: .99
            }
            to {
                opacity: 1
            }
        }

        .chartjs-render-monitor {
            animation: chartjs-render-animation 1ms
        }

        .chartjs-size-monitor, .chartjs-size-monitor-expand, .chartjs-size-monitor-shrink {
            position: absolute;
            direction: ltr;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            overflow: hidden;
            pointer-events: none;
            visibility: hidden;
            z-index: -1
        }

        .chartjs-size-monitor-expand > div {
            position: absolute;
            width: 1000000px;
            height: 1000000px;
            left: 0;
            top: 0
        }

        .chartjs-size-monitor-shrink > div {
            position: absolute;
            width: 200%;
            height: 200%;
            left: 0;
            top: 0
        }</style>
</head>
<body>
<main>
    <h2>Продукты</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <?php
                foreach ($vars as $var) {
                    foreach ($var as $key => $item) {
                        echo '<th>' . $key . '</th>';
                    }
                    break;
                }
                ?>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($vars as $var) {
                echo '<tr>';
                foreach ($var as $key => $item) {
                    echo '<td>' . $item . '</td>';
                }
                echo '</tr>';
            }
            ?>
            </tbody>
        </table>
    </div>
</main>
</body>
</html>

