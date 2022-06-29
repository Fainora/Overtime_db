<?php
include_once 'db/connect.php';

$res = $conn->query("SELECT * FROM `$table`");

$per_page = 10;
$total = $res->num_rows; //кол-во строк
$count_page = ceil($total / $per_page);
$page = $_GET['page'] ?? 1;
$page = (int)$page;

if($page < 1) {
    $page = 1;
}
if($page > $count_page) {
    $page = $count_page;
}
$start = ($page - 1) * $per_page;

$stmt = $conn->query("SELECT * FROM `$table` ORDER BY `the_date`, `set_out` ASC LIMIT $start, $per_page");

if($count_page > 1) {
    echo "<div class='pagination'>";
    for($i = 1; $i <= $count_page; $i++) {
        echo "<a href='?page={$i}'>";
        echo "<div class='page'>$i</div>";
        echo "</a>";
    }
    echo "</div>";
}
?>