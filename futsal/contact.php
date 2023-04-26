<?php
session_start()
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
                <br>
                <h1>Selamat Datang Di Website Zona Futsal!</h1>
                <h3>Ada Pertanyaan? Silahkan Isi Form Berikut</h3>
                <form method="post" action="create_pesan.php">
                   <table>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td><input type="text" name="nama_lengkap" required=""></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><input type="email" name="email_pesan" required=""></td>
                    </tr>
                    <tr>
                        <td>No Telepon</td>
                        <td><input type="number" name="no_telpon" required=""></td>
                    </tr>
                    <tr>
                        <td>Pesan</td>
                        <td><textarea type="text" name="pesan" required></textarea></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="save" value="Kirim" class="btn green">
                        </td>
                        <td>
                            <input type="reset" name="reset" value="Batal" class="btn red">
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