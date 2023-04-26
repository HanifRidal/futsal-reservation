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
                <h1>Selamat Datang Di Website Zona Futsal!</h1>
                <div class="title_table">Pesan List</div>
						<h3>Monthly Report</h3>
						<?php
							$months = array('January','Febuary','March','April','May','June','July','August','September','October','November','December');
							$year = date('Y');
						?>
						<form>
							<table>
								<tr>
									<td>
										<select name="month" required>
											<option value="">Month</option>
											<?php for($m=1;$m<=12;$m++) { ?>
											<option value="<?=$m?>"><?=$months[$m-1]?></option>
											<?php } ?>
										</select>
									</td>
									<td>
										<select name="year" required>
											<option value="">Year</option>
											<?php for($y=0;$y<=2;$y++) { ?>
											<option value="<?=$year-$y?>"><?=$year-$y?></option>
											<?php } ?>
										</select>
									</td>
								</tr>
								<tr>
									<td>
										<input type="submit" value="View Report" class="btn green">
									</td>
								</tr>
							</table>
						</form>
						<?php
						if(isset($_GET['year'])) {	
							include 'connection.php';
							//$query="SELECT * FROM medicals_210041";
							//$query="SELECT m.mr_date_210041, d.doctor_name_210041, p.pet_name_210041, p.pet_owner_210041, m.cost_210041 FROM medicals_210041 AS m, doctors_210041 AS d, pets_210041 AS p WHERE m.doctor_id_210041=d.doctor_id_210041 AND m.pet_id_210041=p.pet_id_210041 AND MONTH(m.mr_date_210041)='$_GET[month]' AND YEAR(m.mr_date_210041)='$_GET[year]'";
							$query="SELECT * FROM booking AS b INNER JOIN jadwal AS j ON b.jadwalid=j.jadwalid
                                 INNER JOIN jam_main AS jm ON j.jamid=jm.jamid
                                 INNER JOIN lapang AS l ON j.lapangid=l.lapangid WHERE MONTH(tanggal_pesan)='$_GET[month]' AND YEAR(tanggal_pesan)='$_GET[year]'";
							$report=mysqli_query($db_connection,$query);
							
						?>
						<br>
						<h4>Report Periode <?=$months[$_GET['month']-1]?> - <?=$_GET['year']?></h4><br>
						<table border="1">
							<tr>
								<th>No</th>	
								<th align="center">Tanggal</th>
								<th>Nama Tim</th>
								<th>Durasi</th>
								<th>Jam Main</th>
								<th>Nama Lapang</th>
								<th align="center">Harga</th>		
								<th>Total Harga</th>		
							</tr>
							<?php
							if(mysqli_num_rows($report) > 0) {
								$i=1; $total=0;
								foreach($report as $data) : 
									$total=$total+$data['total_pembayaran'];
							?>
							<tr>
								<td><?=$i++?></td>
								<td><?=date('l, d-M-Y', strtotime($data['tanggal_pesan']))?></td>
								<td><?=$data['nama_tim']?></td>
								<td><?=$data['durasi']?></td>
								<td><?= $data['jam']; ?></td>
								<td><?=$data['nama_lapang']?></td>
								<td>Rp.<?=$data['total_pembayaran']?></td>
								<td align="right">RP.<?=$data['total_pembayaran']?></td>
							</tr>
							<?php endforeach; ?>
							<tr><th colspan="8" align="right">Total : Rp. <?=$total?></th></tr>
							<?php } else { ?>
							<tr><th colspan="8" align="center">No Record </th></tr>
							<?php } ?>
						</table><br>
						<?php } ?>
                <p><a class="btn red" href="index.php">CANCEL</a></p>
            </div>   
        </aside>
        <main id="main">
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