<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="modal.css">
	<link rel="stylesheet" href="clock.css">
    <!-- <script src="test.js"></script> -->
    <title>Zona Futsal</title>
</head>
<body>
    <div class="index-container">
        <?php
        include "header.php";
        include "history.php";
        ?> 
        <section></section>
        <aside>
            <br>
            <h1 align="center">WELCOME TO ZONA FUTSAL</h1>
            <div class="slide">
                <div class="slide1"></div>
                <div class="slide2"></div>
                <div class="slide3"></div>
            </div>
            <div class="jarak">
                <div>
                    <img src="images/logo.png" alt="" width=150 height=150 style="float:left;">
                    <h1>ZONA FUTSAL</h1>
                </div>
                
                <p>Pelayanan Booking Futsal No. 1 di Kabupaten Bandung</p>
                <p>Zona Futsal merupakan dari salah satu tempat olahraga yang berada di Kabupaten Bandung. Zona Futsal
                tersebut sangatlah banyak peminat dan juga melayani konsumen di setiap hari agar dapat bisa bersaing dengan tempat-tempat futsal yang lain di Kota Bandung, tentu dalam hal penyewaan lapangan futsal ini perlu meningkatkan dari segi
                kualitas pelayanan untuk para konsumen Zona Futsal.</p>

            </div>
        </aside>
        <main id="main">
            <div class="container_table" align=center>
                <?php if(isset($_SESSION['login'])) { ?>
                <div class="border">
                    <br>
                    <img src="uploads/users/<?= $_SESSION['photo']?>" width="50" height="50" style="border-radius:50%;"> 
                    <p><?= $_SESSION['fullname'];?> (<?=$_SESSION['usertype']; ?>)</p>
                    <div style="display:flex; justify-content:center; align:center;">
                        <img src="images/file.png" alt="" class="drp" height="20" width="20"><a href="#wrab" style="margin:auto 0;">History</a>
                    </div>
                </div>
                <?php }?>
                
            </div>
			<div class="border">
               	<div id="clock">
					<h2>Waktu Sekarang</h2><br>
					<div id="time">
						<div><span id="hour">00</span><span>Jam</span></div>
						<div><span id="minutes">00</span><span>Menit</span></div>
						<div><span id="seconds">00</span><span>Detik</span></div>
						<div><span id="ampm"></span></div>
					</div>
				</div>
	<script type="text/javascript">
		function clock(){

			var hours = document.getElementById('hour');
			var minutes = document.getElementById('minutes');
			var seconds = document.getElementById('seconds');
			var ampm = document.getElementById('ampm');

			var h = new Date().getHours();
			var m = new Date().getMinutes();
			var s = new Date().getSeconds();
			var am = "AM";

		    if(h > 12){
		        h = h - 12;
		       var am = "PM"
		    }
			h = (h < 10) ? "0" + h : h
			m = (m < 10) ? "0" + m : m
			s = (s < 10) ? "0" + s : s


			hours.innerHTML = h;
			minutes.innerHTML = m;
			seconds.innerHTML = s;
			ampm.innerHTML = am

		}

		var interval = setInterval(clock, 1000);
	</script>
            </div>
            <div class="border">
                <center><h3>Info Kontak</h3></center>
                    <?php
                    //call connection
                    include "connection.php";

                    //makke query SELECT FROM WHERE
                    $query = "SELECT * FROM contactusinfo";
                    
                    //run query
                    $contact = mysqli_query ($db_connection, $query);

                    $data = mysqli_fetch_assoc ($contact);
                    ?>
                    <p>Alamat: <?= $data['alamat_kami'] ?></p>
                    <p>Email: <?= $data['email_kami'] ?></p>
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