<?php
session_start(); //start session
if(isset($_POST['change'])) { //check post variable
    include 'connection.php';
    
    //encrypt the new password
    $password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    //make a query dor update password
    $query="UPDATE user SET password='$password' WHERE userid='$_SESSION[userid]'";

    //run query 
    $update=mysqli_query($db_connection,$query);
    
    if($update) { //check query result TRUE/FALSE
        $_SESSION['password']=$password; //update data session if success
        //success msg
        echo "<script>alert('Change password successed !');window.location.replace('index.php');</script>";
        } else {
            echo "<script>alert('Change password failed, wrong password !');window.location.replace('change_password.php');</script>";
        }
}
?>