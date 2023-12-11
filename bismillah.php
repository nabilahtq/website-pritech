<?php
//melakukan koneksi ke database
// host = localhost, user = root, password = '', database 
$koneksi        = mysqli_connect("localhost", "root", "", "project");

//ambil data admin
$admin       = mysqli_query($koneksi, "SELECT level FROM user WHERE level = 'admin' ");

//ambil data user
$user      = mysqli_query($koneksi, "SELECT level FROM user WHERE level = 'user' ");
?>
<html>
    <head>
        <title>Belajar Chart</title>

        <!-- import library chart menggunakan cdn -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <style type="text/css">
            .container {
                width: 100%;
                margin: 10px auto;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <canvas id="myChart" ></canvas>
        </div>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                // tipe chart
                type: 'bar',
                data: {

                    //karena hanya menggunakan 2 batang
                    //maka buat dua lebel
                    labels: ['Admin', 'User'],

                    //dataset adalah data yang akan ditampilkan
                    datasets: [{
                            label: '',

                            //karena hanya menggunakan 2 batang/bar
                            //maka 2 sql yang dibutuhkan
                            data: [
                                <?php echo mysqli_num_rows($admin); ?>,
                                <?php echo mysqli_num_rows($user);?>,
                            ],

                            //atur background barchartnya
                            //karena cuma dua, maka 2 saja yang diatur
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)'
                            ],

                            //atur border barchartnya
                            //karena cuma dua, maka 2 saja yang diatur
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        </script>
    </body>
</html>
