<?php
//include file config.php
include('koneksi.php');

if(isset($_GET['tutor_id'])){
	//membuat variabel $id yang menyimpan nilai dari $_GET['id']
	$tutor_id = $_GET['tutor_id'];

	//melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
	$cek = mysqli_query($koneksi, "SELECT * FROM tutors WHERE tutor_id='$tutor_id'") or die(mysqli_error($koneksi));

	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if(mysqli_num_rows($cek) > 0){
		//query ke database DELETE untuk menghapus data dengan kondisi id=$id
		$del = mysqli_query($koneksi, "DELETE FROM tutors WHERE tutor_id='$tutor_id'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="draftutor.php?page=tampil_tutor";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="draftutor.php?page=tampil_tutor";</script>';
		}
	}else{
		echo '<script>alert("ID tidak ditemukan di database."); document.location="draftutor.php?page=tampil_tutor";</script>';
	}
}else{
	echo '<script>alert("ID tidak ditemukan di database."); document.location="draftutor.php?page=tampil_tutor";</script>';
}

?>
