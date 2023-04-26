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
    <!-- <link rel="stylesheet" href="modal.css"> -->
    <!-- <script src="test.js"></script> -->
    <title>Zona Futsal</title>
</head>
<body>
    <img src="images/logo.png" class="background-image">
    <?php
    include "connection.php";
    $query= "SELECT * FROM booking AS b INNER JOIN jadwal AS j ON b.jadwalid=j.jadwalid 
    INNER JOIN jam_main AS jm ON j.jamid=jm.jamid
    INNER JOIN lapang AS l ON j.lapangid=l.lapangid WHERE userid = '$_SESSION[userid]'";
    $booking = mysqli_query($db_connection, $query);
    ?>
    <br>
    <h1 align="center">ZONA FUTSAL</h1>
    <h2>Nota Pembayaran</h2>

    <i>NO.TAGHIAN #<?= $_GET['bookingid']; ?></i>
    
    <table class="table">
        <tr>
            <th>No</th>
            <th>Nama Tim</th>
            <th>Durasi</th>
            <th>Jam Main</th>
            <th>Nama Lapang</th>
            <th>Total Bayar</th>
            <th>Tanggal Pesan</th>
            <th>Alamat</th>
            <th>Status Pembayaran</th>
        </tr>

        <?php
            if(mysqli_num_rows($booking) > 0) {
            $i = 1;
            foreach ($booking as $data) : //loop to extract data from database
        ?>
        <tr>
            <td><?php echo $i++; ?></td>
            <td><?= $data['nama_tim']; ?>
            <td><?= $data['durasi']; ?>
            <td><?= $data['jam']; ?>
            <td><?= $data['nama_lapang']; ?></td>
            <td><?= $data['total_pembayaran'] ?></td>
            <td><?= date('l, d-M-Y', strtotime($data['tanggal_pesan'])) ?></td>
            <td><?= $data['alamat'] ?></td>
            <td><?= $data['status_pembayaran'] ?></td>
        </tr>
        <?php endforeach; 
        } else { ?>
        <tr>
            <td colspan="6">No Record !</td>
        </tr>
        <?php }?>
    </table>
    <?php
        if ($data['status_pembayaran']=='YES') {
            echo "Terimakasih telah membayar transaksi..";
        }else{
            echo "Mohon segera membayar ke operator!";

            // <p></p>
        }
    ?>
    <div class="border" style="border:none; margin-top:150px;">
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
    </div>
    <br>
</body>
<script>
    window.print()
</script>
</html>