<?php 
    session_start();
    include_once 'db/connect.php';

    if(!isset($_SESSION["theme"])) {
        $_SESSION["theme"] = "light";
    }
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8" />
    <title><?= isset($PageTitle) ? $PageTitle : "Title" ?></title>
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="style/<?=$_SESSION["theme"]; ?>.css" id="theme-link">
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://kit.fontawesome.com/63dc98c7d4.js" crossorigin="anonymous"></script>
</head>
<nav>
    <div class="menu home">
        <a href="index.php">
            <i class="fa-solid fa-house"></i> Home
        </a>
    </div>
    <div class="menu view">
        <a href="view.php">Посмотреть записи</a>
    </div>
    <div class="menu theme-button" id="theme-button">
        <img src="image/day-and-night.png">
    </div>
</nav>
<body>