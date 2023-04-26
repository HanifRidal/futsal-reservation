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
    <title>Zona Futsal</title>
</head>
<body>
    <div class="container">
        <?php
        include 'header.php';
        ?>
        <aside>
            <div class="jarak">
                <br>
                    <h1>Gallery Zona Lapang</h1>
            <?php
            include "connection.php";

            if(isset($_GET['cari_kategori'])){
                $cari = $_GET['cari_kategori'];

                $query = "SELECT * FROM lapang WHERE kategori LIKE '%".$cari."%'";				
            }else{
                $query = "SELECT * FROM lapang";		
            }
            $gallery = mysqli_query($db_connection,$query);

            
            ?>
            
                <!-- blog -->
                <div class="container-card">
                    <?php 
                        $i = 1;
                        foreach ($gallery as $data) :
                    ?>
                    <div class="card" style=""> 
                        <img src="uploads/lapangs/<?= $data['photo'] ?>"
                        style="object-fit:cover;" height=200px alt="Image"/>
                        <div class="card-content">
                            <h2><?= $data['nama_lapang']; ?></h2>
                            <!-- <div class="image_wrapper image_fl">
                                <img src="uploads/lapangs/<?= $data['photo'] ?>" alt="Image" width="70px" height="70px"/>
                            </div> -->
                            <p>Kategori : <?= $data['kategori']; ?></p>
                            <p>Harga : Rp. <?= $data['harga']; ?></p>
                            <p>Deskripsi: <?= $data['deskripsi']; ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                    <!-- end blog -->
            </div>       
                    
        </aside>
        <main class="main">
            <div class="border">
                <form action="" id="formCari">
                    <label>Cari Kategori Lapang :</label>
                    <br>
                    <?php if(isset($_GET['cari_kategori'])){?>
                    <input type="text" onchange="cari_kat()" value="<?=$_GET['cari_kategori']?>" name="cari_kategori">
                    <br>
                    <?php 
                        echo "<b>Hasil pencarian : ".$cari."</b>";
                    }else{?>
                    <input type="text" onchange="cari_kat()" name="cari_kategori">
                    <br>
                    <?php 
                        echo "<b>Hasil pencarian : Tidak ditemukan</b>";
                    }?>
                </form>
            </div>
            
            
            
            <!-- </table> -->
        </main>
        <?php
        include 'footer.php';
        ?>
    </div>
    
    
<script>
    /* When the user clicks on the button, 
    toggle between hiding and showing the dropdown content */
    function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(e) {
    if (!e.target.matches('.dropbtn')) {
    var myDropdown = document.getElementById("myDropdown");
        if (myDropdown.classList.contains('show')) {
        myDropdown.classList.remove('show');
        }
    }
    }

    function cari_kat(){
        document.getElementById("formCari").submit();
    }
</script>
</body>
</html>