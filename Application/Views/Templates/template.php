<?php /** @var $contentView * */ ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible"
          content="ie=edge">
    <title>NiceBeetsProd</title>
    <meta name="keywords"
          content>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
<div class="wrapper">
    <?php
    require_once($_SERVER["DOCUMENT_ROOT"] . '\\application\\views\\templates\\header.php');
    require_once($_SERVER["DOCUMENT_ROOT"] . '\\application\\views\\' . $contentView);
    require_once($_SERVER["DOCUMENT_ROOT"] . '\\application\\views\\templates\\footer.php');
    ?>
</div>
</body>
</html>