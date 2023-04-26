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
                <div class="title_table">Lapang List</div>
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Nama Lapang</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Photo</th>
                        <th colspan="3">Action</th>
                    </tr>

                    <?php
                        include "connection.php"; //call connection
                        $query = "SELECT * FROM lapang"; //make a sql query
                        $lapang = mysqli_query($db_connection, $query); //run query
                        
                        $i = 1;
                        foreach ($lapang as $data) : //loop to extract data from database
                    ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $data['nama_lapang']; ?></td>
                        <td><?= $data['kategori'] ?></td>
                        <td><?= $data['harga'] ?></td>
                        <td><?= $data['deskripsi'] ?></td>
                        <td><img src="uploads/lapangs/<?= $data['photo'] ?>" width="50" height="50"></td>
                        <td><a href="edit_lapang.php?id=<?= $data['lapangid']; ?>">Edit Lapang</a></td>
                        <td><a href="delete_lapang.php?id=<?= $data['lapangid']; ?>" onclick="return confirm('Are you sure?')">Delete Lapang</a></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <a class="btn green" href="add_lapang.php" style="margin-right:10px">+ NEW LAPANG </a>
                <a class="btn red" href="index.php">CANCEL</a>
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