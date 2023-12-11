<?php 
session_start();
if (isset($_SESSION['id_user']) && isset($_SESSION['username'])) {

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pritech.</title>
    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!--====== Line Icons css ======-->
    <link rel="stylesheet" href="assets/css/LineIcons.css">
    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!--====== Default css ======-->
    <link rel="stylesheet" href="assets/css/default.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link rel="stylesheet" href="styledet1.css">

</head>
<body>

    <section id="awal">
    <div class="wrapper">
    <nav>
      <input type="checkbox" id="show-menu">
      <label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>
      <div class="content">
      <div class="logo"><a href='#' ><img src="dia.png" class="logo"></a></div>
        <ul class="links">
          <li><a href="utama.php">Home</a></li>
          <li><a href="haltraining.php">Training</a></li>
          <li><a href="haltutor.php">Tutor</a></li>
          <li><a href="utama.php?#contact">Contact</a></li>
          <?php if(isset($_SESSION['id_user'])) { ?>
          <li>
            <a href="#" class="desktop-link"><?php echo $_SESSION['username'];
                        ?></a>
            <input type="checkbox" id="show-features">
            <label for="show-features"><?php echo $_SESSION['username'];
                        ?></label>
            <ul>
              <li><a href="profile.php?id_user=<?php echo $_SESSION['id_user']; ?> " id="id_user">Edit Profile</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
            <?php } else { ?>
                    <li><a href="#">Sign Up</a></li>
                    <?php } ?>
          </li>
        </ul>
      </div>
    </nav>
  </div>
    </section>

 <?php
    include "koneksi.php";
    //jika sudah mendapatkan parameter GET id dari URL
    if(isset($_GET['course_id'])){
      //membuat variabel $id untuk menyimpan id dari GET id di URL'
      $id = $_GET['course_id'];

      //query ke database SELECT tabel mahasiswa berdasarkan id = $id
      if(!empty($id)){
        $sql = mysqli_query($koneksi,"SELECT * FROM daftar_murid INNER JOIN course ON daftar_murid.course_id = daftar_murid.course_id 
            INNER JOIN tutors ON daftar_murid.tutor_id = tutors.tutor_id WHERE course_id = '$id'") or die(mysqli_error());
        //$getProdInfo = mysqli_fetch_array($sql);
        //$judul = $getProdInfo["judul"];
        //$ahli = $getProdInfo["ahli"];
        //$nama = $getProdInfo["nama"];
        //$tutor_id = $_POST['tutor_id'];
        //$tanggal = $getProdInfo["tanggal"];
        //$tanggal_end = $getProdInfo["tanggal_end"];
        //$harga_asli = $getProdInfo["harga_asli"];
        //$harga_diskon = $getProdInfo["harga_diskon"];
        //$pekerjaan = $getProdInfo["pekerjaan"];
        //$gambar = $getProdInfo["gambar"];
        //$deskripsi = $getProdInfo["deskripsi"];
        //$software = $getProdInfo["software"];
        //$deskripsi_co = $getProdInfo["deskripsi_co"];
        //$total = 0;
        //$total = $total + (int)$harga_diskon;
        if(mysqli_num_rows($sql) == 0){
        echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
        exit();
        //jika hasil query > 0
        }else{
        //membuat variabel $data dan menyimpan data row dari query
        $data = mysqli_fetch_assoc($sql);
       }
    }
    }
    ?>

   
<section>
  <div class="container bcontent">
        <h2>Terimakasih atas transaksinya</h2>
        <hr />
        <div class="card">
            <div class="card-header"><b>Kartu Konfirmasi</b></div>
            <div class="card-body">
                <h6 class="card-title">Silahkan melakukan konfirmasi dengan format sebagai berikut :</h5>
                <p class="card-text">
                    <b><br>Nama : 
                    <br>Training :
                    <br>Metode Pembayaran :<b>
                </p>
                <a href="http://wa.me/62895396337362" class="btn btn-primary">Konfirmasi</a>
            </div>
            <div class="card-footer text-muted">Belajar bersama @Pritech</div>
        </div>
    </div>
</section>

 <!--====== FOOTER PART START ======-->
<section></section>
    <footer id="footer" class="footer-area">
        <div class="footer-widget pt-50 pb-50">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="footer-content text-center">
                            <a href="#">
                                <font size="18"><p class="mt-"><b>PRITECH</p></b></font>
                            </a>
                            <p class="mt-">Menyediakan training dengan 3 kategori yakni Web design, App design, dan IT Development. Mellaui tutor expert yang telah ter-uji kualitasnya</p>
                            <ul>
                                <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                                <li><a href="#"><i class="lni-twitter-original"></i></a></li>
                                <li><a href="#"><i class="lni-pinterest"></i></a></li>
                                <li><a href="#"><i class="lni-linkedin-original"></i></a></li>
                            </ul>
                        </div> <!-- footer content -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer widget -->
        <div class="footer-copyright pb-20">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text text-center pt-20">
                            <p>Copyright © 2021. <a href="#">Pritech </a></p>
                        </div> <!-- copyright text -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer widget -->
    </footer>

    <!--====== FOOTER PART ENDS ======-->
</section>



    

    

<!--====== jquery js ======-->
    <script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/popper.min.js"></script>

    <!--====== Magnific Popup js ======-->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>

    <!--====== Parallax js ======-->
    <script src="assets/js/parallax.min.js"></script>

    <!--====== Counter Up js ======-->
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>

    <!--====== Appear js ======-->
    <script src="assets/js/jquery.appear.min.js"></script>

    <!--====== Scrolling js ======-->
    <script src="assets/js/scrolling-nav.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>

    <!--====== Main js ======-->
    <script src="assets/js/main.js"></script>

    <!--====== Javascripts & Jquery ======-->
    <script src="assets/js1/mixitup.min.js"></script>
    <script src="assets/js1/circle-progress.min.js"></script>
    <script src="assets/js1/owl.carousel.min.js"></script>
    <script src="assets/js1/main.js"></script>

    <!--====== Slick js ======-->
    <script src="assets/js1/slick.min.js"></script>
    <!--====== Ajax Contact js ======-->
    <script src="assets/js1/ajax-contact.js"></script>
    <!--====== Isotope js ======-->
    <script src="assets/js1/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js1/isotope.pkgd.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

<?php 
}
?>