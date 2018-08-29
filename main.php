<?php
    session_start();
    if (empty($_SESSION['user'])) {
        header('Location: index.php?message=You must be logged in to view that page.');
    } else {
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php require('partials/bootstrap.php'); ?>
</head>
<body>
    <div class="container-fluid">
        <?php include('partials/nav.php'); ?>
        <?php
            echo '<h2>Hi ' . $_SESSION['user'] . '. Welcome to your minimalistic dashboard!</h2>';
        }
        ?>
    </div>
</body>
</html>

