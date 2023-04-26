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
                <br>
                <h1>Selamat Datang Di Website Zona Futsal!</h1>
                <div class="title_table">Pesan List</div>
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>No Telepon</th>
                        <th>Pesan</th>
                        <th colspan="2">Action</th>
                    </tr>

                    <?php
                        include "connection.php"; //call connection
                        $query = "SELECT * FROM contact"; //make a sql query
                        $contact = mysqli_query($db_connection, $query); //run query
                        
                        $i = 1;
                        foreach ($contact as $data) : //loop to extract data from database
                    ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $data['nama_lengkap']; ?></a></td>
                        <td><?= $data['email_pesan'] ?></td>
                        <td><?= $data['no_telpon'] ?></td>
                        <td><?= $data['pesan'] ?></td>
                        <td><a href="delete_lapang.php?id=<?= $data['idcontact']; ?>" onclick="return confirm('Are you sure?')">Delete Pesan</a></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <p><a class="btn red" href="index.php">CANCEL</a></p>
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