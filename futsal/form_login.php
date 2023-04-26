<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="login.css">
        <title>Zona Futsal</title>
    </head>
    <body>
        <header>
            <center><h1>Zona Futsal</h1></center>
        </header>

        <form class="box" action="login.php" method="post">
            <h1>Login</h1>
            <input type="text" name="username" placeholder="Username">
            <input type="password" id="password1" name="password" placeholder="Password">
            <div>
                <span><input type="checkbox" onclick="show()">Show Password</span>
            </div>
            <input type="submit" name="login" value="Login">
            <br>
                <span>or <a href="add_user_costumer.php">Sign Up?</a></span>
        </form>

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