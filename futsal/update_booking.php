<?php 
session_start();
    if (isset($_GET['idbooking'])&&($_GET['idjadwal'])) { //check variable GET from URL
        include "connection.php"; // call connection

        // sql query DELETE FROM WHERE
        $query="UPDATE booking SET status_pembayaran='YES' WHERE bookingid='$_GET[idbooking]'";

        // run query
        $create = mysqli_query ($db_connection, $query);

        if ($create) { //check if query True / success
            echo "<script> alert ('Confim booking succesfully !');window.location.replace('read_booking.php');</script>";//success msg(js version)
        } else {
            echo "<script> alert ('Confirm failed !'); window.location.replace('read_booking.php');</script>"; //fail msg(js version)
        }
    }
?>