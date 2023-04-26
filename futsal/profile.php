<?php 
session_start();
if(!isset($_SESSION['login'])) {
    echo "<script>alert('Please Login First !');window.location.replace('form_login.php');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="test.js"></script>
    <title>Zona Futsal</title>
</head>
<body>
    <div class="container">
        <?php
        include "header.php";
        ?>
        <aside>
            <div class="jarak">
                <?php
                    include "connection.php"; //call connection
                    $query = "SELECT * FROM user WHERE username = '$_SESSION[username]'"; //make a sql query
                    $users = mysqli_query($db_connection, $query); //run query
                    
                    $i = 1;
                    foreach ($users as $data) : //loop to extract data from database
                ?>
                <br>
                <h1>Profile</h1>
                <div class="border">
                    <img style="float : left; border-radius: 50%; margin: 20px;" 
                    src="uploads/users/<?= $_SESSION['photo'] ?>" width="150" height="150">

                    <div style="margin: 20px; padding : 20px;">
                        <p>
                            <span>Username :</span>
                            <?php echo $_SESSION['username']; ?>
                        </p>
                        <p>
                            <span>Usertype :</span>
                            <?php echo $_SESSION['usertype']; ?>
                        </p>
                        <p>
                            <span>Fullname :</span>
                            <?php echo $_SESSION['fullname']; ?>
                        </p>
                    </div>
                        <a class="btn black" href="change_password.php">Change Password</a>
                        <a class="btn black" href="edit_profile.php?id=<?= $_SESSION['userid']; ?>">Edit</a>
                        <a class="btn black" href="reset_password.php?id=<?= $_SESSION['userid']; ?>&type=<?=$_SESSION['usertype'];?>" onclick="return confirm('Are you sure reset the?')">Reset Password</a>
                    <?php endforeach; ?>
                        
                </div>
            </div>   
        </aside>
        <main id="main">
            <div class="border">
            <h3>Info Kontak</h3>
                <?php
                //call connection
                include "connection.php";

                //makke query SELECT FROM WHERE
                $query = "SELECT * FROM contactusinfo";
                
                //run query
                $contact = mysqli_query ($db_connection, $query);

                $data = mysqli_fetch_assoc ($contact);
                ?>
                <p>Alamat: <?= $data['alamat_kami'] ?><br></p>
                <p>Email: <?= $data['email_kami'] ?><br></p>
                <p>Telepon: <?= $data['telp_kami'] ?></p>
                    <a href="https://api.whatsapp.com/send/?phone=081287702224&text&type=phone_number&app_absent=0"><img src="images/wa.png" alt="WhatsApp" width="22px" height="22px"/></a>
                    <a href="#"><img src="images/fb.png" alt="Facebook" width="20px" height="20px"/></a>
                    <a href="#"><img src="images/ig.png" alt="Instagram" width="20px" height="20px"/></a>
                    <a href="#"><img src="images/traveloka.png" alt="Traveloka" width="20px" height="20px"/></a>
            </div>
            
        </main>
        <?php
        include "footer.php";
        ?>
    </div>
</body>
</html>