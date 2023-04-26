<?php
    if (isset($_POST['save'])) { //check variable POST from FORM
        include "connection.php"; // call connection

        // sql query INSERT INTO VALUES
        $query = "INSERT INTO lapang (lapangid, nama_lapang, kategori, harga, deskripsi) 
        VALUES ('$_POST[lapangid]', '$_POST[nama_lapang]',  '$_POST[kategori]', '$_POST[harga]', '$_POST[deskripsi]' )";

        // run query
        $create = mysqli_query ($db_connection, $query);

        if ($create) { //check if query True / success
            echo "<script> alert ('Lapang added succesfully !')</script>";//success msg(js version)
        } else {
            echo "<script> alert ('Lapang add failed !')</script>"; //fail msg(js version)
        }
    }
?>
<script>window.location.replace("read_lapang.php");</script>