<?php
        if(isset($_POST['submit'])){
            
            $id_murid       = $_POST['id_murid'];
            $name           = $_POST['name'];
            $contact        = $_POST['contact'];
            $email          = $_POST['email'];
            $kursus         = $_POST['judul'];
            $course_id      = $_POST['course_id'];
            $tutor_id       = $_POST['tutor_id'];
            $nama_tutor     = $_POST['nama_tutor'];
            $tanggal1       = $_POST['tanggal'];
            $tanggal2       = $_POST['tanggal_end'];
            $harga          = $_POST['harga'];
            $metodepay      = $_POST['metodepay'];
           
            
            $query = "SELECT * FROM daftar_murid INNER JOIN course ON daftar_murid.course_id = daftar_murid.course_id 
            INNER JOIN tutor ON daftar_murid.tutor_id = tutor.tutor_id";
            $cek= mysqli_query($koneksi, $query) or die (mysqli_query($koneksi));

            if(mysqli_num_rows($cek) > 0){
                $sql = mysqli_query($koneksi, "INSERT INTO daftar_murid(id_murid, name, contact, email, judul, course_id,tutor_id, nama_tutor,tanggal, tanggal_end, harga, metodepay) VALUES('$id_murid', '$name', '$contact', '$email', '$kursus', '$course_id','$tutor_id', '$nama_tutor', '$tanggal1', '$tanggal2', '$harga', '$metodepay')") or die(mysqli_error($koneksi));

                if($sql){
                    echo '<script>alert("Berhasil melakukan Transaksi."); document.location="detailcourse.php?page=buy_data";</script>';
                }else{
                    echo '<div class="alert alert-warning">Gagal melakukan proses transaksi.</div>';
                }
            }else{
                echo '<div class="alert alert-warning">Gagal, id murid sudah terdaftar.</div>';
            }
        
    }
        ?>