        <header style="height:100px;">
            <div class= "menu">
                <!-- <span class = title>ZONA FUTSAL</span> -->
                <img src="images/logo.png" alt="" width=70 height=70 style="float:left;">
                <ul class="menu-ul">
                    <li><a href="index.php"><img src="images/house.png" alt="" class="list" height="20" width="20">Home</a></li>
                    <li><a href="jadwal.php"><img src="images/jadwal.png" alt="" class="list" height="20" width="20">Jadwal</a></li>
                    <li><a href="gallery.php"><img src="images/document.png" alt="" class="list" height="20" width="20">Gallery</a></li>
                    <li><a href="contact.php"><img src="images/telephone.png" alt="" class="list" height="20" width="20">About</a></li>
                    <?php if(isset ($_SESSION['login']) ){
                        if($_SESSION['usertype'] == 'Admin'){?>
                    <div class="dropdown">
                        <button class="dropbtn" onclick="myFunction()">
                        <img src="images/list.png" alt="" class="list" height="20" width="20"> 
                            List
                        </button>
                        <div class="dropdown-content" id="myDropdown">
                            <img src="images/lapang.png" alt="" class="list drp" height="20" width="20"><a href="read_lapang.php">Lapang</a>
                            <img src="images/user.png" alt="" class="list drp" height="20" width="20"><a href="read_user.php">User</a>
							<img src="images/booking.png" alt="" class="list drp" height="20" width="20"><a href="read_booking.php">Pemesanan</a>
							<img src="images/contract.png" alt="" class="list drp" height="20" width="20"><a href="read_pesan.php">Laporan User</a>
							<img src="images/telephone.png" alt="" class="list drp" height="20" width="20"><a href="report.php">Report</a>
                        </div>
                    </div>
                    <?php }
                    } ?>

                    <?php if( isset ($_SESSION['login']) ){ ?>
                    <div class="dropdown" style="float:right; margin-right:15px;">
                        <button class="dropbtn" onclick="myFunction2()">
                            Account
                            <img src="images/assistance.png" alt=""  width=20 height=20>
                        </button>
                        <div class="dropdown-content" id="myDropdown2" style="min-width: 115px;">
                            <img src="images/user.png" alt="" class="list drp" height="20" width="20"><a href="profile.php">Profile</a>
                            <img src="images/logout.png" alt="" class="list drp" height="20" width="20"><a href="logout.php">Logout</a>
                        </div>
                    </div>
                    <?php } else {?>
                    <li style="float:right; margin-right:15px;">
                        <a href="form_login.php">
                            Login
                            <img src="images/assistance.png" alt=""  width=20 height=20>
                        </a>
                    </li>
                    <!-- <img src="uploads/users/default.png" alt="" width=30 height=30 style="float:right;"> -->
                    <?php } ?>
                    <!-- style="float:right; -->
                </ul>
            </div>
            
        </header>