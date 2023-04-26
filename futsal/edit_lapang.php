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
        $query = "SELECT * FROM lapang WHERE lapangid ='$_GET[id]'";
        
        //run query
        $lapang = mysqli_query ($db_connection, $query);

        //extract data from query result
        $data = mysqli_fetch_assoc ($lapang);
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
           <form method="post" action="update_lapang.php" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>Nama Lapang</td>
                        <td><input type="text" name="nama_lapang" value="<?=$data['nama_lapang']?>" required></td>
                    </tr>
                    <tr>
                        <td>Kategori</td>
                        <td>
                            <select name="kategori" required="">
                                <option value="">Choose</option>
                                <option value="Sintetis" <?= ($data['kategori'])=='Sintetis'?'selected':''?>>Sintetis</option>
                                <option value="Vinyl" <?= ($data['kategori'])=='Vinyl'?'selected':''?>>Vinyl</option>
                                <option value="Semen" <?= ($data['kategori'])=='Semen'?'selected':''?>>Semen</option>
                                <option value="Parquette" <?= ($data['kategori'])=='Parquette'?'selected':''?>>Parquette</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td><input type="text" name="harga" value="<?=$data['harga']?>" required=""></td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td><input type="text" name="deskripsi" value="<?=$data['deskripsi']?>" required=""></td>
                    </tr>
                    <tr>
                        <td>Photo</td>
                        <td>
                            <img src="uploads/lapangs/<?= $data['photo']; ?>" width="200px">
                            <input type="file" name="new_photo">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="save" value="SAVE">
                            <input type="reset" name="reset" value="RESET">
                            <input type="hidden" name="lapangid" value="<?=$data['lapangid']?>">
                            <input type="hidden" name="photo_lapang" value="<?= $data['photo']; ?>" />
                        </td>
                    </tr>

                </table>
            </form>
            <p><a href="read_lapang.php">CANCEL</a></p>
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