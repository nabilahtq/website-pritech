<?php 
session_start();

if (isset($_SESSION['id_user']) && isset($_SESSION['username'])) {

include "koneksi.php";

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <title>ADMIN</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="stylemain.css">
    <script type="text/javascript" src="chartjs/Chart.js"></script>
    <!-- import library chart menggunakan cdn -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>
        <style type="text/css">
            .container {
                width: 50%;
                margin: 15px auto;
            }
        </style>
</head> 
<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="lab la-accusoft" style="color: #fff;"></span> <span style="color: #fff; font-size: 25px;"><b>PRITECH</b></span>
        </div>

    <div class="sidebar-menu">
    <ul>
        <li>
            <a href="mainindex.php" class="active"><span class="las la-igloo"></span><span>Dasboard</span></a>
        </li>
        <li>
            <a href="account.php"><span class="las la-user-circle"></span><span>Account</span></a>
        </li>
        <li>
            <a href="murid.php"><span class="las la-clipboard-list"></span><span>Daftar Murid</span></a>
        </li>
        <li>
            <a href="draftutor.php"><span class="las la-users"></span><span>Tutor</span></a>
        </li>
        <li>
            <a href="kursus.php"><span class="las la-user"></span><span>Course</span></a>
        </li>
        <li>
            <a href="logout.php"><span class="las la-user"></span><span>Logout</span></a>
        </li>
    </ul>
    </div>
    </div>

    <div class="main-content">
        <header>
            <h2>
            <label for="nav-toggle">
            <span class="las la-bars"></span>   
            </label> <span><b>Dasboard</b></span>
            </h2>
            <!--
            <div class="search-wrapper">
                <span class="las la-search">
                <input type="search" placeholder="Search here" />
                </span>
            </div>
            -->
            <div class="user-wrapper">
                <img src="assets/images/jaehyun.jpg" width="40px" height="40px" alt="">
                <div>
                <h5><b><?php echo $_SESSION['username'];?></b></h5>
                <small>admin</small>
                </div>
            </div> 
        </header>

        <main>
            <div class="cards">
            <div class="card-single" action="akun.php">
                <div>
                <?php 
                $data = mysqli_query($koneksi,"SELECT * FROM user");
                // menghitung data barang
                $jumlah = mysqli_num_rows($data);
                ?>
                <h1><?php echo $jumlah; ?></h1>
                <span>Account</span>
                </div>

                <div>
                    <span class="las la-user-circle"></span>
                </div>  
            </div>

            <div class="card-single">
                <div>
                <?php 
                $data1 = mysqli_query($koneksi,"SELECT * FROM course");
                // menghitung data barang
                $jumlah1 = mysqli_num_rows($data1);
                ?>
                <h1><?php echo $jumlah1; ?></h1>
                <span>Course</span>
                </div>

                <div>
                    <span class="las la-clipboard-list"></span>
                </div>  
            </div>

            <div class="card-single">
                <div>
                <?php 
                $data2 = mysqli_query($koneksi,"SELECT * FROM daftar_murid");
                // menghitung data barang
                $jumlah2 = mysqli_num_rows($data2);
                ?>
                <h1><?php echo $jumlah2; ?></h1>
                <span>Daftar Murid</span>
                </div>

                <div>
                    <span class="las la-users"></span>
                </div>  
            </div>

            <div class="card-single">
                <div>
                <?php 
                $data3 = mysqli_query($koneksi,"SELECT * FROM tutors");
                // menghitung data barang
                $jumlah3 = mysqli_num_rows($data3);
                ?>
                <h1><?php echo $jumlah3; ?></h1>
                <span>Tutors</span>
                </div>

                <div>
                    <span class="las la-user"></span>
                </div>  
            </div>

            </div>


        <div class="row">
        <div class="col-md-9 col-sm-12 mb-3">
        <div class="card" style="margin-top: 20px; width: 700px;">
                <div class="card-header">
                    <h5 class="card-title bold">Grafik Jumlah Akun</h5>
                </div>
                <div class="card-body">
                    <div class="panel-body"><iframe src="bismillah.php" width="100%" height="300"></iframe></div>
                </div>
                <div class="card-footer">
                    <small class="text-muted">jumlah akun @PRITECH</small>
                </div>
            </div>
        </div>
    </div>
    </main>
    </div>

<section>

</section>

            

            
            

            
        

</body>
</html>
<?php 
}
?>