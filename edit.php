<?php 
$PageTitle = 'Редактировать';
include_once 'header.php';

$id = $_GET['updateid'];
$query = "SELECT * FROM `$table` where id = '$id'";

if ($stmt = $conn->query($query)) {
    $row = $stmt->fetch_assoc();
    $the_date = $row['the_date'];
    $rclsrv = $row['rclsrv'];
    $set_out = $row['set_out'];
    $start_at = $row['start_at'];
    $end_at = $row['end_at'];
    $home = $row['home'];
    $final_time = $row['final_time'];
}
if(isset($_POST['submit_upd'])) {
    $the_date = date($_POST['the_date']);
    $rclsrv = intval($_POST['rclsrv']);
    $set_out = $_POST['set_out'];
    $start_at = $_POST['start_at'];
    $end_at = $_POST['end_at'];
    $home = intval($_POST['home']);

    $set_out_min = new DateTime($set_out);
    $start_at_min = new DateTime($start_at);
    $end_at_min = new DateTime($end_at);
    $final_time = ($end_at_min->getTimestamp() - $start_at_min->getTimestamp()) / 60;
    if (!empty($home)) {
        $final_time += $home;
    }

    $query = "UPDATE `$table` set 
        id = $id, 
        the_date = '$the_date',
        rclsrv = '$rclsrv',
        set_out = '$set_out', 
        start_at = '$start_at', 
        end_at = '$end_at', 
        home = '$home', 
        final_time = '$final_time' where id = $id";
    
    if ($stmt = $conn->query($query)) {
        header('location:view.php');
    } else {
        die(mysqli_error($conn));
    }
}
?>

<div class="wrapper">
    <div class="block overtime" id="form">
        <form method="POST">
            Дата: <input type="date" name ="the_date" id="the_date" value="<?=$the_date; ?>" min="2022-01-01"></br>
            RCLSRV-<input type="text" name ="rclsrv" id="rclsrv" value="<?=$rclsrv; ?>"></br>
            Выехал: <input type="time" name ="set_out" id="set_out" value="<?=$set_out; ?>"></br>
            Начал: <input type="time" name ="start_at" id="start_at" value="<?=$start_at; ?>"></br>
            Закончил: <input type="time" name ="end_at" id="end_at" value="<?=$end_at; ?>"></br>
            До дома: <input type="number" name="home" id="home" value="<?=$home; ?>" min="0" /> мин</br>
            <input type="submit" name="submit_upd" class="submit" value="Нажмите" />
        </form>
    </div>
</div>

<?php include_once 'footer.php'; ?>