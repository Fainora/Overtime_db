<?php
include_once 'connect.php';
$conn = new mysqli($host, $user, $pass, $db);

$the_date = date($_POST['the_date']);
$rclsrv = intval($_POST['rclsrv']);
$set_out = $_POST['set_out'];
$start_at = $_POST['start_at'];
$end_at = $_POST['end_at'];
$home = intval($_POST['home']);

if($the_date && $rclsrv && $set_out && $start_at && $end_at) {
    $set_out_min = new DateTime($set_out);
    $start_at_min = new DateTime($start_at);
    $end_at_min = new DateTime($end_at);
    $final_time = ($end_at_min->getTimestamp() - $start_at_min->getTimestamp()) / 60;
    if (!empty($home)) {
        $final_time += $home;
    }

    $query=$conn->query("INSERT INTO `$table` VALUES(NULL, '$the_date', '$rclsrv', '$set_out',
        '$start_at', '$end_at', '$home', '$final_time')");

    $message = 'Everything is fine';
} else {
    $message = 'Failed to write and retrieve data';
}

$out=array(
	'message'=> $message,
);

header('Content-Type: text/json; charset=utf-8');
echo json_encode($out);

$conn->close();
?>