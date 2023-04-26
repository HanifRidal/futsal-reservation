<?php
    if (isset($_POST['save'])) { //check variable POST from FORM
        include "connection.php"; // call connection

        //
        $password = password_hash($_POST['usertype'], PASSWORD_DEFAULT);

        // sql query INSERT INTO VALUES
        $query = "INSERT INTO user (username, password, usertype, fullname) 
        VALUES ('$_POST[username]', '$password',  '$_POST[usertype]', '$_POST[fullname]' )";

        // run query
        $create = mysqli_query ($db_connection, $query);

        if ($create) { //check if query True / success
            // echo "<p>User added succesfully !</p>";  //success msg(html version)
            echo "<script> alert ('User added succesfully !')</script>";//success msg(js version)
        } else {
            // echo "<p>User add failed !</p>"; //fail msg(html version)
            echo "<script> alert ('User add failed !')</script>"; //fail msg(js version)
        }
    }
?>
<!-- <p><a href="read_user_210060.php">BACK TO USERS LIST</a></p> -->
<script>window.location.replace("read_user.php");</script>