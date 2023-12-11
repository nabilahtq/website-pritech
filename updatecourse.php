<?php
    include "koneksi.php";
?>

<?php 
session_start();

if (isset($_SESSION['id_user']) && isset($_SESSION['username'])) {

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
            <a href="account.php"><span class="las la-user-circle"></span><span>Account</span></a>
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
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li class="active"><b>UPDATE TRAINING</b></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
    
    <?php
    //jika sudah mendapatkan parameter GET id dari URL
    if(isset($_GET['course_id'])){
      //membuat variabel $id untuk menyimpan id dari GET id di URL
      $course_id = $_GET['course_id'];

      //query ke database SELECT tabel mahasiswa berdasarkan id = $id
      $select = mysqli_query($koneksi, "SELECT * FROM course WHERE course_id='$course_id'") or die(mysqli_error($konek));

      //jika hasil query = 0 maka muncul pesan error
      if(mysqli_num_rows($select) == 0){
        echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
        exit();
      //jika hasil query > 0
      }else{
        //membuat variabel $data dan menyimpan data row dari query
        $data = mysqli_fetch_assoc($select);
      }
    }
    ?>

    
            <!-- form start -->
    <?php

    if(isset($_POST['submit'])){
      $judul        = $_POST['judul'];
      $ahli_id      = $_POST['ahli_id'];
      $tutor_id     = $_POST['tutor_id'];
      $tanggal      = $_POST['tanggal'];
      $tanggal_end  = $_POST['tanggal_end'];
      $harga_asli   = $_POST['harga_asli'];
      $harga_diskon = $_POST['harga_diskon'];
      $software   = $_POST['software'];
      $deskripsi_co = $_POST['deskripsi_co'];
      $slot         = $_POST['slot'];
      $gambar       = $_FILES['gambar']['name'];

      $x=$_POST['x'];
      $foto         =$_FILES['gambar']['tmp_name'];
      $foto_name     =$_FILES['gambar']['name'];
      $acak        = rand(1,99);
      $tujuan_foto = $acak.$foto_name;
      $tempat_foto = 'course/'.$tujuan_foto;

      if (!$foto==""){
        $buat_foto=$tujuan_foto;
        $d = 'course/'.$x;
        @unlink ("$d");
        copy ($foto,$tempat_foto);
      }else{
        $buat_foto=$x;
      }


      
      $query = "SELECT * FROM course 
            INNER JOIN tutors ON course.tutor_id = tutors.tutor_id 
            INNER JOIN kategori_ahli ON course.ahli_id = kategori_ahli.ahli_id
      ";

      $row= mysqli_query($koneksi, $query) or die (mysqli_query($koneksi));

      if(mysqli_num_rows($row) > 0){
        $sql = mysqli_query($koneksi, "UPDATE course SET  judul='$judul', ahli_id='$ahli_id', tutor_id='$tutor_id', tanggal='$tanggal', tanggal_end='$tanggal_end', harga_asli='$harga_asli', harga_diskon='$harga_diskon', slot='$slot', software='$software', deskripsi_co='$deskripsi_co',gambar='$buat_foto' WHERE course_id ='$course_id'") or die(mysqli_error($koneksi));

        if($sql){
          echo '<script>alert("Berhasil mengupdate data."); document.location="kursus.php?page=edit_tutor";</script>';
        }else{
          echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
        }
      }else{
        echo '<div class="alert alert-warning">Gagal, id guru sudah terdaftar.</div>';
      }

      
}

    
    ?>
            <form role="form" method="post" action="" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label>Nama Training</label>
                  <input type="text" name="judul" class="form-control" value="<?php echo $data['judul']; ?>" required>
                </div>
                <div class="form-group">
                  <label>Kategori</label>
                  <input type="text" name="ahli_id" class="form-control" value="<?php echo $data['ahli_id']; ?>" required>
                </div>
                <div class="form-group">
                  <label>Tutor</label>
                  <input type="text" name="tutor_id" class="form-control" value="<?php echo $data['tutor_id']; ?>" required>
                </div>
                <div class="form-group">
                  <label>Tanggal Mulai</label>
                  <input type="date" name="tanggal" class="form-control" value="<?php echo $data['tanggal']; ?>" required>
                </div>
                <div class="form-group">
                  <label>Tanggal Selesai</label>
                  <input type="date" name="tanggal_end" class="form-control" value="<?php echo $data['tanggal_end']; ?>" required>
                </div>
                <div class="form-group">
                  <label>Harga Asli</label>
                  <input type="text" name="harga_asli" class="form-control" value="<?php echo $data['harga_asli']; ?>" required>
                </div>
                <div class="form-group">
                  <label>Harga Diskon </label>
                  <input type="text" name="harga_diskon" class="form-control" value="<?php echo $data['harga_diskon']; ?>" required>
                </div>
                <div class="form-group">
                  <label>Slot </label>
                  <input type="number" name="slot" class="form-control" value="<?php echo $data['slot']; ?>" required>
                </div>
                <div class="form-group">
                  <label>Software</label>
                  <input type="text" name="software" class="form-control" value="<?php echo $data['software']; ?>" placeholder="" required>
                </div>
                <div class="form-group">
                  <label>Deskripsi</label>
                  <textarea rows="7" cols="77" class="form-control ckeditor" type="text" name="deskripsi_co" required> <?php echo $data['deskripsi_co']; ?></textarea>
                </div>
                <div class="form-group">
                  <label>Gambar </label>
                  <td colspan="3"><input name="gambar" type="file" id="gambar" accept="image/*" required />
                  <input name="x" type="hidden" id="x" value="<? echo $data['gambar'];?>"></td>
                  
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