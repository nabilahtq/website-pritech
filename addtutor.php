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
            <a href="account.php"><span class="las la-user-circle"></span><span>Account</span></a>
        </li>
        <li>
            <a href="murid.php"><span class="las la-clipboard-list"></span><span>Daftar Murid</span></a>
        </li>
        <li>
            <a href="draftutor.php" class="active"><span class="las la-users"></span><span>Tutor</span></a>
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
        <li class="active"><b>TAMBAH TUTOR</b></li>
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
			$tutor_id		= $_POST['tutor_id'];
			$nama			= $_POST['nama'];
			$ahli_id		= $_POST['ahli_id'];
			$pekerjaan		= $_POST['pekerjaan'];
      $star    = $_POST['star'];
			$foto			= $_FILES['foto']['name'];
			$deskripsi		= $_POST['deskripsi'];

			$nama_file   = $_FILES['foto']['name'];
			$file_tmp = $_FILES['foto']['tmp_name'];
			$folder = "assets/images/tutor/$nama_file";     
			move_uploaded_file($file_tmp,"$folder"); //memindah file gambar ke folder gambar
	
			
			$query = "SELECT * FROM tutors";

			$cek= mysqli_query($koneksi, $query) or die (mysqli_query($koneksi));

			if(mysqli_num_rows($cek) > 0){
				$sql = mysqli_query($koneksi, "INSERT INTO tutors(tutor_id, nama, ahli_id , pekerjaan, foto, star,deskripsi) VALUES('$tutor_id', '$nama', '$ahli_id', '$pekerjaan', '$foto', '$star','$deskripsi')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="draftutor.php?page=tambah_data";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, id tutor sudah terdaftar.</div>';
			}
		}
		?>
            <form role="form" method="post" action="" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label>Id Tutor</label>
                  <input type="text" name="tutor_id" class="form-control" placeholder="Id Tutor"  required>
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="nama" class="form-control" placeholder="Nama" required>
                </div>
                <div class="form-group">
                  <label>Kategori</label>
                  <input type="number" name="ahli_id" class="form-control" placeholder="Kategori" required>
                </div>
                <div class="form-group">
                  <label>Pekerjaan</label>
                  <input type="text" name="pekerjaan" class="form-control" placeholder="Pekerjaan" required>
                </div>
                <div class="form-group">
                  <label>Foto</label>
                  <input type="file" name="foto" class="form-control" placeholder="Foto" accept="image/*" required>
                </div>
                <div class="form-group">
                  <label>Star</label>
                  <input type="text" name="star" class="form-control" placeholder="Star" required>
                </div>
                <div class="form-group">
                  <label>Deskripsi</label>
                  <textarea rows="5" cols="35" type="text" name="deskripsi" class="form-control" placeholder="Tulis Deskripsi" required></textarea>
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

</body>
</html>
<?php
}
?>
