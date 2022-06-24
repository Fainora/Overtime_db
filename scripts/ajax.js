$('#submit').on('click', function() {
    var the_date = $('#the_date').val();
    var rclsrv = $('#rclsrv').val();
    var set_out = $('#set_out').val();
    var start_at = $('#start_at').val();
    var end_at = $('#end_at').val();
    var home = $('#home').val();

    $.ajax({
        url: "db/db.php",
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