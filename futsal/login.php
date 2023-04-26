<?php
session_start(); //start session
if(isset($_POST['login'])) { //check post variable
    include 'connection.php';
    
    //make query based on username
    $query="SELECT * FROM user WHERE username='$_POST[username]'";

    //run query 
    $login=mysqli_query($db_connection,$query);
    
    if(mysqli_num_rows($login) > 0) { //check if the username found or not
        $user=mysqli_fetch_assoc($login); //if user found, ectract the data
        if(password_verify($_POST['password'], $user['password'])) { //verify the data
        
        // if password match, then make session variable
        $_SESSION['login']=TRUE;
        $_SESSION['userid']=$user['userid'];
        $_SESSION['username']=$user['username'];
        $_SESSION['password']=$user['password'];
        $_SESSION['usertype']=$user['usertype'];
        $_SESSION['fullname']=$user['fullname'];
        $_SESSION['photo']=$user['photo'];
        
        echo "<script>alert('login success !');window.location.replace('index.php');</script>";
        } else {
            echo "<script>alert('login failed, wrong password !');window.location.replace('form_login.php');</script>";
        }
        }else {
            echo "<script>alert('login failed, user not found !');window.location.replace('form_login.php');</script>";
    }
}
?>