<?php
    if (isset($_POST['save'])) { //check variable POST from FORM
        include "connection.php"; // call connection

        $folder = 'uploads/lapangs/'; // target folder for upload

        if(move_uploaded_file($_FILES['new_photo']['tmp_name'], $folder . $_FILES['new_photo']['name'])){
            
            // success upload, get the photo name
            $photo = $_FILES['new_photo']['name'];
            if($_POST['photo_lapang'] !== 'default.png') unlink($folder . $_POST['photo_lapang']); // delete old photo

        } else $photo = $_POST['photo']; //jika tidak ganti foto, maka menggunakan foto lama pada hidden

        // sql query UPDATE SET WHERE
        $query = "UPDATE lapang SET 
        nama_lapang = '$_POST[nama_lapang]', 
        kategori = '$_POST[kategori]',
        harga = '$_POST[harga]',
        deskripsi = '$_POST[deskripsi]',
        photo = '$photo'
        WHERE lapangid = '$_POST[lapangid]'
        ;";

        // run query
        $upload = mysqli_query($db_connection, $query);

        if($upload){ // check query result TRUE/success
            // success msg
            echo "<script> alert ('Edit lapang successfully !'); window.location.replace('read_lapang.php'); </script>";
        } else {
            // failed msg
            echo "<script> alert ('Edit lapang failed !'); window.location.replace('read_lapang.php'); </script>";
        }
        
    }