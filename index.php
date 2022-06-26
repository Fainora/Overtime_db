<?php 
$PageTitle = 'Главная';
include_once 'header.php'; ?>

<div class="wrapper">
    <div class="block overtime" id="form">
        <form method="POST">
            Дата: <input type="date" name ="the_date" id="the_date" min="2022-01-01"></br>
            RCLSRV-<input type="text" name ="rclsrv" id="rclsrv"></br>
            Выехал: <input type="time" name ="set_out" id="set_out"></br>
            Начал: <input type="time" name ="start_at" id="start_at"></br>
            Закончил: <input type="time" name ="end_at" id="end_at"></br>
            До дома: <input type="number" name="home" id="home" min="0" /> мин</br>
            <button type="submit" id="submit" class="submit">Добавить</button>
        </form>
    </div>

    <div class="block full" id="form">
        <div id="conclusion">
            <?php include_once 'reload.php';?>                
        </div>
    </div>

    <div class="block calculate" id="form">
        <div id="conclusion1"><?php include_once 'reload_calc.php';?></div>
    </div>
</div>
<script src="scripts/ajax.js"></script>
<?php include_once 'footer.php'; ?>