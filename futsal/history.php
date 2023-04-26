<?php
        if(isset($_SESSION['login'])) $userid = $_SESSION['userid'];
        else $userid = '';
        include "connection.php";
        $query= "SELECT * FROM booking AS b INNER JOIN jadwal AS j ON b.jadwalid=j.jadwalid
        INNER JOIN jam_main AS jm ON j.jamid=jm.jamid
        INNER JOIN lapang AS l ON j.lapangid=l.lapangid WHERE userid = '$userid'";
        $booking = mysqli_query($db_connection, $query);

        if(mysqli_num_rows($booking) > 0) {
        $i = 1;
        foreach ($booking as $data) : //loop to extract data from database
        ?>
        <section>
            <div href="" class="wrab" id="wrab">
                <div class="bg-color">
                    <div class="modal" id="modal">
                        <p><a href="">X</a></p>
                        <h1>History Booking</h1>
                        <form action="" method="get" accept-charset="utf-8">
                            <!-- <label>Email:</label> -->
                            <label for="">Nama Tim :</label> <?= $data['nama_tim']; ?>
                            <br>
                            <label for="">Durasi :</label> <?= $data['durasi']; ?>
                            <br>
                            <label for="">Jam Main :</label> <?= $data['jam']; ?>
                            <br>
                            <label for="">Lapang :</label> <?= $data['nama_lapang']; ?>
                            <br>
                            <label for="">Total Bayar :</label> Rp. <?= $data['total_pembayaran'] ?>
                            <br>
                            <br>
                            <i>
                            <b>Rincian :</b><br>
                            <label for="">Tanggal Pesan :</label> <?= date('l, d-M-Y', strtotime($data['tanggal_pesan'])) ?>
                            <br>
                            <label for="">Alamat :</label> <?= $data['alamat'] ?>
                            <br>
                            <label for="">Status Pembayaran :</label> <?= $data['status_pembayaran'] ?>
                            </i>
                            
                            <br>
                            <br>
                            <br>
                            <!-- <input type="password" placeholder="Masukan Password" id="sandi"> -->
                            <!-- <button type="submit" class="btn2">Print</button> -->
                            <a class="btn green" href="history_print.php?bookingid=<?= $data['bookingid'] ?>" target="_blank">SUBMIT</a>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <?php 
        endforeach;
        } else { 
            ?>
        <section>
            <div href="" class="wrab" id="wrab">
                <div class="bg-color">
                    <div class="modal" id="modal">
                        <p><a href="">X</a></p>
                        <h1>History Booking</h1>
                        <h3>No Record!</h3>
                    </div>
                </div>
            </div>
        </section>
        <?php 
        }
        ?>