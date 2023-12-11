<?php 
session_start();


include('koneksi.php');

if (isset($_SESSION['id_user']) && isset($_SESSION['username'])) {



 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
    <link rel="stylesheet" href="styleu.css">

</head>
<body>

    <section id="awal">
    <div class="circle"></div>
    <div class="wrapper">
    <nav>
      <input type="checkbox" id="show-menu">
      <label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>
      <div class="content">
      <div class="logo"><a href='#' ><img src="dia.png" class="logo"></a></div>
        <ul class="links">
          <li><a href="#">Home</a></li>
          <li><a href="haltraining.php">Training</a></li>
          <li><a href="haltutor.php">Tutor</a></li>
          <li><a href="#contact">Contact</a></li>
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
        <div class="content">
            <div class="textBox">
                <h2>Mau Belanjar Teknik dengan mudah?<br>Ya <span>di Pritech</span></h2>
                <p>Pelajari teknik bersama dengan ahlinya. Ayo tingkatkan kemampuan diri di bidang teknik</p>
                <a href="haltutor.php"> <button>Telusuri Tutors</button></a>
            </div>
            <div class="imgBox">
                <img src="hmm.png" class="guru">
            </div> 

        </div> 
    </section>

<!-- untuk partners -->
     <section id="partners " class="services-area gray-bg pt-50 pb-130">
        <div class="container ">
            <div class="tengah">
                <div class="kolom">
                    <h2>Our Students</h2>
                    <p>Student @pritech dari berbagai kampus di seluruh Indonesia.</p>
                </div>

                <div class="partner-list">
                    <div class="kartu-partner">
                        <img src="img/ipb.png"/>
                    </div>
                    <div class="kartu-partner">
                        <img src="img/itb.png"/>
                    </div>
                    <div class="kartu-partner">
                        <img src="img/ITS.png"/>
                    </div>
                    <div class="kartu-partner">
                        <img src="img/UB.png"/>
                    </div>
                    <div class="kartu-partner">
                        <img src="img/UI.png"/>
                    </div>
                    <div class="kartu-partner">
                        <img src="img/upn.png"/>
                    </div>
                </div>
        </div>

        <div class="service-area ">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center pb-30">
                        <h2 class="title">Our Course Categories</h2>
                        <p>Beberapa categori yang tersedia untuk anda pelajari dengan tutor expert</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-service text-center mt-30">
                        <div class="service-icon">
                            <i class="lni-code-alt"></i>
                        </div>
                        <div class="service-content">
                            <h4 class="service-title"><a href="#">Web Design</a></h4>
                            <p>Curabitur vitae magna felis. Nulla ac libero ornare, vestibulum lacus quis blandit enimdicta sunt.</p>
                        </div>
                    </div> <!-- single service -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-service text-center mt-30">
                        <div class="service-icon">
                            <i class="lni-mobile "></i>
                        </div>
                        <div class="service-content">
                            <h4 class="service-title"><a href="#contact">App Design</a></h4>
                            <p>Curabitur vitae magna felis. Nulla ac libero ornare, vestibulum lacus quis blandit enimdicta sunt.</p>
                        </div>
                    </div> <!-- single service -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-service text-center mt-30">
                        <div class="service-icon">
                            <i class="lni-website"></i>
                        </div>
                        <div class="service-content">
                            <h4 class="service-title"><a href="#">IT Development</a></h4>
                            <p>Curabitur vitae magna felis. Nulla ac libero ornare, vestibulum lacus quis blandit enimdicta sunt.</p>
                        </div>
                    </div> <!-- single service -->
                </div>
            </div>
        </div>
        </div>
    </section>
    

    <!-- course section -->
    <section class="course-section spad pb-0">
        <div class="container">
        <div class="tengah">
            <div class="kolom">
             <h2>Our Training</h2>
              <p>Beberapa training yang tersedia di setiap kategori</p>
            </div>
        </div>
        <div class="course-warp">
        <div id="message"></div>                                  
        <div class="row course-items-area">
        <?php
        include('koneksi.php');
        $result = mysqli_query($koneksi,"SELECT * FROM course
                INNER JOIN tutors ON course.tutor_id = tutors.tutor_id 
                INNER JOIN kategori_ahli ON course.ahli_id = kategori_ahli.ahli_id");
        while ($row = $result->fetch_assoc()):
        ?>
        <div class=" col-8 col-md-4 col-sm-4 col-lg-4 collum p-2 my-3 my-md-0 ">
            <div class="card-deck">
            <div class="course-item">
                <div class="card shadow">
                <div>
                <img src="course/<?php echo $row['gambar']; ?>" class="img-fluid card-img-top" height="250">
                </div>
                <div class="card-body">
                    <font color="grey" size="3"><p class="card-text 6 text-light-0 text-spacegray"><?php echo date('d F Y', strtotime($row["tanggal"]));?> - <?php echo date('d F Y', strtotime($row["tanggal_end"]));?></p></font><br>
                    <font size="4"><p class="text-8 title mt-n2"><b><?= $row['judul'] ?></b></p></font>
                    <font color="black" size="3" ><p class="card-text 6 mt-n2">
                       <br><?= $row['nama'] ?><br>
                    </p></font>
                    <font color="grey" size="3" ><p class="card-text 6 text-light-0 text-spacegray">
                       <?= $row['pekerjaan'] ?>
                    </p></font>

                    <br><h7>
                    <s class="text-secondary\">Rp.<?= number_format($row['harga_asli'],2) ?></s>
                    <span class="price"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rp.<?= number_format($row['harga_diskon'],2) ?></b></span>
                    </h7>
                <form action="" class="form-submit">
                    <input type="hidden" class="pid"  value="<?php echo $row['course_id']; ?>">
                    <input type="hidden" class="pgambar" value="<?php echo $row['gambar']; ?>">
                    <input type="hidden" class="pnama"  value="<?php echo $row['nama']; ?>">
                    <input type="hidden" class="tutor_id"  value="<?php echo $row['tutor_id']; ?>">
                    <input type="hidden" class="ptanggal"  value="<?php echo $row['tanggal']; ?>">
                    <input type="hidden" class="ptanggal_end"  value="<?php echo $row['tanggal_end']; ?>">
                    <input type="hidden" class="pjudul"  value="<?php echo $row['judul']; ?>">
                    <input type="hidden" class="pharga_asli"  value="<?php echo $row['harga_asli']; ?>">
                    <input type="hidden" class="pharga_diskon"  value="<?php echo $row['harga_diskon']; ?>">
                    <input type="hidden" class="pcourse_code"  value="<?php echo $row['course_code']; ?>">
                    <input type="hidden" class="pekerjaan"  value="<?php echo $row['pekerjaan']; ?>">
                    <input type="hidden" class="deskripsi"  value="<?php echo $row['deskripsi']; ?>">
                    <input type="hidden" class="software"  value="<?php echo $row['software']; ?>">
                    <input type="hidden" class="software"  value="<?php echo $row['foto']; ?>">
                    <input type="hidden" class="deskripsi_co"  value="<?php echo $row['deskripsi_co']; ?>">
                <button class="btn btn-warning btn-block add-to-cart"><a href="detailcourse.php?course_id=<?php echo $row['course_id']; ?> " id="course_id" class="btn btn-warning btn-block add-to-cart"><b>View Details</b></a></button>
                    
                   
                </div>
                </div>
            </form>
        </div>
        </div>
    </div>
        <?php endwhile; ?>               
        </div>
    </div>
    <br>
    <div class="tengah">
        <a href="haltraining.php"><button type="submit" class="btn btn-warning my-3 justify-content-center" name="telusuri"><b>Yuk lihat semua Training</b></button></a>
    </div>  
    </div>
    </div>
    </section>
    <!-- course section end -->

    <!-- tutor section -->
    <section class="course-section spad pb-0">
        <div class="container">
        <div class="tengah">
            <div class="kolom">
              <h2>Our Tutor</h2>
              <p>Daftar Tutor expert dengan kualifikasi terjamin</p>
            </div>
        <div class="course-warp">                             
        <div class="row course-items-area" >
        <?php
        include 'koneksi.php';
        $result = mysqli_query($koneksi,"SELECT * FROM tutors 
            INNER JOIN kategori_ahli ON tutors.ahli_id = kategori_ahli.ahli_id " );
        while ($row = $result->fetch_assoc()):
        ?>
        <div class="col-md-3 col-sm-6 my-3 my-md-0 web">
            <div class="course-item">
            <form action="" method="post">
                <div class="card shadow">
                <a href="detailtutor.php?tutor_id=<?php echo $row['tutor_id']; ?>" style="text-decoration: none; color: black;">
                <br>
                <div>
                <img  src="assets/images/tutor/<?php echo $row['foto']; ?>" class="rounded-circle" height="200" widht="200">
                </div>
                <div class="card-body">
                    <h6>
                        <?= $row['star'] ?> <i class="fas fa-star"></i>
                    </h6>
                    <font size="3" ><p class="card-text 6 text-light-0 mt-n2">
                       <br><b><?= $row['nama'] ?></b></i><br>
                       <?= $row['pekerjaan'] ?>
                    </p></font>
                <input type='hidden' name='course_id' value='$course_id'>
                </div>
                </div>
                </a>
            </form>
        </div>
        </div>
        <?php endwhile; ?>             
        </div>
    </div>
    <br>
    <div>
        <a href="haltutor.php"><button type="submit"class="btn btn-warning my-3 justify-content-center" name="telusuri"><b>Yuk lihat semua Tutor</b></button></a>
        </div>  
    </div>
    </div>
    </section>
    <!-- tutor section end -->

<!--====== CONTACT PART START ======-->

    <section id="contact" class="contact-area pt-125 pb-130 gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center pb-25">
                        <h2 class="title">Get In Touch</h2>
                        <p>Silahkan Hubungi contact di bawah ini untuk informasi lebih detail.</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-7">
                    <div class="contact-box text-center mt-30">
                        <div class="contact-icon">
                            <i class="lni-map-marker"></i>
                        </div>
                        <div class="contact-content">
                            <h6 class="contact-title">Address</h6>
                            <p>Jl. Sudirman no.3 Lamongan</p>
                        </div>
                    </div> <!-- contact box -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-7">
                    <div class="contact-box text-center mt-30">
                        <div class="contact-icon">
                            <i class="lni-phone"></i>
                        </div>
                        <div class="contact-content">
                            <h6 class="contact-title">Phone</h6>
                            <p>+6289 5396 3373 62</p>
                            <p>+6285 8151 2722 5</p>
                        </div>
                    </div> <!-- contact box -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-7">
                    <div class="contact-box text-center mt-30">
                        <div class="contact-icon">
                            <i class="lni-envelope"></i>
                        </div>
                        <div class="contact-content">
                            <h6 class="contact-title">Email</h6>
                            <p>atiqotunnabilah37871@yourmail.com</p>
                            <p>info@pritech.com</p>
                        </div>
                    </div> <!-- contact box -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== CONTACT PART ENDS ======-->
  

    <!--====== FOOTER PART START ======-->

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
</body>
</html>

<?php 
}
?>