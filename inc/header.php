<?php 
require_once "app/config/config.php"; 
require_once "app/classes/User.php";
$user = new User();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Basic Shop</title>
</head>

<body>

    <div class="container">
        <?php require_once "navbar.php" ?>

        <?php if(isset($_SESSION['message'])) : ?>
            <div class="alert alert-<?= $_SESSION['message']['type']; ?> alert-dismissible fade show" role="alert">
                <?php
                    echo $_SESSION['message']['text'];
                    unset($_SESSION['message']);
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
            </div>
        <?php endif ?>
        