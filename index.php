<?php 
    include_once 'connect.php';
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="style.css">
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
</head>

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

    <script>
    $('#submit').on('click', function() {
        var the_date = $('#the_date').val();
        var rclsrv = $('#rclsrv').val();
        var set_out = $('#set_out').val();
        var start_at = $('#start_at').val();
        var end_at = $('#end_at').val();
        var home = $('#home').val();

        $.ajax({
            url: "db.php",
            type: "POST",
            dataType: "html",
            data: {
                the_date: the_date,
                rclsrv: rclsrv,
                set_out: set_out,
                start_at: start_at,
                end_at: end_at,
                home: home
            },
            success: function(result) {
                if (result) {
                    $("#conclusion").load("reload.php");
                    $("#conclusion1").load("reload_calc.php");
                    console.log(result);
                } else {
                    alert(result.message);
                }
                return false;
            },
            error: function(xhr, error) {
                console.debug(xhr);
                console.debug(error);
            }
        });
        return false;
    });
    
    /*
    $('#reload').on('click', function() {
        $("#conclusion").load("reload.php");
    });
    */
    </script>
</body>

</html>