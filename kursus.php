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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="yaaa.css">
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
            <h2><span class="lab la-accusoft" style="color: #fff;"></span> <span style="color: #fff; font-size: 25px;"><b>PRITECH</b></span></h1>
        </div>

    <div class="sidebar-menu">
    <ul>
        <li>
            <a href="mainindex.php"><span class="las la-igloo"></span><span>Dasboard</span></a>
        </li>
        <li>
            <a href="account.php" ><span class="las la-user-circle"></span><span>Account</span></a>
        </li>
        <li>
            <a href="murid.php"><span class="las la-clipboard-list"></span><span>Daftar Murid</span></a>
        </li>
        <li>
            <a href="draftutor.php"><span class="las la-users"></span><span>Tutor</span></a>
        </li>
        <li>
            <a href="kursus.php" class="active"><span class="las la-user"></span><span>Course</span></a>
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
            </label> <span style="font-size: 28;"><b>Dasboard</b></span>
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
     <div class="container-xl" style="margin-left: 0;">
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" class="cari">
        <div class="form-group">
        <tr>
        <td>
        <?php
        $course_id="";
        if (isset($_GET['course_id'])) {
            $course_id=$_GET['course_id'];
        }
        ?>
        <input type="text" name="course_id" value="<?php echo $course_id;?>" class="form-control"  required/>
        </td>
        <td>
        <input type="submit" class="btn btn-info" value="Cari">
        </td>
        </tr>
        </div>

    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6 col-12">
                        <h2>Daftar <b>Kursus</b></h2>
                    </div>
                    <div class="col-sm-6 col-12">
                        <a href="addcourse.php" class="btn btn-success" data-toggle="modal" data-target=""><i class="material-icons">&#xE147;</i> <span>Add New Course</span></a>                       
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Training</th>
                        <th>Kategori</th>
                        <th>Tutor</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th>Harga</th>
                        <th>Harga Diskon</th>
                        <th>Slot</th>
                        <th>Software</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                    </tr>
                </thead>
                <tbody>
        <?php

        include "koneksi.php";
        if (isset($_POST['course_id'])) {
            $course_id=trim($_POST['course_id']);
            $sql= "SELECT * FROM course INNER JOIN tutors ON course.tutor_id = tutors.tutor_id 
            INNER JOIN kategori_ahli ON course.ahli_id = kategori_ahli.ahli_id WHERE judul LIKE '%".$course_id."%' or ahli like '%".$course_id."%' or nama like '%".$course_id."%' or tanggal like '%".$course_id."%' or software like '%".$course_id."%' or deskripsi like '%".$course_id."%' ORDER BY course_id asc";

        }else {
            $sql="SELECT * FROM course ORDER BY course_id asc";
        }

        $sql = $sql= "SELECT * FROM course INNER JOIN tutors ON course.tutor_id = tutors.tutor_id 
            INNER JOIN kategori_ahli ON course.ahli_id = kategori_ahli.ahli_id WHERE judul LIKE '%".$course_id."%' or ahli like '%".$course_id."%' or nama like '%".$course_id."%' or tanggal like '%".$course_id."%' or software like '%".$course_id."%' or deskripsi like '%".$course_id."%' ORDER BY course_id asc";
        
        $hasil=mysqli_query($koneksi,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;
            ?>
                
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data['judul']; ?></td>
                    <td><?php echo $data['ahli']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['tanggal'] ; ?></td>
                    <td><?php echo $data['tanggal_end'] ; ?></td>
                    <td><?php echo $data['harga_asli']; ?></td>
                    <td><?php echo $data['harga_diskon']; ?></td>
                    <td><?php echo $data['slot']; ?></td>
                    <td><?php echo $data['software']; ?></td>
                    <td><?php echo $data['deskripsi_co']; ?></td>
                    <td style="text-align: center;"><img src="course/<?php echo $data['gambar']; ?>" style="width: 120px;"></td>
                    <td>
                        <a href="updatecourse.php?course_id=<?php echo $data['course_id']; ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                        <a href="delcourse.php?course_id=<?php echo $data['course_id']; ?>" class="delete" onclick="return confirm(\'Yakin ingin menghapus data ini?\')" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        

                    </td>
                    </tr>
        
        <?php

        }
        ?>

                </tbody>
            </table>
        </div>
    </div>
</form>
</div>
            <div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item active"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item "><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
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