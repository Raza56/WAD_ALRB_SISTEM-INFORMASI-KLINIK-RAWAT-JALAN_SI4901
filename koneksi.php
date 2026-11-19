<?php
$ = "localhost";
$ = "root";       
$ = "";           
$db   = "db_rumahsakitwad";  

$koneksi = mysqli_($host, $user, $pass, $db);

if (!$koneksi) {
    ("Gagal terhubung ke database: " . mysqli_connect_error());
}
?>