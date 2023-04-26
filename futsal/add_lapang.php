<?php 
session_start();
if(!isset($_SESSION['login'])) {
    echo "<script>alert('Please Login First !');window.location.replace('form_login.php');</script>";
}
if($_SESSION['usertype'] != 'Admin') {
    echo "<script>alert('Access Forbidden !');window.location.replace('index.php');</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Harapan Futsal</title>
</head>
<body>
    <div class="container">
        <?php
        include "header.php";
        ?>
        <aside>
            <div class="jarak">
                <h1>Form Add Lapang</h1>
                <form method="post" action="create_lapang.php">
                    <table>
                        <tr>
                            <td>Nama Lapang</td>
                            <td><input type="text" name="nama_lapang" required=""></td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td>
                                <select name="kategori" required>
                                    <option value="">Choose</option>
                                    <option value="Sintetis">Sintetis</option>
                                    <option value="Vinyl">Vinyl</option>
                                    <option value="Semen">Semen</option>
                                    <option value="Parquette">Parquette</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Harga (/jam)</td>
                            <td><input type="text" name="harga" required=""></td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td>
                            <td><input type="text" name="deskripsi" required=""></td>
                        </tr>
                        <tr>
                            <td>Photo</td>
                            <td>
                                <!-- <img src="uploads/users/<?= $data['photo']; ?>" width="200px"> -->
                                <input type="file" name="photo">
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="display:flex;">
                                <input class="btn green" style="margin-right:20px;" type="submit" name="save" value="SAVE">
                                <input class="btn red" type="reset" name="reset" value="RESET">
                            </td>
                        </tr>
                    </table>
                </form>
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