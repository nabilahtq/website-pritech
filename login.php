<?php 
session_start(); 
include "koneksi.php";

if (isset($_POST['username']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$username = validate($_POST['username']);
	$password = validate($_POST['password']);

	if (empty($username)) {
		header("Location: index.php?error=User Name is required");
	    exit();
	}else if(empty($password)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";

		$result = mysqli_query($koneksi, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['username'] === $username && $row['password'] === $password && $row['level'] === "user"){
            	$_SESSION['username'] = $row['username'];
            	$_SESSION['email'] = $row['email'];
            	$_SESSION['id_user'] = $row['id_user'];
            	$_SESSION['level'] = "user";
            	header("Location: utama.php");
		        exit();
            }else if ($row['username'] === $username && $row['password'] === $password && $row['level'] === "admin"){
            	$_SESSION['username'] = $row['username'];
            	$_SESSION['email'] = $row['email'];
            	$_SESSION['id_user'] = $row['id_user'];
            	$_SESSION['level'] = "admin";
            	header("Location: mainindex.php");
		        exit();
			}
		}else{
			header("Location: index.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: indexl.php");
	exit();
}