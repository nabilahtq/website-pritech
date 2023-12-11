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
            <a href="murid.php" class="active"><span class="las la-clipboard-list"></span><span>Daftar Murid</span></a>
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
        <li class="active"><b>UPDATE MURID</b></li>
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
    if(isset($_GET['id_murid'])){
      //membuat variabel $id untuk menyimpan id dari GET id di URL
      $id_murid = $_GET['id_murid'];

      //query ke database SELECT tabel mahasiswa berdasarkan id = $id
      $select = mysqli_query($koneksi, "SELECT * FROM daftar_murid WHERE id_murid='$id_murid'") or die(mysqli_error($koneksi));

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
      $id_murid   = $_POST['id_murid'];
      $name       = $_POST['name'];
      $contact    = $_POST['contact'];
      $email      = $_POST['email'];
      $judul      = $_POST['judul'];
      $harga       = $_POST['harga'];
      $metodepay   = $_POST['metodepay'];
      
      $query = "SELECT * FROM daftar_murid INNER JOIN tutors ON daftar_murid.tutor_id = tutors.tutor_id 
            INNER JOIN course ON daftar_murid.course_id = course.course_id";
      $row= mysqli_query($koneksi, $query) or die (mysqli_error($koneksi));


      if(mysqli_num_rows($row) > 0){
        $sql = mysqli_query($koneksi, "UPDATE daftar_murid SET id_murid='$id_murid', name='$name', contact='$contact', email='$email', judul='$judul', harga='$harga', metodepay='$metodepay' WHERE id_murid ='$id_murid'") or die(mysqli_error($koneksi));

        if($sql){
          echo '<script>alert("Berhasil mengupdate data."); document.location="murid.php?page=edit_murid";</script>';
        }else{
          echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
        }
      }else{
        echo '<div class="alert alert-warning">Gagal, id tuto sudah terdaftar.</div>';
      }

      
}

    
    ?>
            <form role="form" method="post" action="">
              <div class="box-body">
                
                 <div class="form-group">
                  <label>Id Murid</label>
                  <input type="text" name="id_murid" class="form-control" value="<?php echo $data['id_murid']; ?>"required>
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="name" class="form-control" value="<?php echo $data['name']; ?>" required>
                </div>
                <div class="form-group">
                  <label>Contact</label>
                  <input type="text" name="contact" class="form-control" value="<?php echo $data['contact']; ?>" required>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control" value="<?php echo $data['email']; ?>" required>
                </div>
                <div class="form-group">
                  <label>Training</label>
                  <input type="text" name="judul" class="form-control" value="<?php echo $data['judul']; ?>" required>
                </div>
                <div class="form-group">
                  <label>Harga</label>
                  <input type="text" name="harga" class="form-control" value="<?php echo $data['harga']; ?>" required>
                </div>
                <div class="form-group">
                  <label>Select Payment Mode</label>
                  <select type="" name="metodepay" class="form-control" required>
                  <option value="" selected disabled>-Select Payment Mode-</option>
                  <option value="link" <?php if($data['metodepay'] == "link") { echo "selected";} ?> >Link Aja</option>
                  <option value="netbanking" <?php if($data['metodepay'] == "netbanking") { echo "selected";} ?> >Net Banking</option>
                  <option value="ovo" <?php if($data['metodepay'] == "ovo") { echo "selected";} ?> >Ovo</option>
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