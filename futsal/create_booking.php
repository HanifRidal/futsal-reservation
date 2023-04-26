<?php 
session_start();
    if (isset($_POST['pesan'])) { //check variable POST from FORM
        include "connection.php"; // call connection

        // sql query INSERT INTO VALUES
        
        $query = "INSERT INTO booking SET
            userid              = '$_SESSION[userid]', 
            jadwalid            = '$_POST[idjadwal]',
            nama_tim            = '$_POST[nama_tim]', 
            total_pembayaran    = '$_POST[harga]',
            telepon             = '$_POST[telepon]', 
            alamat              = '$_POST[alamat]', 
            status_pembayaran   = 'NO'
            ;";
        $query .= "UPDATE jadwal SET pakai = 1 WHERE jadwalid = '$_POST[idjadwal]'";

        // run query
        $create = mysqli_multi_query ($db_connection, $query);

        if ($create) { //check if query True / success
            echo "<script> alert ('Booking lapang added succesfully !');
            alert ('Silahkan Segera Bayar 1 Jam Sebelum Main Dan Tunggu Konfirmasi Admin !');window.location.replace('index.php');</script>";//success msg(js version)
        } else {
            echo "<script> alert ('Booking lapang add failed !'); window.location.replace('add_booking.php?idjadwal=".$_POST['idjadwal']."&idhari=".$_POST['idhari']."&idlapang=".$_POST['idlapang']."&idjam=".$_POST['idjam']."');</script>"; //fail msg(js version)
        }
    }
?>
<!-- <script>window.location.replace("read_booking.php");</script> -->