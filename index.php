<?php 
    session_start();
    include_once 'connect.php';

    if(!isset($_SESSION["theme"])) {
        $_SESSION["theme"] = "light";
    }
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="style/<?=$_SESSION["theme"]; ?>.css" id="theme-link">
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="https://kit.fontawesome.com/63dc98c7d4.js" crossorigin="anonymous"></script>
</head>
<nav>
    <div class="home">
        <a href="index.php">
            <i class="fa-solid fa-house"></i> Home
        </a>
    </div>
    <div class="view">
        <a href="/">Посмотреть записи</a>
    </div>
    <div class="theme-button" id="theme-button">
        <img src="day-and-night.png">
    </div>
</nav>
<body>
    <div class="wrapper">
        <div class="overtime" id="form">
            <div action="#" method="POST">
                Дата: <input type="date" name ="the_date" id="the_date" min="2022-01-01" /></br>
                RCLSRV-<input type="text" name ="rclsrv" id="rclsrv" /></br>
                Выехал: <input type="time" name ="set_out" id="set_out" /></br>
                Начал: <input type="time" name ="start_at" id="start_at" /></br>
                Закончил: <input type="time" name ="end_at" id="end_at" /></br>
                До дома: <input type="number" name="home" id="home" min="0" /> мин</br>
                <button type="submit" id="submit">Добавить</button>
            </div>
        </div>

        <div class="full" id="form">
            <!--
            <div action="#" method="POST">
                <button type="submit" id="reload" class="reload">&#x21bb;</button>
            </div>
            -->
            <div id="conclusion">
                <?php include_once 'reload.php';?>                
            </div>
        </div>

        <div class="calculate" id="form">
            <div id="conclusion1"><?php include_once 'reload_calc.php';?></div>
        </div>
    </div>

    <script src="scripts/ajax.js"></script>
    <script src="scripts/themes.js"></script>
</body>

</html>