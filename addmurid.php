
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>ADMIN</title>
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="tutorstyle.css">
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
	<div class="sidebar">
		<div class="sidebar-brand">
			<h4><b>PRITECH</b></h4>
		</div>

	<div class="sidebar-menu">
	<ul>
		<li>
			<a href="mainindex.php" ><span class="las la-igloo"></span>Dasboard</a>
		</li>
		<li>
			<a href="akun.php" ><span class="las la-user-circle"></span>Account</a>
		</li>
		<li>
			<a href="murid.php" class="active"><span class="las la-clipboard-list"></span>Daftar Murid</a>
		</li>
		<li>
			<a href="draftutor.php"><span class="las la-users"></span>Tutor</a>
		</li>
		<li>
			<a href="kursus.php" ><span class="las la-user"></span>Course</a>
		</li>
	</ul>
	</div>
	</div>

	<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
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
			$id_user		= $_POST['id_user'];
			$id_murid		= $_POST['id_murid'];
			$name			= $_POST['name'];
			$contact		= $_POST['contact'];
			$email			= $_POST['email'];
			$judul			= $_POST['judul'];
			$course_id		= $_POST['course_id'];
			$nama_tutor		= $_POST['nama_tutor'];
			$tutor_id		= $_POST['tutor_id'];
			$tanggal		= $_POST['tanggal'];
			$tanggal_end	= $_POST['tanggal_end'];
			$harga_asli	= $_POST['harga'];
			$metodepay		= $_POST['metodepay'];
			
			$query = "SELECT * FROM daftar_murid INNER JOIN tutors ON daftar_murid.tutor_id = tutors.tutor_id 
            INNER JOIN course ON daftar_murid.course_id = course.course_id INNER JOIN user ON daftar_murid.id_user = user.id_user";
			$cek= mysqli_query($koneksi, $query) or die (mysqli_query($koneksi));

			if(mysqli_num_rows($cek) > 0){
				$sql = mysqli_query($koneksi, "INSERT INTO daftar_murid(id_user, id_murid, name, contact, email, judul, course_id, nama_tutor, tutor_id, tanggal, tanggal_end, harga, metodepay) VALUES('$id_user', '$id_murid', '$name', '$contact', '$email', '$judul', '$course_id', '$nama_tutor', '$tutor_id', '$tanggal', '$tanggal_end', '$harga_asli', '$metodepay')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="murid.php?page=tambah_data";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, id guru sudah terdaftar.</div>';
			}
		
	}
		?>
		<th>Id Murid</th>
						<th>Contact</th>
						<th>Email</th>
						<th>Training</th>
						<th>Tutor</th>
						<th>Harga</th>
						<th>Transaksi</th>
            <form role="form" method="post" action="" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <input type="hidden" name="id_user" class="form-control" required>
                  <label>Id Murid</label>
                  <input type="text" name="id_murid" class="form-control" placeholder="Id Murid" required>
                </div>
                <div class="form-group">
                  <label>Contact</label>
                  <input type="text" name="ahli_id" class="form-control" placeholder="Kategori" required>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" name="tutor_id" class="form-control" placeholder="Tutor" required>
                </div>
                <div class="form-group">
                  <label>Training</label>
                  <input type="date" name="tanggal" class="form-control" placeholder="Tanggal Mulai" required>
                </div>
                <div class="form-group">
                  <label>Tanggal Selesai</label>
                  <input type="date" name="tanggal_end" class="form-control" placeholder="Tanggal Selesai" required>
                </div>
                <div class="form-group">
                  <label>Harga Asli</label>
                  <input type="text" name="harga_asli" class="form-control" placeholder="Harga Asli" required>
                </div>
                <div class="form-group">
                  <label>Harga Diskon </label>
                  <input type="text" name="harga_diskon" class="form-control" placeholder="Harga Diskon" required>
                </div>
                <div class="form-group">
                  <label>Slot </label>
                  <input type="number" name="slot" class="form-control" placeholder="" required>
                </div>
                <div class="form-group">
                  <label>Gambar </label>
                  <input type="file" name="gambar" class="form-control" placeholder="" accept="image/*" required>
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

