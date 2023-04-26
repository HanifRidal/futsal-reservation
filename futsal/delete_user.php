<?php
    if (isset($_GET['id'])) { //check variable GET from URL
        include "connection.php"; // call connection

        // sql query DELETE FROM WHERE
        $query = "DELETE FROM user WHERE userid = '$_GET[id]'";

        // run query
        $delete = mysqli_query ($db_connection, $query);

        if ($delete) { //check if query True / success
            // echo "<p>User deleted succesfully !</p>";  //success msg(html version)
            echo "<script> alert ('User deleted succesfully !')</script>";//success msg(js version)
        } else {
            // echo "<p>User delete failed !</p>"; //fail msg(html version)
            echo "<script> alert ('User delete failed !')</script>"; //fail msg(js version)
        }
    }
?>
<!-- <p><a href="read_user_210060.php">BACK TO USERS LIST</a></p> -->
<script>window.location.replace("read_user.php");</script>