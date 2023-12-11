<?php  
$host= "localhost";
$user= "root";
$pass= "";
$db= "perc2_bengkel";
$koneksi = mysqli_connect( $host, $user, $pass, $db ) or die( mysqli_error() );
    $query ="SELECT id,judul,deskripsi,gambar FROM carousel ORDER BY id ASC";
    $result = $koneksi->query($query);?>
<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Contoh Slider dengan PHP Native</title>
 
        <!-- Bootstrap CSS -->
         <link rel="stylesheet" href="assets/css/bootstrap.min.css">
 
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
 
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
     <?php
        for($i=0; $i<$result->num_rows;$i++){
            echo '
            <li data-target="#carouselExampleIndicators" data-slide-to="'.$i.'"';
            if($i==0){echo'class="active"';}echo'></li>';
        }?>
      </ol>
      <div class="carousel-inner">
          <?php
          if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()) {
            if($row['id'] == 1){
              echo'<div class="carousel-item active">';}else{echo'<div class="carousel-item">';}
              echo'
                <img src="images/'.$row['gambar'].'" alt="'.$row['judul'].'">
                <div class="carousel-caption d-none d-md-block">
                    <h5>'.$row['judul'].'</h5>
                    <p>'.$row['deskripsi'].'</p>
                </div>  
              </div>';
          }}?>
 
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
 
        <!-- jQuery -->
        <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="assets/js/bootstrap.min.js"></script>
    </body>
</html>
