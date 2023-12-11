<?php
//include file config.php
include('koneksi.php');

if(isset($_GET['id_user'])){
	//membuat variabel $id yang menyimpan nilai dari $_GET['id']
	$id_user = $_GET['id_user'];

	//melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
	$cek = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id_user'") or die(mysqli_error($koneksi));

	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if(mysqli_num_rows($cek) > 0){
		//query ke database DELETE untuk menghapus data dengan kondisi id=$id
		$del = mysqli_query($koneksi, "DELETE FROM user WHERE id_user='$id_user'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="akun.php?page=tampil_user";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location=akun.php?page=tampil_user";</script>';
		}
	}else{
		echo '<script>alert("ID tidak ditemukan di database."); document.location="akun.php?page=tampil_user";</script>';
	}
}else{
	echo '<script>alert("ID tidak ditemukan di database."); document.location="akun.php?page=tampil_user";</script>';
}

?>
