<?php
    include "connection.php";
    if(isset($_GET['id'])) {
        $password = password_hash($_GET['type'], PASSWORD_DEFAULT);
        $query = "UPDATE user SET password='$password' WHERE userid='$_GET[id]'";
        $update = mysqli_query($db_connection, $query);
        if($update) {
            echo "<script> alert ('Reset Password Successed !')</script>";
        } else {
            echo "<script> alert ('Reset Password failed !')</script>";
        }   
    }
?>
<script>window.location.replace("read_user.php");</script>