<?php
//include file config.php
include('koneksi.php');

if(isset($_GET['id_murid'])){
	//membuat variabel $id yang menyimpan nilai dari $_GET['id']
	$id_murid = $_GET['id_murid'];

	//melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
	$cek = mysqli_query($koneksi, "SELECT * FROM daftar_murid WHERE id_murid='$id_murid'") or die(mysqli_error($koneksi));

	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if(mysqli_num_rows($cek) > 0){
		//query ke database DELETE untuk menghapus data dengan kondisi id=$id
		$del = mysqli_query($koneksi, "DELETE FROM daftar_murid WHERE id_murid='$id_murid'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="murid.php?page=tampil_murid";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location=murid.php?page=tampil_murid";</script>';
		}
	}else{
		echo '<script>alert("ID tidak ditemukan di database."); document.location="murid.php?page=tampil_murid";</script>';
	}
}else{
	echo '<script>alert("ID tidak ditemukan di database."); document.location="murid.php?page=tampil_murid";</script>';
}

?>
