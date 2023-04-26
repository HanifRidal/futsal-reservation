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
    <title>Zona Futsal</title>
</head>
<body>
<div class="container">
        <?php
        include "header.php";
        ?>
        <aside>
            <div class="jarak">
                <h1>From Booking Jadwal</h1>
                <?php 
                    include "connection.php";
                    $querylapang = "SELECT * FROM lapang WHERE lapangid = '$_GET[idlapang]'";

                    $lapang = mysqli_query($db_connection, $querylapang);
                    //extract data from query ressult
                    $data1 = mysqli_fetch_assoc($lapang);

                    //make query SELECT FROM WHERE
                    $queryuser = "SELECT * FROM user";

                    //run query
                    $user = mysqli_query($db_connection, $queryuser);
                ?>
                <table>
                        <tr>
                            <td>lapang Id/Name</td>
                            <td>: <?=$_GET['idlapang']?> / <?=$data1['nama_lapang']?> </td>
                        </tr>
                        <tr>
                            <td>lapang Type/Harga</td>
                            <td>: <?=$data1['kategori']?> / Rp. <?=$data1['harga']?></td>
                        </tr>
                </table>
            
                <form method="post" action="create_booking.php">
                    <table>
                        <tr>
                            <td>Nama Tim</td>
                            <td><input type="text" name="nama_tim" required></input></td>
                        </tr>
                        <tr>
                            <td>Hari Main</td>
                            <td>
                                <?php
                                $query = "SELECT * FROM hari WHERE hariid = '$_GET[idhari]'";
                                $result = mysqli_query($db_connection, $query);
                                $data = mysqli_fetch_assoc($result);
                                ?>
                                <input type="text" value="<?= $data['nama'] ?>" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td>Jam</td>
                            <td>
                                <?php
                                $query = "SELECT * FROM jam_main WHERE jamid = '$_GET[idjam]'";
                                $result = mysqli_query($db_connection, $query);
                                $data = mysqli_fetch_assoc($result);
                                ?>
                                <input type="text" name="jam" value="<?= $data['jam'] ?>" disabled>
                            </td>
                        </tr>
                        <tr>
                            <td>No.Telp</td>
                            <td><input type="number" name="telepon" required></input></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><textarea type="text" name="alamat" required></textarea></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td style="display:flex;">
                                <input class="btn green" type="submit" name="pesan" value="PESAN">
                                <input type="hidden" name="idjadwal" value="<?= $_GET['idjadwal'] ?>"> 
                                <input type="hidden" name="harga" value="<?= $data1['harga'] ?>"> 
                                <input type="hidden" name="idhari" value="<?= $_GET['idhari'] ?>"> 
                                <input type="hidden" name="idlapang" value="<?= $_GET['idlapang'] ?>">  
                                <input type="hidden" name="idjam" value="<?= $_GET['idjam'] ?>">  
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