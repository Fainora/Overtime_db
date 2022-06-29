<?php 
    $PageTitle = 'Посмотреть записи';
    include_once 'header.php';
    include_once 'db/connect.php';
?>

<div class="wrapper">
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th>Дата</th>
                    <th>RCLSRV</th>
                    <th>Выехал</th>
                    <th>Начал</th>
                    <th>Закончил</th>
                    <th>До дома</th>
                    <th>Времени заняло</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include 'pagination.php';
                    if ($stmt = $conn->query($query)) {
                        while ($row = $stmt->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . date("d.m.Y", strtotime($row['the_date'])) . '</td>';
                            echo '<td>' . 'RCLSRV-' . $row['rclsrv'] . '</td>';
                            echo '<td>' . date("H:i", strtotime($row['set_out'])) . '</td>';
                            echo '<td>' . date("H:i", strtotime($row['start_at'])) . '</td>';
                            echo '<td>' . date("H:i", strtotime($row['end_at'])) . '</td>';
                            echo '<td>' . $row['home'] . ' мин' . '</td>';
                            echo '<td>' . $row['final_time'] . ' мин' . '</td>';
                            echo '<th><a href="edit.php?updateid='.$row['id'].'"class="btn edit"><i class="fa-solid fa-pen"></i></a></th>';
                            echo '<th><a href="delete.php?deleteid='.$row['id'].'"class="btn delete"><i class="fa-solid fa-trash"></i></a></th>';
                            echo '</tr>';
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once 'footer.php'; ?>