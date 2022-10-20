<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        <?php echo $title; ?>
    </title>
    <meta name="description"
          content="NiceBeatsProd">
    <meta name="author"
          content="AfulBoy">
    <meta name="keywords"
          content="NiceBeatsProd">
    <!--    <link rel="icon"-->
    <!--          href="/resources/images/png/#.png">-->
    <link rel="stylesheet"
          type="text/css"
          href="/Resources/Styles/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
          integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I"
          crossorigin="anonymous">
    <link rel="stylesheet"
          href="https://bootstrap5.ru/css/docs.css">
    <link rel="stylesheet"
          href="https://bootstrap5.ru/css/examples/dashboard.css">
    <link rel="stylesheet"
          href="https://bootstrap5.ru/css/examples/checkout-form-validation.css">
    <link rel="stylesheet"
          type="text/css"
          href="/Resources/Styles/style-admin.css">
</head>
<body>
<div class="wrapper">
    <?php
    require_once($_SERVER["DOCUMENT_ROOT"] . '/App/Views/Templates/Admin/header.php');
    require_once($path);
    require_once($_SERVER["DOCUMENT_ROOT"] . '/App/Views/Templates/Admin/footer.php');
    ?>
</div>
<script src="/Resources/Scripts/scripts-admin.js"></script>
</body>
</html>