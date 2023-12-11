<?php

   session_start();
   if(isset($_SESSION['username'])) {
   header('location:index.php'); }

   include("koneksi.php");
   $username = $_POST['username'];
   $password = $_POST['password'];
   $sql = "SELECT * FROM user WHERE username='$username'";
   $result = mysqli_query($koneksi, $sql);
  if(isset($_POST['sign'])){
   if(mysqli_num_rows($result) > 0) {
     echo '<script>alert("Username sudah ada."); document.location="index.php";</script>';
   } else {
      mysqli_query($koneksi, "INSERT INTO `user` SET
      username = '$_POST[username]',
      email = '$_POST[email]',
      password = '$_POST[password]',
      level = 'user'
      ");
      header('location:index.php');
       } 
     }
   
?>




      