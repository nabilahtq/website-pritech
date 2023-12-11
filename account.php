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
            <a href="account.php" class="active"><span class="las la-user-circle"></span><span>Account</span></a>
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
     <div class="container-xl" style="margin-left: 0px;">
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
        <tr>
        <td>
        <?php
        $id_user="";
        if (isset($_POST['id_user'])) {
            $id_user=$_POST['id_user'];
        }
        ?>
        <input type="text" name="id_user" value="<?php echo $id_user;?>" class="form-control"  required/>
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
                    <div class="col-sm-6">
                        <h2>Daftar <b>Tutors</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="adduser.php" class="btn btn-success" data-toggle="modal" data-target=""><i class="material-icons">&#xE147;</i> <span>Add New Akun</span></a>                       
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Id User</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Level</th>
                    </tr>
                </thead>
                <tbody>
        <?php

        include "koneksi.php";
        if (isset($_POST['id_user'])) {
            $id_user=trim($_POST['id_user']);
            $sql="SELECT * FROM user WHERE id_user LIKE '%".$id_user."%' or username like '%".$id_user."%' or email like '%".$id_user."%' or password like '%".$id_user."%' or level like '%".$id_user."%' ORDER BY id_user asc";

        }else {
            $sql="SELECT * FROM user ORDER BY id_user asc";
        }
        

        $hasil=mysqli_query($koneksi,$sql);
        $no=0;
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;
            ?>
                
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data['id_user']; ?></td>
                    <td><?php echo $data['username']; ?></td>
                    <td><?php echo $data['email']; ?></td>
                    <td><?php echo $data['password'] ; ?></td>
                    <td><?php echo $data['level'] ; ?></td>
                    <td>
                        <a href="updateuser.php?id_user=<?php echo $data['id_user']; ?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                        <a href="deluser.php?id_user=<?php echo $data['id_user']; ?>" class="delete" onclick="return confirm(\'Yakin ingin menghapus data ini?\')" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>

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