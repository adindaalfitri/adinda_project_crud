<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "crud_ad";
    $koneksi = mysqli_connect($host,$user,$pass,$db);

    if(!$koneksi) {
        die("Koneksi dengan database gagal: ".mysql_connect_error());
    }
?>