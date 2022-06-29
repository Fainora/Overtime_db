<?php 
include_once 'db/connect.php';

if(isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $query = "DELETE FROM `$table` Where id = '$id'";
    if ($stmt = $conn->query($query)) {
        header('location:view.php');
    } else {
        die(mysqli_error($conn));
    }
}
?>