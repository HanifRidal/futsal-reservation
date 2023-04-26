<?php
    if (isset($_POST['save'])) { //check variable POST from FORM
        include "connection.php"; // call connection

        // sql query INSERT INTO VALUES
        $query = "INSERT INTO contact (nama_lengkap, email_pesan, no_telpon, pesan) 
        VALUES ('$_POST[nama_lengkap]',  '$_POST[email_pesan]', '$_POST[no_telpon]', '$_POST[pesan]' )";

        // run query
        $create = mysqli_query ($db_connection, $query);

        if ($create) { //check if query True / success
            //echo "<script> alert ('Pesan Sukses Terkirim !')</script>";//success msg(js version)
        } else {
           // echo "<script> alert ('Pesan Failed Terkirim !')</script>"; //fail msg(js version)
        }
    }
?>
<script>window.location.replace("contact.php");</script>