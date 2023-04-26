<?php
    if (isset($_GET['id'])) { //check variable GET from URL
        include "connection.php"; // call connection

        // sql query DELETE FROM WHERE
        $query = "DELETE FROM lapang WHERE lapangid = '$_GET[id]'";

        // run query
        $delete = mysqli_query ($db_connection, $query);

        if ($delete) { //check if query True / success
            echo "<script> alert ('lapang deleted succesfully !')</script>";//success msg(js version)
        } else {
            echo "<script> alert ('lapang delete failed !')</script>"; //fail msg(js version)
        }
    }
?>
<script>window.location.replace("read_lapang.php");</script>