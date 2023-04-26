<?php 
session_start();
if(!isset($_SESSION['login'])) {
    echo "<script>alert('Please Login First !');window.location.replace('form_login_210060.php');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Zona Futsal</title>
</head>
<body>
    <?php
        //call connection
        include "connection.php";

        //makke query SELECT FROM WHERE
        $query = "SELECT * FROM user WHERE userid ='$_GET[id]'";
        
        //run query
        $user = mysqli_query ($db_connection, $query);

        //extract data from query result
        $data = mysqli_fetch_assoc ($user);
    ?>
	<div class="container">
        <?php
        include "header.php";
        ?>
        <aside>
            <div class="jarak">
                <h1>Zona Futsal</h1>
  <div class="container">
        <aside>
            <div class="jarak">
            <form method="post" action="" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>Nama</td>
                        <td><input type="text" name="username" value="<?=$data['username']?>" required></td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td>
                            <select name="usertype" required="">
                                <option value="">Choose</option>
                                <option value="Costumer" <?= ($data['usertype'])=='Costumer'?'selected':''?>>Costumer</option>
                                <option value="Admin" <?= ($data['usertype'])=='Admin'?'selected':''?>>Admin</option>
                                <option value="Staff" <?= ($data['usertype'])=='Staff'?'selected':''?>>Staff</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Fullname</td>
                        <td><input type="text" name="fullname" value="<?=$data['fullname']?>" required=""></td>
                    </tr>
                    <tr>
                        <td>Photo</td>
                        <td>
                            <img src="uploads/users/<?= $data['photo']; ?>" width="200px">
                            <input type="file" name="new_photo">
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <input type="submit" name="save" value="SAVE" class="btn green">
                        </td>
                        <td>
                            
                            <input type="reset" name="reset" value="RESET" class="btn red">
                            <input type="hidden" name="userid" value="<?=$data['userid']?>">
                            <input type="hidden" name="photo_user" value="<?=$data['photo']?>">
                        </td>
                    </tr>

                </table>
            </form>
            <p><a href="read_user.php">CANCEL</a></p>
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
    <?php
    if (isset($_POST['save'])) { //check variable POST from FORM
        include "connection.php"; // call connection

        $folder = 'uploads/users/'; // target folder for upload

        if(move_uploaded_file($_FILES['new_photo']['tmp_name'], $folder . $_FILES['new_photo']['name'])){
            
            // success upload, get the photo name
            $photo = $_FILES['new_photo']['name'];
            if($_POST['photo_user'] !== 'default.png') unlink($folder . $_POST['photo_user']); // delete old photo

        } else $photo = $_POST['photo']; //jika tidak ganti foto, maka menggunakan foto lama pada hidden

        // sql query UPDATE SET WHERE
        $query = "UPDATE user SET 
        username = '$_POST[username]',
        usertype = '$_POST[usertype]',
        fullname = '$_POST[fullname]',
        photo    = '$photo'
        WHERE userid = '$_SESSION[userid]'
        ";
        
        
        $_SESSION['username']=$_POST['username'];
        $_SESSION['password']=$_POST['password'];
        $_SESSION['usertype']=$_POST['usertype'];
        $_SESSION['fullname']=$_POST['fullname'];
        $_SESSION['photo']=$photo;

        // run query
        $upload = mysqli_query($db_connection, $query);

        if($upload){ // check query result TRUE/success
            // success msg
            echo "<script> alert ('Edit user successfully !'); window.location.replace('profile.php'); </script>";
        } else {
            // failed msg
            echo "<script> alert ('Edit user failed !'); window.location.replace('profile.php'); </script>";
        }
    }
?>
</body>
</html>