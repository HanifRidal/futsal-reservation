<?php 
session_start();
    if (isset($_GET['idbooking'])&&($_GET['idjadwal'])) { //check variable GET from URL
        include "connection.php"; // call connection

        // sql query DELETE FROM WHERE
        $query = "DELETE FROM booking WHERE bookingid = '$_GET[idbooking]';";
        $query .= "UPDATE jadwal SET pakai = 0 WHERE jadwalid = '$_GET[idjadwal]'";

        // run query
        $create = mysqli_multi_query ($db_connection, $query);

        if ($create) { //check if query True / success
            echo "<script> alert ('Delete booking succesfully !');window.location.replace('read_booking.php');</script>";//success msg(js version)
        } else {
            echo "<script> alert ('Delete b ooking failed !'); window.location.replace('read_booking.php');</script>"; //fail msg(js version)
        }
    }
?>