<?php
    session_start();
    session_destroy();
    echo "<script>alert('Logout Success !');window.location.replace('form_login.php');</script>";
?>