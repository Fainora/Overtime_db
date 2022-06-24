<?php 
include_once 'db/connect.php';

$query = "SELECT * FROM `$table` ORDER BY `the_date` ASC";
if ($stmt = $conn->query($query)) {
    while ($row = $stmt->fetch_assoc()) {
        echo date("d.m.Y", strtotime($row['the_date'])) . "<br>";
        echo 'RCLSRV-' . $row['rclsrv'] . "<br>";
        echo 'Выехал: ' . date("H:i", strtotime($row['set_out'])) . "<br>";
        echo 'Начал: ' . date("H:i", strtotime($row['start_at'])) . "<br>";
        echo 'Закончил: ' . date("H:i", strtotime($row['end_at'])) . "<br>";
        if(!empty($row['home'])) {
            echo 'До дома: ' . $row['home'] . " мин<br>";
        }
        echo 'Времени заняло: ' . $row['final_time'] . " мин<br><br>";
    }
}
?>