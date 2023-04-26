<?php
    if (isset($_POST['save'])) { //check variable POST from FORM
        include "connection.php"; // call connection

        $folder = 'uploads/users/'; // target folder for upload

        if(move_uploaded_file($_FILES['new_photo']['tmp_name'], $folder . $_FILES['new_photo']['name'])){
            
            // success upload, get the photo name
            $photo = $_FILES['new_photo']['name'];
            if($_POST['photo_user'] !== 'default.png') unlink($folder . $_POST['photo_user']); // delete old photo

        } else $photo = $_POST['photo']; //jika tidak ganti foto, maka menggunakan foto lama pada hidden

        // sql query UPDATE SET WHERE
        $query = "UPDATE user SET 
        username = '$_POST[username]',
        usertype = '$_POST[usertype]',
        fullname = '$_POST[fullname]',
        photo    = '$photo'
        WHERE userid = '$_POST[userid]'
        ";

        // run query
        $upload = mysqli_query($db_connection, $query);

        if($upload){ // check query result TRUE/success
            // success msg
            echo "<script> alert ('Edit user successfully !'); window.location.replace('read_user.php'); </script>";
        } else {
            // failed msg
            echo "<script> alert ('Edit user failed !'); window.location.replace('read_user.php'); </script>";
        }
    }
?>