<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="login.css">
    <title>Zona Futsal</title>
</head>
<body>
        <form class="box" action="" method="post">
            <h1>Sign Up</h1>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" id="password1" name="usertype" placeholder="Password" value="Costumer" disabled required>
            <select name="usertype" required="">
                <option value="Costumer">Costumer</option>
            </select>
            <input type="text" name="fullname" placeholder="Fullname" required>
            <input type="file" name="photo" placeholder="Photo">
            <div>
                <span><input type="checkbox" onclick="show()">Show Password</span>
            </div>
            <input type="submit" name="save" value="Sign Up">
            <br>
                <span>or <a href="form_login.php">Cancel</a></span>
        </form>
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
            echo "<script> alert ('User added succesfully !'); window.location.replace('form_login.php');</script>";//success msg(js version)
        } else {
            // echo "<p>User add failed !</p>"; //fail msg(html version)
            echo "<script> alert ('User add failed !')</script>"; //fail msg(js version)
        }
    }
?>
<!-- <p><a href="read_user_210060.php">BACK TO USERS LIST</a></p> -->

        
    <script>
        function show() {
            var x = document.getElementById("password1");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }  
        }
    </script>
</body>
</html>