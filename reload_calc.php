<?php 
include_once 'connect.php';

$query = "SELECT `final_time` FROM `$table` ORDER BY `the_date` ASC";

echo 'Итоговое время: <br>';
if ($result = $conn->query($query)) {
    $time = 0;
    while ($row = $result->fetch_assoc()) {
        if($result->num_rows > 1) {
            $time += $row['final_time'];
            echo $row['final_time'] . ' + ';
        } else {
            $time = $row['final_time'];
        }
    }
    echo ' = ';
    echo $time . ' мин';
}
$conn->close();
?>