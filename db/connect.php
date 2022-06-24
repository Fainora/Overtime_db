<?php
include_once 'config.php';

$conn = new mysqli($host, $user, $pass);
if ($conn->connect_error) {
   die("Ошибка подключения: " . $conn->connect_error);
}

$sql_db = "CREATE DATABASE IF NOT EXISTS $db";
$db_create = $conn->query($sql_db);
/*
if ($db_create === TRUE) {
   echo "База данных создана успешно";
} else {
   echo "Ошибка создания базы данных: " . $conn->error;
}
*/
$conn->select_db($db);
$table = date("M");
$sql_table = "CREATE TABLE IF NOT EXISTS $table (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    the_date DATE NOT NULL,
    rclsrv VARCHAR(255) NOT NULL,
    set_out TIME NOT NULL,
    start_at TIME NOT NULL,
    end_at TIME NOT NULL,
    home INT(6),
    final_time INT(10) NOT NULL
    )";
$table_create = $conn->query($sql_table);
/*
if ($table_create === TRUE) {
    echo "Таблица создана";
} else {
    echo "Ошибка создания таблицы: " . $conn->error;
}
*/
?>