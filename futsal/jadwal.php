<?php 
session_start();
include "connection.php";
$query = "SELECT * FROM hari";
$result = mysqli_query($db_connection, $query);
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
                <h1>Silahkan pilih Jadwal!</h1>
                <form method="post">
                <select name="hari" required>
                    <option value="">Hari</option>
                    <?php foreach($result as $data) : ?>
                        <?php if(!isset($_POST['cek'])) { ?>
                            <option value="<?= $data['hariid'] ?>"><?= $data['nama'] ?></option>
                        <?php } else { ?>
                        <option value="<?= $data['hariid'] ?>" <?= ($_POST['hari']==$data['hariid'])?'selected':'' ?> ><?= $data['nama'] ?></option>
                    <?php } endforeach; ?>
                </select>
                <input type="submit" class="btn black uppercase" name="cek" value="cek">
                </form>
                
                <?php
                    if(isset($_POST['cek'])){
                        $hari = $_POST['hari'];
                        // $query = "SELECT * FROM
                        // booking AS b, lapang AS l, jam_main AS j WHERE b.bookingid=l.lapangid AND 
                        // b.bookingid=j.jamid AND tanggal ='$tgl' AND lapangid='6' AND jamid='1' ";
                            // $query = "SELECT * FROM jadwal AS j, lapang AS l, jam_main AS jm, hari AS h WHERE j.hariid = h.hariid
                            // AND j.lapangid=l.lapangid AND j.jamid=jm.jamid AND j.hariid ='$hari'";
                        $query = "SELECT * FROM jam_main";
                        $report = mysqli_query($db_connection,$query);
                ?>
                <table class="table">
                    <tr>
                    <?php
                        $query = "SELECT * FROM lapang";
                        $lapang = mysqli_query($db_connection, $query);
                        
                    ?>
                        <th>Jam Main</th>
                        <?php foreach ($lapang AS $lapangs) :
                        ?>
                        <th><?=$lapangs['nama_lapang'] ?></th>
                        <?php endforeach; ?>
                    </tr>
                    

                    <?php 
                        if(mysqli_num_rows($report) > 0) {
                            // $i=1;
                            foreach($report AS $data) :
                                $query = "SELECT * FROM jadwal AS j, lapang AS l, jam_main AS jm, hari AS h WHERE j.hariid = h.hariid
                                AND j.lapangid=l.lapangid AND j.jamid=jm.jamid AND jm.jam = '$data[jam]' AND j.hariid ='$hari'
                                AND l.lapangid = 4";
                                $pakai = mysqli_query($db_connection, $query);
                                $data1 = mysqli_fetch_assoc($pakai);
                    ?>
                    <!-- <a href="add_booking.php">---</a> -->
                    <tr>
                        <td><?=$data['jam']?></td>
                        <td><?php if($data1['pakai'] == 1) echo "BOOKED"; else echo "<a href='add_booking.php?idjadwal=".$data1['jadwalid']."&idhari=".$hari."&idlapang=4&idjam=".$data['jamid']."'>---</a>"; ?></td>
                        <?php
                        $query = "SELECT * FROM jadwal AS j, lapang AS l, jam_main AS jm, hari AS h WHERE j.hariid = h.hariid
                        AND j.lapangid=l.lapangid AND j.jamid=jm.jamid AND jm.jam = '$data[jam]' AND j.hariid ='$hari'
                        AND l.lapangid = 6";
                        $pakai = mysqli_query($db_connection, $query);
                        $data1 = mysqli_fetch_assoc($pakai);
                        ?>
                        <td><?php if($data1['pakai'] == 1) echo "BOOKED"; else echo "<a href='add_booking.php?idjadwal=".$data1['jadwalid']."&idhari=".$hari."&idlapang=6&idjam=".$data['jamid']."'>---</a>"; ?></td>
                        <?php
                        $query = "SELECT * FROM jadwal AS j, lapang AS l, jam_main AS jm, hari AS h WHERE j.hariid = h.hariid
                        AND j.lapangid=l.lapangid AND j.jamid=jm.jamid AND jm.jam = '$data[jam]' AND j.hariid ='$hari'
                        AND l.lapangid = 7";
                        $pakai = mysqli_query($db_connection, $query);
                        $data1 = mysqli_fetch_assoc($pakai);
                        ?>
                        <td><?php if($data1['pakai'] == 1) echo "BOOKED"; else echo "<a href='add_booking.php?idjadwal=".$data1['jadwalid']."&idhari=".$hari."&idlapang=7&idjam=".$data['jamid']."'>---</a>"; ?></td>
                    </tr>
                    <?php 
                    endforeach; ?> <br>
                    <?php } // else { ?>
                    <!-- <tr>
                        <td>BOOKING</td>
                    </tr> -->
                    <?php } ?>
                </table>
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