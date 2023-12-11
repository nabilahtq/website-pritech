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
	<link rel="stylesheet" type="text/css" href="styletutor.css">
</head> 
<style>
.content-wrapper {
	margin-left: 280px;
	margin-top: 20px;
    margin-bottom: 3rem;
    width :1050px;
 
}

.form-group label {
	width: 110px;
}

.box-footer button{
	margin-top: 20px;
	margin-right: 20px;
    
}

</style>

<body>
	<input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="lab la-accusoft" style="color: #fff;"></span> <span style="color: #fff; font-size: 25px;"><b>PRITECH</b></span></h2>
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
	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li class="active"><b>TAMBAH AKUN</b></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
    <?php
	include "koneksi.php";
	?>
	<?php
		if(isset($_POST['submit'])){
			$id_user		= $_POST['id_user'];
			$username		= $_POST['username'];
			$email			= $_POST['email'];
			$password		= $_POST['password'];
			$level			= $_POST['level'];
	
			
			$query = "SELECT * FROM user";

			$cek= mysqli_query($koneksi, $query) or die (mysqli_query($koneksi));

			if(mysqli_num_rows($cek) > 0){
				$sql = mysqli_query($koneksi, "INSERT INTO user(id_user, username, email, password, level) VALUES('$id_user', '$username', '$email', '$password', '$level')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="account.php?page=tambah_data";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, id tutor sudah terdaftar.</div>';
			}
		}
		?>
            <form role="form" method="post" action="">
              <div class="box-body">
                <div class="form-group">
                  <label>Id User</label>
                  <input type="text" name="id_user" class="form-control" placeholder="Id User"  required>
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" pattern="[a-z]{1,15}" title="Username should only contain lowercase letters. e.g. john" class="form-control" placeholder="Nama" required>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="text" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="form-group">
                  <label>Level</label>
                  <select type="" name="level" class="form-control" required>
                  	<option value="user">user</option>
			        <option value="admin">admin</option>
			      </select>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
              	<button type="reset" class="btn btn-danger" title="Reset"> <i class="glyphicon glyphicon-floppy-disk"></i> Reset</button>
                <button type="submit" name="submit" class="btn btn-warning" title="Simpan Data"> <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->
</main>
</div>

</body>
</html>

<?php 
}
?>
